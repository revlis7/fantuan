<p>Group: <strong><?php echo $group; ?></strong></p>
<p>Captain: <strong><a href="<?php echo url_for('@user?name='.$captain); ?>"><?php echo $captain; ?></a></strong></p>
<p>Members: </p>
<ul>
<?php foreach ($members as $member): ?>
  <li><strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong></li>
<?php endforeach; ?>
</ul>