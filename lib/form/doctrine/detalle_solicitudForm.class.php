<?php

/**
 * detalle_solicitud form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class detalle_solicitudForm extends Basedetalle_solicitudForm
{
  public function configure()
  {
      $this->useFields(array('id','articulo_id','cantidad'));
  }
}
