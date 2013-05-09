<?php

class loginActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('user/main');
    }
    $this->form = new LoginForm();
  }

  public function executeSubmit(sfWebRequest $request)
  {
    $this->form = new LoginForm();
    $this->form->bind($request->getParameter('login'));
    if (!$this->form->isValid()) {
      $this->setTemplate('index');
    } else {
      $login = $request->getParameter('login');
      var_dump($login);
      echo 'submit';
    }
  }
}