<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUIProgressbar')  //  ysJQueryUIProgressbar Helper ?>
<?php use_helper('ysUtil') ?>
<?php echo ui_link_button(array('id' => 'btnBarListener','value' => 'Listener'))?>

<div class="demo">
  <br>
  progressbar: <h1><span id="lblValue">80%</span></h1>
  <?php ui_progressbar_create(
             'progressbar' ,
             array(
               'listener' => array(
                 'selector' => '#btnBarListener',
                 'oneEvent' => 'click',
                 'before' => like_function(ui_progressbar_animate('#progressbar' , 20))),
                'value' => 80,
                'change' =>    like_function("alert('Change Succesful')")),
             'style="height:5px;width:50%"') ?>
           
  <?php echo ui_progressbar_init_animation_now('#progressbar2' , 500) ?>

  progressbar2: <h1>25%</h1>
  <?php ui_progressbar_create('progressbar2' , array('value' => 30 )) ?>
</div><!-- End demo -->



<div class="demo-description">
<p>Default progress bar.</p>
</div><!-- End demo-description -->
<fieldset><legend>Actions buttons for ui.dialog</legend>
  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
            'btnDestroyProgressbar'  => array('value' => 'Destroy Progressbar'),
            'btnDisableProgressbar'  => array('value' => 'Disable Progressbar'),
            'btnEnableProgressbar'   => array('value' => 'Enable Progressbar'),
            'btnSetValueProgressbar' => array('value' => 'Set Random value'),
            'btnGetValueProgressbar' => array('value' => 'Get value'),
            'btnAnimateProgressbar'  => array('value' => 'Init Animation Progressbar 2')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>

<?php
  /*
   * Add jQuery support to the buttons above
   * **click event**
   */
  echo add_jquery_support("#btnDestroyProgressbar",'click',like_function(ui_progressbar_destroy('#progressbar')));
  echo add_jquery_support("#btnDisableProgressbar",'click',like_function(ui_progressbar_disable('#progressbar')));
  echo add_jquery_support("#btnEnableProgressbar",'click',like_function(ui_progressbar_enable('#progressbar')));
  echo add_jquery_support("#btnSetValueProgressbar",'click',like_function('changeValue()'));
  echo add_jquery_support("#btnGetValueProgressbar",'click',like_function('getValue()'));
  echo add_jquery_support("#btnAnimateProgressbar",'click',like_function(ui_progressbar_animate('#progressbar2', 5)));
?>

<script type="text/javascript" language="javascript">
  function changeValue(){
    value = Math.ceil(Math.random() * 99);
    <?php echo ui_progressbar_set_value('#progressbar', 'value') ?>
    <?php echo jquery_support('#lblValue', 'html',"value + '%'") ?>
  }

  function getValue(){
    value = <?php echo ui_progressbar_get_option('#progressbar', 'value') ?>
    alert('The value: ' + value);
  }
</script>

  <br>
  <?php
    echo link_to('jquery UI (progressbar) documentation', 'http://jqueryui.com/demos/progressbar')
  ?>

