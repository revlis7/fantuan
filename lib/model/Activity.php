<?php

class Activity extends BaseActivity
{
  public function __toString()
  {
    return $this->getName();
  }

  public function getMembers()
  {
    $criteria = new Criteria();
    $criteria->addJoin(ActivityUserPeer::USER_ID, UserPeer::ID);
    $criteria->add(ActivityUserPeer::ACTIVITY_ID, $this->getId());

    return UserPeer::doSelect($criteria);
  }

  public function getCost()
  {
    $criteria = new Criteria();
    $criteria->add(ActivityUserPeer::ACTIVITY_ID, $this->getId());

    $rows = ActivityUserPeer::doSelect($criteria);

    $cost = 0;
    foreach ($rows as $row) {
      $cost += $row->getCost();
    }
    return $cost;
  }
}
