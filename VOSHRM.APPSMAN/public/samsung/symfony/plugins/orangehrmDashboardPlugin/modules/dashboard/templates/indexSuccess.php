<?php echo stylesheet_tag(plugin_web_path('orangehrmDashboardPlugin', 'css/orangehrmDashboardPlugin.css')); ?>

<div class="box">
    <div class="head">
        <h1><?php echo __('Dashboard'); ?></h1>
    </div>
    <div class="inner">
        <?php if (count($settings) == 0): ?>
            <div id="messagebar" style="margin-left: 16px;width: 700px;">
                <span style="font-weight: bold;">No Groups are Assigned</span>
            </div>
        <?php endif; ?>
        <?php
        foreach ($settings->getRawValue() as $groupKey => $config):
            ?>
            <div class="outerbox no-border" style="">
                <div id="<?php echo "group_" . $groupKey ?>" class="maincontent group-wrapper">
                    <?php
                    if (!empty($config['attributes']['title'])):
                        ?>
                        <div class="mainHeading">
                            <h2 class="paddingLeft"><?php echo $config['attributes']['title']?></h2>
                        </div>
                        <?php
                    endif;
                    ?>
                    <div id="panel_wrapper_<?php echo $groupKey ?>" class="panel_wrapper" style="">
                        <?php foreach ($config['panels'] as $panelKey => $panel): ?>
                            <?php $styleString = isset($panel['attributes']['width']) ? "width:" . $panel['attributes']['width'] . "px;" : ""; ?>
                            <div id="<?php echo "panel_draggable_" . $groupKey . "_" . $panelKey; ?>" class="panel_draggable panel-preview" style="margin:4px <?php echo isset($panel['attributes']['width']) ? "width:" . $panel['attributes']['width'] + 2 . "px;" : "width:auto"; ?> <?php echo isset($panel['attributes']['height']) ? "height:" . $panel['attributes']['height'] + 2 . "px;" : "height:auto"; ?>">
                                <fieldset id="<?php echo "panel_resizable_" . $groupKey . "_" . $panelKey; ?>" class="panel_resizable panel-preview" style="<?php echo isset($panel['attributes']['height']) ? "height:" . $panel['attributes']['height'] . "px;" : "height:auto"; ?>">
                                    <legend><?php echo __($panel['name']); ?></legend>
                                    <?php include_component('dashboard', 'ohrmDashboardSection', $panel['attributes']) ?>
                                </fieldset> 
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
<style type="text/css">
    .loadmask {
        top:0;
        left:0;
        -moz-opacity: 0.5;
        opacity: .50;
        filter: alpha(opacity=50);
        background-color: #CCC;
        width: 100%;
        height: 100%;
        zoom: 1;
        background: #fbfbfb url("<?php echo plugin_web_path('orangehrmDashboardPlugin', 'images/loading.gif') ?>") no-repeat center;
    }
    .outerbox{
        width: 100%;
    }
    #panel_wrapper_1 {
        height: 300px;
    }
    #panel_wrapper_0{
        width: 100%;
    }
    #panel_resizable_1_2 {
        width: 300px;
        display: block;
    }
    #panel_resizable_1_1{
        width: 300px;
    }
    
    @media(max-width:600px) {
        #panel_resizable_0_0{
            width: 300px;
        }
        #panel_wrapper_1 {
            height: 1070px;
        }
        .box .inner {
            height: 1070px;
        }
        .panel_draggable {
            float: none;
        }
        .panel-preview {
            float: none;
        }
        #panel_resizable_1_1 {
            display: block;
        }
        #panel_resizable_1_2 {
            display: block;
        }
        .box .inner {
            padding: 0px;
        }
        .panel_resizable {
            border: #000000 2px solid;
            padding: none;
        }
    }
    @media(max-width:350px) {
/*
        .panel-preview {
            float: none;
            width: 274px;
        }
        div.quickLaunge {
            width: 90px;
        }
        #panel_resizable_1_2{
            width: 260px;
        }
        #panel_resizable_1_1 {
            width: 260px;
        }
        #dashboard__employeeDistribution {
            width: 260px;
        }
*/
        #panel_resizable_0_0{
            width: 300px;
        }
        #panel_wrapper_1 {
            height: 1070px;
        }
        .box .inner {
            height: 1070px;
        }
        .panel_draggable {
            float: none;
        }
        .panel-preview {
            float: none;
        }
        #panel_resizable_1_1 {
            display: block;
        }
        #panel_resizable_1_2 {
            display: block;
        }
        .box .inner {
            padding: 0px;
        }
        .panel_resizable {
            border: #000000 2px solid;
            padding: none;
        }
        .box {
            margin: 0px;
            position: relative;
        }
    }
</style>