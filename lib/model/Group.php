<?php

class Group extends BaseGroup
{
  public function __toString()
  {
    return $this->getName();
  }

  public function getCaptainProfile()
  {
    $user_id = $this->getCaptain();
    return UserPeer::retrieveByPK($user_id);
  }

  public function getMembers()
  {
    $criteria = new Criteria();
    $criteria->addJoin(GroupUserPeer::USER_ID, UserPeer::ID);
    $criteria->add(GroupUserPeer::GROUP_ID, $this->getId());

    return UserPeer::doSelect($criteria);
  }
}
