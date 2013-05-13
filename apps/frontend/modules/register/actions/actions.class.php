<?php

class registerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new RegisterForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('register'));
      if ($this->form->isValid()) {
        $user = new User();

        $values = $this->form->getValues();
        $user->setEmail($values['email']);
        $user->setName($values['name']);
        $user->setPassword($values['password']);
        $user->save();

        $this->getUser()->setAuthenticated(true);

        $this->redirect('user/index');
      }
    }
  }
}