<?php

class userActions extends sfActions
{
  public function executeRegister(sfWebRequest $request)
  {
    $user = new User();
    $this->form = new UserForm($user);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new UserForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('register');
  }

  public function executeComplete()
  {
    $user = $this->getUser();
    $user->setAuthenticated(true);
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