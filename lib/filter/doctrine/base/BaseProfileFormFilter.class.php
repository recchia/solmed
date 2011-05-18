<?php

/**
 * Profile filter form base class.
 *
 * @package    solmed
 * @subpackage filter
 * @author     Piero Recchia
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'cedula'           => new sfWidgetFormFilterInput(),
      'nombres'          => new sfWidgetFormFilterInput(),
      'apellidos'        => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'departamento_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('departamento'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'cedula'           => new sfValidatorPass(array('required' => false)),
      'nombres'          => new sfValidatorPass(array('required' => false)),
      'apellidos'        => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'departamento_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('departamento'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sf_guard_user_id' => 'ForeignKey',
      'cedula'           => 'Text',
      'nombres'          => 'Text',
      'apellidos'        => 'Text',
      'email'            => 'Text',
      'departamento_id'  => 'ForeignKey',
    );
  }
}
