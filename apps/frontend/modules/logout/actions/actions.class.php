<?php

class logoutActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->getAttributeHolder()->clear();
    $this->getUser()->setAuthenticated(false);
    $this->redirect('login/index');
  }
}