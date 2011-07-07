<h1>Artículos</h1>

<table style="width: 80%">
    <caption><?php echo $resultados ?> Art&iacute;culos en <?php echo $paginas ?> p&aacute;gina(s)</caption>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Presentaci&oacute;n</th>
      <th>Categoria</th>
      <th>Fecha de Creación</th>
      <th>Fecha de Actualización</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articulos as $articulo): ?>
    <tr>
      <td><?php echo $articulo->getId() ?></td>
      <td><a href="<?php echo url_for('articulos/edit?id='.$articulo->getId()) ?>"><?php echo $articulo->getDescripcion() ?></a></td>
      <td><?php echo $articulo->getMarca() ?></td>
      <td><?php echo $articulo->getCategoria() ?></td>
      <td><?php echo $articulo->getCreatedAt() ?></td>
      <td><?php echo $articulo->getUpdatedAt() ?></td>
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
<a href="<?php echo url_for('articulos/new') ?>" id="boton_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plus"></span>Nuevo Artículo</a>
