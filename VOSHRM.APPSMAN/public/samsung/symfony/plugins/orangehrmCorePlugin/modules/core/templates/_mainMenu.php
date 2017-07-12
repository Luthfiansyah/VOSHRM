<?php

function getSubMenuIndication($menuItem) {

    if (count($menuItem['subMenuItems']) > 0) {
        return ' class="arrow"';
    } else {
        return '';
    }

}

function getListItemClass($menuItem, $currentItemDetails) {

    $flag = false;

    if ($menuItem['level'] == 1 && $menuItem['id'] == $currentItemDetails['level1']) {
        return ' class="current"';
    } elseif ($menuItem['level'] == 2 && $menuItem['id'] == $currentItemDetails['level2']) {
        return ' class="selected"';
    }

    return '';

}

function getMenuUrl($menuItem) {

    $url = '#';

    if (!empty($menuItem['module']) && !empty($menuItem['action'])) {
        $url = url_for($menuItem['module'] . '/'. $menuItem['action']);
        $url = empty($menuItem['urlExtras'])?$url:$url . $menuItem['urlExtras'];
    }

    return $url;

}

function getHtmlId($menuItem) {

    $id = '';

    if (!empty($menuItem['action'])) {
        $id = 'menu_' . $menuItem['module'] . '_' . $menuItem['action'];
    } else {

        $module             = '';
        $firstSubMenuItem   = $menuItem['subMenuItems'][0];
        $module             = $firstSubMenuItem['module'] . '_';

        $id = 'menu_' . $module . str_replace(' ', '', $menuItem['menuTitle']);

    }

    return $id;

}

?>

<!-- <div class="menu"> -->
    <ul class="nav__list">
		<li class="sidebar-brand">
			<a href="http://www.voshrms.com">
				<img src="<?php echo theme_path('images/logo.png')?>" width="220" height="37" alt="Ikonsultan"/>
			</a>
		</li>

        <?php foreach ($menuItemArray as $firstLevelItem) : ?>

        <li<?php echo getListItemClass($firstLevelItem, $currentItemDetails); ?>>
		<input id="<?php echo getHtmlId($firstLevelItem); ?>" type="checkbox" hidden />
		<?php if($firstLevelItem['menuTitle'] == "Dashboard" || $firstLevelItem['menuTitle'] == "Directory" || $firstLevelItem['menuTitle'] == "My Info" || $firstLevelItem['menuTitle'] == "Leave" || $firstLevelItem['menuTitle'] == "Time"){
		?>
			<label id="parent-link-label-custom" for="<?php echo getHtmlId($firstLevelItem); ?>"><a id="parent-link-custom" href="<?php echo getMenuUrl($firstLevelItem); ?>"><?php echo __($firstLevelItem['menuTitle']) ?></a></label>
		<?php
		} else {
		?>
		<label for="<?php echo getHtmlId($firstLevelItem); ?>"><span class="fa fa-angle-right"></span><!-- <a href="<?php echo getMenuUrl($firstLevelItem); ?>">--><?php echo __($firstLevelItem['menuTitle']) ?><!--</a>--></label>
		<?php
		}
		?>
            <ul class="group-list">
            <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>

                    <?php foreach ($firstLevelItem['subMenuItems'] as $secondLevelItem) : ?>

                        <li<?php echo getListItemClass($secondLevelItem, $currentItemDetails); ?>>
						<input id="<?php echo getHtmlId($secondLevelItem);?>" type="checkbox" hidden />
						<?php if($secondLevelItem['menuTitle'] == "Candidates" || $secondLevelItem['menuTitle'] == "Vacancies" || $secondLevelItem['menuTitle'] == "Nationalities" || $secondLevelItem['menuTitle'] == "Employee List" || $secondLevelItem['menuTitle'] == "Add Employee" /*|| $secondLevelItem['menuTitle'] == "Reports" */ || $secondLevelItem['menuTitle'] == "Leave List " || $secondLevelItem['menuTitle'] == "Assign Leave" || $secondLevelItem['menuTitle'] == "Employee Trackers"){?>
						<label id="parent-link-label-custom" for="<?php echo getHtmlId($secondLevelItem); ?>"><a id="parent-link-custom-2" href="<?php echo getMenuUrl($secondLevelItem); ?>"><?php echo __($secondLevelItem['menuTitle']) ?></a></label>
						<?php
							} else {
								// echo getMenuUrl($secondLevelItem);
								if(getMenuUrl($secondLevelItem) == "#"){
						?>

							<label for="<?php echo getHtmlId($secondLevelItem); ?>"><span id="label-fa-second" class="fa fa-angle-right"></span><!--<a href="<?php echo getMenuUrl($secondLevelItem); ?>">--><?php echo __($secondLevelItem['menuTitle']) ?><!--</a>--></label>
						<?php
								}else{
									?>
									<label id="parent-link-label-custom" for="<?php echo getHtmlId($secondLevelItem); ?>"><a id="parent-link-custom-2" href="<?php echo getMenuUrl($secondLevelItem); ?>"><?php echo __($secondLevelItem['menuTitle']) ?></a></label>
						<?php
								}
						}
						?>
                        <?php  if (count($secondLevelItem['subMenuItems']) > 0) : ?>

                            <ul class="sub-group-list">

                                <?php foreach ($secondLevelItem['subMenuItems'] as $thirdLevelItem) : ?>

                                    <li><a href="<?php echo getMenuUrl($thirdLevelItem); ?>" id="<?php echo getHtmlId($thirdLevelItem); ?>"><?php echo __($thirdLevelItem['menuTitle']) ?></a></li>

                                <?php endforeach; ?>

                            </ul> <!-- third level -->

                        <?php endif; ?>

                        </li>
<!--  -->
                    <?php endforeach; ?>
            <?php else:
                // Empty li to add an ikon bar and maintain uniform look.
            ?>
                        <li></li>
            <?php endif; ?>

                </ul> <!-- second level -->
            </li>

        <?php endforeach; ?>

    </ul> <!-- first level -->

<!-- </div> <!-- menu -->
