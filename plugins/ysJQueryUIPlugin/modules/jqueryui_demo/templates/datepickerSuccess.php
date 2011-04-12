<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUIDatepicker')  //  ysJQueryUIDatepicker Helper ?>
<?php ui_change_i18n('jquery-ui-i18n.js') // all i18n languages ?>

<?php echo ui_link_button(array('id' => 'btnDatepickerListener','value' => 'Listener'))?>

<style type="text/css">
	.ui-datepicker { z-index: 10000; }
</style>


<p>
  Default in-line:
  <?php ui_datepicker_create(
        'listenerDatepicker',
        array(
        'listener' => array(
          'selector' => '#btnDatepickerListener',
          'event' => 'click',
          'after' => like_function(ui_datepicker_regional('#listenerDatepicker','uk')))))?>
</p>

<div id="datepickerDiv"></div>


<fieldset>
<legend> Example: Actions buttons for ui.datepicker </legend>
       <?php echo ui_button_pane_init(
                  $type = 'single',
                  array(
                    'btnDestroyDatepicker'    => array('value' => 'Destroy'),
                    'btnBuildDatepicker'      => array('value' => 'Build'),
                    'btnDisableDatepicker'    => array('value' => 'Disable'),
                    'btnEnableDatepicker'     => array('value' => 'Enable'),
                    'btnGetDatepickerOption'  => array('value' => 'Get option'),
                    'btnSetDatepickerOption'  => array('value' => 'Set option'),
                    'btnIsDisabledDatepicker' => array('value' => 'Is disabled'),
                    'btnHideDatepicker'       => array('value' => 'Hide'),
                    'btnShowDatepicker'       => array('value' => 'Show'),
                    'btnGetDatepickerDate'    => array('value' => 'Get Date'),
                    'btnSetDatepickerDate'    => array('value' => 'Set Date'),
                    'btnDialogDatepicker'     => array('value' => 'Dialog'),
                    'btnl18nDatepicker'       => array('value' => 'Localizaction[es]')))?>
    <?php echo ui_button_pane_end() ?>
</fieldset>

<?php
/*
 * Add jQuery support to the buttons above
 * **click event**
 */
echo add_jquery_support("#btnDestroyDatepicker",'click',like_function(ui_datepicker_destroy('#listenerDatepicker')));
echo add_jquery_support("#btnBuildDatepicker",'click',like_function(ui_datepicker_build('#datepickerDiv')));
echo add_jquery_support("#btnDisableDatepicker",'click',like_function(ui_datepicker_disable('#listenerDatepicker')));
echo add_jquery_support("#btnEnableDatepicker",'click',like_function(ui_datepicker_enable('#listenerDatepicker')));
echo add_jquery_support("#btnSetDatepickerOption",'click',like_function("setDatepickerOption()"));
echo add_jquery_support("#btnGetDatepickerOption",'click',like_function("getDatepickerOption()"));
echo add_jquery_support("#btnIsDisabledDatepicker",'click',like_function("isDisabled()"));
echo add_jquery_support("#btnHideDatepicker",'click',like_function(ui_datepicker_hide('#listenerDatepicker')));
echo add_jquery_support("#btnShowDatepicker",'click',like_function(ui_datepicker_show('#listenerDatepicker')));
echo add_jquery_support("#btnGetDatepickerDate",'click',like_function('getDate()'));
echo add_jquery_support("#btnSetDatepickerDate",'click',like_function('setDate()'));
echo add_jquery_support("#btnDialogDatepicker",'click',like_function(ui_datepicker_dialog('#listenerDatepicker','dateText', null ,array(),array(600,1))));
echo add_jquery_support("#btnl18nDatepicker",'click',like_function(ui_datepicker_regional('#listenerDatepicker','es')));
?>

<script type="text/javascript" language="javascript">
  function getDatepickerOption(){
    option = <?php echo ui_datepicker_get_option('#listenerDatepicker', 'dateFormat') ?>
    alert('The datepicker dateFormat is: ' +  option);
  }
  function setDatepickerOption(){
    <?php echo ui_datepicker_set_options(
                '#listenerDatepicker',
                array(
                'showButtonPanel' => true,
                'dateFormat' => 'DD/MM/yy')); ?>
    alert('Now the datepicker show the Button Panel');
  }
  function isDisabled(){
    disabled = <?php echo ui_datepicker_is_disabled('#listenerDatepicker') ?>
    alert('The datepicker disabled is : ' +  disabled);
  }

  function setDate(){
    date = <?php echo ui_datepicker_set_date('#listenerDatepicker', '+1m +7d') ?>
    alert('Now the date is today + 1 month + 7 days ("+1m +7d")');
  }
  function getDate(){
    date = <?php echo ui_datepicker_get_date('#listenerDatepicker') ?>
    alert('The date is : ' +  date);
  }
