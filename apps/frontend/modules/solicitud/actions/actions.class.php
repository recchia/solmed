<?php

/**
 * solicitud actions.
 *
 * @package    saremo
 * @subpackage solicitud
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class solicitudActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->solicituds = Doctrine::getTable('Solicitud')
            ->getListado($this->getUser()->getGuardUser()->getProfile()->getDepartamentoId());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SolicitudForm();
    $this->form->setDefault('sf_guard_user_id', $this->getUser()->getGuardUser()->getProfile()->getSfGuardUserId());
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->forward404Unless($this->solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('Object solicitud does not exist (%s).', $request->getParameter('id')));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SolicitudForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('Object solicitud does not exist (%s).', $request->getParameter('id')));
    $this->form = new SolicitudForm($solicitud);
    $this->can_delete = ($solicitud->getSfGuardUserId() == $this->getUser()->getGuardUser()->getId()) ? 1 : 0;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('Object solicitud does not exist (%s).', $request->getParameter('id')));
    $this->form = new SolicitudForm($solicitud);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('Object solicitud does not exist (%s).', $request->getParameter('id')));
    $solicitud->delete();

    $this->redirect('solicitud/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $solicitud = $form->save();
      $this->getUser()->setFlash('notice','La solicitud ha sido guardada con Éxito');

      $this->redirect('solicitud/index');
    }
  }

  public function executeAddDetalleForm(sfWebRequest $request)
  {
      $this->forward404Unless($request->isXmlHttpRequest());
      if ($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))))
      {
	$form = new SolicitudForm($solicitud);
      }else
      {
	$form = new solicitudForm();
      }
      $number = $request->getParameter('num')+1;
      $key = 'Articulo '.$number;
      $form->addDetalleForm($key, $request->getParameter('art_id'));
      return $this->renderPartial('addDetalleForm',array('field' => $form['Articulos'][$key], 'num' => $number));
  }

  public function executeListPendientes(sfWebRequest $request)
  {
      $this->solicituds = Doctrine::getTable('Solicitud')
      ->createQuery('a')
      ->where('a.departamento_id = ? and aprobada = 0', $this->getUser()->getGuardUser()->getProfile()->getDepartamentoId())
      ->execute();
  }

  public function executeListPrependientes(sfWebRequest $request)
  {
      $this->solicituds = Doctrine::getTable('Solicitud')
      ->createQuery('a')
      ->where('predespachada = 0 and aprobada = 1')
      ->execute();
  }

    public function executeListPredespachar(sfWebRequest $request)
  {
      $this->solicituds = Doctrine::getTable('Solicitud')
      ->createQuery('a')
      ->where('despachada = 0 and predespachada = 1')
      ->execute();
  }

    public function executeListRecibir(sfWebRequest $request)
  {
      $this->solicituds = Doctrine::getTable('Solicitud')
      ->createQuery('a')
      ->where('a.departamento_id = ? and recibida = 0 and despachada = 1' , $this->getUser()->getGuardUser()->getProfile()->getDepartamentoId())
      ->execute();
  }
  public function executeAprobar(sfWebRequest $request)
  {
      $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('El objeto solicitado con el id (%s) no existe.', $request->getParameter('id')));
      $solicitud->aprobada = true;
      $solicitud->save();
      $this->getUser()->setFlash('notice','La solicitud ('.$request->getParameter('id').')ha sido aprobada con Éxito');
      $this->redirect('solicitud/ListPendientes');
  }

  public function executePredespachar(sfWebRequest $request)
  {
      $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('El objeto solicitado con el id (%s) no existe.', $request->getParameter('id')));
      $solicitud->predespachada = true;
      $solicitud->save();
      $this->getUser()->setFlash('notice','La solicitud ('.$request->getParameter('id').')ha sido Pre Despachada con Éxito');
      $this->redirect('solicitud/ListPrependientes');
  }

  public function executeDespachar(sfWebRequest $request)
  {
      $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('El objeto solicitado con el id (%s) no existe.', $request->getParameter('id')));
      $solicitud->despachada = true;
      $solicitud->save();
      $this->getUser()->setFlash('notice','La solicitud ('.$request->getParameter('id').')ha sido Despachada con Éxito');
      $this->redirect('solicitud/ListPredespachar');
  }
  
  public function executeRecibir(sfWebRequest $request)
  {
      $this->forward404Unless($this->solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('El objeto solicitado con el id (%s) no existe.', $request->getParameter('id')));
      $detalles = $this->solicitud->getDetalleSolicitud();
      $this->form = new recibirForm();
      $dptoId = $this->solicitud->getDepartamentoId();
      $this->form->setDefault('solicitud_id', $request->getParameter('id'));
      $i = 1;
      $this->cantidad = count($detalles);
      foreach ($detalles as $detalle) {
          $subForm = new inventarioForm();
          $subForm->setDefaults(array('articulo_id' => $detalle->getArticuloId(),'medicamento' => $detalle->getArticulo(),'cantidad' => $detalle->getCantidad(),'departamento_id' => $dptoId));
          $this->form->embedForm($i, $subForm);
          $i++;
      }
  }
  
  public function executeCargarInventario(sfWebRequest $request)
  {
      $this->solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('solicitud_id')));
      if($this->solicitud->updateInventario($request)) {
          $this->getUser()->setFlash('notice', 'Los medicamentos han sido cargados en el inventario');
      } 
  }

  public function executeImprimir(sfWebRequest $request)
  {
      sfConfig::set('sf_web_debug', false);
      $this->forward404Unless($solicitud = Doctrine::getTable('Solicitud')->find(array($request->getParameter('id'))), sprintf('El objeto solicitado con el id (%s) no existe.', $request->getParameter('id')));
      $this->solicitud = $solicitud;
      $this->setLayout(false);
  }
  
}
