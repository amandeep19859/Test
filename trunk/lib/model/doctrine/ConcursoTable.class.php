<?php

/**
 * ConcursoTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ConcursoTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object ConcursoTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Concurso');
    }

    /**
     * Método que devuelve el valor en puntos para la medalla en la que
     * se encuentra el concurso
     */
    public function getQueryMedallaGrafica($id) {
        $this->createQuery('a')
                ->where('a.id=?', $id)
                ->leftJoin('a.CuestionarioRespuestaConcurso');
    }

    public function getMefallaGrafica($id) {
        return $this->getQueryMedallaGrafica($id)->execute();
    }

    /**
     * Devuelve los concursos cerrados asociados a la empresa.
     *
     * @param Object object
     * @return Doctrine_Query query
     */
    static public function getConcursosCerradosQuery($object) {

        $estado = ConcursoEstadoTable::getInstance()->findOneByName('Cerrado');
        if ($object instanceof Empresa) {
            $q = self::getInstance()->createquery('q')
                    ->where('q.concurso_estado_id = ? ', $estado->getId())
                    ->andWhere('q.empresa_id = ?', $object->getId());
        } elseif ($object instanceof Producto) {
            $q = self::getInstance()->createquery('q')
                    ->where('q.concurso_estado_id = ? ', $estado->getId())
                    ->andWhere('q.producto_id = ?', $object->getId());
        }
        return $q;
    }

    /**
     * Devuelve los concursos cerrados asociados a la empresa.
     *
     * @param mixed object
     * @return Doctrine_Query query
     */
    static public function getConcursosRechazadosQuery($object) {

        $estado = ConcursoEstadoTable::getInstance()->findOneByName('Rechazado');
        $q = self::getInstance()->createquery('q')
                ->where('q.concurso_estado_id = ? ', $estado->getId())
        ;

        if ($object instanceof Empresa) {
            $q->andWhere('q.empresa_id = ?', $object->getId());
        } elseif ($object instanceof Producto) {
            $q->andWhere('q.producto_id = ?', $object->getId());
        }

        return $q;
    }

    static public function mailFinConcursoEmpresa3Dias() {
        $concursos = self::getInstance()->createquery('q')
                ->where('q.concurso_tipo_id=1')
                ->andWhere('CURDATE() = DATE_ADD(q.fecha_activacion,INTERVAL 87 DAY)'); // Un concurso está activo 90 días
        foreach ($concursos->execute() as $concurso) {
            foreach ($concurso->getContribuciones() as $contribucion) {
                $body = sprintf("
                    <div style=\"padding:15px; color:#333; font-family:Arial,Verdana; font-size:12px; width:764px; margin:auto;\">
                    Hola <strong>%s</strong>:<br /><br /><br /><br />
                    Te informamos de que el concurso <strong>%s</strong>, creado para <strong>%s</strong> en la localidad de <strong>%s</strong> y en la categoría de %s, <strong>finaliza en el plazo de 3 días</strong>.<br /><br />
                    Nos gustaría recordarte que, si deseas volver a contribuir en este concurso con una nueva contribución, <strong>¡se te acaba el tiempo!</strong><br /><br />
                    Igualmente, queremos <strong>animarte a participar en el Referéndum</strong>, que comienza al finalizar el mismo, para elegir las mejores contribuciones, con lo que puedes ganar <strong>50 puntos</strong> para canjear por tus regalos favoritos.<br /><br />
                    ¡Muchas gracias por contribuir!
                    </div>
                ", $contribucion->getUser()->getUsername(), $concurso->getName(), $concurso->getEmpresa()->getName(), $concurso->getCityandState(), $concurso->getConcursoCategoria()->getName());

                return sfContext::getInstance()->getMailer()->composeAndSend(
                                sfConfig::get('app_default_mailfrom'), $contribucion->getUser()->getEmailAddress(), 'Notificación de fin de concurso en 3 días', $body
                );
            }
        }
    }

    static public function mailFinConcursoProducto3Dias() {
        $concursos = self::getInstance()->createquery('q')
                ->where('q.concurso_tipo_id=2')
                ->andWhere('CURDATE() = DATE_ADD(q.fecha_activacion,INTERVAL 87 DAY)'); // Un concurso está activo 90 días
        foreach ($concursos->execute() as $concurso) {
            foreach ($concurso->getContribuciones() as $contribucion) {
                $body = sprintf("
                    <div style=\"padding:15px; color:#333; font-family:Arial,Verdana; font-size:12px; width:764px; margin:auto;\">
                    Hola <strong>%s</strong>:<br /><br /><br /><br />
                    Te informamos de que el concurso <strong>%s</strong>, creado para <strong>%s</strong> en la localidad de <strong>%s</strong> en la categoría de %s, <strong>finaliza en el plazo de 3 días</strong>.<br /><br />
                    Nos gustaría recordarte que, si deseas volver a contribuir en este concurso con una nueva contribución, <strong>¡se te acaba el tiempo!</strong><br /><br />
                    Igualmente, queremos <strong>animarte a participar en el Referéndum</strong>, que comienza al finalizar el mismo, para elegir las mejores contribuciones, con lo que puedes ganar <strong>50 puntos</strong> para canjear por tus regalos favoritos.<br /><br />
                    ¡Muchas gracias por contribuir!
                    </div>
                ", $contribucion->getUser()->getUsername(), $concurso->getName(), $concurso->getProducto()->getName() . ' (' . $concurso->getProducto()->getMarca() . ')', $concurso->getCityandState(), $concurso->getConcursoCategoria()->getName());

                return sfContext::getInstance()->getMailer()->composeAndSend(
                                sfConfig::get('app_default_mailfrom'), $contribucion->getUser()->getEmailAddress(), 'Notificación de fin de concurso en 3 días', $body
                );
            }
        }
    }

    static public function mailFinReferendumConcursoEmpresa2Dias() {
        $concursos = self::getInstance()->createquery('q')
                ->where('q.concurso_tipo_id=1')
                ->andWhere('CURDATE() = DATE_ADD(q.fecha_referendum,INTERVAL 5 DAY)'); // Un concurso está en referendum 7 días
        foreach ($concursos->execute() as $concurso) {
            $users = Doctrine::getTable('sfGuardUser')->createQuery()->where('id NOT IN (SELECT cr.user_id FROM ConcursoReferendum cr where cr.concurso_id=\'' . $concurso->id . '\')');
            foreach ($users->execute() as $user) {
                $body = sprintf("
                    <div style=\"padding:15px; color:#333; font-family:Arial,Verdana; font-size:12px; width:764px; margin:auto;\">
                    Hola <strong>%s</strong>:<br /><br /><br /><br />
                    Te informamos de que el Referéndum perteneciente al concurso <strong>%s</strong>, creado para <strong>%s</strong> en la localidad de <strong>%s</strong> y en la categoría de %s, <strong>finaliza en un plazo de 2 días y todavía no has votado</strong>.<br /><br />
                    Nos gustaría recordarte que, con tu votación, puedes elegir las contribuciones de más valor para la empresa o entidad en concurso y con las que puedes participar en beneficio.<br /><br />
                    Además, sólo por votar <strong>te recompensamos con 50 puntos</strong> para canjear por tus regalos favoritos.<br /><br />
                    <span style=\"font-weight:bold;font-size:14px;\">¡Vota ahora!</span><br /><br />
                    Muchas gracias por tu interés
                    </div>
                ", $user->getUsername(), $concurso->getName(), $concurso->getEmpresa()->getName(), $concurso->getCityandState(), $concurso->getConcursoCategoria()->getName());

                return sfContext::getInstance()->getMailer()->composeAndSend(
                                sfConfig::get('app_default_mailfrom'), $user->getEmailAddress(), 'Notificación de fin del Referéndum de concurso en 2 días', $body
                );
            }
        }
    }

    static public function mailFinReferendumConcursoProducto2Dias() {
        $concursos = self::getInstance()->createquery('q')
                ->where('q.concurso_tipo_id=2')
                ->andWhere('CURDATE() = DATE_ADD(q.fecha_referendum,INTERVAL 5 DAY)'); // Un concurso está en referendum 7 días
        foreach ($concursos->execute() as $concurso) {
            $users = Doctrine::getTable('sfGuardUser')->createQuery()->where('id NOT IN (SELECT cr.user_id FROM ConcursoReferendum cr where cr.concurso_id=\'' . $concurso->id . '\')');
            foreach ($users->execute() as $user) {
                $body = sprintf("
                    <div style=\"padding:15px; color:#333; font-family:Arial,Verdana; font-size:12px; width:764px; margin:auto;\">
                    Hola <strong>%s</strong>:<br /><br /><br /><br />
                    Te informamos de que el Referéndum perteneciente al concurso <strong>%s</strong>, creado para <strong>%s</strong> en la localidad de <strong>%s</strong> y en la categoría de %s, <strong>finaliza en un plazo de 2 días y todavía no has votado</strong>.<br /><br />
                    Nos gustaría recordarte que, con tu votación, puedes elegir las contribuciones de más valor para la empresa o entidad en concurso y con las que puedes participar en beneficio.<br /><br />
                    Además, sólo por votar <strong>te recompensamos con 50 puntos</strong> para canjear por tus regalos favoritos.<br /><br />
                    <span style=\"font-weight:bold;font-size:14px;\">¡Vota ahora!</span><br /><br />
                    Muchas gracias por tu interés
                    </div>
                ", $user->getUsername(), $concurso->getName(), $concurso->getProducto()->getName() . ' (' . $concurso->getProducto()->getMarca() . ')', $concurso->getCityandState(), $concurso->getConcursoCategoria()->getName());

                return sfContext::getInstance()->getMailer()->composeAndSend(
                                sfConfig::get('app_default_mailfrom'), $user->getEmailAddress(), 'Notificación de fin del Referéndum de producto en 2 días', $body
                );
            }
        }
    }

    /**
     * method returns user's all created contest records
     * @param String $user_id Guard User Id
     * @return Array
     */
    public function getAllContestByUser($user_id) {
        $conetst_status_array = array(
            Concurso::CONTEST_STATUS_ACTIVE,
            Concurso::CONTEST_STATUS_REFERENDUM,
            Concurso::CONTEST_STATUS_DELIBERATION,
            Concurso::CONTEST_STATUS_OBSERVATION,
            Concurso::CONTEST_STATUS_REVISED,
            Concurso::CONTEST_STATUS_REJECTED,
            Concurso::CONTEST_STATUS_CLOSDE);
        // create user's contest query
        $users_all_contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->where("c.user_id=?", $user_id)
                ->andWhereIn('ce.name', $conetst_status_array)
                ->orderBy('c.created_at DESC');
        //return user's contest result
        return $users_all_contest_query->execute();
    }

    /**
     * fetch contest records for contribution made by given user
     * @param type $user_id User Id
     * @param type $contest_status_array Contest Status Array
     * @param type $contest_type_array Contest Type Array
     * @return Doctrine_Query
     */
    public function contributionByContributor($user_id, $contest_status_array, $contest_type_array, $contribution_status_array) {

        //get tipo records
        $tipo_records = Doctrine::getTable('ConcursoTipo')->getTipoId();

        //create contribution query
        $concurso_reocrds_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->leftJoin('c.Contribuciones cn')
                ->leftJoin('cn.ContribucionEstado cne')
                ->leftJoin('c.ConcursoTipo ct')
                ->andWhere('cn.user_id =?', $user_id)
                ->andWhere('cn.principal=0')
                ->andWhereIn('ce.name', $contest_status_array)
                ->andWhereIn('ct.name', $contest_type_array)
                ->andWhereIn('cne.name', $contribution_status_array)
                ->orderBy('c.created_at DESC')
                ->groupBy('c.id');
        //get concurso records
        return $concurso_reocrds_query;
    }

    /**
     * fetch count for contribution records for contribution made by given user
     * @param type $user_id User Id
     * @param type $contest_status_array Contest Status Array
     * @param type $contest_type_array Contest Type Array
     * @return Doctrine_Query
     */
    public function getContributionCountByContributor($user_id, $contest_status_array, $contest_type_array, $contribution_status_array) {

        //get tipo records
        $tipo_records = Doctrine::getTable('ConcursoTipo')->getTipoId();

        //create contribution query
        $concurso_reocrds_query = Doctrine_Query::create()
                ->select('count(cn.id) contribution_count')
                ->from('Contribucion cn')
                ->leftJoin('cn.Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->leftJoin('cn.ContribucionEstado cne')
                ->leftJoin('c.ConcursoTipo ct')
                ->andWhere('cn.user_id =?', $user_id)
                ->andWhere('cn.principal=0')
                ->andWhereIn('ce.name', $contest_status_array)
                ->andWhereIn('ct.name', $contest_type_array)
                ->andWhereIn('cne.name', $contribution_status_array);

        //get concurso records
        return $concurso_reocrds_query->fetchOne();
    }

    /**
     * fetch query object for draft contest created by given user
     * @param String $user_id User id
     * @param Array $contest_status_array Contest Status Array records
     * @return Doctrine_Query object
     */
    public function getDraftContest($user_id, $contest_status_array) {
        //create draft contest query
        $draft_contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->where('c.user_id =?', $user_id)
                ->andWhereIn('ce.name', $contest_status_array)
                ->orderBy('c.created_at DESC');
        //return draft contest query
        return $draft_contest_query;
    }

    /**
     * fetch contest contributed by given user
     * @param type $user_id User Id
     * @param type $contest_status_array Contest Status Array
     * @param type $contribution_status_array Contribution Status Array
     * @return Doctrine_Query object
     */
    public function getDraftContributedContest($user_id, $contest_status_array, $contribution_status_array) {
        //create draft contributed contest query
        $draft_contributed_contest_query = Doctrine_Query::create()
                ->select('c.*,cn.id contribution_id')
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->leftJoin('c.Contribuciones cn')
                ->leftJoin('cn.ContribucionEstado cne')
                ->where('cn.user_id =?', $user_id)
                ->andWhereIn('ce.name', $contest_status_array)
                ->andWhereIn('cne.name', $contribution_status_array)
                ->orderBy('c.created_at DESC');
        //return draft contest query
        return $draft_contributed_contest_query;
    }

    /**
     * fetch query object for draft contest created by given user
     * @param String $user_id User id
     * @param Array $contest_type_array Contest Type Array records
     * @return Doctrine_Query object
     */
    public function getContestByUser($user_id, $contest_status_array, $contest_type_array = null) {
        //create contest query
        $contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->where('c.user_id =?', $user_id)
                ->andWhereIn('ce.name', $contest_status_array)
                ->orderBy('c.created_at DESC');
        if (isset($contest_type_array)) {
            $contest_query->leftJoin('c.ConcursoTipo ct')
                    ->andWhereIn('ct.name', $contest_type_array);
        }
        //return draft contest query
        return $contest_query;
    }

    /**
     * fetch query object for draft contest created by given user
     * @param String $user_id User id
     * @param Array $contest_type_array Contest Type Array records
     * @param Array $contribution_status_array Contribution Status Array
     * @return Doctrine_Query object
     */
    public function getReferendumContestByUser($user_id, $contest_status_array, $contest_type_array, $contribution_status_array) {
        //create contest query
        $contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->leftJoin('c.ConcursoTipo ct')
                ->leftJoin('c.Contribuciones cn')
                ->leftJoin('cn.ContribucionEstado cne')
                ->where('(c.user_id = ' . $user_id . ' OR cn.user_id =' . $user_id . ')')
                ->andWhereIn('ce.name', $contest_status_array)
                ->andWhereIn('ct.name', $contest_type_array)
                ->orderBy('c.created_at DESC');

        //return draft contest query
        return $contest_query;
    }

    /**
     * fetch query object for draft contest created by given user
     * @param String $user_id User id
     * @param Array $contest_type_array Contest Type Array records
     * @return Doctrine_Query object
     */
    public function getVotedContestByUser($user_id, $contest_status_array, $contest_type_array) {
        //create contest query
        $contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->leftJoin('c.ConcursoTipo ct')
                ->leftJoin('c.Contribuciones cn')
                ->leftJoin('cn.ContribucionEstado cne')
                ->leftJoin('c.ConcursoReferendum cr')
                ->where('cr.user_id =?', $user_id)
                ->andWhereIn('ce.name', $contest_status_array)
                ->andWhereIn('ct.name', $contest_type_array)
                ->orderBy('c.created_at DESC');

        //return draft contest query
        return $contest_query;
    }

    /**
     * get favourit contest records
     * @param string $user_id User Id
     * @param Array $contest_status_array Contest Status Array
     * @param String $contest_type Contest Type
     * @param Array $contest_type_array Contest Type Array
     * @return Doctrine_Query
     */
    public function getFavouritContest($user_id, $contest_status_array, $contest_type = 'company', $contest_type_array = null) {
        //create contest query
        $contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoEstado ce')
                ->whereIn('ce.name', $contest_status_array);

        //if contest is for company
        if ($contest_type == 'company') {
            $contest_query->leftJoin('c.ComapnyContestFavouriteList cfl')
                    ->andWhere('cfl.user_id =?', $user_id)
                    ->orderBy('cfl.created_at DESC');
        }
        //if contest is for product
        else {
            $contest_query->leftJoin('c.ProductContestFavouriteList pfl')
                    ->andWhere('pfl.user_id =?', $user_id)
                    ->orderBy('pfl.created_at DESC');
        }
        if (isset($contest_type_array)) {
            $contest_query->leftJoin('c.ConcursoTipo ct')
                    ->andWhereIn('ct.name', $contest_type_array);
        }
        //return draft contest query
        return $contest_query;
    }

    /**
     * fetch featured contest by given contest type
     * for home page
     * @param String $contest_type Contest Type
     * @return Array
     */
    public function getFeatureContestRecords($contest_type) {
        //create featured contest records query
        $featured_contest_record_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.ConcursoTipo ct')
                ->where('ct.name =?', $contest_type)
                ->andWhere('c.featured = 1')
                ->andWhere('c.concurso_estado_id = 2')
                ->orderBy('c.featured_order ASC, c.created_at DESC')
                ->limit(10);
        //fetch records
        $featured_contest_record = $featured_contest_record_query->execute();
        //return records
        return $featured_contest_record;
    }

    /**
     * Fetch the company contest from give parameters
     * @param String $company_name Company name for contest
     * @param String $location Contest Location
     * @param String $title Contest Title
     * @param String $date Contest creation date
     * @return Array
     */
    public function getCompanyContestByParameters($company_name, $location, $title, $date) {

        //create contest query
        $company_contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.Empresa e')
                ->where('e.slug =?', $company_name)
                ->andWhere('c.slug =?', $title)
                ->andWhere('c.created_at <="' . $date . '" OR c.created_at >="' . $date . '"');
        //fetch company contest
        $company_contest_record = $company_contest_query->fetchOne();

        return $company_contest_record;
    }

    /**
     * Fetch the company contest from give parameters
     * @param String $product_name Product name for contest
     * @param String $brand Contest Location
     * @param String $title Contest Title
     * @param String $date Contest creation date
     * @return Array
     */
    public function getProductContestByParameters($product_name, $brand, $title, $date) {
        //create contest query
        $company_contest_query = Doctrine_Query::create()
                ->from('Concurso c')
                ->leftJoin('c.Producto p')
                ->where('p.slug =?', $product_name)
                ->andWhere('c.slug =?', $title)
                ->andWhere('c.created_at <="' . $date . '" OR c.created_at >="' . $date . '"');
        //fetch company contest
        $company_contest_record = $company_contest_query->fetchOne();

        return $company_contest_record;
    }

    /**
     * Fetch the contest featured limit
     * It will help Admin to publish contest on home page
     * if contest featured limit is not more than 10
     * @param $contest_type Contest Type (company or product)
     * @return Array
     */
    public function getFeatreudLimit($contest_type = null) {
        //create contest featured limit query
        $contest_feature_limit_query = Doctrine_Query::create()
                ->select('COUNT(c.id) contest_limit')
                ->from('Concurso c')
                ->where('c.featured = 1');
        //set where clause
        if ($contest_type) {
            if ($contest_type == 'company') {
                $contest_feature_limit_query->andWhere('c.empresa_id IS NOT NULL');
            } else {
                $contest_feature_limit_query->andWhere('c.producto_id IS NOT NULL');
            }
        }
        //fetch limit
        return $contest_feature_limit_query->fetchArray();
    }
}