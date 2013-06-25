<div class="container">
  <div class="row">
    <div class="span8">
      <p>成员列表：</p>
      <div class="members">
        <div class="member">
          <p><strong><a href="<?php echo url_for('@user?name='.UserPeer::retrieveByPK($team->getCaptain())); ?>"><?php echo UserPeer::retrieveByPK($team->getCaptain()); ?></a></strong> - 团长</p>
        </div>
        <?php foreach($members as $member): ?>
          <?php if ($member->getId() != $team->getCaptain()): ?>
        <div class="member">
          <p><strong><a href="<?php echo url_for('@user?name='.$member); ?>"><?php echo $member; ?></a></strong></p>
        </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="span4">
      <div class="profile">
        <div>
          <p>饭团名称： <strong><?php echo $team; ?></strong></p>
          <p>团费剩余： <strong><?php echo sprintf('%.2f', $fund / 100); ?></strong></p>
        </div>
      </div>
    </div>
  </div>
</div>