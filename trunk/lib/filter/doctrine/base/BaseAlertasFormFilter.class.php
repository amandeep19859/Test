<?php

/**
 * Alertas filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAlertasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'view'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'entity'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_related_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'url'             => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'view'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'entity'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'            => new sfValidatorPass(array('required' => false)),
      'message'         => new sfValidatorPass(array('required' => false)),
      'user_related_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'url'             => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('alertas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alertas';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'view'            => 'Boolean',
      'entity'          => 'Number',
      'type'            => 'Text',
      'message'         => 'Text',
      'user_related_id' => 'ForeignKey',
      'url'             => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}