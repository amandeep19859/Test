<?php

/**
 * Pizarra
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Pizarra extends BasePizarra {

  public static function getSectionList() {
    return array('concurso_index' => 'Concursos',
        'listaBlanca_index' => 'Lista blanca',
        'listaNegra_index' => 'Lista negra',
        '' => 'Directorio de buenos profesionales',
        'vosotros_rewardRanking' => 'Recompensas',
        'vosotros_hierarchyRanking' => 'Comunidad de colaboradores');
  }

}