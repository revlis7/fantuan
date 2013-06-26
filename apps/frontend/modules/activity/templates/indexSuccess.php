<div class="container">
  <div class="row">
    <div class="span8">
      <p>参与团员：</p>
      <div class="members">
      <?php foreach($members as $member): ?>
        <div class="member">
          <p><strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong></p>
          <p>个人消费了：<?php echo sprintf('%.2f', $member->getActivityCost($activity) / 100); ?></p>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="span4">
      <div class="profile">
        <div>
          <p>活动名称： <strong><?php echo $activity; ?></strong></p>
          <p>共计消费： <strong><?php echo sprintf('%.2f', $activity->getCost() / 100); ?></strong></p>
        </div>
      </div>
    </div>
  </div>
</div>