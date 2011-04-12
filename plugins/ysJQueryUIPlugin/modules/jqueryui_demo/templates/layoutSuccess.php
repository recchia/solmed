<?php use_helper('ysJQueryRevolutions'); ?>
<?php use_helper('ysJQueryUILayout'); ?>

<?php ui_layout_configure_to('layoutVarName2','.bodyTest') ?>
<?php ui_layout_configure_to('layoutVarName3','.bodyTest2') ?>

<div class="bodyTest" style="height:100%">
    <div class="ui-layout-center" style="width:100%">
         <div class="bodyTest2" style="height:100%">
            <div class="ui-layout-center" style="width:100%">
              Nested(Inner) Center
            </div>
            <div class="ui-layout-west" style="width:100%">
              Nested(Inner) West
            </div>
        </div>
    </div>
    <div class="ui-layout-south" style="width:100%">
      Nested(Outer) South
    </div>
    <div class="ui-layout-north" style="width:100%">
      Nested(Outer) North
    </div>
    <div class="ui-layout-west" style="width:100%">
      Nested(Outer) West
    </div>
</div>



