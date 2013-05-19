<div class="container">
  <form action="<?php echo url_for('register/index') ?>" method="post" class="form-signin">
    <h1>Register</h1>
    <?php echo $form['email']->render(array('placeholder' => 'Email address', 'class' => 'input-block-level')); ?>
    <?php echo $form['email']->renderError(); ?>
    <?php echo $form['name']->render(array('placeholder' => 'Your nickname', 'class' => 'input-block-level')); ?>
    <?php echo $form['name']->renderError(); ?>
    <?php echo $form['password']->render(array('placeholder' => 'Password', 'class' => 'input-block-level')); ?>
    <?php echo $form['password']->renderError(); ?>
    <?php echo $form['password_confirm']->render(array('placeholder' => 'Password confirm', 'class' => 'input-block-level')); ?>
    <?php echo $form['password_confirm']->renderError(); ?>
    <?php echo $form->renderHiddenFields(); ?>
    <?php echo $form->renderGlobalErrors(); ?>
    <button type="submit" class="btn btn-large btn-primary">Register</button>
  </form>
</div>