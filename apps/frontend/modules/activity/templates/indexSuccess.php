<p>Activity Name: <strong><?php echo $activity; ?></strong></p>
<p>Total Cost: <strong><?php echo $activity->getCost(); ?></strong></p>
<p>Members: </p>
<ul>
<?php foreach($members as $member): ?>
<li><strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong> - <?php echo $member->getActivityCost($activity); ?></li>
<?php endforeach; ?>
</ul>