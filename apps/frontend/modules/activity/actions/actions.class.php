<?php

class activityActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if (!$this->getUser()->isAuthenticated()) {
      $this->redirect('login');
    }

    $activity = ActivityPeer::retrieveByPK($request->getParameter('id'));
    if (!$activity) {
      return sfView::ERROR;
    }

    $this->members = $activity->getMembers();
    var_dump($this->members);exit;
  }
}