<div class="container">
  <div class="row">
    <div class="span8">
      <p>活动列表：</p>
      <div class="activities">
      <?php foreach($activities as $activity): ?>
        <div class="news">
          <p><strong><a href="<?php echo url_for('@activity?name='.$activity); ?>"><?php echo $activity; ?></a></strong><time datetime="<?php echo $activity->getCreatedAt(); ?>"><?php echo $activity->getCreatedAt(); ?></time></p>
          <p>共计支出：<?php echo sprintf('%.2f', $activity->getCost() / 100); ?></p>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="span4">
      <div class="profile">
        <div>
          <!-- <img src="http://www.gravatar.com/avatar/8090d881e6e9ed8b0add27f5432573fc" width="80" height="80" /> -->
          <p><b><?php echo $user->getName(); ?></b></p>
          <p><?php echo sprintf('%.2f', $user->getBalance() / 100); ?></p>
          <p>加入的饭团： </p>
          <div>
          <?php foreach ($charged_teams as $charged_team): ?>
            <p><strong><a href="<?php echo url_for('@team?name='.$charged_team); ?>"><?php echo $charged_team; ?></a></strong> - 团长 <?php echo sprintf('%.2f', $charged_team->getFund() / 100); ?></p>
          <?php endforeach; ?>
          <?php foreach ($joined_teams as $joined_team): ?>
            <?php if ($joined_team->getCaptain() != $user->getId()): ?>
            <p><strong><a href="<?php echo url_for('@team?name='.$joined_team); ?>"><?php echo $joined_team; ?></a></strong></p>
            <?php endif; ?>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>