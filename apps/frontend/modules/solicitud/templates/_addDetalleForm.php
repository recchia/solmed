<tr id="detalle_<?php echo $num ?>">
    <td>
        <table>
            <tr>
              <td><?php echo $field->renderLabel('Artículo '.$num) ?></td>
              <td>
                 <?php echo $field['articulo_id']->renderError() ?>
                 <?php echo $field['articulo_id'] ?>
              </td>
              <?php echo $field['id'] ?>
              <?php if ($sf_request->isXmlHttpRequest()): ?>
              <td>
                  <a href="#" onclick="delDetalle(<?php echo $num ?>);return false;"><?php echo image_tag('cross.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
              </td>
              <?php endif; ?>
            </tr>
            <tr>
                <td><?php echo $field['cantidad']->renderLabel() ?></td>
                <td>
                    <?php echo $field['cantidad']->renderError() ?>
                    <?php echo $field['cantidad'] ?>
                </td>
            </tr>
        </table>
    </td>
</tr>

