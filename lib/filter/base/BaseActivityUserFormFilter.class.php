<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ActivityUser filter form base class.
 *
 * @package    fantuan
 * @subpackage filter
 * @author     Your name here
 */
class BaseActivityUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'activity_id' => new sfWidgetFormPropelChoice(array('model' => 'Activity', 'add_empty' => true)),
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
      'cost'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'activity_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Activity', 'column' => 'id')),
      'user_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'cost'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('activity_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityUser';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'activity_id' => 'ForeignKey',
      'user_id'     => 'ForeignKey',
      'cost'        => 'Number',
    );
  }
}
