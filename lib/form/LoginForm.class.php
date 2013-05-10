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
      'email'    => new sfValidatorEmail(array(), array('invalid' => 'The email address is invalid.')),
      'password' => new sfValidatorString(array('max_length' => 255), array(
        'required'   => 'Password is required.',
        'min_length' => 'Password is too long.',
      )),
    ));
  }
}