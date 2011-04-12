<?php use_helper('ysJQueryRevolutions')?>
<?php use_helper('ysJQueryUICore')?>

<div align="center">
  <?php ui_grid_init('jQuery UI Grid Header') ?>
    <?php	  ui_grid_head_init() ?>
      <?php     ui_grid_th('<a>First</a>', 'colspan="2"') ?>
      <?php     ui_grid_th('<a>Second</a>') ?>
      <?php     ui_grid_th('<a>Third</a>') ?>
    <?php	  ui_grid_head_end() ?>

    <?php   ui_grid_body_init() ?>
      <?php	  for($i=0;$i<=10;$i++): ?>
        <?php     ui_grid_tr_init() ?>
          <?php	  for($j=0;$j<=3;$j++): ?>
          <?php     ui_grid_td_init('style="text-align:right"') ?>
            <?php echo sprintf('Value %s-%s',$i,$j) ?>
          <?php     ui_grid_td_end() ?>
          <?php	  endfor; ?>
        <?php     ui_grid_tr_end() ?>
      <?php	  endfor; ?>
    <?php   ui_grid_body_end() ?>

    <?php   ui_grid_foot_init() ?>
      <div class="ui-grid-paging ui-helper-clearfix">
        <a href="#" class="ui-grid-paging-prev ui-state-default ui-corner-left"><span class="ui-icon ui-icon-triangle-1-w" title="previous set of results"></span></a>
        <a href="#" class="ui-grid-paging-next ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-e" title="next set of results"></span></a>
      </div>
      <div class="ui-grid-results">Showing results ???</div>
    <?php   ui_grid_foot_end() ?>

  <?php ui_grid_end() ?>
</div>

