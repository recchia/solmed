<?php

class solicitudTable extends Doctrine_Table
{
    public function getListado($idDepartamento) {
        $q = $this->createQuery('s')
                ->select('*');
        if($idDepartamento != 1) {
            $q->where('s.departamento_id = ?', $idDepartamento);
        } else {
            $q->where('s.aprobada = 1');
        }
        $q->andWhere('s.recibida = 0')->andWhere('deleted_at IS NULL');;
        
        return $q->execute();
    }
}
