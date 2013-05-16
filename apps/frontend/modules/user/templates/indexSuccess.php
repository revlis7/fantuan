<h1>main</h1>
<p>Name: <strong><?php echo $user->getName(); ?></strong></p>
<p>Balance: <strong><?php echo $user->getBalance(); ?></strong></p>
<p>Charged Groups: </p>
<ul>
<?php foreach($charged_groups as $charged_group): ?>
<li><strong><a href="<?php echo url_for('@group?name='.$charged_group); ?>"><?php echo $charged_group; ?></a></strong></li>
<?php endforeach; ?>
</ul>
<p>Joined Groups: </p>
<ul>
<?php foreach($joined_groups as $joined_group): ?>
<li><strong><a href="<?php echo url_for('@group?name='.$joined_group); ?>"><?php echo $joined_group; ?></a></strong></li>
<?php endforeach; ?>
</ul>
<p>Activities: </p>
<ul>
<?php foreach($activities as $activity): ?>
<li><?php echo $activity->getCreatedAt(); ?> <strong><a href="<?php echo url_for('@activity?desc='.$activity); ?>"><?php echo $activity; ?></a></strong> - <?php echo $activity->getCost(); ?></li>
<?php endforeach; ?>
</ul>
<a href="<?php echo url_for('@logout'); ?>">Logout</a>