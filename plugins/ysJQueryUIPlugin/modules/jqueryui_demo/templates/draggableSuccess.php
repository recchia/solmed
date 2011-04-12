<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysJQueryUIDroppable') ?>
<?php use_helper('ysJQueryUIDraggable') ?>
<?php use_helper('ysUtil') ?>
<?php echo ui_link_button(array('id' => 'btnDraggableListener','value' => 'Listener'))?>

<div class="demo">

<div id="draggable" class="ui-widget-content" style="width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0;">
	<p>Drag me to my target</p>
</div>
<?php ui_draggable_support_to(
        '#draggable' ,
        array(
          'listener' => array(
            'selector' => '#btnDraggableListener',
            'event'  =>  'click',
            'before' => like_function('alert("You can drag now to target")')),
          'cursorAt' => array (
            'cursor' => 'crosshair',
            'top' => -5 ,
            'left' => -5
      )))
?>
<div id="noacceptable" class="ui-widget-content" style="width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0;">
	<p>Drag me to my target</p>
</div>
<?php ui_draggable_support_to(
        '#noacceptable',
        array(
          'revert' => true,
          'cursor' => 'move',
		  'cursorAt' => array(
            'top' => -12,
            'left' => -20),
          'helper' => 'clone',
          'helperFunction' => like_function("return $('<div class=\"ui-widget-header\">But i\'m no acceptable</div>')", 'event')
      ))
?>
<div id="droppable" class="ui-widget-header" style="width: 150px; height: 150px; padding: 0.5em; float: left; margin: 10px;">
	<p>Drop here</p>
</div>

<?php ui_droppable_support_to(
        '#droppable',
        array(
          'drop' => like_function("$(this).addClass('ui-state-highlight').find('p').html('Dropped!');"),
          'deactivate' => like_function('alert("Deactivete successful")'),
          'accept'  => '#draggable',
          'activeClass' => 'ui-state-active',
          'addClasses'  => true,
          'greedy'  => true,
          'tolerance' => 'touch',
          'hoverClass' => 'ui-state-hover'
      ))
?>
</div><!-- End demo -->
<div class="demo-description">
<p>Enable any DOM element to be droppable, a target for draggable elements.</p>
</div><!-- End demo-description -->

<fieldset>
<legend> Example: Actions buttons for ui.draggable </legend>
  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
            'btnDestroyDrag'   => array('value' => 'Destroy Drag'),
            'btnBuildDrag'     => array('value' => 'Do Draggable'),
            'btnDisableDrag'   => array('value' => 'Disable Draggable'),
            'btnEnableDrag'    => array('value' => 'Enable Draggable'),
            'btnSetDragOption'  => array('value' => 'Set option'),
            'btnGetDragOption' => array('value' => 'Get option')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>

<?php
/*
 * Add jQuery support to the buttons above
 * **click event**
 */
echo add_jquery_support("#btnDestroyDrag",'click',like_function(ui_draggable_destroy('#draggable')));
echo add_jquery_support("#btnBuildDrag",'click',like_function(ui_draggable_build('#draggable')));
echo add_jquery_support("#btnDisableDrag",'click',like_function(ui_draggable_disable('#draggable')));
echo add_jquery_support("#btnEnableDrag",'click',like_function(ui_draggable_enable('#draggable')));
echo add_jquery_support("#btnSetDragOption",'click',like_function("setOption()"));
echo add_jquery_support("#btnGetDragOption",'click',like_function("getOption()"));
?>

<script type="text/javascript" language="javascript">
  function getOption(){
    option = <?php echo ui_draggable_get_option('#draggable', 'axis') ?>
    alert('The draggable axis value is: ' +  option);
  }
  function setOption(){
    option = <?php echo ui_draggable_set_options('#draggable', array('axis' => 'x')) ?>
    alert('Now the axis is only horizontal');
  }
</script>

<?php
  echo link_to('jquery UI (draggable) documentation', 'http://jqueryui.com/demos/draggable')
?>



