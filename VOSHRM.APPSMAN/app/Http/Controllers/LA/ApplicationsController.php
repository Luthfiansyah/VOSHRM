<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use Storage;
use File;

use App\Models\Application;

class ApplicationsController extends Controller
{
	public $show_action = true;
	public $view_col = 'company_name';
	public $listing_cols = ['id', 'company_name', 'person_name', 'person_email', 'person_contact', 'product_type', 'message', 'application_route', 'application_database', 'application_status'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Applications', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Applications', $this->listing_cols);
		}
	}

	/**
	 * Display a listing of the Applications.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Applications');

		if(Module::hasAccess($module->id)) {
			return View('la.applications.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created application in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Applications", "create")) {

			$rules = Module::validateRules("Applications", $request);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("Applications", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.applications.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified application.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Applications", "view")) {

			$application = Application::find($id);
			if(isset($application->id)) {
				$module = Module::get('Applications');
				$module->row = $application;

				return view('la.applications.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('application', $application);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("application"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified application.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Applications", "edit")) {
			$application = Application::find($id);
			if(isset($application->id)) {
				$module = Module::get('Applications');

				$module->row = $application;

				return view('la.applications.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('application', $application);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("application"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified application in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// return print($url);
		if($request->input('application_status') == "Published"){
			$realPath = "";

			// $directories = Storage::directories($realPath.$request->input('company_name'));
			if (!File::copyDirectory('VOSHRM',$realPath.$request->input('company_name'))){
			
			}
		}

		if(Module::hasAccess("Applications", "edit")) {

			$rules = Module::validateRules("Applications", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$insert_id = Module::updateRow("Applications", $request, $id);

			return redirect()->route(config('laraadmin.adminRoute') . '.applications.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified application from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Applications", "delete")) {
			$applications = DB::table('applications')->select('*')->where('id',$id)->get();
			foreach ($applications as $key => $application) {
				$company_name = $application->company_name;
			}

			if(!File::delete($company_name)){
				// Application Directory Delete Error
				print "Deleting Directory ".$company_name;
				print "<br>";
				return print "Error Deleting ".$company_name." Directory";
			}else {
				Application::find($id)->delete();
			}

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.applications.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('applications')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Applications');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/applications/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Applications", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/applications/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("Applications", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.applications.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
