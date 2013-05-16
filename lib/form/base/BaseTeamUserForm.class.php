<?php

/**
 * TeamUser form base class.
 *
 * @package    fantuan
 * @subpackage form
 * @author     Your name here
 */
class BaseTeamUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'team_id'    => new sfWidgetFormInput(),
      'user_id'    => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'TeamUser', 'column' => 'id', 'required' => false)),
      'team_id'    => new sfValidatorInteger(),
      'user_id'    => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamUser';
  }


}
