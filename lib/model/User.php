<?php

class User extends BaseUser
{
  public function __toString()
  {
    return $this->getName();
  }

  public function setPassword($password)
  {
    return parent::setPassword(md5($password));
  }

  public function getChargedTeams()
  {
    $criteria = new Criteria();
    $criteria->addJoin(UserPeer::ID, TeamPeer::CAPTAIN);
    $criteria->add(UserPeer::ID, $this->getId());
    $criteria->addAscendingOrderByColumn(TeamPeer::NAME);

    return TeamPeer::doSelect($criteria);
  }

  public function getJoinedTeams()
  {
    $criteria = new Criteria();
    $criteria->addJoin(TeamUserPeer::TEAM_ID, TeamPeer::ID);
    $criteria->add(TeamUserPeer::USER_ID, $this->getId());
    $criteria->addAscendingOrderByColumn(TeamPeer::NAME);

    return TeamPeer::doSelect($criteria);
  }

  public function getActivities()
  {
    $criteria = new Criteria();
    $criteria->addJoin(ActivityUserPeer::ACTIVITY_ID, ActivityPeer::ID);
    $criteria->add(ActivityUserPeer::USER_ID, $this->getId());
    $criteria->addDescendingOrderByColumn(ActivityPeer::CREATED_AT);

    return ActivityPeer::doSelect($criteria);
  }

  public function getActivityCost($activity)
  {
    $criteria = new Criteria();
    $criteria->add(ActivityUserPeer::USER_ID, $this->getId());
    $criteria->add(ActivityUserPeer::ACTIVITY_ID, $activity->getId());

    $row = ActivityUserPeer::doSelectOne($criteria);
    return $row->getCost();
  }

  public function save(PropelPDO $con = null)
  {
    if ($this->isNew()) {
      $this->setStatus(UserPeer::NORMAL)->setBalance(UserPeer::INIT_BAL);
    }
    return parent::save($con);
  }
}
