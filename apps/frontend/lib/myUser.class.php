<?php

class myUser extends sfBasicSecurityUser
{
  public function login($name)
  {
    $user = UserPeer::getByName($name);
    $this->getAttributeHolder()->clear();
    $this->setAttribute('id', $user->getId());
    $this->setAttribute('email', $user->getEmail());
    $this->setAttribute('name', $user->getName());
    $this->setAuthenticated(true);
    return true;
  }

  public function logout()
  {
    $this->getAttributeHolder()->clear();
    $this->setAuthenticated(false);
    return true;
  }
}
