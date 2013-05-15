<?php

/**
 * UserChargeHistory form base class.
 *
 * @package    fantuan
 * @subpackage form
 * @author     Your name here
 */
class BaseUserChargeHistoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormInput(),
      'price'      => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'UserChargeHistory', 'column' => 'id', 'required' => false)),
      'user_id'    => new sfValidatorInteger(),
      'price'      => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_charge_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserChargeHistory';
  }


}
