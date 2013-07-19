<?php

/**
 * BaseMetodoPaypal
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $tipo_documento_id
 * @property string $nifnie
 * @property integer $user_id
 * @property string $usuario
 * @property sfGuardUser $sfGuardUser
 * @property TipoDocumento $TipoDocumento
 * 
 * @method integer       getId()                Returns the current record's "id" value
 * @method integer       getTipoDocumentoId()   Returns the current record's "tipo_documento_id" value
 * @method string        getNifnie()            Returns the current record's "nifnie" value
 * @method integer       getUserId()            Returns the current record's "user_id" value
 * @method string        getUsuario()           Returns the current record's "usuario" value
 * @method sfGuardUser   getSfGuardUser()       Returns the current record's "sfGuardUser" value
 * @method TipoDocumento getTipoDocumento()     Returns the current record's "TipoDocumento" value
 * @method MetodoPaypal  setId()                Sets the current record's "id" value
 * @method MetodoPaypal  setTipoDocumentoId()   Sets the current record's "tipo_documento_id" value
 * @method MetodoPaypal  setNifnie()            Sets the current record's "nifnie" value
 * @method MetodoPaypal  setUserId()            Sets the current record's "user_id" value
 * @method MetodoPaypal  setUsuario()           Sets the current record's "usuario" value
 * @method MetodoPaypal  setSfGuardUser()       Sets the current record's "sfGuardUser" value
 * @method MetodoPaypal  setTipoDocumento()     Sets the current record's "TipoDocumento" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMetodoPaypal extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('metodo_paypal');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('tipo_documento_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('nifnie', 'string', 12, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('user_id', 'integer', 5, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 5,
             ));
        $this->hasColumn('usuario', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 32,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('TipoDocumento', array(
             'local' => 'tipo_documento_id',
             'foreign' => 'id',
             'onUpdate' => 'CASCADE'));
    }
}