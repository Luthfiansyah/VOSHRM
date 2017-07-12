<!DOCTYPE html>
<?php
$cultureElements = explode('_', $sf_user->getCulture());
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $cultureElements[0]; ?>" lang="<?php echo $cultureElements[0]; ?>">

    <head>

        <title>VOS HRM</title>

        <?php include_http_metas() ?>
        <?php include_metas() ?>
		<!-- Latest compiled and minified CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <link rel="shortcut icon" href="<?php echo theme_path('images/favicon.png')?>" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Library CSS files -->
        <link href="<?php echo theme_path('css/reset.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo theme_path('css/tipTip.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo theme_path('css/jquery/jquery-ui-1.8.21.custom.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo theme_path('css/jquery/jquery.autocomplete.css')?>" rel="stylesheet" type="text/css"/>

		<!-- bootstrap-3 CSS Framework -->
		<!-- <link href="<?php echo theme_path('css/bootstrap-3.3.7-dist/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css"/> -->
        <!-- Custom CSS files -->
        <link href="<?php echo theme_path('css/main.css')?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo theme_path('css/ikon-custom.css')?>" rel="stylesheet" type="text/css"/>
		<!-- Side-Menus -->
		<link href="<?php echo theme_path('font-awesome-4.3.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>

        <?php
        // Library JavaScript files
        echo javascript_include_tag('jquery/jquery-1.7.2.min.js');
        echo javascript_include_tag('jquery/validate/jquery.validate.js');
        echo javascript_include_tag('jquery/jquery.ui.core.js');
        echo javascript_include_tag('jquery/jquery.autocomplete.js');
        echo javascript_include_tag('orangehrm.autocomplete.js');
        echo javascript_include_tag('jquery/jquery.ui.datepicker.js');
        echo javascript_include_tag('jquery/jquery.form.js');
        echo javascript_include_tag('jquery/jquery.tipTip.minified.js');
        echo javascript_include_tag('jquery/bootstrap-modal.js');
        echo javascript_include_tag('jquery/jquery.clickoutside.js');
        // Custom JavaScript files
        echo javascript_include_tag('orangehrm.validate.js');
        echo javascript_include_tag('archive.js');

        /* Note: use_javascript() doesn't work well when we need to maintain the order of JS inclutions.
         * Ex: It may include a jQuery plugin before jQuery core file. There are two position options as
         * 'first' and 'last'. But they don't seem to resolve the issue.
         */
        ?>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
