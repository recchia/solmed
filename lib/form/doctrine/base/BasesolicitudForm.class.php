<?php

/**
 * solicitud form base class.
 *
 * @method solicitud getObject() Returns the current form's model object
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesolicitudForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'departamento_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('departamento'), 'add_empty' => true)),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'aprobada'         => new sfWidgetFormInputCheckbox(),
      'predespachada'    => new sfWidgetFormInputCheckbox(),
      'despachada'       => new sfWidgetFormInputCheckbox(),
      'recibida'         => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'deleted_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'departamento_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('departamento'), 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'aprobada'         => new sfValidatorBoolean(array('required' => false)),
      'predespachada'    => new sfValidatorBoolean(array('required' => false)),
      'despachada'       => new sfValidatorBoolean(array('required' => false)),
      'recibida'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'deleted_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('solicitud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'solicitud';
  }

}
