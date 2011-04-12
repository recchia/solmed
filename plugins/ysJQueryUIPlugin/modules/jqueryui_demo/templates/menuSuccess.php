<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysJQueryUICore'); ?>
<?php use_helper('ysJQueryUIMenu'); ?>
<?php use_helper('ysUtil') ?>
<!-- style exceptions for IE 6 -->
<!--[if IE 6]>
<style type="text/css">
  .fg-menu-ipod .fg-menu li { width: 95%; }
  .fg-menu-ipod .ui-widget-content { border:0; }
</style>
<![endif]-->

<script type="text/javascript" language="javascript">
  function myJsFunction(url){
    if(confirm("Do you want go to dialog view")){
      location.href = url;
    }
  }
  function myAlertFuntion(){
    alert('My Alert Function');
  }

</script>

<h1>NOTE: This widget don't work in IE6 with UI.Layout</h1>

<p id="menuLog">You chose: <span id="menuSelection"></span></p>
 <?php echo ui_menu_init(
            'menuId',
            'Search engines',
            array(
              'node1' => array(
                'id' => 'node1',
                'value' => 'Value node1',
                'actions' => 'myAlertFuntion()',
                'items' => array(
                  'node11' => array(
                    'id' => 'node11',
                    'value' => 'Value node1.1',
                    'actions' => array('click' => "alert('Hello world')"),
                    'items' => array(
                      'node111' => array(
                        'id' => 'node1.1.1',
                        'value' =>  'Value node111',
                        'items' => array(
                          'node1111' => array(
                            'id' => 'node1111',
                            'url' => url_for('jqueryui_demo/dialog'),
                            'value' =>  'Value node1.1.1.1',
                          )
                        )
                      ))),
                  'separator1' => array('type' => 'separator'),
                  'node12' => array(
                    'id' => 'node12',
                    'value' =>  'Value node1.2',
                    'url' => 'http://www.google.com' ))))) ?>

<?php

  echo ui_menu_init(
            'menuDisabledId',
            'Search engines',
            array(
              'button' => array('align' => 'left', 'icon' => 'newwin'),
              //'disabled' => true,
              'node1' => array(
                'id' => 'node1',
                'value' => 'Value node1',
                //'disabled' => true,
                'actions' => 'myAlertFuntion()',
                'items' => array(
                  'node11' => array(
                    'id' => 'node11',
                    'value' =>  'Value node1.1',
                    'disabled' => true,
                    'items' => array(
                      'node111' => array(
                        'id' => 'node1.1.1',
                        'value' =>  'Value node111',
                        'items' => array(
                          'node1111' => array(
                            'id' => 'node1111',
                            'url' => url_for('jqueryui_demo/dialog'),
                            'value' =>  'Value node1.1.1.1',
                          )
                        )
                      ))),
                  'node12' => array(
                    'id' => 'node12',
                    'disabled' => true,
                    'value' =>  'Value node1.2',
                    'url' => 'http://www.google.com' ))))) ?>

<?php
 /**
  * --Load the items from a .yml file---
  * The yml option value:
  * Examples:
  *   On windows: 
  *   'yml' => 'C:\server\project\plugins\ysJQueryUIPlugin\config\menu.yml'
  *   On Linux:
  *   'yml' => '/home/user/project/plugins/ysJQueryUIPlugin/config/menu.yml'
  * 
  *  The value depends on the OS and your project path.
  */
?>

 <?php echo ui_menu_init(
            'menu2Id',
            'Search engines 2',
            array(
              //'yml' => 'path/to/yourProjectDir/plugins/ysJQueryUIPlugin/config/menu.yml'
            ))  ?>

 <?php echo ui_menu_init(
            'menu3Id',
            'Search engines 3',
            array(
              //'yml' => 'path/to/yourProjectDir/plugins/ysJQueryUIPlugin/config/menu.yml',
              //'ymlKey' => 'myMenuIndex' // the default yml key is 'menu'
            ))  ?>

<?php echo ui_menu_init(
           'menu4Id',
           'Search engines 4',
           array(
             //'yml' => 'path/to/yourProjectDir/plugins/ysJQueryUIPlugin/config/menu.yml',
             //'ymlKey' => 'undefinedYmIndex', // Error value
           ))  ?>




<?php echo ui_menu_init(
           'menu6Id',
           'Ipod Menu',
           array(
             //'yml' => 'path/to/yourProjectDir/plugins/ysJQueryUIPlugin/config/menu.yml',
             //'ymlKey' => 'flyoutMenu'
           ),
           array('flyOut' => false, 'content' => "$('#ipodMenuData').html()"))  ?>

<div><br></div>
<div><br></div>

The content



