<?php

/**
 * ColaboradorPuntosHistorico form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ColaboradorPuntosHistoricoForm extends BaseColaboradorPuntosHistoricoForm {

    public function configure() {
        $caracteres_no_validos_puntos = sfApplyForm2::$caracteres_no_validos_direccion;
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        unset($this['objeto'], $this['objeto_id'], $this['created_at'], $this['updated_at'], $this['parametros']);

        $this->widgetSchema['puntos'] = new sfWidgetFormInputText(array(), array('maxlength' => 10, 'class' => 'tamano_10_c', 'id' => 'points', 'onkeypress'=>"return checkValue(event);"));

        $this->validatorSchema['puntos'] = new sfValidatorString(
                array('required' => true),
                array('required' => 'Necesitas introducir el número de puntos.')
                );

                
        $this->widgetSchema['descripcion'] = new sfWidgetFormInputText(array(), array('maxlength' => 70, 'class' => 'tamano_40_c'));
        $this->widgetSchema['tipo_punto'] = new sfWidgetFormInputText(array(), array('maxlength' => 40, 'class' => 'tamano_20_c'));

        
        $this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array(
            'model'=> 'sfGuardUser',
            'query' => sfGuardUserTable::getUserComboList(),
            'method'=> 'getUsername',
            'add_empty' => 'Selecciona Usuario',
        ));



        $this->validatorSchema['tipo_punto'] = new sfValidatorAnd(array(
                ), array(), array('required' => __('Necesitas incluir el tipo de puntos.'), 'invalid' => __('Necesitas incluir el tipo de puntos.')));
        $this->validatorSchema['descripcion'] = new sfValidatorAnd(array(
                ), array(), array('required' => __('Necesitas incluir una descripción.'), 'invalid' => __('Necesitas incluir una descripción.')));

        
        $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => 'colaboradorpuntoshistorico', 'required' => true), array('required' => __('Necesitas seleccionar un Usuario.'), 'invalid'=>__('Ese Usuario no es válido.')));

        $this->widgetSchema->setLabels(array(
            'tipo_punto' => ('Tipo de puntos')
        ));

        //for check decimal point
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkDecimalPoint'))));
        
    }
    
    public function checkDecimalPoint($validator, $values)
    {
      $error = array();

      $points =  $values['puntos'];
 
      $val = str_replace(',', '', $points);
      $val = str_replace('.', '', $val);            
      $val=intval($val);      

      $isPoint = strpos($points, '.');
      $isComma = strpos($points, ',');

      $decimals = explode('.', $points);
      $decimalNotValid = 1;

      if(count($decimals) > 1)
      {
        foreach($decimals as $decimal)
        {

          if(strlen($decimal) > 4)
          {
            $decimalNotValid = 0;
          }
        }
        
      }
      
      $commadecimals = explode(',', $points);
      
      if(count($commadecimals) > 1)
      {
        foreach($commadecimals as $commadecimal)
        {
          if(strlen($commadecimal) > 4)
          {
            $decimalNotValid = 0;
          }
        }
      }
      
      
      if($points != "")
      {        
        if($val < 1000)
        {
          $error['puntos'] = new sfValidatorError($validator, "mínimos de 1.000 puntos necesarios");
          throw new sfValidatorErrorSchema($validator, $error);
        }else if($val > 10000000)
        {
          $error['puntos'] = new sfValidatorError($validator, "NO puedes asignar una caja superior a 10.000.000.");
          throw new sfValidatorErrorSchema($validator, $error);          
        }else if( (! $isPoint && ! $isComma))
        {          
          $error['puntos'] = new sfValidatorError($validator, "Escribir valor térmica: 1.000 10.000 1.000.000");
          throw new sfValidatorErrorSchema($validator, $error);          
        }else if($decimalNotValid === 0)
        {
          $error['puntos'] = new sfValidatorError($validator, "No se permite más de 4 decimales");
          throw new sfValidatorErrorSchema($validator, $error);          
        }
      }
    }
}
