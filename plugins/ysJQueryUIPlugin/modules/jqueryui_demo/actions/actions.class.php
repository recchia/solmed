<?php

/**
 * jqueryui_demo actions.
 *
 * @package    ysJQueryUIPlugin
 * @subpackage jqueryui_demo
 * @author     Omar Yepez
 */
class jqueryui_demoActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('jqueryui_demo', 'panel');
  }

  public function executePanel(){
    return sfView::SUCCESS;
  }

  public function executeAccordion(){
    return sfView::SUCCESS;
  }

  public function executeDialog(){
    return sfView::SUCCESS;
  }

  public function executeProgressbar(){
    return sfView::SUCCESS;
  }

  public function executeTabs(){
    return sfView::SUCCESS;
  }

  public function executeEffects(){
    return sfView::SUCCESS;
  }

  public function executeSlider(){
    return sfView::SUCCESS;
  }
  
  public function executeDroppable(){
    return sfView::SUCCESS;
  }

  public function executeDraggable(){
    return sfView::SUCCESS;
  }

  public function executeResizable(){
    return sfView::SUCCESS;
  }

  public function executeSelectable(){
    return sfView::SUCCESS;
  }

  public function executeSortable(){
    return sfView::SUCCESS;
  }

  public function executeDatepicker(){
    return sfView::SUCCESS;
  }

  public function executeButtons(){
    return sfView::SUCCESS;
  }

  public function executeToolbar(){
    return sfView::SUCCESS;
  }

  public function executeTable(){
    return sfView::SUCCESS;
  }

  public function executeMenu(){
    return sfView::SUCCESS;
  }

  public function executeContextMenu(){
    return sfView::SUCCESS;
  }

  public function executeLayout(){
    return sfView::SUCCESS;
  }

}
