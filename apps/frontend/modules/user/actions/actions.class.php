<?php

class userActions extends sfActions
{
  public function executeRegister(sfWebRequest $request)
  {
    $user = new User();
    $this->form = new UserForm($user);
    $this->status = 'USER LOGGED OUT';
    if ($this->getUser()->isAuthenticated()) {
      $this->status = 'USER LOGGED IN';
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new UserForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('register');
  }

  public function executeComplete()
  {
    $session = $this->getUser();
    $session->setAuthenticated(true);
  }

  public function executeMain()
  {
    $session = $this->getUser();
    if (!$session->isAuthenticated()) {
      $this->redirect('login');
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName())
    );
    if ($form->isValid()) {
      $user = $form->save();
      $this->redirect('user/complete');
    }
  }
}