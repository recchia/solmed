<h1>Inventario</h1>

<table style="width: 80%">
  <thead>
    <tr>
      <th>Artículo</th>
      <th>Cantidad</th>
      <th>Fecha de Vencimiento</th>
      <th>Unidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($inventarios as $inventario): ?>
    <tr>
      <td><?php echo $inventario->getArticulo() ?></td>
      <td><?php echo $inventario->getCantidad() ?></td>
      <td><?php echo date('d-m-Y', strtotime($inventario->getFechaVencimiento())) ?></td>
      <td><?php echo $inventario->getDepartamento() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>