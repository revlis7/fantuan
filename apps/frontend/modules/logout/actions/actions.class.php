<?php

class logoutActions extends sfActions
{
  public function executeIndex()
  {
    $this->getUser()->setAuthenticated(false);
    $this->redirect('user/register');
  }
}