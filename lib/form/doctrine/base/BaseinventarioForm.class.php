<?php

/**
 * inventario form base class.
 *
 * @method inventario getObject() Returns the current form's model object
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseinventarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'articulo_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('articulo'), 'add_empty' => true)),
      'cantidad'          => new sfWidgetFormInputText(),
      'fecha_vencimiento' => new sfWidgetFormDate(),
      'departamento_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('departamento'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'articulo_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('articulo'), 'required' => false)),
      'cantidad'          => new sfValidatorInteger(),
      'fecha_vencimiento' => new sfValidatorDate(),
      'departamento_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('departamento'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inventario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'inventario';
  }

}
