<h1>Detalle de la Solicitud</h1>
<form id="inventario" name="inventario" method="post" action="<?php echo url_for('solicitud/CargarInventario')?>">
<table>
    <tbody>
        <tr>
            <td>Número de Solicitud:</td>
            <td><?php echo $solicitud->getId();?></td>
        </tr>
        <tr>
            <td>Fecha de Solicitud:</td>
            <td><?php echo date("d-m-Y h:i:s a", strtotime($solicitud->getCreatedAt()));?></td>
        </tr>
        <tr>
            <th colspan="2">Medicamentos:</th>
        </tr>
        <?php for ($i = 1; $i <= $cantidad; $i++):?>
        <tr>
            <td><?php echo $form[$i]['medicamento']->renderLabel() ?></td>
            <td><?php echo $form[$i]['medicamento'] ?><?php echo $form[$i]['articulo_id'] ?></td>
        </tr>
        <tr>
            <td><?php echo $form[$i]['cantidad']->renderLabel() ?></td>
            <td><?php echo $form[$i]['cantidad'] ?></td>
        </tr>
        <tr>
            <td><?php echo $form[$i]['fecha_vencimiento']->renderLabel() ?></td>
            <td><?php echo $form[$i]['fecha_vencimiento'] ?><?php echo $form[$i]['departamento_id'] ?></td>
        </tr>
        <?php endfor;?>
        <?php echo $form->renderHiddenFields(false) ?>
    </tbody>
</table>
    <input type="submit" name="submit" value="Recibir" />
</form>