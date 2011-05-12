<h1>Detalles de la Solicitud</h1>
<table>
    <thead>
        <tr>
            <th>Numero de Solicitud:</th>
            <th><?php echo $solicitud->getId() ?></th>
            <th>Fecha de Solicitud:</th>
            <th><?php echo $solicitud->getCreatedAt(); ?></th>
        </tr>
        <tr>
            <th>Unidad Solicitante:</th>
            <th><?php echo $solicitud->getDepartamento() ?></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr><th>Medicamento</th><th>Cantidad</th></tr>
        <?php foreach ($solicitud->getDetalleSolicitud() as $detalle): ?>
        <tr><td><?php echo $detalle->getArticulo() ?></td><td><?php echo $detalle->getCantidad() ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo url_for('solicitud/index') ?>">Ver Listado de Solicitudes</a>