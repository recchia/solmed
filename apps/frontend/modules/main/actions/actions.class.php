<?php

/**
 * main actions.
 *
 * @package    saremo
 * @subpackage main
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeCambiarPasssword(sfWebRequest $request)
  {
      if($request->isXmlHttpRequest()) {
          $response = $this->getUser()->cambiarPassword($this->getUser()->getGuardUser(),$request->getParameter('current_pass'),$request->getParameter('new_pass'),$request->getParameter('confirm'));
          $msj = "{status: '{$response[0]}', mensaje: '{$response[1]}'}";
          sfConfig::set('sf_web_debug', false);
          $this->getResponse()->setContentType('application/json');
          return $this->renderText($msj);
      }
  }
  
}
