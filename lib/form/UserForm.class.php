<?php

/**
 * User form.
 *
 * @package    fantuan
 * @subpackage form
 * @author     Your name here
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
    unset(
      $this['balance'],
      $this['created_at'],
      $this['status']
    );

    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));
  }
}
