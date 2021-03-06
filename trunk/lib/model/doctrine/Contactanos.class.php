<?php

/**
 * Contactanos
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Contactanos extends BaseContactanos {

    public function getUserNames($user_id = null) {
        if ($user_id == null)
            $user_id = $this->getUserId();
        $user = Doctrine::getTable('SfGuardUser')->find($user_id);
        return $user->getUsername();
    }

    public function getUserContact() {
        return Doctrine::getTable('SfGuardUser')->find($this->getUserId());
        //Doctrine_Query::create()->from('SfGuardUser')->where('id=?', $this->getUserId())->fetchOne();
    }

}