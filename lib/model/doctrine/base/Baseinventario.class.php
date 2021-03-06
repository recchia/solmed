<?php

/**
 * Baseinventario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $articulo_id
 * @property integer $cantidad
 * @property date $fecha_vencimiento
 * @property integer $departamento_id
 * @property articulo $articulo
 * @property departamento $departamento
 * 
 * @method integer      getId()                Returns the current record's "id" value
 * @method integer      getArticuloId()        Returns the current record's "articulo_id" value
 * @method integer      getCantidad()          Returns the current record's "cantidad" value
 * @method date         getFechaVencimiento()  Returns the current record's "fecha_vencimiento" value
 * @method integer      getDepartamentoId()    Returns the current record's "departamento_id" value
 * @method articulo     getArticulo()          Returns the current record's "articulo" value
 * @method departamento getDepartamento()      Returns the current record's "departamento" value
 * @method inventario   setId()                Sets the current record's "id" value
 * @method inventario   setArticuloId()        Sets the current record's "articulo_id" value
 * @method inventario   setCantidad()          Sets the current record's "cantidad" value
 * @method inventario   setFechaVencimiento()  Sets the current record's "fecha_vencimiento" value
 * @method inventario   setDepartamentoId()    Sets the current record's "departamento_id" value
 * @method inventario   setArticulo()          Sets the current record's "articulo" value
 * @method inventario   setDepartamento()      Sets the current record's "departamento" value
 * 
 * @package    solmed
 * @subpackage model
 * @author     Piero Recchia
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class Baseinventario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('inventario');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('articulo_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('cantidad', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('fecha_vencimiento', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('departamento_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('articulo', array(
             'local' => 'articulo_id',
             'foreign' => 'id'));

        $this->hasOne('departamento', array(
             'local' => 'departamento_id',
             'foreign' => 'id'));
    }
}