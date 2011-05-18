<?php

/**
 * detalle_solicitud filter form base class.
 *
 * @package    solmed
 * @subpackage filter
 * @author     Piero Recchia
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basedetalle_solicitudFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'solicitud_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('solicitud'), 'add_empty' => true)),
      'articulo_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('articulo'), 'add_empty' => true)),
      'cantidad'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'solicitud_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('solicitud'), 'column' => 'id')),
      'articulo_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('articulo'), 'column' => 'id')),
      'cantidad'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('detalle_solicitud_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'detalle_solicitud';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'solicitud_id' => 'ForeignKey',
      'articulo_id'  => 'ForeignKey',
      'cantidad'     => 'Number',
    );
  }
}
