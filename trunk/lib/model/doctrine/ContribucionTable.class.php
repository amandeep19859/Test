<?php

/**
 * ContribucionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ContribucionTable extends Doctrine_Table {

    //static $tipos_concursos=array(0=>"Producto", 1=>"Empresa/Entidad");
    static $tipos_concursos = array(2 => "Producto", 1 => "Empresa/Entidad");

    /**
     * Returns an instance of this class.
     *
     * @return object ContribucionTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Contribucion');
    }

    /**
     * method returns user's all created contest records
     * @param String $user_id Guard User Id
     * @return Array
     */
    public function getAllContributionByUser($user_id) {
        $contribution_status_array = array(Contribucion::CONTRIBUTION_STATUS_ACTIVE);
        //create user's contribution query
        $users_all_contribution_query = Doctrine_Query::create()
                ->select('c.id,co.id concurso_id,c.name')
                ->from('Contribucion c')
                ->leftJoin('c.Concurso co')
                ->leftJoin('c.ContribucionEstado cne')
                ->where("c.user_id=?", $user_id)
                ->andWhereIn('cne.name ', $contribution_status_array)
                ->andWhere('c.principal=0')
                ->orderBy('c.created_at DESC');
        //return user's contribution results                                          
        return $users_all_contribution_query->execute();
    }

    public static function doSelectJoinUser($query) {
        $rootAlias = $query->getRootAlias();
        return $query = $query->select($rootAlias . '.*, sgu.username')->leftJoin($rootAlias . '.sfGuardUser sgu');
    }

    public static function doSelectJoinSector($query) {
        $rootAlias = $query->getRootAlias();
        $query = $query->select($rootAlias . '.*, esu.name')->leftJoin($rootAlias . '.EmpresaSectorUno esu');
        $query->select($rootAlias . '.*, esd.name')->leftJoin($rootAlias . '.EmpresaSectorDos esd');
        return $query->select($rootAlias . '.*, est.name')->leftJoin($rootAlias . '.EmpresaSectorTres est');
    }

    public static function doSelectJoinCuncurso($query) {
        $rootAlias = $query->getRootAlias();
        return $query->select($rootAlias . '.*, c.name')->leftJoin($rootAlias . '.Concurso c');
    }

    /**
     * fetch user contribution to given contest
     * @param String $concurso_id Concurso Id
     * @param String $user_id User Id
     * @return Object
     */
    public function getContributionByConcurso($concurso_id, $user_id, $contribution_status_array) {
        $contribution_query = Doctrine_Query::create()
                ->from('Contribucion c')
                ->leftJoin('c.ContribucionEstado cne')
                ->where("c.user_id=?", $user_id)
                ->andWhere('c.concurso_id =?', $concurso_id)
                ->andWhere('c.principal=0')
                ->andWhereIn('cne.name ', $contribution_status_array)
                ->andWhere('cne.id = c.contribucion_estado_id')
                ->orderBy('c.created_at DESC');
        //return user's contribution results                                          
        return $contribution_query->execute();
    }

    /**
     * fetch user contribution count to given contest
     * @param String $concurso_id Concurso Id
     * @param String $user_id User Id
     * @return Array
     */
    public function getContributionCountByConcurso($concurso_id, $user_id, $contribution_status_array) {

        $contribution_query = Doctrine_Query::create()
                ->select('COUNT(c.id) c_count')
                ->from('Contribucion c')
                ->leftJoin('c.ContribucionEstado cne')
                ->where("c.user_id=?", $user_id)
                ->andWhere('c.concurso_id =?', $concurso_id)
                ->andWhere('c.principal=0')
                ->andWhereIn('cne.name', $contribution_status_array)
                ->andWhere('cne.id = c.contribucion_estado_id')
                ->orderBy('c.created_at DESC');
        //return user's contribution results                                          
        return $contribution_query->fetchArray();
    }

}