
<?php echo javascript_include_tag(plugin_web_path('orangehrmPimPlugin', 'js/addEmployeeSuccess')); ?>
<?php

    function company(){
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri_segments = explode('/', $uri_path);
		$url = $uri_segments[1];
        return $url;
    }
    
    function connection1(){
        $url = company();
        global $g_link1;
        if( $g_link1 )
            return $g_link1;
        $g_link1 = mysql_connect( 'localhost', 'sa', 'sa',true) or die('Could not connect to server.' );
        $tara = mysql_select_db($url, $g_link1) or die('Could not select database.'.$url);
        
        return $g_link1;
    }
    
    function hrm_emp_count(){
        $g_link1 = connection1();
        $sql1    = "SELECT count(employee_id) as count FROM hs_hr_employee";
		$result = mysql_query($sql1, $g_link1);
        if (!$result) {
		    echo "DB Error, could not query the database \n";
		    echo 'MySQL Error: ' . mysql_error();
		    exit;
		} else {
			while ($row = mysql_fetch_assoc($result)) {
		    	$hasil = $row['count'];
			}
		}
       
        return $hasil;
    }
    
    function connection2(){
        global $g_link2;
        if( $g_link2 )
            return $g_link2;
        $g_link2 = mysql_connect( 'localhost', 'sa', 'sa') or die('Could not connect to server.' );
        $tere = mysql_select_db('wp_cross_database', $g_link2) or die('Could not select database.');

        return $g_link2;
    }

    function product(){
        $url = company();
        $g_link2 = connection2();
        $sql2    = "SELECT  * FROM applications WHERE company_name = '".$url."'";
		$result2 = mysql_query($sql2, $g_link2);

		if (!$result2) {
		    echo "DB Error, could not query the database DB WP CROSS DATABASE \n";
		    echo 'MySQL Error: ' . mysql_error();
		    exit;
		} else {
			while ($row = mysql_fetch_assoc($result2)) {
		    	$product_type = $row['product_type'];
			}
		}
        if($product_type == "Basic"){
            $maxEmployee = 30;
        }else if($product_type == "Mid-Size"){
            $maxEmployee = 100;
        }else if($product_type == "Enterprise"){
            $maxEmployee = 10000;
        }
       
        return $maxEmployee;
    }

                        
?>

<div class="box">

<?php if (isset($credentialMessage)) { ?>

<div class="message warning">
    <?php echo __(CommonMessages::CREDENTIALS_REQUIRED) ?> 
</div>

<?php } else { ?>

    <div class="head">
        <h1><?php echo __('Add Employee'); echo $hasil; ?></h1>
    </div>

    <div class="inner" id="addEmployeeTbl">
        <?php include_partial('global/flash_messages'); ?>        
        <form id="frmAddEmp" method="post" action="<?php echo url_for('pim/addEmployee'); ?>" 
              enctype="multipart/form-data">
            <fieldset>
                <ol>
                    <?php echo $form->render(); ?>
                    <li class="required">
                        <em>*</em> <?php echo __(CommonMessages::REQUIRED_FIELD); ?>
                    </li>
                </ol>
                <p>
                    <?php
              
                    if(hrm_emp_count() < product()){
                    ?>
                        <input type="button" class="" id="btnSave" value="<?php echo __("Save"); ?>"/>
                    <?php
                    }else{
                        ?>
                    <input type="button" class="" id="btnSave" onclick="alert('BLA BLA');" value="Save" />
                    <?php
                    }
                    ?>
                </p>
            </fieldset>
        </form>
    </div>

<?php } ?>
    
    
</div> <!-- Box -->    

<script type="text/javascript">
    //<![CDATA[
    //we write javascript related stuff here, but if the logic gets lengthy should use a seperate js file
    var edit = "<?php echo __("Edit"); ?>";
    var save = "<?php echo __("Save"); ?>";
    var lang_firstNameRequired = '<?php echo __(ValidationMessages::REQUIRED); ?>';
    var lang_lastNameRequired = '<?php echo __(ValidationMessages::REQUIRED); ?>';
    var lang_userNameRequired = "<?php echo __("Should have at least %number% characters", array('%number%' => 5)); ?>";
    var lang_passwordRequired = "<?php echo __("Should have at least %number% characters", array('%number%' => 4)); ?>";
    var lang_unMatchingPassword = "<?php echo __("Passwords do not match"); ?>";
    var lang_statusRequired = "<?php echo __(ValidationMessages::REQUIRED); ?>";
    var lang_locationRequired = "<?php echo __(ValidationMessages::REQUIRED); ?>";
    var cancelNavigateUrl = "<?php echo public_path("../../index.php?menu_no_top=hr"); ?>";
    var createUserAccount = "<?php echo $createUserAccount; ?>";
    var ldapInstalled = '<?php echo ($sf_user->getAttribute('ldap.available')) ? 'true' : 'false'; ?>';
    var fieldHelpBottom = <?php echo '"' . __(CommonMessages::FILE_LABEL_IMAGE) . '. ' . __('Recommended dimensions: 200px X 200px') . '"'; ?>;
    var openIdEnabled = "<?php echo $openIdEnabled; ?>";
    //]]>
</script>
