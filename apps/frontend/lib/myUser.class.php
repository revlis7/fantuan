<?php

class myUser extends sfBasicSecurityUser
{
  public function setInfo()
  {
    $this->setAttribute('info', 'hey jude');
  }

  public function getInfo()
  {
    return $this->getAttribute('info');
  }
}
