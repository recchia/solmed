<?php use_helper('ysJQueryRevolutions')  //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUIDialog')     //  ysJQueryUIDialog Helper ?>

<?php echo ui_link_button(array('id' => 'btnDialogListener','value' => 'Listener'))?>

<br><br>
<?php ui_dialog_init('dialogId' , array(
        'listener' => array(
          'selector' => '#btnDialogListener',
          'oneEvent' => 'click'),
        'title' => 'Lorem ipsum',
        'modal' => true,
        'buttons' => array('Close' => like_function(ui_dialog_close('this'))),
        'beforeclose' => like_function("alert('Before Close Dialog');")),
        'style="display:none"')?>

      <p align="justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum
      </p>

<?php ui_dialog_end() ?>

<div align="justify" id="anotherDialog" style="display:none">
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
</div>


<fieldset><legend>Actions buttons for ui.dialog</legend>
  <?php echo ui_button_pane_init(
           $type = 'single',
           array(
            'btnDestroyDialog'   => array('value' => 'Destroy Dialog'),
            'btnBuildDialog'   => array('value' => 'Build Dialog'),
            'btnDisableDialog'   => array('value' => 'Disable Dialog'),
            'btnEnableDialog'   => array('value' => 'Enable Dialog'),
            'btnCloseDialog'   => array('value' => 'Close Dialog'),
            'btnOpenDialog'   => array('value' => 'Open Dialog'),
            'btnMoveToTopDialog'   => array('value' => 'Move to top Dialog'),
            'btnIsOpenDialog' => array('value' => 'Is open')))?>
  <?php echo ui_button_pane_end() ?>

</fieldset>

<?php
  /*
   * Add jQuery support to the buttons above
   * **click event**
   */
  echo add_jquery_support("#btnDestroyDialog",'click',like_function(ui_dialog_destroy('#anotherDialog')));

  echo add_jquery_support(
        "#btnBuildDialog",
        'click',
        like_function(
          ui_dialog_build(
            '#anotherDialog', array('title' => 'What is Lorem ipsum?'))));

  echo add_jquery_support("#btnDisableDialog",'click',like_function(ui_dialog_disable('#anotherDialog')));
  echo add_jquery_support("#btnEnableDialog",'click',like_function(ui_dialog_enable('#anotherDialog')));
  echo add_jquery_support("#btnCloseDialog",'click',like_function(ui_dialog_close('#anotherDialog')));
  echo add_jquery_support("#btnOpenDialog",'click',like_function(ui_dialog_open('#anotherDialog')));
  echo add_jquery_support("#btnMoveToTopDialog",'click',like_function(ui_dialog_move_to_top('#anotherDialog')));
  echo add_jquery_support("#btnIsOpenDialog",'click',like_function('isOpenDialog()'));
?>
<script type="text/javascript" language="javascript">
  function isOpenDialog(){
    var isOpen = <?php echo ui_dialog_is_open('#anotherDialog')?> ;
    if(isOpen){
      alert('is open = true');
    }else{
      alert('is open = false');
    }
  }
</script>
