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

    $this->setWidgets(array(
      'email'            => new sfWidgetFormInput(),
      'name'             => new sfWidgetFormInput(),
      'password'         => new sfWidgetFormInputPassword(),
      // 'password_confirm' => new sfWidgetFormInputPassword(),
    ));

     // $this->widgetSchema['password'] = new sfWidgetFormInputPassword();

    $this->setValidators(array(
      'email'            => new sfValidatorEmail(),
      'name'             => new sfValidatorString(array('min_length' => 2, 'max_length' => 255)),
      'password'         => new sfValidatorString(),
      // 'password_confirm' => new sfValidatorString(),
    ));

    // $this->validatorSchema['email'] = new sfValidatorAnd(array(
    //   $this->validatorSchema['email'],
    //   new sfValidatorEmail(),
    // ));

    // $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('password', '==', 'password_confirm'));
  }
}
