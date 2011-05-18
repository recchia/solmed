<?php

/**
 * inventario filter form base class.
 *
 * @package    solmed
 * @subpackage filter
 * @author     Piero Recchia
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseinventarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'articulo_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('articulo'), 'add_empty' => true)),
      'cantidad'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_vencimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'departamento_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('departamento'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'articulo_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('articulo'), 'column' => 'id')),
      'cantidad'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_vencimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'departamento_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('departamento'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('inventario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'inventario';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'articulo_id'       => 'ForeignKey',
      'cantidad'          => 'Number',
      'fecha_vencimiento' => 'Date',
      'departamento_id'   => 'ForeignKey',
    );
  }
}
