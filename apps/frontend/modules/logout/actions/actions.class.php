<?php

class logoutActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->logout();
    $this->redirect('login/index');
  }
}