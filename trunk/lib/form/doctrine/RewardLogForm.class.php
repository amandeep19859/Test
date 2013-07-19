<?php

/**
 * RewardLog form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RewardLogForm extends BaseRewardLogForm {

    public function configure() {
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        parent::configure();
        
        $this->widgetSchema['cash'] = new sfWidgetFormInputText(array(), array('maxlength' => 10, 'class' => 'tamano_10_c'));
        $this->widgetSchema['gift'] = new sfWidgetFormInputText(array(), array('maxlength' => 70, 'class' => 'tamano_40_c'));
        $this->widgetSchema['descroption'] = new sfWidgetFormInputText(array(), array('maxlength' => 40, 'class' => 'tamano_32_c'));        
        $this->widgetSchema['hierarchy'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Jerarquia')));
        $this->widgetSchema['created_at'] = new sfWidgetFormDate(array('format' => '%day% / %month% / %year%'));

        $this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array(
            'model'=> 'sfGuardUser',
            'query' => sfGuardUserTable::getUserComboList(),
            'method'=> 'getUsername',
            'add_empty' => 'Selecciona Usuario',
        ));


        $this->validatorSchema['descroption'] = new sfValidatorString(array('required' => true), array('required' => __('Necesitas incluir una descripción.')));
        $this->validatorSchema['hierarchy'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Jerarquia'), 'required' => true));
        $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => true), array('required' => __('Necesitas seleccionar un Usuario.'), 'invalid' => __('Ese Usuario no es válido.')));
        $this->validatorSchema['gift'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['created_at'] = new sfValidatorDateTime(array('required' => false));

        $this->setDefault('hierarchy', 1);        

        $this->validatorSchema['cash'] = new sfValidatorString(array('required' => false), array());
        
        $this->validatorSchema['gift']->setOption('required',  false);
        $this->validatorSchema['cash']->setOption('required',  false);
        

        $this->widgetSchema->setLabels(array(
            'gift' => __('Regalo'),
            'descroption' => __('Descripción'),
        ));
        
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'postValidate'))));
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
      if(trim($taintedValues['gift']) != "")
      {
        $this->validatorSchema['cash']->setOption('required',  false);
      }else
      {
        // $this->validatorSchema['cash']->setOption('required',  true);
      }
      
      parent::bind($taintedValues, $taintedFiles);
    }

    public function postValidate($validator, $values) {
        
        $cash = trim($values['cash']);
        $gift =trim($values['gift']);
        
        $error = array();

        if($cash == "" && $gift == "")
        {
          $error['cash'] = new sfValidatorError($validator, "se requiere dinero en efectivo");
          $error['gift'] = new sfValidatorError($validator, "Se requiere regalo");
          
          throw new sfValidatorErrorSchema($validator, $error);          
        }

        if($cash != "" && $cash != 0)
        {
            $points =  $cash;

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
              if($val > 10000000)
              {
                $error['cash'] = new sfValidatorError($validator, "NO puedes asignar una caja superior a 10.000.000.");
                throw new sfValidatorErrorSchema($validator, $error);
              }else if( (! $isPoint && ! $isComma))
              {
                $error['cash'] = new sfValidatorError($validator, "Escribir valor térmica: 1.000 10.000 1.000.000");
                throw new sfValidatorErrorSchema($validator, $error);
              }else if($decimalNotValid === 0)
              {
                $error['cash'] = new sfValidatorError($validator, "No se permite más de 4 decimales");
                throw new sfValidatorErrorSchema($validator, $error);
              }
            }
          
        }

        return $values;
    }

}
