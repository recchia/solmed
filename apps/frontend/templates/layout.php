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
        <div id="wrapper">
            <div id="header">
                <?php echo image_tag('logo_inass_gimp.png') ?>
                <p style="display: inline; color: #FFFFFF; font-size: 10pt; font-family: verdana; float: right; margin: 2px 40px 1px 1px;">Bienvenido(a) <b><?php echo $sf_user->getGuardUser()->getusername(); ?></b></p>
            </div>
            <div id="menu_nav">
                <?php $path = sfConfig::get('sf_app_dir').'/config/menu.yml' ?>
                <?php echo ui_menu_init(
                'principal',
                'Menu Principal',
                array(
                'yml' => $path,
                'ymlKey' => 'principal'
                ))  ?>
                <?php echo ui_menu_init(
                'solicitud',
                'Medicamentos',
                array(
                'yml' => $path,
                'ymlKey' => 'solicitudes'
                ))  ?>
                <?php echo ui_menu_init(
                'materiales',
                'Administración de Medicamentos',
                array(
                'yml' => $path,
                'ymlKey' => 'materiales'
                ))  ?>
                <?php echo ui_menu_init(
                'herramientas',
                'Herramientas',
                array(
                'yml' => $path,
                'ymlKey' => 'herramientas'
                ))  ?>
            </div>
            <div id="lateral">
                <?php if($sf_user->getGuardUser()->getProfile()->getCedula() != 0):?>
                <span class="info">
                    <h2>Datos del Usuario</h2>
                    <hr></hr>
                    <b>Cédula:</b> <?php echo number_format($sf_user->getGuardUser()->getProfile()->getCedula(),0,',','.') ?><br></br>
                    <b>Nombres:</b> <?php echo $sf_user->getGuardUser()->getProfile()->getNombres() ?><br></br>
                    <b>Apellidos:</b> <?php echo $sf_user->getGuardUser()->getProfile()->getApellidos() ?><br></br>
                    <b>Departamento:</b> <?php echo $sf_user->getGuardUser()->getProfile()->getDepartamento() ?><br></br>
                    <b>Último Ingreso:</b> <?php echo $sf_user->getGuardUser()->getLastLogin() ?>
                </span>
                <?php endif;?>
                <h3>Solicitud de Material</h3>
                <table>
                    <tr><td>
                            <ul>
                                <li><a href="<?php echo url_for('solicitud/new') ?>">Nueva Solicitud</a></li>
                                <li><a href="<?php echo url_for('solicitud/index') ?>">Ver Solicitudes</a></li>
                            </ul>
                        </td></tr>
                </table>
            </div>
            <div id="content">
                <?php echo $sf_content ?>
            </div>
            <div id="dialog-form" title="Cambiar Contraseña">
                <p class="validateTips">Todos los campos son obligatorios.</p>
                <form id="change-password" method="post" action="<?php echo url_for('main/CambiarPasssword')?>">
                <fieldset>
                        <label for="current_pass">Contraseña Anterior</label>
                        <input type="password" name="current_pass" id="current_pass" class="text ui-widget-content ui-corner-all" />
                        <label for="new_pass">Nueva Contraseña</label>
                        <input type="password" name="new_pass" id="new_pass" class="text ui-widget-content ui-corner-all" />
                        <label for="confirm">Confirmar Contraseña</label>
                        <input type="password" name="confirm" id="confirm" class="text ui-widget-content ui-corner-all" />
                </fieldset>
                </form>
            </div>
            <div id="dialog-confirm" title="Salir del Sistema">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>¿Desea salir del Sistema?</p>
            </div>
            <div id="push"></div>
        </div>
        <div id="footer">Todos los derechos reservados. &copy; 2011 INASS</div>
    </body>
</html>
