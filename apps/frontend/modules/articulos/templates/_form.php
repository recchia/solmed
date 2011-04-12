<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('articulos/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('articulos/index') ?>">Listado de artículos</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Eliminar', 'articulos/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['categoria_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['categoria_id']->renderError() ?>
          <?php echo $form['categoria_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['marca_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['marca_id']->renderError() ?>
          <?php echo $form['marca_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_vencimiento']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_vencimiento']->renderError() ?>
          <?php echo $form['fecha_vencimiento'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
