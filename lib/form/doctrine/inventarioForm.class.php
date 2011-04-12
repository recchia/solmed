<?php

/**
 * inventario form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inventarioForm extends BaseinventarioForm
{
  public function configure()
  {
      $this->widgetSchema['fecha_vencimiento'] = new sfWidgetFormJQueryDate(array('culture' => 'es', 'config' => '{ changeYear: true, changeMonth: true, showButtonPanel: true, yearRange: \'1900:2000\' }'));
      $this->widgetSchema['departamento_id'] = new sfWidgetFormInputHidden();
  }
}
