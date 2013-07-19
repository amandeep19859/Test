<?php

/**
 * BaseRank
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $value
 * 
 * @method string  getName()  Returns the current record's "name" value
 * @method integer getValue() Returns the current record's "value" value
 * @method Rank    setName()  Sets the current record's "name" value
 * @method Rank    setValue() Sets the current record's "value" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRank extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rank');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('value', 'integer', 3, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 3,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}