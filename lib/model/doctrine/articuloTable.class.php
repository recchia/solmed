<?php

class articuloTable extends Doctrine_Table {

    public function doSelectPager($pagina, $limite = 10, $sidx = 1, $sord = 'ASC', $searchField = null, $searchOper = null, $searchString = null) {
        $q = $this->createQuery('a')
                        ->select('a.id, a.descripcion, m.descripcion as marca, c.descripcion as categoria')
                        ->from('articulo a')
                        ->leftJoin('a.marca m')
                        ->leftJoin('a.categoria c');
        if (!is_null($searchField)) {
            $hits = self::getLuceneIndex()->find($searchString);
            $pks = array();
            foreach ($hits as $hit) {
                $pks[] = $hit->pk;
            }
            $q->whereIn('a.id', $pks);
            /* switch ($searchOper) {
              case 'eq':
              $q->where("$searchField = '$searchString'");
              break;
              case 'cn':
              $q->where("$searchField LIKE '%$searchString%'");
              break;
              case 'bw':
              $q->where("$searchField LIKE '$searchString%'");
              break;
              case 'ew':
              $q->where("$searchField LIKE '%$searchString'");
              break;
              } */
        }
        $q->orderBy("$sidx $sord");
        return new Doctrine_Pager($q, $pagina, $limite);
    }

    public function makeJson($pager, $pagina, $limite) {
        $i = 0;
        $rows = array();
        $_rs = $pager->execute(array(),Doctrine::HYDRATE_ARRAY);
        $cantidad = $pager->getNumResults();
        foreach ($_rs as $rs) {
            $rows[$i]['id'] = $rs['id'];
            $rows[$i]['cell'] = array($rs['id'], $rs['descripcion'], $rs['marca'], $rs['categoria']);
            $i++;
        }
        return json_encode(array('page' => $pagina, 'total' => ceil($cantidad / $limite), 'records' => $cantidad, 'rows' => $rows));
    }

    public static function getLuceneIndex()
    {
        ProjectConfiguration::registerZend();
        if(file_exists($index = articuloTable::getLuceneIndexFile())) {
            return Zend_Search_Lucene::open($index);
        } else {
            return Zend_Search_Lucene::create($index);
        }

    }

    public static function getLuceneIndexFile()
    {
        return sfConfig::get('sf_web_dir').'/uploads/articulos.'.sfConfig::get('sf_environment').'.index';
    }

    public function getForLuceneQuery($query)
    {
        $hits = self::getLuceneIndex()->find($query);
        $pks = array();
        foreach ($hits as $hit) {
            $pks[] = $hit->pk;
        }
        if(empty ($pks)) {
            return array();
        }
        $q = $this->createQuery('a')
                ->whereIn('a.id', $pks)
                ->limit(20);
        return $q->execute();
    }
}
