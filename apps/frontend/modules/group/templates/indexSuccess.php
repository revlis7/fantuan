<p>Group: <strong><?php echo $group; ?></strong></p>
<p>Captain: <strong><?php echo $captain; ?></strong></p>
<p>Members: </p>
<ul>
<?php foreach ($members as $member): ?>
  <li><strong><?php echo $member; ?></strong></li>
<?php endforeach; ?>
</ul>