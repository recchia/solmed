<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUIAccordion')  //  ysJQueryUIAccordion Helper ?>
<?php ui_add_effects_support('bounce')   //  support for bounce effect  ?>
<?php echo ui_link_button(array('id' => 'btnAccordionListener','value' => 'Listener'))?>

<br><br>
<?php ui_accordion_init(
        'accordionId',
        array(
          'listener' => array(
            'selector' => '#btnAccordionListener',
            'event' => 'click',
            'after' =>  like_function(jquery_execute_effect('#accordionId','show'))),
          'event'      => 'click',
          'fillSpace'  => false,
          //'change'     => like_function("alert('See the documentation on: http://jqueryui.com/demos/accordion')", 'a, ui'),
          'animated'   => 'bounceslide',
          'active'     => '#section2',
          'icons'      => array(
            'header' => 'ui-icon-plus' ,
            'headerSelected' => 'ui-icon-minus'),
          'alwaysOpen' => false,
          'autoHeight' => false,
          //'clearStyle' => true,
          'navigation' => false),
      'style="display:none"') ?>

    <?php ui_accordion_init_section('Lorem ipsum', 'id="section1"') ?>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum
      </p>
    <?php ui_accordion_end_section() ?>
    <?php ui_accordion_init_section('What is Lorem ipsum?', 'id="section2"') ?>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book. It has survived not
        only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged.
        It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with
        desktop publishing software like Aldus PageMaker including versions
        of Lorem Ipsum.
      </p>
    <?php ui_accordion_end_section() ?>
<?php ui_accordion_end() ?>


<fieldset>
<legend> Example: Actions buttons for ui.accordions </legend>
     <?php echo ui_button_pane_init(
               $type = 'single',
               array(
                'btnDestroyAccordion'   => array('value' => 'Destroy Accordion'),
                'btnBuildAccordion'     => array('value' => 'Build Accordion'),
                'btnDisableAccordion'   => array('value' => 'Disable Accordion'),
                'btnEnableAccordion'    => array('value' => 'Enable Accordion'),
                'btnActivateAccordion'  => array('value' => 'Activate Section[0]'),
                'btnGetAccordionOption' => array('value' => 'Get option'),
                'btnSetAccordionOption' => array('value' => 'Set option')))?>
    <?php echo ui_button_pane_end() ?>
</fieldset>

<?php
/*
 * Add jQuery support to the buttons above
 * **click event**
 */
echo add_jquery_support("#btnDestroyAccordion",'click',like_function(ui_accordion_destroy('#accordionId')));

echo add_jquery_support(
      "#btnBuildAccordion",
      'click',
      like_function(
        ui_accordion_build(
          '#accordionId', array(
          'event'      => 'mouseover'))));

echo add_jquery_support("#btnDisableAccordion",'click',like_function(ui_accordion_disable('#accordionId')));
echo add_jquery_support("#btnEnableAccordion",'click',like_function(ui_accordion_enable('#accordionId')));
echo add_jquery_support("#btnActivateAccordion",'click',like_function(ui_accordion_activate('#accordionId', 0)));
echo add_jquery_support("#btnGetAccordionOption",'click',like_function("getAccordionOption()"));
echo add_jquery_support("#btnSetAccordionOption",'click',like_function("setAccordionOption()"));
?>
<script type="text/javascript" language="javascript">
  function getAccordionOption(){
    option = <?php echo ui_accordion_get_option('#accordionId', 'event') ?>
    alert('The accordion event is ' +  option);
  }
  function setAccordionOption(){
    <?php echo ui_accordion_set_options('#accordionId',array('collapsible' => true)); ?>
    alert('Now sections can be closed');
  }
</script>
<br>
<?php
  echo link_to('jquery UI (accordion) documentation', 'http://jqueryui.com/demos/accordion')
?>