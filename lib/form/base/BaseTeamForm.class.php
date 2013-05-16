<?php

/**
 * Team form base class.
 *
 * @package    fantuan
 * @subpackage form
 * @author     Your name here
 */
class BaseTeamForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'captain'    => new sfWidgetFormInput(),
      'status'     => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Team', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'captain'    => new sfValidatorInteger(),
      'status'     => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Team', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('team[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Team';
  }


}
