<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUIResizable')  //  ysJQueryUIResizable Helper ?>
<?php use_helper('ysJQueryUIDraggable')  //  ysJQueryUIResizable Helper ?>
<?php use_helper('ysUtil') ?>
<style type="text/css">
	.ui-resizable-helper { border: 1px dotted gray; }
</style>

<?php
  echo link_to('jquery UI (resizable) documentation', 'http://jqueryui.com/demos/resizable')
?>

<fieldset><legend>Actions buttons for ui.resizable</legend>
  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
             'btnDetroyResizable'    => array('value' => 'Destroy resizable'),
             'btnBuildResizable'     => array('value' => 'Build resizable'),
             'btnDisableResize'      => array('value' => 'Disable'),
             'btnEnableResize'       => array('value' => 'Enable'),
             'btnGetResizableOption' => array('value' => 'Get option'),
             'btnSetResizableOption' => array('value' => 'Set option')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>
<?php
/*
* Add jQuery support to the buttons above
* **click event**
*/
echo add_jquery_support("#btnDetroyResizable", 'click' , like_function(ui_resizable_destroy('#resizablePanel')));
echo add_jquery_support("#btnBuildResizable", 'click' , like_function(ui_resizable_build('#resizablePanel')));
echo add_jquery_support("#btnDisableResize", 'click' , like_function(ui_resizable_disable('#resizablePanel')));
echo add_jquery_support("#btnEnableResize", 'click' , like_function(ui_resizable_enable('#resizablePanel')));
echo add_jquery_support("#btnGetResizableOption",'click',like_function("getOption()"));
echo add_jquery_support("#btnSetResizableOption",'click',like_function("setOption()"));
?>
<script type="text/javascript" language="javascript">
  function getOption(){
    option = <?php echo ui_resizable_get_option('#resizablePanel', 'delay') ?>
    alert('The resizable delay is ' +  option);
  }
  function setOption(){
    <?php echo ui_resizable_set_options('#resizablePanel',array('delay' => 1000)); ?>
    alert('Now the resizable delay is 1 sec (1000 milliseconds).');
  }
</script>

<br>

<?php echo ui_link_button(array('id' => 'btnResizableListener','value' => 'Listener'))?>

<br>
<div class="demo">
  <div>
  <?php echo ui_init_content_panel(
             array(
               'id' => 'resizablePanel',
               'style' => 'width: 150px; height: 150px; padding: 0.5em; background-position: top left;'));?>

      <?php echo ui_init_title(array('textAlign' => 'center')) ?>
              Resize Panel
      <?php echo ui_end_title() ?>
      <p>This is the content</p>
  <?php echo ui_end_content_panel()?>

  <?php ui_resizable_support_to(
          '#resizablePanel',
          array(
            'animate' => true,
            'autoHide' => true,
            'listener' => array(
              'selector' => '#btnResizableListener',
              'event' => 'click')))?>
  
  <?php ui_draggable_support_to('#resizablePanel')?>
  </div>
</div>
<br>