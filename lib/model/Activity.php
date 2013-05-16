<?php

class Activity extends BaseActivity
{
  public function __toString()
  {
    return $this->getDesc();
  }

  public function getMembers()
  {
    $criteria = new Criteria();
    $criteria->addJoin(ActivityUserPeer::USER_ID, UserPeer::ID);
    $criteria->add(ActivityUserPeer::ACTIVITY_ID, $this->getId());

    return UserPeer::doSelect($criteria);
  }
}
