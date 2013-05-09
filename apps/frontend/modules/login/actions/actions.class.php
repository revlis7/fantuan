<?php

class loginActions extends sfActions
{
  public function executeIndex()
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('user/main');
    }
    $this->form = new LoginForm();
  }

  public function executeSubmit()
  {
    echo 'submit';exit;
  }
}