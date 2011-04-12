<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  <?php use_helper('ysJQueryRevolutions'); ?>
  <?php use_helper('ysJQueryUILayout'); ?>
  <?php use_helper('ysJQueryUIMenu'); ?>
  <?php use_helper('ysJQueryUIDraggable'); ?>

  <?php ui_add_effects_support(array('bounce','slide','drop','scale'))   //  support for bounce effect  ?>
  <?php use_stylesheet('/ysJQueryUIPlugin/css/complex.css') // style for demo   ?>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>

  <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>

    <?php
        ui_layout_configure_to(
          'layoutVarName',
          'body',
          array(
            'cache' => true,
            'addCloseBtn' => array('#btnCloseWestId' => 'west' ,'#btnCloseEastId' =>'east'),
            'addOpenBtn' => array('#btnOpenWestId' => 'west' ,'#btnOpenEastId' =>'east'),
            'addToggleBtn' => array('#btnToggleSouthId' => 'south'),
            'addPinBtn' => array('#btnPinWestId' => 'west' ,'#btnPinEastId' =>'east'),
            'allowOverflow' => ('north'),
            'north'=> array(
                'size' => 54,
              //'togglerLength_open'=>	0			// HIDE the toggler button
              //'togglerLength_closed'=>	-1			// "100%" OR -1 = full width of pane
              //,	'resizable'=> 			false
              //,	'slidable'=>				false
              //	override default effect
              //,	'fxName'=>				"none"
              )
            ,	'south'=> array(
              //  'maxSize'=>				200
                'spacing'=>		50			// HIDE resizer & toggler when 'closed'
              //,	'slidable'=>				false		// REFERENCE - cannot slide if spacing_closed = 0
              //,	'initClosed'=>			true
              //	CALLBACK TESTING...
              //,	'onhide_start'=>		eval_function(like_function('return confirm("START South pane hide \n\n onhide_start callback \n\n Allow pane to hide?")'))
              //,	'onhide_end'=>			eval_function(like_function('alert("END South pane hide \n\n onhide_end callback")'))
              //,	'onshow_start'=>		eval_function(like_function('return confirm("START South pane show \n\n onshow_start callback \n\n Allow pane to show?")'))
              //,	'onshow_end'=>			eval_function(like_function('alert("END South pane show \n\n onshow_end callback")'))
              //,	'onopen_start'=>		eval_function(like_function('return confirm("START South pane open \n\n onopen_start callback \n\n Allow pane to open?")'))
              //,	'onopen_end'=>			eval_function(like_function('alert("END South pane open \n\n onopen_end callback")'))
              //,	'onclose_start'=>		eval_function(like_function('return confirm("START South pane close \n\n onclose_start callback \n\n Allow pane to close?")'))
              //,	'onclose_end'=>			eval_function(like_function('alert("END South pane close \n\n onclose_end callback")'))
              //,	'onresize_start'=>	eval_function(like_function('return confirm("START South pane resize \n\n onresize_start callback \n\n Allow pane to be resized?)")'))
              //,	'onresize_end'=>		eval_function(like_function('alert("END South pane resize \n\n onresize_end callback \n\n NOTE=> onresize_start event was skipped.")'))
              )
            ,	'west'=> array(
              //	'spacing_closed'=>		10			// wider space when closed
              //,	'togglerLength_closed'=>	21			// make toggler 'square' - 21x21
              //,	'togglerAlign_closed'=>	"top"		// align to top of resizer
              //,	'togglerLength_open'=>	0			// NONE - using custom togglers INSIDE west-pane
              //,	'togglerTip_open'=>		"Close West Pane"
              //,	'togglerTip_closed'=>		"Open West Pane"
              //,	'resizerTip_open'=>		"Resize West Pane"
              //,	'slideTrigger_open'=>		"click" 	// default
              //,	'initClosed'=>				true
              //	add 'bounce' option to default 'slide' effect
              //,	'fxSettings_open'=>		array( 'easing'=> "easeOutBounce")
              )
            ,	'east'=> array(
                'initClosed' => true
              //, 'spacing_closed'=>		10			// wider space when closed
              //,	'togglerLength_closed'=>	21			// make toggler 'square' - 21x21
              //,	'togglerAlign_closed'=>	"top"		// align to top of resizer
              //,	'togglerLength_open'=>	0 			// NONE - using custom togglers INSIDE east-pane
              //,	'togglerTip_open'=>		"Close East Pane"
              //,	'togglerTip_closed'=>		"Open East Pane"
              //,	'resizerTip_open'=>		"Resize East Pane"
              //,	'slideTrigger_open'=>		"mouseover"
              //,	'initClosed'=>			true
              //	override default effect, speed, and settings
              //,	'fxName'=>				"drop"
              //,	'fxSpeed'=>				"normal"
              //,	'fxSettings'=>			array( 'easing'=> "" ) // nullify default easing
              )
            ,	'center'=> array(
              //  'paneSelector'=>		"#mainContent" 			// sample=> use an ID to select pane instead of a class
              //,'onresize'=>				"innerLayout.resizeAll"	// resize INNER LAYOUT when center pane resizes
              //,	'minWidth'=>				200
              //,	'minHeight'=>				200
              )));
    ?>


    <br><br>


    <div class="ui-layout-center" id="testId">

      <?php echo ui_theme_switcher_tool(
            'themeroller',
            array(
              'width' => 200,
              'buttonPreText' => 'ysJQueryUIPlugin: ')) ?>

      <br>

      <?php echo $sf_data->getRaw('sf_content') ?>

    </div>

    <div class="ui-layout-north">


      <br>

      <?php echo ui_toolbar_init() ?>

        <?php echo ui_button_pane_init(
           $type = 'multiple',
           array(
            'btnToggleSouthId' => array(
               'value' => 'Toggle South',
               'priority' => 'secondary',
               'corner' => 'all')))?>
        <?php echo ui_button_pane_end() ?>

        <?php echo ui_button_pane_init(
           $type = 'multiple',
           array(
            'btnPinWestId' => array(
               'value' => 'West',
               'icon' => 'bullet'),
            'btnPinEastId' => array(
               'value' => 'East',
               'state' => 'disabled',
               'icon' => 'bullet')))?>
        <?php echo ui_button_pane_end() ?>

        <?php echo ui_button_pane_init(
                   $type = 'single',
                   array(
                    'btnCloseWestId' => array(
                      'value' => 'West',
                      'align' => 'right',
                      'icon' => 'triangle-1-w'),
                    'btnOpenWestId' => array(
                      'value' => 'West',
                      'state' => 'active',
                      'align' => 'right',
                      'icon' => 'triangle-1-e')))?>
        <?php echo ui_button_pane_end() ?>

        <?php echo ui_button_pane_init(
                   $type = 'single',
                   array(
                    'btnOpenEastId' => array(
                      'value' => 'East',
                      'align' => 'right',
                      'icon' => 'triangle-1-w'),
                    'btnCloseEastId' => array(
                      'value' => 'East',
                      'state' => 'active',
                      'align' => 'right',
                      'icon' => 'triangle-1-e')))?>
        <?php echo ui_button_pane_end() ?>

        <?php echo ui_menu_init(
                   'toolbarMenuId',
                   'Search engines',
                   array(
                     'node1' => array(
                       'id' => 'node1',
                       'value' => 'Node 1',
                       'actions' => 'myAlertFuntion()',
                       'items' => array(
                         'node11' => array(
                           'id' => 'node11',
                           'value' =>  'Node 1.1',
                           'items' => array(
                             'node111' => array(
                               'id' => 'node111',
                               'value' =>  'Node 1.1.1',
                               'items' => array(
                                 'node1111' => array(
                                   'id' => 'node1111',
                                   'url' => url_for('jqueryui_demo/dialog'),
                                   'value' =>  'Node 1.1.1.1',
                                 )
                               )
                             ))))),
                     'separator1' => array(
                       'type' => 'separator'),
                     'node2' => array(
                       'id' => 'node12',
                       'icon' => 'newwin',
                       'value' =>  'Node 2',
                       'url' => 'http://www.google.com' ))) ?>

      <?php echo ui_toolbar_end() ?>


    </div>

    <div class="ui-layout-south">
      <p>South Content<br>
      TIP: Using an IFRAME as a pane works great! Since the iframe auto-sizes, you will never again have TWO vertical scrollbars on your page.</p>
      <?php
      echo link_to('jqueryUI Layout documentation', 'http://layout.jquery-dev.net/documentation.html')
      ?>
    </div>


    <div class="ui-layout-east">
      <?php echo ui_init_title(array('icon' => 'newwin'))?>
        <span style="font-size:10px;">East Content</span>
      <?php echo ui_end_title()?>

      <dl class="demos-nav">
        <dt>Effects</dt>
          <dd><a href="<?php echo url_for('jqueryui_demo/effects') ?>">Effects</a></dd>
        <dt>Others</dt>
          <dd><a href="<?php echo url_for('jqueryui_demo/panel') ?>">Panels</a></dd>
          <dd><a href="<?php echo url_for('jqueryui_demo/toolbar') ?>">Toolbar</a></dd>
          <dd><a href="<?php echo url_for('jqueryui_demo/buttons') ?>">Buttons</a></dd>
          <dd><a href="<?php echo url_for('jqueryui_demo/table') ?>">Table</a></dd>
          <dd><a href="<?php echo url_for('jqueryui_demo/menu') ?>">Menu (FG-Menu)</a></dd>
          <dd><a href="<?php echo url_for('jqueryui_demo/contextMenu') ?>">ContextMenu</a></dd>
          <dd><a href="<?php echo url_for('jqueryui_demo/layout') ?>">Nested Layout</a></dd>

        <dt>About jQuery UI</dt>
          <dd><a href="http://jqueryui.com/docs/Developer_Guide">UI Developer Guidelines</a></dd>
          <dd><a href="http://jqueryui.com/docs/Changelog">Changelog</a></dd>
          <dd><a href="http://jqueryui.com/docs/Roadmap">Roadmap</a></dd>
          <dd><a href="http://jqueryui.com/docs/Subversion">Subversion Access</a></dd>
      </dl>
    </div>

    <div class="ui-layout-west">
      <?php echo ui_init_title(array('icon' => 'newwin'))?>
        <span style="font-size:10px;">West Content</span>
      <?php echo ui_end_title()?>

    <dl class="demos-nav">
      <dt>Interactions</dt>
        <dd><a href="<?php echo url_for('jqueryui_demo/draggable') ?>">Draggable</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/droppable') ?>">Droppable</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/resizable') ?>">Resizable</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/selectable') ?>">Selectable</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/sortable') ?>">Sortable</a></dd>

      <dt>Widgets</dt>
        <dd><a href="<?php echo url_for('jqueryui_demo/accordion') ?>">Accordion</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/datepicker') ?>">Datepicker</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/dialog') ?>">Dialog</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/progressbar') ?>">Progressbar</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/slider') ?>">Slider</a></dd>
        <dd><a href="<?php echo url_for('jqueryui_demo/tabs') ?>">Tabs</a></dd>

    <dt>Theming</dt>
        <dd><a href="http://jqueryui.com/docs/Theming">Theming jQuery UI</a></dd>
    </dl>

    </div>
  </body>
</html>


