<?php

/**
 * marcas actions.
 *
 * @package    saremo
 * @subpackage marcas
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class marcasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->marcas = Doctrine::getTable('Marca')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MarcaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MarcaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($marca = Doctrine::getTable('Marca')->find(array($request->getParameter('id'))), sprintf('Object marca does not exist (%s).', $request->getParameter('id')));
    $this->form = new MarcaForm($marca);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($marca = Doctrine::getTable('Marca')->find(array($request->getParameter('id'))), sprintf('Object marca does not exist (%s).', $request->getParameter('id')));
    $this->form = new MarcaForm($marca);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($marca = Doctrine::getTable('Marca')->find(array($request->getParameter('id'))), sprintf('Object marca does not exist (%s).', $request->getParameter('id')));
    $marca->delete();

    $this->redirect('marcas/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $marca = $form->save();
      $this->getUser()->setFlash('notice','La Presentación ha sido guardada con Éxito');

      $this->redirect('marcas/edit?id='.$marca->getId());
    }
  }
}
