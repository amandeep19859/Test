<?php

/**
 * UserProductCaseStudyTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserProductCaseStudyTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object UserProductCaseStudyTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('UserProductCaseStudy');
    }

    /**
     * Fetch user case study records
     * @param String $user_id User Id
     * @return Array
     */
    public function getProductCaseStudy($user_id) {
        //create  product case study query
        $product_case_study_query = Doctrine_Query::create()
                ->select('sgu.id,uccs.id, upcs.name product_name')
                ->from('UserProductCaseStudy upcs')
                ->leftJoin('upcs.User sgu')
                ->where('sgu.id =?', $user_id)
                ->andWhere('upcs.status = 3');

        //return recorsd
        return $product_case_study_query->fetchArray();
    }
    
    /**
     * Join as States EmpresaSectorUno EmpresaSectorDos EmpresaSectorTres Localidad
     * @param type $query
     * @return type 
     */
    public static function doSelectJoinSectors($query) {
        $rootAlias = $query->getRootAlias();
        $query = $query->select($rootAlias . '.*, esu.name')->leftJoin($rootAlias . '.ProductoTipoUno esu');
        $query->select($rootAlias . '.*, esd.name')->leftJoin($rootAlias . '.ProductoTipoDos esd');
        return $query->select($rootAlias . '.*, est.name')->leftJoin($rootAlias . '.ProductoTipoTres est');                
    }

}