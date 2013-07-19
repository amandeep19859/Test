<?php

class BaseChangeCajaBackendForm extends BaseForm
{
  public function configure()
  {  	  
  	parent::configure();
        
        
        $this->widgetSchema['cantidad'] = new sfWidgetFormInputText();
        $this->validatorSchema['cantidad'] = new sfValidatorCaja(array('required' => true),array('required' => 'Necesitas introducir una cantidad asignada.','invalid' => 'Necesitas introducir una cantidad asignada.'));
        
        $this->widgetSchema['accion'] = new sfWidgetFormChoice(array('choices' => array(1=>'Sumar',2=>'Restar')));
        $this->validatorSchema['accion'] = new sfValidatorInteger(array('required' => true));
        
        $this->widgetSchema['comentario'] = new sfWidgetFormInputText();
        $this->validatorSchema['comentario'] = new sfValidatorString(array('max_length' => 500,'required'=>true),array('required' => 'Necesitas incluir un comentario.'));
        
        
        $this->widgetSchema->setNameFormat('changecaja_backend[%s]');
        
        
  }
}