<?php

/**
 * Profile form.
 *
 * @package    saremo
 * @subpackage form
 * @author     UAH
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{
  public function configure()
  {
      $this->widgetSchema->setLabel('cedula','Cédula');
  }
}
