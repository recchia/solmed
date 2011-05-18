<?php

/**
 * detalle_solicitud form base class.
 *
 * @method detalle_solicitud getObject() Returns the current form's model object
 *
 * @package    solmed
 * @subpackage form
 * @author     Piero Recchia
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basedetalle_solicitudForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'solicitud_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('solicitud'), 'add_empty' => true)),
      'articulo_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('articulo'), 'add_empty' => true)),
      'cantidad'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'solicitud_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('solicitud'), 'required' => false)),
      'articulo_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('articulo'), 'required' => false)),
      'cantidad'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_solicitud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'detalle_solicitud';
  }

}
