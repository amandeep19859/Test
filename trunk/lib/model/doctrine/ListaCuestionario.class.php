<?php

/**
 * ListaCuestionario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ListaCuestionario extends BaseListaCuestionario {

    public function __toString() {
        return $this->getNombre();
    }

    public function getSector() {
        if ($this->tipo == 'empresa') {
            return ($this->getEmpresaSectorUno() && $this->getEmpresaSectorDos()->getId()) ? $this->getEmpresaSectorUno() : $this->getEmpresaSectorDos();
        } else {
            return ($this->getProductoTipoUno() && $this->getProductoTipoUno()->getId()) ? $this->getProductoTipoUno() : $this->getProductoTipoDos();
        }
    }

    public function getPregunta() {
        return "deven";
    }

    public function getSubsector() {
        if ($this->tipo == 'empresa') {
            return ($this->getEmpresaSectorDos() && $this->getEmpresaSectorDos()->getId()) ? $this->getEmpresaSectorDos() : $this->getEmpresaSectorTres();
        } else {
            return ($this->getProductoTipoDos() && $this->getProductoTipoDos()->getId()) ? $this->getProductoTipoDos() : $this->getProductoTipoTres();
        }
    }

    public function getActividad() {
        if ($this->tipo == 'empresa') {
            //   return ($this->getEmpresaSectorTres() && $this->getEmpresaSectorTres()->getId()) ? $this->getEmpresaSectorTres() : $this->getEmpresaSectorDos();
            return $this->getEmpresaSectorTres();
        } else {
            return $this->getProductoTipoTres();
            //return ($this->getProductoTipoTres() && $this->getProductoTipoTres()->getId()) ? $this->getProductoTipoTres() : $this->getProductoTipoDos();
        }
    }

}