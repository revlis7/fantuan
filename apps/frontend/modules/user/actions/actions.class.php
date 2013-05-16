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

    $this->user           = $user;
    $this->charged_teams  = $user->getChargedTeams();
    $this->joined_teams   = $user->getJoinedTeams();
    $this->activities     = $user->getActivities();
  }
}