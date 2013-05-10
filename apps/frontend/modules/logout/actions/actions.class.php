<?php

class logoutActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setAuthenticated(false);
    $this->redirect('login/index');
  }
}