<?php

/**
 * inventario actions.
 *
 * @package    saremo
 * @subpackage inventario
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inventarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->inventarios = Doctrine::getTable('Inventario')->getListado($this->getUser()->getGuardUser()->getProfile()->getDepartamentoId());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InventarioForm();
    $this->form->setDefault('departamento_id', $this->getUser()->getGuardUser()->getProfile()->getDepartamentoId());
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InventarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($inventario = Doctrine::getTable('Inventario')->find(array($request->getParameter('id'))), sprintf('Object inventario does not exist (%s).', $request->getParameter('id')));
    $this->form = new InventarioForm($inventario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($inventario = Doctrine::getTable('Inventario')->find(array($request->getParameter('id'))), sprintf('Object inventario does not exist (%s).', $request->getParameter('id')));
    $this->form = new InventarioForm($inventario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($inventario = Doctrine::getTable('Inventario')->find(array($request->getParameter('id'))), sprintf('Object inventario does not exist (%s).', $request->getParameter('id')));
    $inventario->delete();

    $this->redirect('inventario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $inventario = $form->save();
      $this->getUser()->setFlash('notice','El Inventario ha sido guardado con Éxito');

      $this->redirect('inventario/edit?id='.$inventario->getId());
    }
  }
}
