<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="ui-widget">
      <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
        <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
        <?php echo $sf_user->getFlash('notice') ?></p>
      </div>
  </div>
<?php endif; ?>
<h1>Editar Categoria</h1>

<?php include_partial('form', array('form' => $form)) ?>
