<?php

/**
 * ProductoTipoUno
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ProductoTipoUno extends BaseProductoTipoUno {

  public function setSlug() {
    $slug = functions::toSlug($this->getName());
    return $this->_set('slug', $slug);
  }

}
