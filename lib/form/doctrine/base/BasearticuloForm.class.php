<?php

/**
 * articulo form base class.
 *
 * @method articulo getObject() Returns the current form's model object
 *
 * @package    solmed
 * @subpackage form
 * @author     Piero Recchia
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasearticuloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'descripcion'       => new sfWidgetFormInputText(),
      'categoria_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'), 'add_empty' => false)),
      'marca_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('marca'), 'add_empty' => false)),
      'fecha_vencimiento' => new sfWidgetFormDate(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'deleted_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'       => new sfValidatorString(array('max_length' => 80)),
      'categoria_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'))),
      'marca_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('marca'))),
      'fecha_vencimiento' => new sfValidatorDate(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'deleted_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('articulo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'articulo';
  }

}
