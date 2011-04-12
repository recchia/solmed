<?php

/**
 * categoria form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriaForm extends BasecategoriaForm
{
  public function configure()
  {
      $this->useFields(array('descripcion','activo'));
      $this->widgetSchema->setLabels(array('descripcion' => 'Descripción', 'activo' => '¿Activo?'));
      $this->setValidator('descripcion', new sfValidatorString(array('required' => true), array('required' => 'La descripción es un campo obligatorio.')));
  }
}
