<?php

/**
 * AdministrationCajaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdministrationCajaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdministrationCajaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdministrationCaja');
    }
    
    /**
     * retrieve admin email
     * @return String 
     */
    public function getAdminEmail(){
        //get admin email
        $admin_caja_result = Doctrine_Query::create()
                                          ->select('ac.admin_email')
                                          ->from('AdministrationCaja ac')
                                          ->fetchOne();
        return $admin_caja_result['admin_email'];
    }
    
    /**
     * return administration caja record
     * @return Array
     */
    public function getAdministrationCaja(){
      //create administration caja record
      $administration_caja_record = Doctrine_Query::create()
                                       ->from('AdministrationCaja ac') 
                                       ->fetchOne();
      return $administration_caja_record;
    }
}