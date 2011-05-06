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
    public function configure() {
        $today = array(
            'year' => date('Y'),
            'month' => date('n'),
            'day' => date('j')
        );
        $years = range(date('Y'), date('Y') + 4);
        $this->setWidget('articulo_id', new sfWidgetFormInputHidden());
        $this->setWidget('medicamento', new sfWidgetFormInput());
        $this->widgetSchema['medicamento']->setAttribute('readonly', 'readonly');
        $this->widgetSchema['medicamento']->setAttribute('size', '40');
        $this->widgetSchema['fecha_vencimiento'] = new sfWidgetFormDate(array('format' => '%day%/%month%/%year%', 'default' => $today, 'years' => array_combine($years, $years)));
        $this->widgetSchema['departamento_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cantidad']->setAttribute('readonly', 'readonly');
    }
}
