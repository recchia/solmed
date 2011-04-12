<?php use_helper('ysJQueryRevolutions')?>
<?php use_helper('ysJQueryUICore')?>

LINK BUTTON:
<br>
<script type="text/javascript" language="javascript">
  function linkEnableAndDisableToggleFunction(){
    alert('Link button');
  }
</script>

<?php echo add_jquery_support('#lnkBtnId', 'click', 'linkEnableAndDisableToggleFunction')?>
<?php echo add_jquery_support('#btnId', 'click', like_function('alert("Ui button")'))?>

<?php echo ui_link_button(
           array(
             //'icon'  =>  'newwin',       //  ui-icon-<newwin>
             //'align' => 'right',         // (left| rigth)
             //'title' => 'My Title',
             //'noTitle' => true,          // (<false> | true)
             //'corner' => 'left',         // (<all> |left| rigth)
             //'state' => 'disabled',      // (<enable> | disabled)
             //'target' => '_blank',       // (<_self> | frame id | _blank, _top, _parent)
             //'priority' => 'secondary',  // (<primary> | secondary )
             //'show' => true,             // (<true> | false)
             //'url' => url_for('http://www.google.com'),
             'value' => 'Link button',
             'id' => 'lnkBtnId')); ?>

<br><br><br>


BUTTON:
<br>
<?php echo ui_button(
           array(
             //'title' => 'My Title',
             //'noTitle' => false,          // (<false> | true)
             //'corner' => 'left',         // (<all> |left| rigth)
             //'state' => 'disabled',      // (<enable> | disabled)
             //'priority' => 'secondary',  // (<primary> | secondary )
             //'show' => false,             // (<true> | false)
             'value' => 'Button',
             'id' => 'btnId')); ?>

<br><br>
Enable & Disable the buttons
<br>

<?php echo ui_link_button(array('value' => 'Enable Link button','id' => 'enableLnkBtnId')); ?>
<?php echo ui_link_button(array('value' => 'Disable Link button','id' => 'disablelnkBtnId')); ?>

<?php echo ui_link_button(array('value' => 'Enable button','id' => 'enableBtnId')); ?>
<?php echo ui_link_button(array('value' => 'Disable button','id' => 'disableBtnId')); ?>

<?php echo add_jquery_support('#enableLnkBtnId','click', like_function(ui_enable_button('#lnkBtnId', 'linkEnableAndDisableToggleFunction'))) ?>
<?php echo add_jquery_support('#disablelnkBtnId','click', like_function(ui_disable_link_button('#lnkBtnId'))) ?>

<?php echo add_jquery_support('#enableBtnId','click', like_function(ui_enable_button('#btnId'))) ?>
<?php echo add_jquery_support('#disableBtnId','click', like_function(ui_disable_button('#btnId'))) ?>



<br><br>
BUTTON PANE
<br>
<?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                 'value' => 'Hello',
                 'icon' => 'newwin'),
              'idBtn2' => array(
                 'value' => 'World',
                 'icon' => 'newwin')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'multiple',
             array(
              'idBtn3' => array(
                'title' => 'B',
                'value' => '<b>B</b>'),
              'idBtn4' => array(
                'title' => 'I',
                'value' => '<i>I</i>'),
              'idBtn5' => array(
                'title' => 'U',
                'value' => '<u>U</u>')))?>
  <?php echo ui_button_pane_end() ?>
