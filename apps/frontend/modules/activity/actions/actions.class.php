<?php

class activityActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if (!$this->getUser()->isAuthenticated()) {
      $this->redirect('login');
    }

    $activity = ActivityPeer::getByName($request->getParameter('name'));
    if (!$activity) {
      return sfView::ERROR;
    }

    $this->activity = $activity;
    $this->members  = $activity->getMembers();
  }
}