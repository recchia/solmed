<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recibirForm
 *
 * @author recchia
 */
class recibirForm extends sfForm {
    
    public function configure() {
        $this->setWidget('solicitud_id', new sfWidgetFormInputHidden());
    }
}

?>
