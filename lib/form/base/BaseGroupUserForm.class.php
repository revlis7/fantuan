<?php

/**
 * GroupUser form base class.
 *
 * @package    fantuan
 * @subpackage form
 * @author     Your name here
 */
class BaseGroupUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'group_id'   => new sfWidgetFormPropelChoice(array('model' => 'Group', 'add_empty' => false)),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'GroupUser', 'column' => 'id', 'required' => false)),
      'group_id'   => new sfValidatorPropelChoice(array('model' => 'Group', 'column' => 'id')),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('group_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupUser';
  }


}
