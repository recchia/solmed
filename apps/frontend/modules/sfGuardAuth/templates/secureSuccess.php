<?php use_helper('I18N') ?>
<?php use_stylesheet('lock.css')?>
<?php echo __("<div class=\"sfTMessageContainer sfTLock\">\n".image_tag("lock48.png","width=\"48\" height=\"48\" alt=\"Permiso Denegado\"")."\n<div class=\"sfTMessageWrap\">\n<h2>Permiso Denegado</h2>\n<h5>No tiene privilegios para acceder a este recurso. <a href=\"javascript:history.back()\">regresar</a></h5>\n</div>\n</div>") ?>