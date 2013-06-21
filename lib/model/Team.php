<?php

class Team extends BaseTeam
{
  public function __toString()
  {
    return $this->getName();
  }

  // public function getCaptainProfile()
  // {
  //   $user_id = $this->getCaptain();
  //   return UserPeer::retrieveByPK($user_id);
  // }

  public function getMembers()
  {
    $criteria = new Criteria();
    $criteria->addJoin(TeamUserPeer::USER_ID, UserPeer::ID);
    $criteria->add(TeamUserPeer::TEAM_ID, $this->getId());

    return UserPeer::doSelect($criteria);
  }

  public function getFund()
  {
    $members = $this->getMembers();
    $fund    = 0;
    foreach ($members as $member) {
      $fund += $member->getBalance();
    }
    return $fund;
  }
}
