<?php

/**
 * ProductContestFavouriteListTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProductContestFavouriteListTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProductContestFavouriteListTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProductContestFavouriteList');
    }
    
    /**
     * fetch favourit contest record
     * @param String $user_id User Id
     * @param String $contest_id Contest Id
     * @return Record
     */
    public function getRecordByUserAndId($user_id, $contest_id){
      //create favourit query
      $favourit_query = Doctrine_Query::create()
                        ->from('ProductContestFavouriteList ccl')
                        ->where('ccl.user_id =?', $user_id)
                        ->andWhere('ccl.contest_id =?', $contest_id);
      //return favourit record
      return $favourit_query->fetchOne();
                
    }
}