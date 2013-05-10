<?php

class loginActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('user/main');
    }
    $this->form = new LoginForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid()) {
        $this->getUser()->setAuthenticated(true);
        $this->redirect('user/main');
      }
    }
  }
}