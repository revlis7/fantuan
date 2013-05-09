<?php

class loginActions extends sfActions
{
  public function executeIndex()
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('user/main');
    }
  }
}