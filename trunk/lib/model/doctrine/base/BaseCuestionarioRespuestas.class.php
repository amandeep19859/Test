<?php

/**
 * BaseCuestionarioRespuestas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $respuesta1
 * @property integer $respuesta2
 * @property integer $respuesta3
 * @property integer $respuesta4
 * @property integer $respuesta5
 * @property integer $respuesta6
 * @property integer $respuesta7
 * @property integer $respuesta8
 * @property integer $respuesta9
 * @property integer $respuesta10
 * @property integer $respuesta11
 * @property integer $respuesta12
 * @property clob $respuesta13
 * @property integer $total
 * @property integer $cuestionario_id
 * @property integer $concurso_id
 * @property Concurso $Concurso
 * 
 * @method integer                getRespuesta1()      Returns the current record's "respuesta1" value
 * @method integer                getRespuesta2()      Returns the current record's "respuesta2" value
 * @method integer                getRespuesta3()      Returns the current record's "respuesta3" value
 * @method integer                getRespuesta4()      Returns the current record's "respuesta4" value
 * @method integer                getRespuesta5()      Returns the current record's "respuesta5" value
 * @method integer                getRespuesta6()      Returns the current record's "respuesta6" value
 * @method integer                getRespuesta7()      Returns the current record's "respuesta7" value
 * @method integer                getRespuesta8()      Returns the current record's "respuesta8" value
 * @method integer                getRespuesta9()      Returns the current record's "respuesta9" value
 * @method integer                getRespuesta10()     Returns the current record's "respuesta10" value
 * @method integer                getRespuesta11()     Returns the current record's "respuesta11" value
 * @method integer                getRespuesta12()     Returns the current record's "respuesta12" value
 * @method clob                   getRespuesta13()     Returns the current record's "respuesta13" value
 * @method integer                getTotal()           Returns the current record's "total" value
 * @method integer                getCuestionarioId()  Returns the current record's "cuestionario_id" value
 * @method integer                getConcursoId()      Returns the current record's "concurso_id" value
 * @method Concurso               getConcurso()        Returns the current record's "Concurso" value
 * @method CuestionarioRespuestas setRespuesta1()      Sets the current record's "respuesta1" value
 * @method CuestionarioRespuestas setRespuesta2()      Sets the current record's "respuesta2" value
 * @method CuestionarioRespuestas setRespuesta3()      Sets the current record's "respuesta3" value
 * @method CuestionarioRespuestas setRespuesta4()      Sets the current record's "respuesta4" value
 * @method CuestionarioRespuestas setRespuesta5()      Sets the current record's "respuesta5" value
 * @method CuestionarioRespuestas setRespuesta6()      Sets the current record's "respuesta6" value
 * @method CuestionarioRespuestas setRespuesta7()      Sets the current record's "respuesta7" value
 * @method CuestionarioRespuestas setRespuesta8()      Sets the current record's "respuesta8" value
 * @method CuestionarioRespuestas setRespuesta9()      Sets the current record's "respuesta9" value
 * @method CuestionarioRespuestas setRespuesta10()     Sets the current record's "respuesta10" value
 * @method CuestionarioRespuestas setRespuesta11()     Sets the current record's "respuesta11" value
 * @method CuestionarioRespuestas setRespuesta12()     Sets the current record's "respuesta12" value
 * @method CuestionarioRespuestas setRespuesta13()     Sets the current record's "respuesta13" value
 * @method CuestionarioRespuestas setTotal()           Sets the current record's "total" value
 * @method CuestionarioRespuestas setCuestionarioId()  Sets the current record's "cuestionario_id" value
 * @method CuestionarioRespuestas setConcursoId()      Sets the current record's "concurso_id" value
 * @method CuestionarioRespuestas setConcurso()        Sets the current record's "Concurso" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCuestionarioRespuestas extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cuestionario_respuestas');
        $this->hasColumn('respuesta1', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta2', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta3', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta4', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta5', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta6', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta7', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta8', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta9', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta10', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta11', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta12', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('respuesta13', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('total', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('cuestionario_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('concurso_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Concurso', array(
             'local' => 'concurso_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable();
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}