<?php

class userActions extends sfActions
{
  public function executeIndex()
  {
    if (!$this->getUser()->isAuthenticated()) {
      $this->redirect('login');
    }

    $email = $this->getUser()->getAttribute('email');
    $user = UserPeer::getUserByEmail($email);

    $this->name    = $user->getName();
    $this->balance = $user->getBalance();
  }
}