</script>
<br>
<?php
  echo link_to('jquery UI (datepicker) documentation', 'http://jqueryui.com/demos/datepicker')
?>




<br><br><br><br><br><br><br><br>





<h3>Others Examples</h3>
<div class="demo">
<p>
  Default:
  <?php ui_datepicker_create('defaultDatepicker', array('i18n' => 'ca'))?>
</p>
<p>
  Default in-line:
  <?php ui_datepicker_create(
          'inLineDatepicker',
          array(
            'inLine' => true,
            'showMonthAfterYear' => false,
            'i18n' => 'fr')) ?>
</p>
<p>
  Date with button:
  <?php ui_datepicker_create(
          'datepicker',
          array(
            'showOn'     => 'button',
            'buttonText' => 'Date')) ?>
</p>

<p>
  Date with image:
  <?php ui_datepicker_create(
          'datepicker2',
          array(
            'showOn'     => 'button',
            'buttonImage'     => 'http://www.jqueryui.com/demos/datepicker/images/calendar.gif',
            'buttonImageOnly' => true)) ?>
</p>

<p>
  with alternate field:
  <?php ui_datepicker_create(
          'datepicker3',
          array(
            'altField'     => '#alternate',
            'altFormat'    => 'DD, d MM, yy')) ?>

  <input type="text" id="alternate" size="30"/>
</p>


<p>
  with date format:
  <?php ui_datepicker_create(
          'datepicker4',
          array(
            'dateFormat'   => 'yy/mm/dd',
            'appendText'   => '(yyyy-mm-dd)',
            'constrainInput' => true)) ?>
</p>

<p>
  Change month and year:
  <?php ui_datepicker_create(
          'datepicker5',
          array(
            'changeMonth'   => true,
            'changeYear'   => true,
            'yearRange' => '2000:2020')) ?>
</p>

<p>
   with button panel:
  <?php ui_datepicker_create(
          'datepicker6',
          array(
            'showButtonPanel' => true,
            'closeText'   => 'Close',
            'currentText'   => 'Here is Today')) ?>
</p>

<p>
   with default date (today + 1 month and 7 days):
  <?php ui_datepicker_create(
          'datepicker7',
          array(
            'defaultDate' => '+1m +7d')) ?>
</p>

<p>
   now the first day is 'Mo'
  <?php ui_datepicker_create(
          'datepicker8',
          array(
            'firstDay' => 1)) ?>
  This attribute is one of the regionalisation attributes.
</p>


<p>
   that crazy!!! now the days in RTL (right to left)
  <?php ui_datepicker_create(
          'datepicker9',
          array(
            'isRTL' => true)) ?>
</p>

<p>
   now with maxDate and minDate (+/- one week)
  <?php ui_datepicker_create(
          'datepicker10',
          array(
            'maxDate' =>  '+1w',
            'minDate' => '-1w')) ?>
</p>

<p>
   see this 6 months!! display Month after Year and the current month at 4th Position.
  <?php ui_datepicker_create(
          'datepicker11',
          array(
            'numberOfMonths' => array(2,3),
            'showCurrentAtPos' => 4,
            'showMonthAfterYear' => true)) ?>
</p>


<p>
   with animation ... see jQuery UI effects or ysJQueryEffectsHelper
  <?php ui_datepicker_create(
          'datepicker12',
          array(
            'showAnim' => 'shake')) ?>
</p>


<p>
   here show Other Months
  <?php ui_datepicker_create(
          'datepicker13',
          array(
            'showOtherMonths' => true)) ?>
</p>


<p>
   step by step (3 Months)
  <?php ui_datepicker_create(
          'datepicker14',
          array(
            'stepMonths' => 3)) ?>
</p>

</div><!-- End demo -->
<div class="demo-description">
<p>The datepicker is tied to a standard form input field.  Focus on the input (click, or use the tab key) to open an interactive calendar in a small overlay.  Choose a date, click elsewhere on the page (blur the input), or hit the Esc key to close. If a date is chosen, feedback is shown as the input's value.</p>
</div><!-- End demo-description -->

<?php
  echo link_to('jquery UI (datepicker) documentation', 'http://jqueryui.com/demos/datepicker')
?>