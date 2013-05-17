<div class="container">
<h1>login</h1>
<form action="<?php echo url_for('login/index') ?>" method="post">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <button type="submit" class="btn btn-large btn-primary">Sign in</button>
      </td>
    </tr>
  </table>
</form>
</div>