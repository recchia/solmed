<?php

/**
 * categorias actions.
 *
 * @package    saremo
 * @subpackage categorias
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = $request->getParameter('pagina', 1);
    $this->categorias = Doctrine::getTable('Categoria')->getListado($page, sfConfig::get('app_limite'));
    $this->haveToPaginate = Doctrine::getTable('Categoria')->haveToPaginate();
    $this->resultados = Doctrine::getTable('Categoria')->getTotalResult();
    $this->paginas = Doctrine::getTable('Categoria')->getTotalPages();
    $this->menu = Doctrine::getTable('Categoria')->getDisplay(array(), true);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($categoria = Doctrine::getTable('Categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaForm($categoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($categoria = Doctrine::getTable('Categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaForm($categoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($categoria = Doctrine::getTable('Categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $categoria->delete();

    $this->redirect('categorias/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $categoria = $form->save();
      $this->getUser()->setFlash('notice','La Categoría ha sido guardada con Éxito');

      $this->redirect('categorias/edit?id='.$categoria->getId());
    }
  }
}
