<p>Name: <strong><?php echo $user->getName(); ?></strong></p>
<p>Balance: <strong><?php echo $user->getBalance(); ?></strong></p>
<p>Charged Teams: </p>
<ul>
<?php foreach($charged_teams as $charged_team): ?>
<li><strong><a href="<?php echo url_for('@team?name='.$charged_team); ?>"><?php echo $charged_team; ?></a></strong></li>
<?php endforeach; ?>
</ul>
<p>Joined Teams: </p>
<ul>
<?php foreach($joined_teams as $joined_team): ?>
<li><strong><a href="<?php echo url_for('@team?name='.$joined_team); ?>"><?php echo $joined_team; ?></a></strong></li>
<?php endforeach; ?>
</ul>
<p>Activities: </p>
<ul>
<?php foreach($activities as $activity): ?>
<li><?php echo $activity->getCreatedAt(); ?> <strong><a href="<?php echo url_for('@activity?name='.$activity); ?>"><?php echo $activity; ?></a></strong> - <?php echo $activity->getCost(); ?></li>
<?php endforeach; ?>
</ul>
<a href="<?php echo url_for('@logout'); ?>">Logout</a>