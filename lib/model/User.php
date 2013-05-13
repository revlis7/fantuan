<?php

class User extends BaseUser
{
  public function setPassword($password)
  {
    return parent::setPassword(md5($password));
  }

  public function save(PropelPDO $con = null)
  {
    if ($this->isNew()) {
      $this->setStatus(UserPeer::NORMAL)->setBalance(UserPeer::INIT_BAL);
    }
    return parent::save($con);
  }
}
