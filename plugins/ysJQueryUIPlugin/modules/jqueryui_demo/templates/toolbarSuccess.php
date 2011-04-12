<?php use_helper('ysJQueryRevolutions')?>
<?php use_helper('ysJQueryUICore')?>

<?php echo ui_toolbar_init() ?>
  <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                 'icon' => 'newwin'),
              'idBtn2' => array(
                 'icon' => 'newwin')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                'value' => 'Codigo',
                'noTitle' => true,
                'state' => 'disabled'),
              'idBtn2' => array(
                'title' => 'My Title',
                'value' => 'Dividir'),
              'idBtn3' => array(
                'value' => 'Diseño',
                'priority' => 'secondary')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'multiple',
             array(
              'idBtn1' => array(
                'title' => 'B',
                'value' => '<b>B</b>'),
              'idBtn2' => array(
                'title' => 'I',
                'value' => '<i>I</i>'),
              'idBtn3' => array(
                'title' => 'U',
                'value' => '<u>U</u>')))?>
  <?php echo ui_button_pane_end() ?>
<?php echo ui_toolbar_end() ?>


<?php echo ui_toolbar_init() ?>
    <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                 'title' => 'Open',
                 'state' => 'disabled',
                 'icon' => 'folder-open'),
              'idBtn2' => array(
                 'title' => 'Save',
                 'priority' => 'secondary',
                 'icon' => 'disk'),
              'idBtn3' => array(
                 'title' => 'Delete',
                 'icon' => 'trash')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'none',
             array(
              'testBtnId' => array(
                 'value' => 'Print',
                 'icon' => 'print')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'none',
             array(
              'idBtn1' => array(
                 'value' => 'Mail',
                 'icon' => 'mail-closed')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                'value' => 'Edit',
                'noTitle' => true,
                'state' => 'disabled'),
              'idBtn2' => array(
                'title' => 'My Title',
                'value' => 'View'),
              'idBtn3' => array(
                'value' => 'Priority',
                'priority' => 'secondary')))?>
  <?php echo ui_button_pane_end() ?>
<?php echo ui_toolbar_end() ?>

<br><br>

<?php echo ui_toolbar_init(true) // see the boolean argument ?>
    <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                 'title' => 'Open',
                 'icon' => 'folder-open'),
              'idBtn2' => array(
                 'title' => 'Save',
                 'icon' => 'disk'),
              'idBtn3' => array(
                 'title' => 'Delete',
                 'icon' => 'trash')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'none',
             array(
              'idBtn1' => array(
                 'value' => 'Print',
                 'icon' => 'print'),
              'idBtn2' => array(
                 'value' => 'Mail',
                 'icon' => 'mail-closed')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                'value' => 'Edit',
                'noTitle' => true,
                'state' => 'disabled'),
              'idBtn2' => array(
                'title' => 'My Title',
                'value' => 'View'),
              'idBtn3' => array(
                'value' => 'Priority',
                'priority' => 'secondary')))?>
  <?php echo ui_button_pane_end() ?>
<?php echo ui_toolbar_end() ?>

<br><br><br>&nbsp;

<?php echo ui_toolbar_init(true, 'style="float:right"') // see the style?>
    <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                 'title' => 'Open',
                 'icon' => 'folder-open'),
              'idBtn2' => array(
                 'title' => 'Save',
                 'icon' => 'disk'),
              'idBtn3' => array(
                 'title' => 'Delete',
                 'icon' => 'trash')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'any',
             array(
              'idBtn1' => array(
                 'value' => 'Print',
                 'icon' => 'print'),
              'idBtn2' => array(
                 'value' => 'Mail',
                 'icon' => 'mail-closed')))?>
  <?php echo ui_button_pane_end() ?>
  <?php echo ui_button_pane_init(
             $type = 'single',
             array(
              'idBtn1' => array(
                'value' => 'Edit',
                'noTitle' => true,
                'state' => 'disabled'),
              'idBtn2' => array(
                'title' => 'My Title',
                'value' => 'View'),
              'idBtn3' => array(
                'value' => 'Priority',
                'priority' => 'secondary')))?>
  <?php echo ui_button_pane_end() ?>
<?php echo ui_toolbar_end() ?>

<br><br><br>&nbsp;