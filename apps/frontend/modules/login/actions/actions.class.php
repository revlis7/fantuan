<?php

class loginActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('user/index');
    }
    $this->form = new LoginForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid()) {
        $email    = $this->form->getValue('email');
        $password = $this->form->getValue('password');
        if (UserPeer::verifyUser($email, $password)) {
          $this->getUser()->setAuthenticated(true);
          $user = UserPeer::getUserByEmail($email);
          $this->getUser()->setAttribute('id', $user->getId());
          $this->getUser()->setAttribute('email', $user->getEmail());
          $this->getUser()->setAttribute('name', $user->getName());
          $this->redirect('user/index');
        }
      }
    }
  }
}