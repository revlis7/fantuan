<p>Team: <strong><?php echo $team; ?></strong></p>
<p>Fund: <strong><?php echo $fund; ?></strong></p>
<p>Members: </p>
<ul>
  <li><strong><a href="<?php echo url_for('@user?name='.UserPeer::retrieveByPK($team->getCaptain())); ?>"><?php echo UserPeer::retrieveByPK($team->getCaptain()); ?></a></strong> - captain</li>
<?php foreach ($members as $member): ?>
  <?php if ($member->getId() != $team->getCaptain()): ?>
  <li><strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>