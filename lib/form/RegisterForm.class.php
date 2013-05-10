<?php

class RegisterForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email'            => new sfWidgetFormInput(),
      'name'             => new sfWidgetFormInput(),
      'password'         => new sfWidgetFormInputPassword(),
      'password_confirm' => new sfWidgetFormInputPassword(),
    ));
    $this->widgetSchema->setNameFormat('register[%s]');

    $this->setValidators(array(
      'email'            => new sfValidatorEmail(array(), array('invalid' => 'The email address is invalid.')),
      'name'             => new sfValidatorString(array('required' => true)),
      'password'         => new sfValidatorString(array('max_length' => 255), array(
        'required'   => 'Password is required.',
        'min_length' => 'Password is too long.',
      )),
      'password_confirm' => new sfValidatorString(array('max_length' => 255), array(
        'required'   => 'Please confirm your password.',
        'min_length' => 'Password is too long.',
      )),
    ));
    $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare(
      'password', '==', 'password_confirm',
      array(),
      array('invalid' => 'Please check your password.')
    ));
  }
}