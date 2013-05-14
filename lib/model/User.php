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

  public function getChargedGroups()
  {
    $criteria = new Criteria();
    $criteria->addJoin(UserPeer::ID, GroupPeer::CAPTAIN);
    $criteria->add(UserPeer::ID, $this->getId());

    return GroupPeer::doSelect($criteria);
  }

  public function getJoinedGroups()
  {
    $criteria = new Criteria();
    $criteria->addJoin(GroupUserPeer::GROUP_ID, GroupPeer::ID);
    $criteria->add(GroupUserPeer::USER_ID, $this->getId());

    return GroupPeer::doSelect($criteria);
  }

  public function save(PropelPDO $con = null)
  {
    if ($this->isNew()) {
      $this->setStatus(UserPeer::NORMAL)->setBalance(UserPeer::INIT_BAL);
    }
    return parent::save($con);
  }
}
