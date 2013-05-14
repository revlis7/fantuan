<h1>main</h1>
<p>Name: <strong><?php echo $name; ?></strong></p>
<p>Balance: <strong><?php echo $balance; ?></strong></p>
<p>Charged Groups: </p>
<ul>
<?php foreach($charged_groups as $charged_group): ?>
<li><strong><?php echo $charged_group; ?></strong></li>
<?php endforeach; ?>
</ul>
<p>Joined Groups: </p>
<ul>
<?php foreach($joined_groups as $joined_group): ?>
<li><strong><?php echo $joined_group; ?></strong></li>
<?php endforeach; ?>
</ul>

<a href="<?php echo url_for('logout/index') ?>">logout</a>