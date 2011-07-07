<h1>Presentación</h1>

<table style="width: 80%">
  <caption><?php echo $resultados ?> Presentaciones en <?php echo $paginas ?> p&aacute;gina(s)</caption>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Activo</th>
      <th>Fecha de Creación</th>
      <th>Fecha de Actualización</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($marcas as $marca): ?>
    <tr>
      <td><?php echo $marca->getId() ?></td>
      <td><a href="<?php echo url_for('marcas/edit?id='.$marca->getId()) ?>"><?php echo $marca->getDescripcion() ?></a></td>
      <td><?php echo $marca->getActivo() ?></td>
      <td><?php echo $marca->getCreatedAt() ?></td>
      <td><?php echo $marca->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<?php if($haveToPaginate): ?>
<div class="onlycssmenu-paging clearfix">
    <?php echo html_entity_decode($menu) ?>
</div>
<?php endif;?>
<br><br>
<a href="<?php echo url_for('marcas/new') ?>" id="boton_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plus"></span>Crear Presentación</a>
