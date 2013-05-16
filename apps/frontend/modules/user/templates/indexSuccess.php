<p>Name: <strong><?php echo $user->getName(); ?></strong></p>
<p>Balance: <strong><?php echo $user->getBalance(); ?></strong></p>
<p>Joined Teams: </p>
<ul>
<?php foreach ($charged_teams as $charged_team): ?>
  <li><strong><a href="<?php echo url_for('@team?name='.$charged_team); ?>"><?php echo $charged_team; ?></a></strong> - in charge</li>
<?php endforeach; ?>
<?php foreach ($joined_teams as $joined_team): ?>
  <?php if ($joined_team->getCaptain() != $user->getId()): ?>
  <li><strong><a href="<?php echo url_for('@team?name='.$joined_team); ?>"><?php echo $joined_team; ?></a></strong></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
<p>Activities: </p>
<ul>
<?php foreach($activities as $activity): ?>
<li><?php echo $activity->getCreatedAt(); ?> <strong><a href="<?php echo url_for('@activity?name='.$activity); ?>"><?php echo $activity; ?></a></strong> - <?php echo $activity->getCost(); ?></li>
<?php endforeach; ?>
</ul>
<a href="<?php echo url_for('@logout'); ?>">Logout</a>