<?php

/**
 * ColaboradorPuntosHistorico
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ColaboradorPuntosHistorico extends BaseColaboradorPuntosHistorico
{
	public function getObjetoPorId()
	{
		if(($this->getObjeto()) && ($this->getObjetoId())){
			if($obj = Doctrine::getTable($this->getObjeto())->findOneBy('id', $this->getObjetoId()))
				return $obj->getName().' ('.$this->getObjeto().')';
		}				
	}
	
	public function getUser()
	{
		return $this->getSfGuardUser()->getUsername();
	}
  
  /**
   * Create Hierarchy history object by given user id and hierarchy history
   * parameters
   * @param String $user_id User Id
   * @param Object $hierarchy Hierarchy History
   */
  public function create($user_id, $hierarchy){
    //set hierarchy attributs
      $this->setUserId($user_id);
      //$this->setDescripcion('Asignación manual a ' . $hierarchy->getName());
      $this->setDescripcion($hierarchy);
      //insert record into db
      $this->save();
  }
}
