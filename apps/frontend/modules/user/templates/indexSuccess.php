<div class="container">
  <div class="row">
    <div class="span4">
      <div class="profile">
        <div>
          <img src="http://www.gravatar.com/avatar/8090d881e6e9ed8b0add27f5432573fc" width="80" height="80" />
          <b><?php echo $user->getName(); ?></b>
        </div>
      </div>
    </div>
    <div class="span8">BBB</div>
  </div>
</div>
<p>Name: <strong><?php echo $user->getName(); ?></strong></p>
<p>Balance: <strong><?php echo sprintf('%.2f', $user->getBalance() / 100); ?></strong></p>
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
<li>
  <?php echo $activity->getCreatedAt(); ?> 
  <strong><a href="<?php echo url_for('@activity?name='.$activity); ?>"><?php echo $activity; ?></a></strong> - 
  <?php echo sprintf('%.2f', $activity->getMemberCost($user) / 100); ?> 
  (Total: <?php echo sprintf('%.2f', $activity->getCost() / 100); ?>)
</li>
<?php endforeach; ?>
</ul>