<?php

class User extends BaseUser
{
  public function save(PropelPDO $con = null)
  {
    if ($this->isNew()) {
      $this->setStatus(UserPeer::NORMAL)->setBalance(UserPeer::INIT_BAL);
    }
    return parent::save($con);
  }
}
