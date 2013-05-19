<?php if ($login): ?>
<div class="nav-collapse collapse">
  <ul class="nav pull-right">
    <li><a href="javascript:void(0);">Hi, <?php echo $name; ?></a></li>
    <li><a href="<?php echo url_for('@logout'); ?>">Logout</a></li>
  </ul>
</div>
<?php endif; ?>