<?php

class categoriaTable extends Doctrine_Table
{
    public function getListado($page = 1, $limit = 20)
    {
        $strSQL = Doctrine_Query::create()
                ->select('c.id, c.descripcion, c.activo, c.created_at, c.updated_at')
                ->from('Categoria c');
        $this->pagerLayout = new sfDoctrinePagerLayout(
                        new Doctrine_Pager($strSQL, $page, $limit),
                        new Doctrine_Pager_Range_Sliding(array('chunk' => 15)),
                        'categorias/index?pagina={%page_number}');
        $this->pagerLayout->setTemplate('{link_to}{%page}{/link_to}');
        $this->pagerLayout->setSelectedTemplate('<span>{%page}</span>');
        $this->pagerLayout->setSeparatorTemplate('&nbsp;');
        $this->pager = $this->pagerLayout->getPager();

        return $this->pager->execute(array());
    }
    
    public function getDisplay($options = array(), $return = false) {
        if ($return)
            return $this->pagerLayout->display($options, $return);
    }

    public function getTotalResult() {
        return $this->pager->getNumResults();
    }

    public function getTotalPages() {
        return $this->pager->getLastPage();
    }

    public function haveToPaginate() {
        return $this->pager->haveToPaginate();
    }
}
