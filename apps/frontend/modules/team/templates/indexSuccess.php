<p>Team: <strong><?php echo $team; ?></strong></p>
<p>Fund: <strong><?php echo $fund; ?></strong></p>
<p>Members: </p>
<ul>
  <li><strong><a href="<?php echo url_for('@user?name='.$captain); ?>"><?php echo $captain; ?></a></strong> - captain</li>
<?php foreach ($members as $member): ?>
  <?php if ($member != $captain): ?>
  <li><strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>