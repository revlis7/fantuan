<div class="container">
<form action="<?php echo url_for('login/index') ?>" method="post" class="form-signin">
  <h1>Login</h1>
  <?php echo $form['email']->render(array('placeholder' => 'Email address', 'class' => 'input-block-level')); ?>
  <?php echo $form['email']->renderError(); ?>
  <?php echo $form['password']->render(array('placeholder' => 'Password', 'class' => 'input-block-level')); ?>
  <?php echo $form['password']->renderError(); ?>
  <?php echo $form->renderHiddenFields(); ?>
  <?php echo $form->renderGlobalErrors(); ?>
  <button type="submit" class="btn btn-large btn-primary">Sign in</button>
</form>
</div>