<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="ui-widget">
      <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
        <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
        <?php echo $sf_user->getFlash('notice') ?></p>
      </div>
  </div>
<?php endif; ?>

<h1>Solicitudes</h1>
<?php $_estatus = array(0 => 'No', 1 => 'Si') ?>
<table style="width: 80%">
  <thead>
    <tr>
      <th>Nro.</th>
      <th></th>
      <th></th>
      <th>Fecha Solicitud</th>
      <th>Departamento</th>
      <th>Fecha Actualización</th>
      <th>Aprobada</th>
      <th>Pre Despachada</th>
      <th>Despachada</th>
      <th>Recibida</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($solicituds as $solicitud): ?>
    <tr>
      <td><?php echo $solicitud->getId() ?></td>
      <td><a href="<?php echo url_for('solicitud/imprimir?id='.$solicitud->getId()) ?>" target="_blank"><?php echo image_tag('printer.png', array('border' => 0, 'Alt' => 'Imprimir Solicitud', 'title' => 'Imprimir Solicitud')) ?></a></td>
      <?php if($solicitud->getAprobada() == 0):?>
      <td><a href="<?php echo url_for('solicitud/edit?id='.$solicitud->getId()) ?>"><?php echo image_tag('note_edit.png', array('border' => 0, 'Alt' => 'Editar Solicitud', 'title' => 'Editar Solicitud')) ?></a></td>
      <?php else:?>
      <td><a href="javascript:alert('Las Solicitudes Aprobadas no se pueden Editar');"><?php echo image_tag('note_edit.png', array('border' => 0, 'Alt' => 'Editar Solicitud', 'title' => 'Editar Solicitud')) ?></a></td>
      <?php endif;?>
      <td><?php echo $solicitud->getCreatedAt() ?></td>
      <td><?php echo $solicitud->getDepartamento() ?></td>
      <td><?php echo $solicitud->getUpdatedAt() ?></td>
      <td><?php echo $_estatus[$solicitud->getAprobada()] ?></td>
      <td><?php echo $_estatus[$solicitud->getPredespachada()] ?></td>
      <td><?php echo $_estatus[$solicitud->getDespachada()] ?></td>
      <td><?php echo $_estatus[$solicitud->getRecibida()] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<a href="<?php echo url_for('solicitud/new') ?>" id="boton_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plus"></span>Nueva Solicitud</a>