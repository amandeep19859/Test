<?php

/**
 * BasePizarraSectionMapping
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $pizarra_id
 * @property integer $pizarra_section_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Pizarra $Pizarra
 * @property PizarraSection $PizarraSection
 * 
 * @method integer               getPizarraId()          Returns the current record's "pizarra_id" value
 * @method integer               getPizarraSectionId()   Returns the current record's "pizarra_section_id" value
 * @method timestamp             getCreatedAt()          Returns the current record's "created_at" value
 * @method timestamp             getUpdatedAt()          Returns the current record's "updated_at" value
 * @method Pizarra               getPizarra()            Returns the current record's "Pizarra" value
 * @method PizarraSection        getPizarraSection()     Returns the current record's "PizarraSection" value
 * @method PizarraSectionMapping setPizarraId()          Sets the current record's "pizarra_id" value
 * @method PizarraSectionMapping setPizarraSectionId()   Sets the current record's "pizarra_section_id" value
 * @method PizarraSectionMapping setCreatedAt()          Sets the current record's "created_at" value
 * @method PizarraSectionMapping setUpdatedAt()          Sets the current record's "updated_at" value
 * @method PizarraSectionMapping setPizarra()            Sets the current record's "Pizarra" value
 * @method PizarraSectionMapping setPizarraSection()     Sets the current record's "PizarraSection" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePizarraSectionMapping extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pizarra_section_mapping');
        $this->hasColumn('pizarra_id', 'integer', 7, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 7,
             ));
        $this->hasColumn('pizarra_section_id', 'integer', 70, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 70,
             ));
        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pizarra', array(
             'local' => 'pizarra_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('PizarraSection', array(
             'local' => 'pizarra_section_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}