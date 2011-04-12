<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysJQueryUIDroppable') ?>
<?php use_helper('ysJQueryUIDraggable') ?>
<?php use_helper('ysUtil') ?>
<?php echo ui_link_button(array('id' => 'btnDroppableListener','value' => 'Listener')) ?>

<div class="demo">

<div id="draggable" class="ui-widget-content" style="width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0;">
	<p>Drag me to my target</p>
</div>
<?php ui_draggable_support_to(
        '#draggable' ,
        array(
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
          'listener' => array(
            'selector' => '#btnDroppableListener',
            'event'  =>  'click',
            'before' => like_function('alert("You can drop now in the target")')),
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
<legend> Example: Actions buttons for ui.droppable </legend>

  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
            'btnDestroyDrop'   => array('value' => 'Destroy Drop'),
            'btnBuildDrop'     => array('value' => 'Do Droppable'),
            'btnDisableDrop'   => array('value' => 'Disable Droppable'),
            'btnEnableDrop'    => array('value' => 'Enable Droppable'),
            'btnSetDropOption'  => array('value' => 'Set option'),
            'btnGetDropOption' => array('value' => 'Get option')))?>
  <?php echo ui_button_pane_end() ?>

</fieldset>

<?php
/*
 * Add jQuery support to the buttons above
 * **click event**
 */
echo add_jquery_support("#btnDestroyDrop",'click',like_function(ui_droppable_destroy('#droppable')));

echo add_jquery_support(
     "#btnBuildDrop",
     'click',
     like_function(
       ui_droppable_build(
        '#droppable',
        array(
          'accept' => '#draggable',
          'drop' => like_function("$(this).addClass('ui-state-highlight').find('p').html('Dropped!');"),
          'deactivate' => like_function('alert("Deactivete successful")'),
          'accept'  => '#draggable',
          'activeClass' => 'ui-state-active',
          'addClasses'  => true,
          'greedy'  => true,
          'tolerance' => 'touch',
          'hoverClass' => 'ui-state-hover'))));

echo add_jquery_support("#btnDisableDrop",'click',like_function(ui_droppable_disable('#droppable')));
echo add_jquery_support("#btnEnableDrop",'click',like_function(ui_droppable_enable('#droppable')));
echo add_jquery_support("#btnSetDropOption",'click',like_function("setOption()"));
echo add_jquery_support("#btnGetDropOption",'click',like_function("getOption()"));
?>

<script type="text/javascript" language="javascript">
  function getOption(){
    option = <?php echo ui_droppable_get_option('#droppable', 'hoverClass') ?>
    alert('The droppable class on hover is:' +  option);
  }
  function setOption(){
    option = <?php echo ui_droppable_set_options('#droppable', array('accept' => '#noacceptable')) ?>
    alert('Now the div(2) is acceptable');
  }
</script>

<?php
  echo link_to('jquery UI (droppable) documentation', 'http://jqueryui.com/demos/droppable')
?>



