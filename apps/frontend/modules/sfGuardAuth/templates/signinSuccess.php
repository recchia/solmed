<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php if ($form['username']->hasError() || $form['password']->hasError()): ?>
    <p>El Usuario y/ó la Contraseña son Inválidos</p>
    <?php endif; ?>
    <label for="username">Usuario</label>
    <?php echo $form['username']->render() ?>
    <label for="password">Contraseña</label>
    <?php echo $form['password']->render() ?>
    <label for="_csrf_token">Recordarme</label>
    <?php echo $form['remember']->render() ?>
    <?php echo $form['_csrf_token']->render() ?><br>
  <input type="submit" value="<?php echo __('Login') ?>" class="boton" />
  <a href="<?php echo url_for('@sf_guard_password') ?>"><?php echo __('¿Olvido su contraseña?') ?></a>
</form>