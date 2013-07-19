<?php

/**
 * ProfesionalLetter form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfesionalLetterBackendForm extends BaseProfesionalLetterForm {

    public function configure() {

        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        unset(
                $this["created_at"], $this["updated_at"], $this['fecha_activacion'], $this['fecha_referendum'], $this['fecha_destacado'], $this['fecha_revision'], $this['fecha_deliberacion'], $this['fecha_rechazado'], $this['fecha_cerrado'], $this['fecha_nulo'], $this['revision_last_state_id'], $this['states_id'], $this['city_id'], $this['profesional_activa_desa_id'], $this['fecha_observacion'], $this['id'], $this['is_first']
        );

        /* $this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => 'Selecciona Usuario'));
          $this->setValidators['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User')));
          $this->validatorSchema["user_id"]->setMessage("required", 'Necesitas seleccionar un Usuario.'); */

        //user_id
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User')));
        //echo (!$this->isNew() ? $this->getObject()->getUser()->getUsername() : "")  ;exit;
        //username
        $this->widgetSchema['user_name'] = new sfWidgetFormInputText(array(), array('id' => 'profesional_ProfesionalLetter_user', 'maxlength' => 25, 'style' => 'width:176px;'));
        $this->setDefault('user_name', $this->getObject()->getUser()->getUsername());
        $this->validatorSchema['user_name'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'column' => 'username'), array('required' => 'Necesitas seleccionar un Usuario.', 'invalid' => 'Ese Usuario no es válido.'));

        $this->widgetSchema['profesional_letter_type_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['profesional_letter_type_id'] = new sfValidatorString(array('required' => false));

        $this->setDefault("profesional_letter_type_list", $this->getObject()->getProfesionalLetterTypeId());

        $this->widgetSchema['profesional_letter_type_list'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionalLetterType'), 'add_empty' => false), array('disabled' => 'disabled'));
        $this->setValidators['profesional_letter_type_list'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionalLetterType')), array('required' => false));

        $this->widgetSchema["profesional_id"] = new sfWidgetFormInputHidden();
        $this->validatorSchema['profesional_id'] = new sfValidatorString(array('required' => false));


        $this->widgetSchema["profesional_letter_estado_id"] = new sfWidgetFormInputHidden();
        $this->validatorSchema['profesional_letter_estado_id'] = new sfValidatorString(array('required' => false));

        $this->widgetSchema['name'] = new sfWidgetFormInputText(array(), array('maxlength' => 70, 'style' => 'width: 491px;'));
        $this->validatorSchema['name']->setMessage("required", __('No has incluido el título de tu carta.'));

        //$this->widgetSchema['profesional_letter_estado_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesionalLetterEstado'), 'table_method' => 'getEstedioLetterName','add_empty' => true,'label'=>'Estado'));
        //$this->setValidators['profesional_letter_estado_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProfesionalLetterEstado'), 'column' => 'id'));

        $this->widgetSchema['description'] = new sfWidgetFormTextareaCKEditor(array('width' => ((sfConfig::get("sf_app") == "backend") ? 600 : 490), 'height' => 200, 'err_id' => 'Error_max_length_incidencia', 'max_length' => 12300));
        $this->validatorSchema['description'] = new mySfValidatorString(array('max_rep_length' => 12300), array('max_rep_length' => __('Has superado el espacio permitido para tu recomendación.')));
        if ($this->getObject()->getProfesionalLetterTypeId() == 1) {
            $this->widgetSchema['description']->setLabel('<strong>' . __('RECOMENDACIÓN') . '</strong>');
            $this->validatorSchema["description"]->setMessage("required", __('No has incluido tu recomendación.'));
        } else {
            $this->widgetSchema['description']->setLabel('<strong>' . __('DESAPROBACIÓN') . '</strong>');
            $this->validatorSchema["description"]->setMessage("required", __('No has incluido tu desaprobación.'));
        }
        $this->widgetSchema["profesional_apro_despro_id"] = new sfWidgetFormInputHidden(array(), array('value' => 1));

        if ($this->getObject()->getProfesionalLetterTypeId() == 1) {
            unset($this['plan_accion']);
        } else {
            $this->widgetSchema['plan_accion'] = new sfWidgetFormTextareaCKEditor(array('width' => ((sfConfig::get("sf_app") == "backend") ? 600 : 490), 'height' => 200, 'err_id' => 'Error_max_length_plan_accion', 'max_length' => 43000));
            $this->validatorSchema['plan_accion'] = new mySfValidatorString(array('max_rep_length' => 43000, 'required' => true), array('max_rep_length' => __('Has superado el espacio permitido para la Plan de acción.')));
            $this->validatorSchema["plan_accion"]->setMessage("required", __('No has incluido tu Plan de acción.'));


            $archivos = Doctrine_Query::create()
                            ->select('a.*')
                            ->from('ProfesionalLetterArchivo a')
                            ->where('profesional_letter_id = ?', $this->getObject()->getId())->fetchArray();


            if (count($archivos) > 0) {
                foreach ($archivos as $k => $archivedata) {
                    $name = Doctrine::getTable('ProfesionalLetterArchivo')->find($archivos[$k]['id']);
                    $name = isset($name) ? $name : new ProfesionalLetterArchivo();
                    $name->ProfesionalLetter = $this->getObject();
                    $formulario_1 = new ProfesionalLetterArchivoFormBackend($name);
                    $this->embedForm('archivo_' . ($k + 1), $formulario_1);
                }

                for ($k = $k + 2; $k <= 5; $k++) {
                    $name = new ProfesionalLetterArchivo();
                    $name->ProfesionalLetter = $this->getObject();
                    $formulario_1 = new ProfesionalLetterArchivoFormBackend($name);
                    $this->embedForm('archivo_' . ($k), $formulario_1);
                }
            }
        }

        $this->widgetSchema->setLabels(array(
            'name' => __('Título'),
            'incidencia' => __('Tu desaprobación'),
            'plan_accion' => __('Plan de acción'),
            'first_name' => __('Nombre'),
            'last_name_one' => __('Apellido 1'),
            'last_name_two' => __('Apellido 2'),
            'address' => __('Dirección'),
            'email' => __('Correoelectrónico'),
            'numero' => __('Nº'),
            'piso' => __('Piso'),
            'puerta' => __('Puerta'),
            'road_type_id' => __('Tipo de vía'),
            'states_id' => __('Provincia'),
            'city_id' => __('Localidad'),
            'telefono' => __('Teléfono'),
            'profesional_tipo_uno_id' => __('Sector profesional'),
            'profesional_tipo_dos_id' => __('Subsector profesional'),
            'profesional_tipo_tres_id' => __('Actividad profesional'),
            // 'description' => '<strong>' . __('RECOMENDACIÓN') . '</strong>',
            'profesional_letter_type_list' => 'Tipo de carta',
            'plan_accion' => '<strong>' . __('PLAN DE ACCIÓN') . '</strong>',
            //'user_id' => 'Usuario',
            'user_name' => 'Usuario'
        ));

        $this->validatorSchema->setOption('allow_extra_fields', true);
        $this->validatorSchema->setOption('filter_extra_fields', false);
        //  $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkProvincia'))));

        /* if ($this->getObject()->getProfesionalLetterTypeId() == 1)
          $this->widgetSchema->setPositions(array('profesional_id', 'profesional_letter_type_list', 'name', 'user_id', 'profesional_letter_type_id', 'description', 'profesional_letter_estado_id', 'profesional_apro_despro_id'));
          else {
          if ($this->getObject()->isNew() && $this->getObject()->getProfesionalLetterTypeId() == 1)
          $this->widgetSchema->setPositions(array('profesional_id', 'profesional_letter_type_list', 'name', 'user_id', 'profesional_letter_type_id', 'description', 'plan_accion', 'profesional_letter_estado_id', 'profesional_apro_despro_id'));
          else
          $this->widgetSchema->setPositions(array('profesional_id', 'profesional_letter_type_list', 'name', 'user_id', 'profesional_letter_type_id', 'description', 'plan_accion', 'profesional_letter_estado_id', 'profesional_apro_despro_id', 'archivo_1', 'archivo_2', 'archivo_3', 'archivo_4', 'archivo_5'));
          } */
    }

    /* public function checkProvincia($validator, $values) {
      if ($this->getObject()->getStatesId() == 1) {
      //   $this->validatorSchema->setPostValidator
      $this->validatorSchema['city_id'] = new sfValidatorPass(array('required' => false));
      /* $this->validatorSchema['city_id']->setOption('required', false);
      $this->validatorSchema['road_type_id']->setOption('required', false);
      $this->validatorSchema['address']->setOption('required', false);
      $this->validatorSchema['numero']->setOption('required', false); */
    /* }

      return $values;
      } */
}
