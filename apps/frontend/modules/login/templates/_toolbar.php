<?php if ($login): ?>
Hi, <?php echo $name; ?> <a href="<?php echo url_for('@logout'); ?>">Logout</a>
<?php endif; ?>