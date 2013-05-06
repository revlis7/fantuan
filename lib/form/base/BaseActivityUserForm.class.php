<?php

/**
 * ActivityUser form base class.
 *
 * @package    fantuan
 * @subpackage form
 * @author     Your name here
 */
class BaseActivityUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'activity_id' => new sfWidgetFormPropelChoice(array('model' => 'Activity', 'add_empty' => false)),
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'cost'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'ActivityUser', 'column' => 'id', 'required' => false)),
      'activity_id' => new sfValidatorPropelChoice(array('model' => 'Activity', 'column' => 'id')),
      'user_id'     => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'cost'        => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('activity_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityUser';
  }


}
