<?php

class loginComponents extends sfComponents
{
  public function executeToolbar()
  {
    $this->login = false;
    $session = $this->getUser();
    if ($session->isAuthenticated()) {
      $this->name  = $session->getAttribute('name');
      $this->login = true;
    }
  }
}