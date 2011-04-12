<?php

/**
 * departamento form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class departamentoForm extends BasedepartamentoForm
{
  public function configure()
  {
      $this->useFields(array('id','descripcion','activo'));
      $this->widgetSchema->setLabels(array(
          'descripcion' => 'Descripción del Departamento',
          'activo' => '¿Activo?'
      ));
  }
}
