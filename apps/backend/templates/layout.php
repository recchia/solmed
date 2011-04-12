<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="nav">
	<ul id="navlist">
	    <li><a href="<?php echo sfProjectConfiguration::getActive()->generateFrontendUrl('homepage') ?>">Página de Inicio</a></li>
            <li><a href="<?php echo url_for('@sf_guard_user') ?>">Usuarios</a></li>
	    <li><a href="<?php echo url_for('@sf_guard_group') ?>">Grupos</a></li>
	    <li><a href="<?php echo url_for('@sf_guard_permission') ?>">Permisos</a></li>
            <li><a href="<?php echo url_for('departamento') ?>">Departamento</a></li>
	</ul>
	</div>
	<div id="cuerpo">
		<?php echo $sf_content ?>
	</div>
	<div id="pie">
	Todos los derechos reservados. &copy; 2010 CENAMEC
	</div>
	</div>
  </body>
</html>
