<?php

/**
 * solicitud form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class solicitudForm extends BasesolicitudForm
{
    public function configure()
    {
        $this->useFields(array('id','departamento_id','sf_guard_user_id'));
        $usuario = sfContext::getInstance()->getUser()->getGuardUser()->getProfile();
        $this->setWidget('departamento_id', new sfWidgetFormSelect(array('choices' => array($usuario->getDepartamentoId() => $usuario->getDepartamento()))));
        $this->widgetSchema['sf_guard_user_id'] = new sfWidgetFormInputHidden();
        $this->embedDetalles();
    }

    protected function embedDetalles()
    {
        $detalles_forms = new sfForm();

        if (false === sfContext::getInstance()->getRequest()->isXmlHttpRequest()) {
            $detalles_solicitudes = $this->getObject()->getDetalleSolicitud();
            if (count($detalles_solicitudes) == 0)
            {
                for($i=0; $i<1; $i++) {
                    $detalle_solicitud = new detalle_solicitud();
                    $detalle_solicitud->solicitud_id = $this->getObject();
                    $detalles_solicitudes[] = $detalle_solicitud;
                }
            }
            foreach ($detalles_solicitudes as $key=>$v) {
                $detalle_solicitud_form = new detalle_solicitudForm($v);
                $detalles_forms->embedForm('Articulo '.($key+1), $detalle_solicitud_form);
                $detalles_forms->widgetSchema['Articulo '.($key+1)]->setLabel('Artículo '.($key+1));
            }
        }
        $this->embedForm('Articulos', $detalles_forms);
        $this->widgetSchema['Articulos']->setLabel('Artículos Solicitados');
    }

    public function addDetalleForm($key, $art_id)
    {
        $detalle = new detalle_solicitud();
        $detalle->solicitud_id = $this->getObject();
        $detalle->articulo_id = $art_id;
        $this->embeddedForms['Articulos']->embedForm($key, new detalle_solicitudForm($detalle));
        $this->embedForm('Articulos', $this->embeddedForms['Articulos']);
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
        foreach($taintedValues['Articulos'] as $key=>$form)
        {
          if (false === $this->embeddedForms['Articulos']->offsetExists($key))
          {
    	     $this->addDetalleForm($key, $form['id']);
          }
        }
        parent::bind($taintedValues, $taintedFiles);
    }

}
