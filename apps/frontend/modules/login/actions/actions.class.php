<?php

class loginActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('@user?name='.$this->getUser()->getAttribute('name'));
    }
    $this->form = new LoginForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid()) {
        $email    = $this->form->getValue('email');
        $password = $this->form->getValue('password');
        if (UserPeer::verifyUser($email, $password)) {
          $user = UserPeer::getByEmail($email);
          $this->getUser()->login($user->getName());
          $this->redirect('@user?name='.$user->getName());
        }
      }
    }
  }
}