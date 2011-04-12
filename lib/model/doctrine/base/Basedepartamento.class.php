<?php

/**
 * Basedepartamento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property boolean $activo
 * @property Doctrine_Collection $solicitud
 * @property Doctrine_Collection $inventario
 * @property Doctrine_Collection $Profile
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getDescripcion() Returns the current record's "descripcion" value
 * @method boolean             getActivo()      Returns the current record's "activo" value
 * @method Doctrine_Collection getSolicitud()   Returns the current record's "solicitud" collection
 * @method Doctrine_Collection getInventario()  Returns the current record's "inventario" collection
 * @method Doctrine_Collection getProfile()     Returns the current record's "Profile" collection
 * @method departamento        setId()          Sets the current record's "id" value
 * @method departamento        setDescripcion() Sets the current record's "descripcion" value
 * @method departamento        setActivo()      Sets the current record's "activo" value
 * @method departamento        setSolicitud()   Sets the current record's "solicitud" collection
 * @method departamento        setInventario()  Sets the current record's "inventario" collection
 * @method departamento        setProfile()     Sets the current record's "Profile" collection
 * 
 * @package    saremo
 * @subpackage model
 * @author     UAH
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class Basedepartamento extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('departamento');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('descripcion', 'string', 80, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('activo', 'boolean', null, array(
             'type' => 'boolean',
             ));


        $this->index('IX_departamento_1', array(
             'fields' => 
             array(
              0 => 'descripcion',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('solicitud', array(
             'local' => 'id',
             'foreign' => 'departamento_id'));

        $this->hasMany('inventario', array(
             'local' => 'id',
             'foreign' => 'departamento_id'));

        $this->hasMany('Profile', array(
             'local' => 'id',
             'foreign' => 'departamento_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}