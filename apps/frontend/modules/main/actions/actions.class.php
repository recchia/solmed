<?php

/**
 * main actions.
 *
 * @package    saremo
 * @subpackage main
 * @author     UAH
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $cedula = $this->getUser()->getAttribute('cedula','');
        if (empty ($cedula)) {
            $this->getUser()->setAttribute('user', $this->getUser()->getGuardUser()->getUserName());
            $this->getUser()->setAttribute('cedula', $this->getUser()->getGuardUser()->getProfile()->getCedula());
            $this->getUser()->setAttribute('nombres', $this->getUser()->getGuardUser()->getProfile()->getNombres());
            $this->getUser()->setAttribute('apellidos', $this->getUser()->getGuardUser()->getProfile()->getApellidos());
            $this->getUser()->setAttribute('departamento', $this->getUser()->getGuardUser()->getProfile()->getDepartamento());
        }
    }

    public function executeCambiarPasssword(sfWebRequest $request) {
        if ($request->isXmlHttpRequest()) {
            $response = $this->getUser()->cambiarPassword($this->getUser()->getGuardUser(), $request->getParameter('current_pass'), $request->getParameter('new_pass'), $request->getParameter('confirm'));
            $msj = "{status: '{$response[0]}', mensaje: '{$response[1]}'}";
            sfConfig::set('sf_web_debug', false);
            $this->getResponse()->setContentType('application/json');
            return $this->renderText($msj);
        }
    }

}
