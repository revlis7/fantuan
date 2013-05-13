<h1>form</h1>
<form action="<?php echo url_for('register/index') ?>" method="post">
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Register" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>