<div id="ipodMenuData" class="hidden">
<ul>
	<li><a href="#">Breaking News</a>
		<ul>
			<li><a href="#">Entertainment</a></li>
			<li><a href="#">Politics</a></li>
			<li><a href="#">A&amp;E</a></li>
			<li><a href="#">Sports</a>
				<ul>
					<li><a href="#">Baseball</a></li>
					<li><a href="#">Basketball</a></li>
					<li><a href="#">A really long label would wrap nicely as you can see</a></li>
					<li><a href="#">Swimming</a>
						<ul>
							<li><a href="#">High School</a></li>
							<li><a href="#">College</a></li>
							<li><a href="#">Professional</a>
								<ul>
									<li><a href="#">Mens Swimming</a>
										<ul>
											<li><a href="#">News</a></li>
											<li><a href="#">Events</a></li>
											<li><a href="#">Awards</a></li>
											<li><a href="#">Schedule</a></li>
											<li><a href="#">Team Members</a></li>
											<li><a href="#">Fan Site</a></li>
										</ul>
									</li>
									<li><a href="#">Womens Swimming</a>
										<ul>
											<li><a href="#">News</a></li>
											<li><a href="#">Events</a></li>
											<li><a href="#">Awards</a></li>
											<li><a href="#">Schedule</a></li>
											<li><a href="#">Team Members</a></li>
											<li><a href="#">Fan Site</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#">Adult Recreational</a></li>
							<li><a href="#">Youth Recreational</a></li>
							<li><a href="#">Senior Recreational</a></li>
						</ul>
					</li>
					<li><a href="#">Tennis</a></li>
					<li><a href="#">Ice Skating</a></li>
					<li><a href="#">Javascript Programming</a></li>
					<li><a href="#">Running</a></li>
					<li><a href="#">Walking</a></li>
				</ul>
			</li>
			<li><a href="#">Local</a></li>
			<li><a href="#">Health</a></li>
		</ul>
	</li>
	<li><a href="#">Entertainment</a>
	<ul>
		<li><a href="#">Celebrity news</a></li>
		<li><a href="#">Gossip</a></li>
		<li><a href="#">Movies</a></li>
		<li><a href="#">Music</a>
		<ul>
			<li><a href="#">Alternative</a></li>
			<li><a href="#">Country</a></li>
			<li><a href="#">Dance</a></li>
			<li><a href="#">Electronica</a></li>
			<li><a href="#">Metal</a></li>
			<li><a href="#">Pop</a></li>
			<li><a href="#">Rock</a>
				<ul>
					<li><a href="#">Bands</a>
						<ul>
							<li><a href="#">Dokken</a></li>
						</ul>
					</li>
					<li><a href="#">Fan Clubs</a></li>
					<li><a href="#">Songs</a></li>
				</ul>
			</li>
		</ul>
		</li>
		<li><a href="#">Slide shows</a></li>
		<li><a href="#">Red carpet</a></li>
	</ul>
	</li>
	<li><a href="#">Finance</a>
	<ul>
		<li><a href="#">Personal</a>
		<ul>
			<li><a href="#">Loans</a></li>
			<li><a href="#">Savings</a></li>
			<li><a href="#">Mortgage</a></li>
			<li><a href="#">Debt</a></li>
		</ul>
		</li>
		<li><a href="#">Business</a></li>
	</ul>
	</li>
	<li><a href="#">Food &#38; Cooking</a>
	<ul>
		<li><a href="#">Breakfast</a></li>
		<li><a href="#">Lunch</a></li>
		<li><a href="#">Dinner</a></li>
		<li><a href="#">Dessert</a>
			<ul>
				<li><a href="#">Dump Cake</a></li>
				<li><a href="#">Doritos</a></li>
				<li><a href="#">Both please.</a></li>
			</ul>
		</li>
	</ul>
	</li>
	<li><a href="#">Lifestyle</a></li>
	<li><a href="#">News</a></li>
	<li><a href="#">Politics</a></li>
	<li><a href="#">Sports</a>
		<ul>
			<li><a href="#">Baseball</a></li>
			<li><a href="#">Basketball</a></li>
			<li><a href="#">Swimming</a>
			<ul>
				<li><a href="#">High School</a></li>
				<li><a href="#">College</a></li>
				<li><a href="#">Professional</a>
				<ul>
					<li><a href="#">Mens Swimming</a>
					<ul>
							<li><a href="#">News</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="#">Awards</a></li>
							<li><a href="#">Schedule</a></li>
							<li><a href="#">Team Members</a></li>
							<li><a href="#">Fan Site</a></li>
						</ul>
					</li>
					<li><a href="#">Womens Swimming</a>
					<ul>
						<li><a href="#">News</a></li>
						<li><a href="#">Events</a></li>
						<li><a href="#">Awards</a></li>
						<li><a href="#">Schedule</a></li>
						<li><a href="#">Team Members</a></li>
						<li><a href="#">Fan Site</a></li>
					</ul>
					</li>
				</ul>
				</li>
				<li><a href="#">Adult Recreational</a></li>
				<li><a href="#">Youth Recreational</a></li>
				<li><a href="#">Senior Recreational</a></li>
			</ul>
			</li>
			<li><a href="#">Tennis</a></li>
			<li><a href="#">Ice Skating</a></li>
			<li><a href="#">Javascript Programming</a></li>
			<li><a href="#">Running</a></li>
			<li><a href="#">Walking</a></li>
		</ul>
		</li>
	</ul>
</div>