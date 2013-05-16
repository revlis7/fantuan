<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * TeamUser filter form base class.
 *
 * @package    fantuan
 * @subpackage filter
 * @author     Your name here
 */
class BaseTeamUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'team_id'    => new sfWidgetFormFilterInput(),
      'user_id'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'team_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('team_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamUser';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'team_id'    => 'Number',
      'user_id'    => 'Number',
      'created_at' => 'Date',
    );
  }
}
