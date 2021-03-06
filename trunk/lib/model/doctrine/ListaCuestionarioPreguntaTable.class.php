<?php

/**
 * ListaCuestionarioPreguntaTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ListaCuestionarioPreguntaTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object ListaCuestionarioPreguntaTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('ListaCuestionarioPregunta');
    }

    public function getAutocomplete($string, $limit = 10) {
        $q = $this->createquery('q')
                ->select('q.pregunta')
                ->where('q.pregunta LIKE ?', $string . '%')
                ->limit($limit);
        return $q->fetchArray();
    }

    public function preguntaExist($pregunta, $tipo) {
        $q = $this->createQuery('qp')
                ->andWhere('qp.pregunta = ?', $pregunta)
                ->andWhere('qp.tipo = ?', $tipo);
        return $q->fetchOne();
    }

}