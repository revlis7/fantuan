<?php

class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if (!$this->getUser()->isAuthenticated()) {
      $this->redirect('login');
    }

    $user = UserPeer::getByName($request->getParameter('name'));
    if (!$user) {
      $this->redirect('@user?name='.$this->getUser()->getAttribute('name'));
    }

    $this->charged_groups = $user->getChargedGroups();
    $this->joined_groups  = $user->getJoinedGroups();

    $this->name    = $user->getName();
    $this->balance = $user->getBalance();
  }
}