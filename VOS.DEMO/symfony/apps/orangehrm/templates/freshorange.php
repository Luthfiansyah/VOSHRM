<?php

// Allow header partial to be overridden in individual actions
// Can be overridden by: slot('header', get_partial('module/partial'));
include_slot('header', get_partial('global/header'));
?>
    </head>
    <body>
        <div id="wrapper">
			<div id="sidemenu" class="col-md-2">
				<!-- Sidebar -->
		        <div id="sidebar-wrapper">
					<div class="nav" role="navigation">
						<?php  include_component('core', 'mainMenu'); ?>
					    <!-- <ul class="nav__list">
					    <li><a href="#">go</a></li>
					      <li>
					        <input id="group-1" type="checkbox" hidden />
					        <label for="group-1"><span class="fa fa-angle-right"></span> First level</label>
					        <ul class="group-list">
					          <li><a href="#">1st level item</a></li>
					          <li>
					            <input id="sub-group-1" type="checkbox" hidden />
					            <label for="sub-group-1"><span class="fa fa-angle-right"></span> Second level</label>
					            <ul class="sub-group-list">
					              <li><a href="#">2nd level nav item</a></li>
					              <li><a href="#">2nd level nav item</a></li>
					              <li><a href="#">2nd level nav item</a></li>
					            </ul>
					          </li>
					        </ul>
					      </li>
					      <li>
					    </ul> -->
					  </div>
		        </div>
		        <!-- #sidebar-wrapper -->
			</div>

			<!-- <a href="http://www.ikonsultan.com/" target="_blank"><img src="<?php echo theme_path('images/logo.png')?>" width="283" height="56" alt="OrangeHRM"/></a> -->
			<div id="header-panel">
				<a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars" id="menu-toggle" aria-hidden="true"></i></a>
				<a href="#" id="welcome" class="panelTrigger"><?php echo __("Welcome %username%", array("%username%" => $sf_user->getAttribute('auth.firstName'))); ?></a>
				<div id="welcome-menu" class="panelContainer">
					<ul>
						<li><?php include_component('communication', 'beaconAbout'); ?></li>
						<!-- <li><a href="<?php echo url_for('admin/changeUserPassword'); ?>"><?php echo __('Change Password'); ?></a></li> -->
						<li><a href="<?php echo url_for('auth/logout'); ?>"><?php echo __('Logout'); ?></a></li>
					</ul>
				</div>
				<?php include_component('communication', 'beaconNotification'); ?>
			</div>
			<!-- <div style="clear:both;height:50px;"></div> -->
            <div id="content" class="col-md-12">
                  <?php echo $sf_content ?>
            </div> <!-- content -->
        </div> <!-- wrapper -->

		<!-- Menu Toggle Script -->
		<script>
		$("#menu-toggle").click(function(e) {
		   e.preventDefault();
		   $("#wrapper").toggleClass("toggled");
		});
		</script>
        <div id="footer">
            <?php include_partial('global/copyright');?>
        </div> <!-- footer -->
<?php include_slot('footer', get_partial('global/footer'));?>
