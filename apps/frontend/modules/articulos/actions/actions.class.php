<?php

/**
 * articulos actions.
 *
 * @package    saremo
 * @subpackage articulos
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articulosActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = $request->getParameter('pagina', 1);
    $this->articulos = Doctrine::getTable('Articulo')->getListado($page, sfConfig::get('app_limite'));
    $this->haveToPaginate = Doctrine::getTable('Articulo')->haveToPaginate();
    $this->resultados = Doctrine::getTable('Articulo')->getTotalResult();
    $this->paginas = Doctrine::getTable('Articulo')->getTotalPages();
    $this->menu = Doctrine::getTable('Articulo')->getDisplay(array(), true);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ArticuloForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ArticuloForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($articulo = Doctrine::getTable('Articulo')->find(array($request->getParameter('id'))), sprintf('Object articulo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticuloForm($articulo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($articulo = Doctrine::getTable('Articulo')->find(array($request->getParameter('id'))), sprintf('Object articulo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticuloForm($articulo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($articulo = Doctrine::getTable('Articulo')->find(array($request->getParameter('id'))), sprintf('Object articulo does not exist (%s).', $request->getParameter('id')));
    $articulo->delete();

    $this->redirect('articulos/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $articulo = $form->save();
      $this->getUser()->setFlash('notice','El Artículo ha sido guardado con Éxito');

      $this->redirect('articulos/edit?id='.$articulo->getId());
    }
  }

  public function executeGetJsonArticulos(sfWebRequest $request)
  {
      sfConfig::set('sf_web_debug', false);
      $this->getResponse()->setContentType('application/json');
      $pagina = $request->getParameter('page',1);
      $limite = $request->getParameter('rows',10);
      $sidx = $request->getParameter('sidx','id');
      $sord = $request->getParameter('sord','asc');
      $searchField = $request->getParameter('searchField', null);
      $searchOper = $request->getParameter('searchOper', null);
      $searchString = $request->getParameter('searchString', null);
      $pager = Doctrine::getTable('Articulo')->doSelectPager($pagina, $limite, $sidx, $sord, $searchField, $searchOper, $searchString);
      $result = Doctrine::getTable('Articulo')->makeJson($pager, $pagina, $limite);
      return $this->renderText($result);
  }
}
