<h1>Inventario</h1>

<table style="width: 80%">
  <thead>
    <tr>
      <th>Artículo</th>
      <th>Cantidad</th>
      <th>Fecha de Vencimiento</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($inventarios as $inventario): ?>
    <tr>
      <td><a href="<?php echo url_for('inventario/edit?id='.$inventario->getId()) ?>"><?php echo $inventario->getArticulo() ?></a></td>
      <td><?php echo $inventario->getCantidad() ?></td>
      <td><?php echo $inventario->getFechaVencimiento() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<a href="<?php echo url_for('inventario/new') ?>" id="boton_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plus"></span>Cargar Nuevo Inventario</a>
