<?php

/**
 * AdministrationEmailsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdministrationEmailsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdministrationEmailsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdministrationEmails');
    }
    
    /**
     * Fetch Administration Emails
     * @return Array
     */
    public function getEmails(){
      //create administration emails query
      $administration_emails_query = Doctrine_Query::create()
                                        ->select('ae.email')
                                        ->from('AdministrationEmails ae');
      //fetch record
      $administration_emails_records = $administration_emails_query->fetchArray();
      $administration_emails_array = array();
      foreach($administration_emails_records as $index => $administration_emails_record){
        $administration_emails_array[] = $administration_emails_record['email'];
      }
      return $administration_emails_array;
    }
    
    /**
     * Fetch record count for administration emails table
     * @return Doctrine Record
     */
    public function getRecordCount(){
      //create administration emails query
      $administration_emails_query = Doctrine_Query::create()
                                        ->select('COUNT(ae.id) cout_value')
                                        ->from('AdministrationEmails ae');
      return $administration_emails_query->fetchOne();
    }
}