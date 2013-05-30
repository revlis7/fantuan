<p>Activity Name: <strong><?php echo $activity; ?></strong></p>
<p>Total Cost: <strong><?php echo sprintf('%.2f', $activity->getCost() / 100); ?></strong></p>
<p>Members: </p>
<ul>
<?php foreach($members as $member): ?>
<li>
  <strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong> - 
  <?php echo sprintf('%.2f', $member->getActivityCost($activity) / 100); ?>
</li>
<?php endforeach; ?>
</ul>