<?php

/**
 * BaseUserProductCaseStudyRequest
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $status
 * @property string $user_name
 * @property integer $user_id
 * @property string $name
 * @property string $homepage
 * @property string $marca
 * @property string $modelo
 * @property integer $producto_tipo_uno_id
 * @property integer $producto_tipo_dos_id
 * @property integer $producto_tipo_tres_id
 * @property varchar $description
 * @property varchar $summary
 * @property varchar $file1
 * @property varchar $file2
 * @property varchar $file3
 * @property varchar $file4
 * @property varchar $logo
 * @property sfGuardUser $User
 * @property ProductoTipoUno $ProductoTipoUno
 * @property ProductoTipoDos $ProductoTipoDos
 * @property ProductoTipoTres $ProductoTipoTres
 * 
 * @method integer                     getStatus()                Returns the current record's "status" value
 * @method string                      getUserName()              Returns the current record's "user_name" value
 * @method integer                     getUserId()                Returns the current record's "user_id" value
 * @method string                      getName()                  Returns the current record's "name" value
 * @method string                      getHomepage()              Returns the current record's "homepage" value
 * @method string                      getMarca()                 Returns the current record's "marca" value
 * @method string                      getModelo()                Returns the current record's "modelo" value
 * @method integer                     getProductoTipoUnoId()     Returns the current record's "producto_tipo_uno_id" value
 * @method integer                     getProductoTipoDosId()     Returns the current record's "producto_tipo_dos_id" value
 * @method integer                     getProductoTipoTresId()    Returns the current record's "producto_tipo_tres_id" value
 * @method varchar                     getDescription()           Returns the current record's "description" value
 * @method varchar                     getSummary()               Returns the current record's "summary" value
 * @method varchar                     getFile1()                 Returns the current record's "file1" value
 * @method varchar                     getFile2()                 Returns the current record's "file2" value
 * @method varchar                     getFile3()                 Returns the current record's "file3" value
 * @method varchar                     getFile4()                 Returns the current record's "file4" value
 * @method varchar                     getLogo()                  Returns the current record's "logo" value
 * @method sfGuardUser                 getUser()                  Returns the current record's "User" value
 * @method ProductoTipoUno             getProductoTipoUno()       Returns the current record's "ProductoTipoUno" value
 * @method ProductoTipoDos             getProductoTipoDos()       Returns the current record's "ProductoTipoDos" value
 * @method ProductoTipoTres            getProductoTipoTres()      Returns the current record's "ProductoTipoTres" value
 * @method UserProductCaseStudyRequest setStatus()                Sets the current record's "status" value
 * @method UserProductCaseStudyRequest setUserName()              Sets the current record's "user_name" value
 * @method UserProductCaseStudyRequest setUserId()                Sets the current record's "user_id" value
 * @method UserProductCaseStudyRequest setName()                  Sets the current record's "name" value
 * @method UserProductCaseStudyRequest setHomepage()              Sets the current record's "homepage" value
 * @method UserProductCaseStudyRequest setMarca()                 Sets the current record's "marca" value
 * @method UserProductCaseStudyRequest setModelo()                Sets the current record's "modelo" value
 * @method UserProductCaseStudyRequest setProductoTipoUnoId()     Sets the current record's "producto_tipo_uno_id" value
 * @method UserProductCaseStudyRequest setProductoTipoDosId()     Sets the current record's "producto_tipo_dos_id" value
 * @method UserProductCaseStudyRequest setProductoTipoTresId()    Sets the current record's "producto_tipo_tres_id" value
 * @method UserProductCaseStudyRequest setDescription()           Sets the current record's "description" value
 * @method UserProductCaseStudyRequest setSummary()               Sets the current record's "summary" value
 * @method UserProductCaseStudyRequest setFile1()                 Sets the current record's "file1" value
 * @method UserProductCaseStudyRequest setFile2()                 Sets the current record's "file2" value
 * @method UserProductCaseStudyRequest setFile3()                 Sets the current record's "file3" value
 * @method UserProductCaseStudyRequest setFile4()                 Sets the current record's "file4" value
 * @method UserProductCaseStudyRequest setLogo()                  Sets the current record's "logo" value
 * @method UserProductCaseStudyRequest setUser()                  Sets the current record's "User" value
 * @method UserProductCaseStudyRequest setProductoTipoUno()       Sets the current record's "ProductoTipoUno" value
 * @method UserProductCaseStudyRequest setProductoTipoDos()       Sets the current record's "ProductoTipoDos" value
 * @method UserProductCaseStudyRequest setProductoTipoTres()      Sets the current record's "ProductoTipoTres" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserProductCaseStudyRequest extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_product_case_study_request');
        $this->hasColumn('status', 'integer', 5, array(
             'type' => 'integer',
             'default' => 1,
             'length' => 5,
             ));
        $this->hasColumn('user_name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('user_id', 'integer', 7, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 7,
             ));
        $this->hasColumn('name', 'string', 70, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 70,
             ));
        $this->hasColumn('homepage', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('marca', 'string', 100, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('modelo', 'string', 100, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('producto_tipo_uno_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('producto_tipo_dos_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('producto_tipo_tres_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('description', 'varchar', 43000, array(
             'type' => 'varchar',
             'length' => 43000,
             ));
        $this->hasColumn('summary', 'varchar', 8300, array(
             'type' => 'varchar',
             'length' => 8300,
             ));
        $this->hasColumn('file1', 'varchar', 100, array(
             'type' => 'varchar',
             'length' => 100,
             ));
        $this->hasColumn('file2', 'varchar', 100, array(
             'type' => 'varchar',
             'length' => 100,
             ));
        $this->hasColumn('file3', 'varchar', 100, array(
             'type' => 'varchar',
             'length' => 100,
             ));
        $this->hasColumn('file4', 'varchar', 100, array(
             'type' => 'varchar',
             'length' => 100,
             ));
        $this->hasColumn('logo', 'varchar', 100, array(
             'type' => 'varchar',
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('ProductoTipoUno', array(
             'local' => 'producto_tipo_uno_id',
             'foreign' => 'id',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('ProductoTipoDos', array(
             'local' => 'producto_tipo_dos_id',
             'foreign' => 'id',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('ProductoTipoTres', array(
             'local' => 'producto_tipo_tres_id',
             'foreign' => 'id',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}