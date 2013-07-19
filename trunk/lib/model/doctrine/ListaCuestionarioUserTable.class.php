<?php

/**
 * ListaCuestionarioUserTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ListaCuestionarioUserTable extends Doctrine_Table {

  /**
   * Returns an instance of this class.
   *
   * @return object ListaCuestionarioUserTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('ListaCuestionarioUser');
  }

  /**
   * Un usuario puede auditar si han transcurrido 30 días desde la última vez o bien si no ha auditado esta empresa y
   * si no ha auditado 5 veces el mismo día
   *
   * @param sfGuardUser $user
   * @return boolean
   *
   */
  public function puedeAuditarEmpresa(Empresa $empresa, sfGuardUser $user) {

    $interval = DateInterval::createFromDateString(sfConfig::get('app_auditorias_intervaloRepeticion', '30 Days'));
    $date = new DateTime();
    $q = $this->createQuery('q')
            ->where('q.user_id = ?', $user->getId())
            ->andWhere('q.empresa_id = ?', $empresa->getId())
            ->andWhere('q.created_at > ?', $date->sub($interval)->format('Y-m-d H:i:s'));
    return !(boolean) $q->count();
  }

  public function getAuditoriaAnterior(Empresa $empresa, sfGuardUser $user) {
    $q = $this->createQuery('q')
            ->where('q.user_id = ?', $user->getId())
            ->andWhere('q.empresa_id = ?', $empresa->getId());

    return $q->fetchOne();
  }

  public function findByUserAndEmpresa($user_id, $empresa_id) {
    $q = $this->createQuery('q')
            ->where('q.user_id = ?', $user_id)
            ->andWhere('q.empresa_id = ?', $empresa_id)
            ->andWhere('q.disabled = ?', false)
            ->andWhere('q.aprobado = ?', true);

    return $q->fetchOne();
  }

  public function findByUserAndProducto($user_id, $producto_id) {
    $q = $this->createQuery('q')
            ->where('q.user_id = ?', $user_id)
            ->andWhere('q.producto_id = ?', $producto_id)
            ->andWhere('q.disabled = ?', false)
            ->andWhere('q.aprobado = ?', true);



    return $q->fetchOne();
  }

  /**
   * Un usuario puede auditar si han transcurrido 30 días desde la última vez o bien si no ha auditado esta empresa y
   * si no ha auditado 5 veces el mismo día
   *
   * @param sfGuardUser $user
   * @return boolean
   *
   */
  public function puedeAuditarProducto(Producto $producto, sfGuardUser $user) {

    $interval = DateInterval::createFromDateString(sfConfig::get('app_auditorias_intervaloRepeticion', '30 Days'));
    $date = new DateTime();
    $q = $this->createQuery('q')
            ->where('q.user_id = ?', $user->getId())
            ->andWhere('q.producto_id = ?', $producto->getId())
            ->andWhere('q.created_at > ?', $date->sub($interval)->format('Y-m-d H:i:s'));
    return !(boolean) $q->count();
  }

  /**
   * Devuelve los cuestionarios pendientes de moderar
   *
   */
  public function getPendientes() {
    return $this->getPendientesQuery()->execute();
  }

  public function getPendientesQuery() {
    $q = $this->createQuery('q')
            ->where('q.aprobado = false')
            ->orderBy('q.created_at desc');

    return $q;
  }

  /**
   * Recupera el cuestionario anterior a ID en estado disabled
   * @param $id
   */
  public function getLastCuestionarioDisabled($oldCuestionario) {
    $q = $this->createQuery('q')
            ->addWhere('q.disabled = ? ', true)
            ->addWhere('q.user_id = ?', $oldCuestionario->getUserId());

    if ($oldCuestionario->getEmpresaId()) {
      $q->addWhere('q.empresa_id = ?', $oldCuestionario->getEmpresaId());
    } else {
      $q->addWhere('q.producto_id = ?', $oldCuestionario->getProductoId());
    }

    $q->addWhere('q.id < ?', $oldCuestionario->getId())
            ->orderBy('q.id DESC');

    return $q->fetchOne();
  }

  /**
   * fetch record by comapny id
   * @param String $company_id Company Id
   * @return Object
   */
  public function findByCompany($company_id) {
    //create find by company query
    $find_by_company_query = Doctrine_Query::create()
            ->from('ListaCuestionarioUser lc')
            ->where('lc.empresa_id =?', $company_id);
    return $find_by_company_query->fetchOne();
  }

  /**
   * fetch Audit records for user id
   * @param String $user_id User Id
   * @return Reocrds
   */
  public function getUserAuditRecords($user_id) {
    //create audit query
    $audit_query = Doctrine_Query::create()
            ->select('cr.id,e.name company_name,p.name product_name,e.slug company_slug, p.slug product_slug, cr.created_at created_date')
            ->from('ListaCuestionarioUser cr')
            ->leftJoin('cr.Empresa e')
            ->leftJoin('cr.Producto p')
            ->where('cr.user_id =?', $user_id)
            ->andWhere('cr.aprobado = 1')
            ->orderby('cr.created_at DESC');

    //retrun audit query
    return $audit_query->fetchArray();
  }

}