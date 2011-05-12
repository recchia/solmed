<?php

class inventarioTable extends Doctrine_Table
{
    public function getListado($idDepartamento) {
        $q = $this->createQuery('i')
                ->select('*');
        if($idDepartamento != 1) {
            $q->where('i.departamento_id = ?', $idDepartamento);
        }
        return $q->execute();
    }
}
