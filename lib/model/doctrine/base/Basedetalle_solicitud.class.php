<?php

/**
 * Basedetalle_solicitud
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $articulo_id
 * @property integer $cantidad
 * @property articulo $articulo
 * @property solicitud $solicitud
 * 
 * @method integer           getId()           Returns the current record's "id" value
 * @method integer           getSolicitudId()  Returns the current record's "solicitud_id" value
 * @method integer           getArticuloId()   Returns the current record's "articulo_id" value
 * @method integer           getCantidad()     Returns the current record's "cantidad" value
 * @method articulo          getArticulo()     Returns the current record's "articulo" value
 * @method solicitud         getSolicitud()    Returns the current record's "solicitud" value
 * @method detalle_solicitud setId()           Sets the current record's "id" value
 * @method detalle_solicitud setSolicitudId()  Sets the current record's "solicitud_id" value
 * @method detalle_solicitud setArticuloId()   Sets the current record's "articulo_id" value
 * @method detalle_solicitud setCantidad()     Sets the current record's "cantidad" value
 * @method detalle_solicitud setArticulo()     Sets the current record's "articulo" value
 * @method detalle_solicitud setSolicitud()    Sets the current record's "solicitud" value
 * 
 * @package    solmed
 * @subpackage model
 * @author     Piero Recchia
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class Basedetalle_solicitud extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('detalle_solicitud');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('solicitud_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('articulo_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('cantidad', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('articulo', array(
             'local' => 'articulo_id',
             'foreign' => 'id'));

        $this->hasOne('solicitud', array(
             'local' => 'solicitud_id',
             'foreign' => 'id'));
    }
}