@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/applications') }}">Application</a> :
@endsection
@section("contentheader_description", $application->$view_col)
@section("section", "Applications")
@section("section_url", url(config('laraadmin.adminRoute') . '/applications'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Applications Edit : ".$application->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($application, ['route' => [config('laraadmin.adminRoute') . '.applications.update', $application->id ], 'method'=>'PUT', 'id' => 'application-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'company_name')
					@la_input($module, 'person_name')
					@la_input($module, 'person_email')
					@la_input($module, 'person_contact')
					@la_input($module, 'product_type')
					@la_input($module, 'message')
					@la_input($module, 'application_route')
					@la_input($module, 'application_database')
					@la_input($module, 'application_status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/applications') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#application-edit-form").validate({
		
	});
});
</script>
@endpush
