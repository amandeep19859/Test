<?php

/**
 * BaseUsersOnlineYesterday
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property date $logged_in
 * @property sfGuardUser $User
 * 
 * @method integer              getUserId()    Returns the current record's "user_id" value
 * @method date                 getLoggedIn()  Returns the current record's "logged_in" value
 * @method sfGuardUser          getUser()      Returns the current record's "User" value
 * @method UsersOnlineYesterday setUserId()    Sets the current record's "user_id" value
 * @method UsersOnlineYesterday setLoggedIn()  Sets the current record's "logged_in" value
 * @method UsersOnlineYesterday setUser()      Sets the current record's "User" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsersOnlineYesterday extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('users_online_yesterday');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('logged_in', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}