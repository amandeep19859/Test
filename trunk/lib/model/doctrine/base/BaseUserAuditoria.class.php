<?php

/**
 * BaseUserAuditoria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sf_guard_user_id
 * @property string $tipo
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer       getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method string        getTipo()             Returns the current record's "tipo" value
 * @method sfGuardUser   getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method UserAuditoria setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method UserAuditoria setTipo()             Sets the current record's "tipo" value
 * @method UserAuditoria setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserAuditoria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_auditoria');
        $this->hasColumn('sf_guard_user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('tipo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}