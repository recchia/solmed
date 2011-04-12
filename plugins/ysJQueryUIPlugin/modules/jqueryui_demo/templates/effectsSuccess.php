<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysJQueryUIEffects'); ?>

<?php echo ui_theme_switcher_tool() ?>

<script type="text/javascript" language="javascript">

  $(document).ready(function(){
    $('#btnHideEffect').click(function(){
      alert('Inside code javascript ');
      <?php echo ui_effects_hide(
            '#testEffect',
            array(
              'effect' => 'clip',
              'speed' =>  'slow',
              'callback' => like_function("alert('Hide effect successful')"))); ?>
    });
  });

</script>


<?php echo ui_effects_add_class(
            '#testClass',
            array(
              'listener' => array(
                'selector' => '#btnAddClass',
                'event'=> 'click'),
              'class' => 'ui-widget-content',
              'duration' => 'slow' ,
              'callback' => like_function("alert('Class added')"))) ?>

<?php echo ui_effects_remove_class(
            '#testClass',
            array(
              'listener' => array(
                'selector' => '#btnRemoveClass',
                'event'=> 'click'),
              'class' => 'ui-widget-content',
              'duration' => 'slow' ,
              'callback' => like_function("alert('Class Removed')"))) ?>
<br><br>
Class Manipulation
<br><br>
<div id="testClass" class="ui-corner-all" style="width:250px">
    <br>
    <p>Etiam libero neque, luctus a, eleifend nec, semper at, lorem. Sed pede. Nulla lorem metus, adipiscing ut, luctus sed, hendrerit vitae, mi.
    </p>
    <br>
</div>

  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
            'btnAddClass'    => array('value' => 'Add Class'),
            'btnRemoveClass' => array('value' => 'Remove Class')))?>
  <?php echo ui_button_pane_end() ?>

<br><br>
Effect Examples
<br><br>

<div id="testEffect" class="ui-widget-content" style="width:250px">
    <br>
    <p>Etiam libero neque, luctus a, eleifend nec, semper at, lorem. Sed pede. Nulla lorem metus, adipiscing ut, luctus sed, hendrerit vitae, mi.
    </p>
    <br>
</div>
<br>

  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
            'btnExecuteEffect' => array('value' => 'Execute highlight Effect'),
            'btnHideEffect'    => array('value' => 'Hide with clip Effect'),
            'btnShowEffect'    => array('value' => 'Show with blin Effect')))?>
  <?php echo ui_button_pane_end() ?>


<?php echo ui_effects(
            '#testEffect',
            array(
            'listener' => array(
              'selector' => '#btnExecuteEffect',
              'event'=> 'click'
              ),
            'effect' => 'highlight',
            'speed' => 500,
            'callback' => like_function("alert('Effect successful')")));
?>

<?php echo ui_effects_show(
            '#testEffect',
            array(
              'listener' => array(
                'selector' => '#btnShowEffect',
                'event'=> 'click'
                ),
              'effect' => 'blind',
              'speed' => 'slow',
              'callback' => like_function("alert('Show effect successful')")));
?>


<br><br>
Toggle Effect Examples
<br><br>

<div id="testToggleEffect" class="ui-widget-content" style="width:250px">
    <br>
    <p>Etiam libero neque, luctus a, eleifend nec, semper at, lorem. Sed pede. Nulla lorem metus, adipiscing ut, luctus sed, hendrerit vitae, mi.
    </p>
    <br>
</div>

<?php echo ui_button_pane_init(
         $type = 'single',
         array(
          'btnExecuteToggleEffect' => array('value' => 'Execute Toggle (explode) Effect')))?>
<?php echo ui_button_pane_end() ?>

<?php echo ui_effects_toggle(
            '#testToggleEffect',
            array(
            'listener' => array(
              'selector' => '#btnExecuteToggleEffect',
              'event'=> 'click'
              ),
            'effect' => 'explode',
            'speed' => 'slow',
            'callback' => like_function("alert('Toggle effect successful')")));
?>

<br><br>
Toggle Class Examples
<br><br>

<div id="testToggleClass" class="ui-widget-content" style="width:250px">
    <br>
    <p>Etiam libero neque, luctus a, eleifend nec, semper at, lorem. Sed pede. Nulla lorem metus, adipiscing ut, luctus sed, hendrerit vitae, mi.
    </p>
    <br>
</div>

<?php echo ui_button_pane_init(
         $type = 'single',
         array(
          'btnExecuteToggleClass' => array('value' => 'Execute Toggle Class Effect')))?>
<?php echo ui_button_pane_end() ?>

<?php echo ui_effects_toggle_class(
            '#testToggleClass',
            array(
            'listener' => array(
              'selector' => '#btnExecuteToggleClass',
              'event'=> 'click'
              ),
            'class' => 'ui-widget-header',
            'duration' => 'slow'));
?>


<br><br>
Switch Class Examples
<br><br>

<div id="testSwitchClass" style="width:250px">
    <br>
    <p>Etiam libero neque, luctus a, eleifend nec, semper at, lorem. Sed pede. Nulla lorem metus, adipiscing ut, luctus sed, hendrerit vitae, mi.
    </p>
    <br>
</div>

<?php echo ui_button_pane_init(
         $type = 'single',
         array(
          'btnExecuteSwitchClass' => array('value' => 'Execute Switch Class Effect')))?>
<?php echo ui_button_pane_end() ?>

<?php echo ui_effects_switch_class(
            '#testSwitchClass',
            array(
            'listener' => array(
              'selector' => '#btnExecuteSwitchClass',
              'event'=> 'click'
              ),
            'remove' => 'ui-widget-content',
            'add' => 'ui-widget-header',
            'duration' => 'slow'));
?>

<br><br><br>


<?php echo add_jquery_support(
          'document',
          'ready' ,
          like_function(
            jquery_toggle_event(
              '#btnAnimate',
              array(
                like_function(jquery_execute_effect(
                              '.divToAnimate',
                              'animate',
                              array(
                                'options' => array(
                                  'backgroundColor' => '#aa0000',
                                  'color' => '#fff',
                                  'width' => 500),
                                'speed' => 1000))),
                like_function(jquery_execute_effect(
                              '.divToAnimate',
                              'animate',
                              array(
                                'options' => array(
                                  'backgroundColor' => '#fff',
                                  'color' => '#000',
                                  'width' => 240),
                                'speed' => 1000))))))); ?>

<div class="divToAnimate" style="width:250px">
    <br>
    <p>Etiam libero neque, luctus a, eleifend nec, semper at, lorem. Sed pede. Nulla lorem metus, adipiscing ut, luctus sed, hendrerit vitae, mi.
    </p>
    <br>
</div>
  
<br>

<?php echo ui_button_pane_init(
         $type = 'single',
         array(
          'btnAnimate' => array('value' => 'Animate')))?>
<?php echo ui_button_pane_end() ?>

<br><br>
<?php
  echo link_to('jquery UI (effects) documentation', 'http://jqueryui.com/docs/Effects/Methods')
?>
