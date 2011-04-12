<?php use_helper('ysJQueryRevolutions') //  ysJQueryRevolutions Helper ?>
<?php use_helper('ysJQueryUISortable')  //  ysJQueryUISortable Helper  ?>

<style type="text/css">
#sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0; zoom: 1; }
#sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 3px; width: 90%; }
</style>

<?php echo ui_link_button(array('id' => 'btnSortableListener','value' => 'Listener')) ?>

<div class="demo">
  <h3 class="docs">Specify which items are sortable:</h3>
  <ul id="sortable1">
    <li class="ui-state-default">Item 1</li>
    <li class="ui-state-default ui-state-disabled">(I'm not sortable or a drop target)</li>
    <li class="ui-state-default ui-state-disabled">(I'm not sortable or a drop target)</li>
    <li class="ui-state-default">Item 4</li>
  </ul>
  <?php  ui_sortable_support_to(
         '#sortable1, #sortable2',
         array(
           'listener' => array(
             'selector' => '#btnSortableListener',
             'event' => 'click'),
           'items' => 'li:not(.ui-state-disabled)'))?>

  <h3 class="docs">Cancel sorting (but keep as drop targets):</h3>
  <ul id="sortable2">
    <li class="ui-state-default" id="foo_1">Item 1 </li>
    <li class="ui-state-default ui-state-disabled" id="foo_2">(I'm not sortable)</li>
    <li class="ui-state-default ui-state-disabled" id="foo_3">(I'm not sortable)</li>
    <li class="ui-state-default" id="foo_4">Item 4</li>
  </ul>
  
  </div><!-- End demo -->

  <?php echo ui_disable_selection('#sortable1 li, #sortable2 li') ?>

<fieldset><legend>Actions buttons for ui.sortable</legend>
    <?php echo ui_button_pane_init(
           $type = 'single',
           array(
             'btnDetroySortable'    => array('value' => 'Destroy sortable'),
             'btnBuildSortable'     => array('value' => 'Build sortable'),
             'btnDisableSortable'      => array('value' => 'Disable'),
             'btnEnableSortable'       => array('value' => 'Enable'),
             'btnSerializeSortable' => array('value' => 'Serialize'),
             'btnToArraySortable' => array('value' => 'To Array'),
             'btnCancelSortable' => array('value' => 'Cancel'),
             'btnGetSortableOption' => array('value' => 'Get option'),
             'btnSetSortableOption' => array('value' => 'Set option')))?>
  <?php echo ui_button_pane_end() ?>
</fieldset>
<?php
/*
* Add jQuery support to the buttons above
* **click event**
*/
echo add_jquery_support("#btnDetroySortable", 'click' , like_function(ui_sortable_destroy('#sortable2')));
echo add_jquery_support("#btnBuildSortable", 'click' , like_function(ui_sortable_build('#sortable2')));
echo add_jquery_support("#btnDisableSortable", 'click' , like_function(ui_sortable_disable('#sortable2')));
echo add_jquery_support("#btnEnableSortable", 'click' , like_function(ui_sortable_enable('#sortable2')));
echo add_jquery_support("#btnSerializeSortable",'click',like_function("serializeList()"));
echo add_jquery_support("#btnToArraySortable",'click',like_function("toArray()"));
echo add_jquery_support("#btnCancelSortable",'click',like_function(ui_sortable_cancel('#sortable2')));
echo add_jquery_support("#btnGetSortableOption",'click',like_function("getOption()"));
echo add_jquery_support("#btnSetSortableOption",'click',like_function("setOption()"));

?>
<script type="text/javascript" language="javascript">
  function getOption(){
    option = <?php echo ui_sortable_get_option('#sortable2', 'axis') ?>
    alert('The sortable axis is ' +  option);
  }
  function setOption(){
    <?php echo ui_sortable_set_options('#sortable2',array('axis' => 'x')); ?>
    alert('Now the sortable axis is only horizontal (x).');
  }
  function serializeList(){
    serialized = <?php echo ui_sortable_serialize('#sortable2') ?>
    // Or try this
    //serialized = <?php //echo ui_sortable_serialize('#sortable2',array('key' => 'item[]')) ?>

    alert('The result: ' +  serialized);
  }
  function toArray(){
    arrayVar = <?php echo ui_sortable_to_array('#sortable2') ?>
    alert('The array: ' +  arrayVar);
  }
</script>
<div class="demo-description">
  <p>
    Specify which items are eligible to sort by passing a jQuery selector into
    the <code>items</code> option. Items excluded from this option are not
    sortable, nor are they valid targets for sortable items.
  </p>
  <p>
    To only prevent sorting on certain items, pass a jQuery selector into the
    <code>cancel</code> option. Cancelled items remain valid sort targets for
    others.
  </p>
</div><!-- End demo-description -->
<br>
<?php
  echo link_to('jquery UI (sortable) documentation', 'http://jqueryui.com/demos/sortable')
?>