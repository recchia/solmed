<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUISlider')     //  ysJQueryUISlider Helper ?>

<?php echo ui_link_button(array('id' => 'btnSliderListener','value' => 'Listener'))?>

<div class="demo">
  Slider 1:
  <br>
  <?php ui_slider_create(
        'slider1',
        array(
          'listener' => array(
            'selector' => '#btnSliderListener',
            'event' => 'click',
            'after' => like_function(jquery_execute_effect('#slider1','show'))),
          'change' => like_function('alert("Change Successful");')),
       'style="display:none"');  ?>
  <br>
  Slider 2: values [1,20,80]
  <br>
  <?php ui_slider_create(
         'slider2',
         array(
           'max' => 80,
           'values' => array(1,20,80)));  ?>
  <br>

  <?php echo ui_init_content_panel(array('style'=> 'float:left; width:auto; margin:2px;'))?>
    <?php ui_slider_create(
            'sliderId0', // <- slider id
            array(       // <- this array => jquery.ui.slider options and methods
              'orientation' => 'vertical',
              'value'       => 88),
            'style="height:120px; float:left; margin:15px"') // <- html attributes ?>
    <?php ui_slider_create(
            'sliderId1',
            array(
              'orientation' => 'vertical',
              'value'       => 77),
            'style="height:120px; float:left; margin:15px"')?>
    <?php ui_slider_create(
            'sliderId2',
            array(
              'orientation' => 'vertical',
              'value'       => 55),
            'style="height:120px; float:left; margin:15px"')?>
    <?php ui_slider_create(
            'sliderId3',
            array(
              'orientation' => 'vertical',
              'value'       => 33),
            'style="height:120px; float:left; margin:15px"')?>
    <?php ui_slider_create(
            'sliderId4',
            array(
              'orientation' => 'vertical',
              'value'       => 40),
            'style="height:120px; float:left; margin:15px"')?>
    <?php ui_slider_create(
            'sliderId5',
            array(
              'orientation' => 'vertical',
              'range' => 'min',
              'value'       => 45),
            'style="height:120px; float:left; margin:15px"')?>
    <?php ui_slider_create(
            'sliderId6',
            array(
              'orientation' => 'vertical',
              'range' => 'max',
              'value'       => 70),
            'style="height:120px; float:left; margin:15px"')?>
  <?php echo ui_end_content_panel()?>

</div><!-- End demo -->
<div class="demo-description">
    <p>Combine horizontal and vertical sliders, each with their own options, to create the UI for a music player.</p>
</div><!-- End demo-description -->


<fieldset><legend>Example - Actions buttons for ui.slider</legend>
  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
             'btnDestroySlider'    => array('value' => 'Destroy Slider'),
             'btnDisableSlider'     => array('value' => 'Disable Slider'),
             'btnEnableSlider'      => array('value' => 'Enable Slider'),
             'btnSetValueSlider'       => array('value' => 'Set Slider1 value  = 50'),
             'btnSetValuesSlider' => array('value' => 'set Slider2[0] value = 15')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>
<?php
/*
 * Add jQuery support to the buttons above
 * **click event**
 */
echo add_jquery_support("#btnDestroySlider",  'click' , like_function(ui_slider_destroy('#slider1')));
echo add_jquery_support("#btnDisableSlider",   'click' , like_function(ui_slider_disable('#slider1')));
echo add_jquery_support("#btnEnableSlider",    'click' , like_function(ui_slider_enable('#slider1')));
echo add_jquery_support("#btnSetValueSlider",    'click' , like_function(ui_slider_value('#slider1', 50)));
echo add_jquery_support("#btnSetValuesSlider",    'click' , like_function(ui_slider_values('#slider2', 0, 15)));
?>
<br>
<?php
  echo link_to('jquery UI (slider) documentation', 'http://jqueryui.com/demos/slider')
?>