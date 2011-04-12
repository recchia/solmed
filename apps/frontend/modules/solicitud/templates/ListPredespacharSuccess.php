<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="ui-widget">
      <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
        <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
        <?php echo $sf_user->getFlash('notice') ?></p>
      </div>
  </div>
<?php endif; ?>

<h1>Solicitudes Sin Despachar</h1>
<?php $_estatus = array(0 => 'No', 1 => 'Si') ?>
<table style="background-color: white; width: 80%;">
  <thead>
    <tr>
      <th>Nro.</th>
      <th>Fecha Solicitud</th>
      <th>Departamento</th>
      <th>Fecha Actualización</th>
      <th>Despachar</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($solicituds as $solicitud): ?>
    <tr>
      <td><?php echo $solicitud->getId() ?></td>
      <td><?php echo $solicitud->getCreatedAt() ?></td>
      <td><?php echo $solicitud->getDepartamento() ?></td>
      <td><?php echo $solicitud->getUpdatedAt() ?></td>
      <td><a href="<?php echo url_for('solicitud/despachar?id='.$solicitud->getId()) ?>">Despachar solicitud</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>