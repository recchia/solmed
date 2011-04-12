<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUISelectable')  //  ysJQueryUISelectable Helper ?>
<?php use_helper('ysUtil') ?>
<style type="text/css">
#feedback { font-size: 1.4em; }
#selectable .ui-selecting { background: #FECA40; }
#selectable .ui-selected { background: #F39814; color: white; }
#selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
</style>

<?php echo ui_link_button(array('id' => 'btnSelectableListener','value' => 'Listener'))?>

<div class="demo">
  <p id="feedback">
  You've selected: <span id="select-result">none</span>.
  </p>

  <ol id="selectable">
    <li class="ui-widget-content">Item 1</li>
    <li class="ui-widget-content">Item 2</li>
    <li class="ui-widget-content">Item 3</li>
    <li class="ui-widget-content">Item 4</li>
    <li class="ui-widget-content">Item 5</li>
    <li class="ui-widget-content">Item 6</li>
  </ol>
  <?php ui_selectable_support_to(
          '#selectable',
          array(
            'listener' => array(
              'selector' => '#btnSelectableListener',
              'event' => 'click'),
            'stop' => like_function('var result = $("#select-result").empty();
                                     $(".ui-selected", this).each(function(event,ui){
                                          var index = $("#selectable li").index(this);
                                          result.append(" #" + (index + 1));
                                          //result.append(" #" + (index + 1));
                                     });'))) ?>


  <?php echo ui_disable_selection('#selectable li') ?>
</div><!-- End demo -->

<fieldset><legend>Actions buttons for ui.selectable</legend>
  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
             'btnDetroySelectable'    => array('value' => 'Destroy selectable'),
             'btnBuildSelectable'     => array('value' => 'Build selectable'),
             'btnDisableSelectable'      => array('value' => 'Disable'),
             'btnEnableSelectable'       => array('value' => 'Enable'),
             'btnGetSelectableOption' => array('value' => 'Get option'),
             'btnSetSelectableOption' => array('value' => 'Set option')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>
<?php
/*
* Add jQuery support to the buttons above
* **click event**
*/
echo add_jquery_support("#btnDetroySelectable", 'click' , like_function(ui_selectable_destroy('#selectable')));
echo add_jquery_support("#btnBuildSelectable", 'click' , like_function(ui_selectable_build('#selectable')));
echo add_jquery_support("#btnDisableSelectable", 'click' , like_function(ui_selectable_disable('#selectable')));
echo add_jquery_support("#btnEnableSelectable", 'click' , like_function(ui_selectable_enable('#selectable')));
echo add_jquery_support("#btnGetSelectableOption",'click',like_function("getOption()"));
echo add_jquery_support("#btnSetSelectableOption",'click',like_function("setOption()"));
?>
<script type="text/javascript" language="javascript">
  function getOption(){
    option = <?php echo ui_selectable_get_option('#selectable', 'delay') ?>
    alert('The selectable delay is ' +  option);
  }
  function setOption(){
    <?php echo ui_selectable_set_options('#selectable',array('delay' => 1000)); ?>
    alert('Now the selectable delay is 1 sec (1000 milliseconds).');
  }
</script>


<div class="demo-description">
  <p>Write a function that fires on the <code>stop</code> event to collect the index values of selected items.  Present values as feedback, or pass as a data string.</p>
</div><!-- End demo-description -->
<br>
<?php
  echo link_to('jquery UI (selectable) documentation', 'http://jqueryui.com/demos/selectable')
?>