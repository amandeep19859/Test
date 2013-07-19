<?php

/**
 * Producto
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Producto extends BaseProducto {

    const COMBINADO_NULO = 0;
    const COMBINADO_MARCA = 1;
    const COMBINADO_MODELO = 1;

    static $valida = array(0 => 'Pendiente de revisar', 1 => 'Revisada');

    public function __toString() {
        return $this->getName();
    }

    /**
     * Get Created at with format
     * @param type $format 
     */
    public function getFCreatedAt($format = 'D, d M Y H:i:s') {
        echo date($format, strtotime($this->getCreatedAt()));
    }

    public function getValidado() {
        if ($this->getValida() == 0)
            return 'NO';
        else
            return 'SI';
    }

    public function getNombreCompleto() {
        return $this->getName() . ' ' . $this->getMarcaModelo();
    }

    public function getMarcaModelo($separator = ' ') {
        return $this->getMarca() . $separator . $this->getModelo();
    }

    public function getNameForBreadcrumb($separator = ' ') {
        return $this->getName() . $separator . $this->getMarcaModelo(' ');
    }

    /**
     * Devuelve el tipo de 3r nivel o bien el de 2n nivel al que corresponde
     *
     * @return String
     */
    public function getTipo() {
        return $this->getProductoTipoTres();
        //return ($this->getProductoTipoTres() && $this->getProductoTipoTres()->getId()) ? $this->getProductoTipoTres() : $this->getProductoTipoDos();
    }

    public function getTipoId() {
        return $this->getTipo()->getId();
    }

    public function hasActividad() {
        return $this->getProductoTipoTres()->getId() ? true : false;
    }

    /**
     * Devuelve el número de auditorías únicas realizadas.
     *
     */
    public function countAuditoriasRealizadas() {
        return $this->getDivisor();
    }

    public function removeAuditoria($cuestionario) {
        $this->setDividendo($this->dividendo - $cuestionario->getPuntos());
        $this->setDivisor($this->getDivisor() - 1);
        $this->save();

        $cuestionario->substractKpis('producto');
    }

    /**
     * Devuelve la evolución de la empresa al largo del año.
     */
    public function getEvolucionAsString() {
        $evolucion = EmpresaProductoEvolucionTable::getEvolucionProductoAnual($this->getId());
        if ($evolucion) {
            $valores = array_map(function($value) {
                        $punt = $value['q_puntuacion'];
                        if ($punt > 51) {
                            return 4;
                        } elseif ($punt > 40) {
                            return 3;
                        } elseif ($punt > 32) {
                            return 2;
                        } else {
                            return 1;
                        }
                    }, $evolucion);

            return implode(',', $valores);
        }

        return false;
    }

    public function getFactorFormula() {
        if ($this->getDivisor() == 0)
            return 1;

        return floor($this->getDividendo() / $this->getDivisor());
    }

    /*
     * Devuelve la medalla correspondiente.
     */

    public function getMedalla() {
        $medalla = CategoriaExcelenciaTable::getMedalla($this->getFactorFormula());

        return strtolower($medalla);
    }

    /**
     * Get Unique audit of user
     * @param type $format 
     */
    public function getUniqueAudita() {
        return $num_producto_audit = Doctrine::getTable('ListaCuestionarioUser')->createQuery()
                ->select('COUNT(DISTINCT user_id)')
                ->where('producto_id = ?', $this->getId())
                ->andwhere('aprobado = ?', (bool) true)
                ->execute(null, DOCTRINE::HYDRATE_SINGLE_SCALAR);
    }

    /**
     * Añade una nueva auditoria y recalcula el factor de fórmula
     */
    public function addAuditoria(ListaCuestionarioUser $cuestionario) {
        $this->setDividendo($this->dividendo + $cuestionario->getPuntos());
        $this->setDivisor($this->getDivisor() + 1);
        $this->save();

        //save the kpi associated.
        $cuestionario->saveKpis('producto');
    }

    public function getLastComentariosListaNegra($limit = 0, $aprobado = true, $hydrate_array = false, $order = 'ASC') {
        $q = Doctrine_Query::create()->from('ComentarioListaNegra r')
                ->select('r.id, r.comentario, r.updated_at, u.username')
                ->leftJoin('r.User u')
                ->where('r.producto_id = ?', $this->getId())
                ->andWhere('r.aprobado = ?', $aprobado ? 1 : 0)
                ->limit($limit)
                ->orderBy('r.id ' . $order);
        if ($hydrate_array) {
            return $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY_SHALLOW);
        } else {
            return $q->execute();
        }
    }

    public function getLastComentarios($limit = 0, $order = 'ASC') {
        $q = $this->getLastComentariosQuery($limit, $order);

        return $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY_SHALLOW);
    }

    public function getLastComentariosQuery($limit = 0, $order = 'ASC') {
        $q = Doctrine_Query::create()
                ->addFrom('ListaCuestionarioRespuesta r')
                ->select('r.id, r.respuesta, r.updated_at, c.id, u.username')
                ->leftJoin('r.Pregunta p')
                ->addWhere('p.tipo = ?', 'texto')
                ->addWhere('r.respuesta != ""')
                ->leftJoin('r.ListaCuestionarioUser c')
                ->andWhere('c.aprobado = 1')
                ->andWhere('c.producto_id = ?', $this->getId())
                ->leftJoin('c.User u')
                ->orderBy('r.id ' . $order);

        return $q;
    }

    public function isDestacado() {
        $values = array();
        if ($this->isDestacadoPorProducto())
            $values[] = 'P';
        if ($this->isDestacadoPorMarca())
            $values[] = 'M';
        if ($this->isDestacadoPorTipo())
            $values[] = 'T';
        if ($this->isDestacadoPorMarcaAndTipo())
            $values[] = 'TM';

        return implode(',', $values);
    }

    public function isDestacadoPorTipo() {
        return ProductoDestacadoTable::getInstance()->existByIdAndTipo($this->getId()) ? true : false;
    }

    public function isDestacadoPorProducto() {
        return ProductoDestacadoTable::getInstance()->existByIdAndProducto($this->getId()) ? true : false;
    }

    public function isDestacadoPorMarca() {
        return ProductoDestacadoTable::getInstance()->existByIdAndMarca($this->getId()) ? true : false;
    }

    public function isDestacadoPorMarcaAndTipo() {
        return ProductoDestacadoTable::getInstance()->existByMarcaAndTipo($this->getId()) ? true : false;
    }

    public function getDestacadosPorTipo() {
        return ProductoDestacadoTable::getInstance()->getProductoTipo($this);
    }

    public function getDestacadosPorProducto() {
        return ProductoDestacadoTable::getInstance()->getProducto($this->getName());
    }

    public function getDestacadosPorMarca() {
        return ProductoDestacadoTable::getInstance()->getProductoMarca($this->getMarca());
    }

    public function getDestacadosPorMarcaAndTipo() {
        return ProductoDestacadoTable::getInstance()->getMarcaAndTipo($this);
    }

    public function getCuestionarios($aprobado = true, $order = 'ASC') {
        $q = Doctrine_Query::create()->from('ListaCuestionarioUser q')
                ->where('q.producto_id = ?', $this->getId())
                ->andwhere('q.aprobado = ?', (bool) $aprobado)
                ->orderBy('q.id ' . $order);
        return $q->execute();
    }

    public function getSectorProduct() {
        return ($this->getProductoTipoUno() && $this->getProductoTipoUno()->getId()) ? $this->getProductoTipoUno() : $this->getProductoTipoDos();
    }

    public function getSubSectorProduct() {
        return ($this->getProductoTipoDos() && $this->getProductoTipoDos()->getId()) ? $this->getProductoTipoDos() : $this->getProductoTipoDos();
    }

    public function getTresProduct() {
        return ($this->getProductoTipoTres() && $this->getProductoTipoTres()->getId()) ? $this->getProductoTipoTres() : $this->getProductoTipoDos();
    }

    public function getProductTresName() {
        return $this->getProductoTipoTres();
    }

    /**
     * get sector name
     * @return type 
     */
    public function getSectorName() {
        return $this->getSectorProduct();
    }

    /**
     * get sub sector name
     * @return type 
     */
    public function getSubsectorName() {
        return $this->getSubSectorProduct();
    }

    /**
     * fetch comment records for given product and user
     * @param String $user_id User Id
     * @return Reocrds
     */
    public function getCountComments($user_id) {
        //create comment query
        $comment_query = Doctrine_Query::create()
                ->select('COUNT(DISTINCT id)')
                ->from('ComentarioListaNegra cln')
                ->andWhere('cln.producto_id =?', $this->getId())
                ->andWhere('cln.aprobado =1')
                ->orderby('cln.created_at DESC')
                ->execute(null, DOCTRINE::HYDRATE_SINGLE_SCALAR);
        //retrun audit query
        return $comment_query;
    }

    public function setSlug() {
        $slug = functions::toSlug($this->getName() . ' ' . $this->getMarca() . ' ' . $this->getModelo());
        return $this->_set('slug', $slug);
    }

}