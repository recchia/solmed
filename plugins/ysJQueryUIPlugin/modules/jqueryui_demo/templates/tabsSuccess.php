<?php use_helper('ysJQueryDollarRevolutions') //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUITabs')      //  ysJQueryUITab Helper ?>
<?php use_helper('ysJQueryUIAccordion')      //  ysJQueryUITab Helper ?>
<?php use_helper('ysJQueryUIProgressbar')      //  ysJQueryUITab Helper ?>
<?php ui_add_effects_support('bounce')  //  support for bounce effect ?>
<?php use_helper('ysUtil') ?>
<style type="text/css">
  #tabs { margin-top: 1em; }
  #tabs li .ui-icon-close { float: left; margin: 0.4em 0.2em 0 0; cursor: pointer; }
</style>


<?php echo ui_link_button(array('id' => 'btnTabsListener','value' => 'Listener')) ?>
<br><br>
<div class="demo">
<?php ui_tabs_init_panel(
        'tabPanelId',
        array(
          'listener' => array(
            'selector' => '#btnTabsListener',
            'event' => 'click',
            'after' => like_function(jquery_execute_effect('#tabPanelId','show'))
            ),
          'selected' =>  2,
          'disabled' =>  array(2),
          'sortable' => true,
          'fx'       => array('opacity' => 'toggle',
          'duration' => 'slow'),
          'unselect' => true,
          //'spinner'  => 'Cool Ajax...',
          //'cache'    => true,
          //'select'   => like_function("alert('onSelect event')"),
          //'load'     => like_function("alert('onLoad event')"),
          //'show'     => like_function("alert('onShow event')"),
          //'add'      => like_function("alert('onAdd event')"),
          //'remove'   => like_function("alert('onRemove event')"),
          //'enable'   => like_function("alert('onEnable event')"),
          //'disable'  => like_function("alert('onDisable event')"),
          'collapsible' => false),
        'style="display:none"')?>

        <?php ui_tabs_init()?>
          <?php ui_tab('myTab1', 'Lorem ipsum')?>
          <?php ui_tab('myTab2', 'What is Lorem ipsum?')?>
          <?php ui_tab(url_for('jqueryui_demo/accordion'), 'Remote' , true)?>
        <?php ui_tabs_end()?>

        <?php ui_tabs_init_content_for('myTab1')?>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
        <?php ui_tabs_end_content()?>

        <?php ui_tabs_init_content_for('myTab2')?>
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
        <?php ui_tabs_end_content()?>
<?php  ui_tabs_end_panel() ?>

</div>
<div class="demo-description">
  <p>Click tabs to swap between content that is broken into logical sections.</p>
</div><!-- End demo-description -->
<fieldset><legend>Actions buttons for ui.tabs</legend>
  <?php echo ui_button_pane_init(
       $type = 'single',
       array(
         'btnDestroyTabs'  => array('value' => 'Destroy Tab Panel'),
         'btnBuildTabs'    => array('value' => 'Build Tab Panel'),
         'btnSortableTabs' => array('value' => 'Sortable support'),
         'btnCountTabs'    => array('value' => 'Count Tabs'),
         'btnDisableTab'   => array('value' => 'Disable Tab'),
         'btnEnableTab'    => array('value' => 'Enable Tab'),
         'btnRemoveTab'    => array('value' => 'Remove Tab'),
         'btnAddTab'       => array('value' => 'Add Tab'),
         'btnSelectTab'    => array('value' => 'Select Tab 2'),
         'btnSetOption'    => array('value' => 'Get Option'),
         'btnGetOption'    => array('value' => 'Set option'),
         'btnInitRotate'   => array('value' => 'Init Rotate'),
         'btnEndRotate'    => array('value' => 'End Rotate')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>

<?php
/*
 * Add jQuery support to the buttons above
 * **click event**
 */
  echo add_jquery_support("#btnDestroyTabs",  'click', like_function(ui_tabs_destroy_panel('#tabPanelId')));
  echo add_jquery_support("#btnBuildTabs",    'click', like_function(ui_tabs_build_panel('#tabPanelId')));
  echo add_jquery_support("#btnSortableTabs", 'click', like_function(ui_tabs_sortable('#tabPanelId')));
  echo add_jquery_support("#btnCountTabs",    'click', like_function('getTabsCount()'));
  echo add_jquery_support("#btnDisableTab",   'click', like_function(ui_tabs_disable('#tabPanelId', 1)));
  echo add_jquery_support("#btnEnableTab",    'click', like_function(ui_tabs_enable('#tabPanelId', 1)));
  echo add_jquery_support("#btnRemoveTab",    'click', like_function(ui_tabs_remove('#tabPanelId', 0)));
  echo add_jquery_support("#btnAddTab",       'click', like_function(ui_tabs_add('#tabPanelId', url_for('jqueryui_demo/progressbar') , 'Another tab', 3)));
  echo add_jquery_support("#btnSelectTab",    'click', like_function(ui_tabs_select('#tabPanelId', 1)));
  echo add_jquery_support("#btnSetOption",    'click', like_function('setTabOption()'));
  echo add_jquery_support("#btnGetOption",    'click', like_function('getTabOption()'));
  echo add_jquery_support("#btnInitRotate",   'click', like_function(ui_tabs_rotate('#tabPanelId', 3)));
  echo add_jquery_support("#btnEndRotate",    'click', like_function(ui_tabs_rotate('#tabPanelId', 0)));
?>

<script type="text/javascript" language="javascript">
      function getTabsCount(){
        tabsCountVal = <?php echo ui_tabs_length('#tabPanelId'); ?>
        alert('Number of tabs ' + tabsCountVal);
      }

      function getTabOption(){
        option = <?php echo ui_tabs_get_option('#tabPanelId', 'event') ?>
        alert('The accordion event is ' +  option);
      }
      function setTabOption(){
        <?php echo ui_tabs_set_options('#tabPanelId' , array ('spinner' => 'Cool Ajax...', 'cache' => true)) ?>
        alert('Now the cache is enable and the spinner tabs is "Cool Ajax..."');
      }
</script>

<br>
<?php
  echo link_to('jquery UI (tabs) documentation', 'http://jqueryui.com/demos/tabs')
?>