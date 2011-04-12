<?php $_activo = array('No','Si') ?>
<h1>Categorias</h1>

<table style="width: 80%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripción</th>
      <th>Activo</th>
      <th>Creado</th>
      <th>Actualizado</th>
      <th>Eliminado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
      <td><?php echo $categoria->getId() ?></td>
      <td><a href="<?php echo url_for('categorias/edit?id='.$categoria->getId()) ?>"><?php echo $categoria->getDescripcion() ?></a></td>
      <td><?php echo $_activo[$categoria->getActivo()] ?></td>
      <td><?php echo $categoria->getCreatedAt() ?></td>
      <td><?php echo $categoria->getUpdatedAt() ?></td>
      <td><?php echo $categoria->getDeletedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<a href="<?php echo url_for('categorias/new') ?>" id="boton_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plus"></span>Crear Categoria</a>
