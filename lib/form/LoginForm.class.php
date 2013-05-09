<?php

class LoginForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email'    => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInputPassword(),
    ));
    $this->widgetSchema->setNameFormat('login[%s]');

    $this->setValidators(array(
      'email' => new sfValidatorEmail(),
    ));
  }
}