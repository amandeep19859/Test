<?php

/**
 * ProfesionalLetter
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ProfesionalLetter extends BaseProfesionalLetter {
  const PROFESIONALLETTER_STATUS_DRAFT = 'Borrador';

  public function getUserCompleteName() {
    return $this->getProfesional()->getLastNameOne() . " " . $this->getProfesional()->getLastNameTwo() . " " . $this->getProfesional()->getFirstName();
  }

  public function getStateName() {
    return $this->getStates()->getName();
  }

  public function getUserName() {
    return $this->getUser()->getUserName();
  }

  public function getCityName() {
    return $this->getCity()->getName();
  }

  public function getActivityName() {
    return $this->getProfesional()->getProfesionalTipoTresId() ? $this->getProfesional()->getProfesionalTipoTres()->getName() : $this->getProfesional()->getProfesionalTipoDos()->getName();
    //return $this->getProfesional()->getProfesionalTipoTres()->getName();
  }

  public function getActivityNameTres() {
    if ($this->getProfesional()->getProfesionalTipoTresId()):
      return $this->getProfesional()->getProfesionalTipoTres()->getName();
    endif;
    //return $this->getProfesional()->getProfesionalTipoTres()->getName();
  }

  public function getSectorName() {
    return $this->getProfesional()->getProfesionalTipoUno();
    //return $this->getProfesional()->getProfesionalTipoTres()->getName();
  }

  public function getSubSectorName() {
    return $this->getProfesional()->getProfesionalTipoDos();
    //return $this->getProfesional()->getProfesionalTipoTres()->getName();
  }

  public function getFirstName() {
    return $this->getProfesional()->getFirstName();
  }

  public function getLastNameOne() {
    return $this->getProfesional()->getLastNameOne();
  }

  public function getLastNameTwo() {
    return $this->getProfesional()->getLastNameTwo();
  }

  public static function addProfesionalLetter($oProfesional, $asValues) {
    $snUserId = sfContext::getInstance()->getUser()->getGuardUser()->getId();

    $snProfesionalId = $oProfesional->getId();

    $profesional_letter = Doctrine::getTable('ProfesionalLetter')->findOneByProfesionalId($snProfesionalId);

    $oProfesionalLetter = is_object($profesional_letter) ? $profesional_letter : new ProfesionalLetter();
    $oProfesionalLetter->name = trim($asValues['first_name']);
    $oProfesionalLetter->description = $asValues['incidencia'];
    $oProfesionalLetter->plan_accion = '';
    $oProfesionalLetter->profesional_letter_type_id = 1;
    $oProfesionalLetter->profesional_activa_desa_id = 1;
    $oProfesionalLetter->profesional_apro_despro_id = 1;
    $oProfesionalLetter->profesional_letter_estado_id = 2;
    $oProfesionalLetter->profesional_id = $snProfesionalId;
    $oProfesionalLetter->states_id = $asValues['states_id'];
    $oProfesionalLetter->city_id = $asValues['city_id'];
    $oProfesionalLetter->user_id = $snUserId;
    $oProfesionalLetter->is_first = 1;
    $oProfesionalLetter->save();
  }

  public static function setRecommandationAlert($asValues, $snIdprofesional, $snId) {
    $snUserId = $asValues['user_id'];

    $ssGuardUser = Doctrine::getTable('sfGuardUser')->find($snUserId);

    $ssUrl = url_for('/backend.php/profesionales/' . $snIdprofesional);
    AlertasTable::nueva(5, 'Recomendación', 'Se ha recomendado a un profesional');

    $profesionalData = Doctrine::getTable('Profesional')->findOneByUserId($snUserId);
    $ssProfFullName = $profesionalData->getFirstName() . ' ' . $profesionalData->getLastNameOne() . ' ' . $profesionalData->getLastNameTwo();

    $ssCity = Profesional::compateCity($profesionalData);

    $ssApproval = 'Nueva recomendación de <strong> <a href="colaboradores/' . $snUserId . '/List_ver">' . ($ssGuardUser->getUsername()) . '</a> </strong> en el Directorio.';
    AlertasTable::nueva(8, 'Recomendación', $ssApproval);


    /* $ssTipo = $profesionalData->getProfesionalTipoTres()->getId() ? $profesionalData->getProfesionalTipoTres() : $profesionalData->getProfesionalTipoDos();
      $ssRecommand = '<a href="cartas_pendientes/'.$snId.'">recomendado</a>';
      $ssDisApproval = ' <strong> <a href="profesionales/'.$profesionalData->getId().'">'.($ssProfFullName).'</a> </strong> ha '.$ssRecommand.' al profesional '.$ssProfFullName.' de la actividad ['.$ssTipo.'] en '.$ssCity;
      AlertasTable::nueva(9, 'recomendado', $ssDisApproval); */
  }

  public static function setDisapprovalAlert($asValues, $snIdprofesional, $snId) {
    $snUserId = $asValues['user_id'];

    $ssGuardUser = Doctrine::getTable('sfGuardUser')->find($snUserId);

    AlertasTable::nueva(6, 'Desaprobación', 'Se ha desaprobado a un profesional');

    $profesionalData = Doctrine::getTable('Profesional')->findOneByUserId($snUserId);
    $ssProfFullName = $profesionalData->getFirstName() . ' ' . $profesionalData->getLastNameOne() . ' ' . $profesionalData->getLastNameTwo();

    $ssCity = Profesional::compateCity($profesionalData);

    $ssApproval = 'Nueva desaprobación de <strong> <a href="colaboradores/' . $snUserId . '/List_ver">' . ($ssGuardUser->getUsername()) . '</a> </strong> en el Directorio.';
    AlertasTable::nueva(10, 'Desaprobación', $ssApproval);

    /* $ssTipo = $profesionalData->getProfesionalTipoTres()->getId() ? $profesionalData->getProfesionalTipoTres() : $profesionalData->getProfesionalTipoDos();
      $ssDesaprobado = '<a href="cartas_pendientes/'.$snId.'">desaprobado</a>';
      $ssDisApproval = ' <strong> <a href="profesionales/'.$profesionalData->getId().'">'.($ssProfFullName).'</a> </strong> ha '.$ssDesaprobado.' al profesional '.$ssProfFullName.' de la actividad ['.$ssTipo.'] en '.$ssCity;
      AlertasTable::nueva(11, 'desaprobado', $ssDisApproval); */
  }

  public function getProfesionalLatterAchivo() {
    return $query = Doctrine::getTable("ProfesionalLetterArchivo")->createQuery()->where("profesional_letter_id=$this->id")->execute();
  }

}