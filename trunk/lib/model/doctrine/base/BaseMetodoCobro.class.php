<?php

/**
 * BaseMetodoCobro
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $metodo
 * @property Doctrine_Collection $sfGuardUserProfile
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getMetodo()             Returns the current record's "metodo" value
 * @method Doctrine_Collection getSfGuardUserProfile() Returns the current record's "sfGuardUserProfile" collection
 * @method MetodoCobro         setId()                 Sets the current record's "id" value
 * @method MetodoCobro         setMetodo()             Sets the current record's "metodo" value
 * @method MetodoCobro         setSfGuardUserProfile() Sets the current record's "sfGuardUserProfile" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMetodoCobro extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('metodo_cobro');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('metodo', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUserProfile', array(
             'local' => 'id',
             'foreign' => 'metodo_cobro_id'));
    }
}