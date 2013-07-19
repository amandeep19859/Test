<?php

/**
 * CuestionarioRespuestas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CuestionarioRespuestas extends BaseCuestionarioRespuestas
{
	public function save(Doctrine_Connection $conn = null)
	{
		//Actualizamos el valor total del cuestionario
		$this->setTotal($this->getRespuesta1() + $this->getRespuesta2() + $this->getRespuesta3() + $this->getRespuesta4() + $this->getRespuesta5() + $this->getRespuesta6()
				+ $this->getRespuesta7() + $this->getRespuesta8() + $this->getRespuesta9() + $this->getRespuesta10() + $this->getRespuesta11()
				+ $this->getRespuesta12());
	
		//Si se trata de una creación sumamos directamente al cuestionario el valor de la puntuación
		if($this->isNew())
			$this->getConcurso()->setCuestionarioTotal($this->getConcurso()->getCuestionarioTotal() + $this->getTotal());
		else
		{
			$old = $this->getModified(true);
			//Calculamos la diferencia entre el valor total antiguo y el nuevo
			$difference = $this->getTotal() - $old['total'];
			$this->getConcurso()->setCuestionarioTotal($this->getConcurso()->getCuestionarioTotal() + $difference);
		}
		return parent::save($conn);
	}
}