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

    $this->charged_groups = $user->getChargedGroups();
    $this->joined_groups  = $user->getJoinedGroups();

    $this->name    = $user->getName();
    $this->balance = $user->getBalance();
  }
}