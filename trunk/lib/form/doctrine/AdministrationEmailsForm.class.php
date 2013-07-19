<?php

/**
 * AdministrationEmails form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdministrationEmailsForm extends BaseAdministrationEmailsForm {

    public function configure() {

        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        //set widget
        $this->setWidget('user_id', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => 'Selecciona Usuario')));
        $this->setWidget('email', new sfWidgetFormInputText(array(), array('class' => 'tamano_32_c', 'maxlength' => 70)));
        $this->setWidget('permission_id', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Permission'), 'add_empty' => 'Selecciona perfil')));
        $this->setWidget('created_at', new sfWidgetFormDateTime());

        //set validation
        $this->setValidator('user_id', new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User')), array('required' => 'Necesitas seleccionar un Usuario.')));
        $this->setValidator('email', new sfValidatorEmail(array('required' => true), array('required' => 'No has incluido un correo electrónico.', 'invalid' => 'Ese correo electrónico no es válido.')));
        $this->setValidator('permission_id', new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Permission'), 'required' => true), array('required' => 'Necesitas asignar un perfil de Administración.')));
        $this->setValidator('created_at', new sfValidatorDateTime(array('required' => false)));
        
        $this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array(
            'model'=> 'sfGuardUser',
            'query' => sfGuardUserTable::getUserComboList(),
            'method'=> 'getUsername',
            'add_empty' => 'Selecciona Usuario',
        ), array('style' => 'width:300px;'));

        $this->validatorSchema['user_id']->setMessages(array('required'=> __('Necesitas seleccionar un Usuario'), 'invalid'=> __('Ese Usuario no es válido')));

    }



}
