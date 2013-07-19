<?php

/**
 * KpiTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class KpiTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object KpiTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Kpi');
    }

    public function getAutocomplete($string, $tipo = 'empresa', $id, $limit = 10) {
        // $cuestionario = Doctrine_Core::getTable('ListaCuestionario')->find($id);

        $q = $this->createquery('q')
                ->select('q.nombre')
                ->where('q.nombre LIKE ?', $string . '%')
                //   ->andWhere('q.empresa_sector_uno_id = ?', $cuestionario->getEmpresaSectorUnoId())
                ->andWhere('q.tipo = ?', $tipo)
                ->limit($limit);
        return $q->fetchArray();
    }

    public function nombreExist($nombre, $tipo) {
        $q = $this->createQuery('q')
                ->andWhere('q.nombre = ?', $nombre)
                ->andWhere('q.tipo = ?', $tipo);
        return $q->fetchOne();
    }

}
