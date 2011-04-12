<?php

/**
 * articulo form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articuloForm extends BasearticuloForm
{
  public function configure()
  {
      $this->useFields(array('id','descripcion','categoria_id','marca_id','fecha_vencimiento'));
      $this->widgetSchema->setLabels(array(
          'descripcion' => 'Descripción del artículo',
          'categoria' => 'Categoría',
          'marca' => 'Marca del artículo',
          'fecha_vencimiento' => 'Fecha de Vencimiento'
          ));
  }
}
