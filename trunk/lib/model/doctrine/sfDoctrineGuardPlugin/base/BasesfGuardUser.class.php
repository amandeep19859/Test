<?php

/**
 * BasesfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_disabled
 * @property string $email_address
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $sfGuardUserPermission
 * @property Doctrine_Collection $sfGuardUserGroup
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 * @property Concurso $Concurso
 * @property Contribucion $Contribucion
 * @property ConcursoReferendum $ConcursoReferendum
 * @property sfGuardUserProfile $Profile
 * @property Doctrine_Collection $User
 * @property ContribucionCp $ContribucionCp
 * @property ConcursoReferendumCp $ConcursoReferendumCp
 * @property GanadoresConcursos $GanadoresConcursos
 * @property Informa $Informa
 * @property UserNotification $UserNotification
 * @property Alertas $UserRelated
 * @property ComentarioConcurso $ComentarioConcurso
 * @property UsersOnlineYesterday $UsersOnlineYesterday
 * @property AlertasDeCaja $AlertasDeCaja
 * @property Doctrine_Collection $AdministrationEmails
 * @property RewardLog $RewardLog
 * @property Doctrine_Collection $GiftRedemption
 * @property Doctrine_Collection $ComapnyFavouriteList
 * @property Doctrine_Collection $ProductFavouriteList
 * @property Doctrine_Collection $ComapnyContestFavouriteList
 * @property Doctrine_Collection $ProductContestFavouriteList
 * @property Doctrine_Collection $GiftFavouriteList
 * @property Profesional $Profesional
 * @property ProfesionalLetter $ProfesionalLetter
 * @property UserProductCaseStudy $UserProductCaseStudy
 * @property UserProductCaseStudyRequest $UserProductCaseStudyRequest
 * @property UserCompanyCaseStudy $UserCompanyCaseStudy
 * @property UserCompanyCaseStudyRequest $UserCompanyCaseStudyRequest
 * @property Doctrine_Collection $ListaCuestionarioUser
 * @property Doctrine_Collection $CuestionarioBajaValue
 * @property ColaboradorPuntosHistorico $ColaboradorPuntosHistorico
 * @property Doctrine_Collection $Auditorias
 * @property Doctrine_Collection $ComentarioListaNegra
 * @property Doctrine_Collection $Auditanos
 * @property Doctrine_Collection $Contactanos
 * @property Doctrine_Collection $orderPreferences
 * 
 * @method boolean                     getIsDisabled()                  Returns the current record's "is_disabled" value
 * @method string                      getEmailAddress()                Returns the current record's "email_address" value
 * @method string                      getUsername()                    Returns the current record's "username" value
 * @method string                      getAlgorithm()                   Returns the current record's "algorithm" value
 * @method string                      getSalt()                        Returns the current record's "salt" value
 * @method string                      getPassword()                    Returns the current record's "password" value
 * @method boolean                     getIsActive()                    Returns the current record's "is_active" value
 * @method boolean                     getIsSuperAdmin()                Returns the current record's "is_super_admin" value
 * @method timestamp                   getLastLogin()                   Returns the current record's "last_login" value
 * @method Doctrine_Collection         getGroups()                      Returns the current record's "Groups" collection
 * @method Doctrine_Collection         getPermissions()                 Returns the current record's "Permissions" collection
 * @method Doctrine_Collection         getSfGuardUserPermission()       Returns the current record's "sfGuardUserPermission" collection
 * @method Doctrine_Collection         getSfGuardUserGroup()            Returns the current record's "sfGuardUserGroup" collection
 * @method sfGuardRememberKey          getRememberKeys()                Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword       getForgotPassword()              Returns the current record's "ForgotPassword" value
 * @method Concurso                    getConcurso()                    Returns the current record's "Concurso" value
 * @method Contribucion                getContribucion()                Returns the current record's "Contribucion" value
 * @method ConcursoReferendum          getConcursoReferendum()          Returns the current record's "ConcursoReferendum" value
 * @method sfGuardUserProfile          getProfile()                     Returns the current record's "Profile" value
 * @method Doctrine_Collection         getUser()                        Returns the current record's "User" collection
 * @method ContribucionCp              getContribucionCp()              Returns the current record's "ContribucionCp" value
 * @method ConcursoReferendumCp        getConcursoReferendumCp()        Returns the current record's "ConcursoReferendumCp" value
 * @method GanadoresConcursos          getGanadoresConcursos()          Returns the current record's "GanadoresConcursos" value
 * @method Informa                     getInforma()                     Returns the current record's "Informa" value
 * @method UserNotification            getUserNotification()            Returns the current record's "UserNotification" value
 * @method Alertas                     getUserRelated()                 Returns the current record's "UserRelated" value
 * @method ComentarioConcurso          getComentarioConcurso()          Returns the current record's "ComentarioConcurso" value
 * @method UsersOnlineYesterday        getUsersOnlineYesterday()        Returns the current record's "UsersOnlineYesterday" value
 * @method AlertasDeCaja               getAlertasDeCaja()               Returns the current record's "AlertasDeCaja" value
 * @method Doctrine_Collection         getAdministrationEmails()        Returns the current record's "AdministrationEmails" collection
 * @method RewardLog                   getRewardLog()                   Returns the current record's "RewardLog" value
 * @method Doctrine_Collection         getGiftRedemption()              Returns the current record's "GiftRedemption" collection
 * @method Doctrine_Collection         getComapnyFavouriteList()        Returns the current record's "ComapnyFavouriteList" collection
 * @method Doctrine_Collection         getProductFavouriteList()        Returns the current record's "ProductFavouriteList" collection
 * @method Doctrine_Collection         getComapnyContestFavouriteList() Returns the current record's "ComapnyContestFavouriteList" collection
 * @method Doctrine_Collection         getProductContestFavouriteList() Returns the current record's "ProductContestFavouriteList" collection
 * @method Doctrine_Collection         getGiftFavouriteList()           Returns the current record's "GiftFavouriteList" collection
 * @method Profesional                 getProfesional()                 Returns the current record's "Profesional" value
 * @method ProfesionalLetter           getProfesionalLetter()           Returns the current record's "ProfesionalLetter" value
 * @method UserProductCaseStudy        getUserProductCaseStudy()        Returns the current record's "UserProductCaseStudy" value
 * @method UserProductCaseStudyRequest getUserProductCaseStudyRequest() Returns the current record's "UserProductCaseStudyRequest" value
 * @method UserCompanyCaseStudy        getUserCompanyCaseStudy()        Returns the current record's "UserCompanyCaseStudy" value
 * @method UserCompanyCaseStudyRequest getUserCompanyCaseStudyRequest() Returns the current record's "UserCompanyCaseStudyRequest" value
 * @method Doctrine_Collection         getListaCuestionarioUser()       Returns the current record's "ListaCuestionarioUser" collection
 * @method Doctrine_Collection         getCuestionarioBajaValue()       Returns the current record's "CuestionarioBajaValue" collection
 * @method ColaboradorPuntosHistorico  getColaboradorPuntosHistorico()  Returns the current record's "ColaboradorPuntosHistorico" value
 * @method Doctrine_Collection         getAuditorias()                  Returns the current record's "Auditorias" collection
 * @method Doctrine_Collection         getComentarioListaNegra()        Returns the current record's "ComentarioListaNegra" collection
 * @method Doctrine_Collection         getAuditanos()                   Returns the current record's "Auditanos" collection
 * @method Doctrine_Collection         getContactanos()                 Returns the current record's "Contactanos" collection
 * @method Doctrine_Collection         getOrderPreferences()            Returns the current record's "orderPreferences" collection
 * @method sfGuardUser                 setIsDisabled()                  Sets the current record's "is_disabled" value
 * @method sfGuardUser                 setEmailAddress()                Sets the current record's "email_address" value
 * @method sfGuardUser                 setUsername()                    Sets the current record's "username" value
 * @method sfGuardUser                 setAlgorithm()                   Sets the current record's "algorithm" value
 * @method sfGuardUser                 setSalt()                        Sets the current record's "salt" value
 * @method sfGuardUser                 setPassword()                    Sets the current record's "password" value
 * @method sfGuardUser                 setIsActive()                    Sets the current record's "is_active" value
 * @method sfGuardUser                 setIsSuperAdmin()                Sets the current record's "is_super_admin" value
 * @method sfGuardUser                 setLastLogin()                   Sets the current record's "last_login" value
 * @method sfGuardUser                 setGroups()                      Sets the current record's "Groups" collection
 * @method sfGuardUser                 setPermissions()                 Sets the current record's "Permissions" collection
 * @method sfGuardUser                 setSfGuardUserPermission()       Sets the current record's "sfGuardUserPermission" collection
 * @method sfGuardUser                 setSfGuardUserGroup()            Sets the current record's "sfGuardUserGroup" collection
 * @method sfGuardUser                 setRememberKeys()                Sets the current record's "RememberKeys" value
 * @method sfGuardUser                 setForgotPassword()              Sets the current record's "ForgotPassword" value
 * @method sfGuardUser                 setConcurso()                    Sets the current record's "Concurso" value
 * @method sfGuardUser                 setContribucion()                Sets the current record's "Contribucion" value
 * @method sfGuardUser                 setConcursoReferendum()          Sets the current record's "ConcursoReferendum" value
 * @method sfGuardUser                 setProfile()                     Sets the current record's "Profile" value
 * @method sfGuardUser                 setUser()                        Sets the current record's "User" collection
 * @method sfGuardUser                 setContribucionCp()              Sets the current record's "ContribucionCp" value
 * @method sfGuardUser                 setConcursoReferendumCp()        Sets the current record's "ConcursoReferendumCp" value
 * @method sfGuardUser                 setGanadoresConcursos()          Sets the current record's "GanadoresConcursos" value
 * @method sfGuardUser                 setInforma()                     Sets the current record's "Informa" value
 * @method sfGuardUser                 setUserNotification()            Sets the current record's "UserNotification" value
 * @method sfGuardUser                 setUserRelated()                 Sets the current record's "UserRelated" value
 * @method sfGuardUser                 setComentarioConcurso()          Sets the current record's "ComentarioConcurso" value
 * @method sfGuardUser                 setUsersOnlineYesterday()        Sets the current record's "UsersOnlineYesterday" value
 * @method sfGuardUser                 setAlertasDeCaja()               Sets the current record's "AlertasDeCaja" value
 * @method sfGuardUser                 setAdministrationEmails()        Sets the current record's "AdministrationEmails" collection
 * @method sfGuardUser                 setRewardLog()                   Sets the current record's "RewardLog" value
 * @method sfGuardUser                 setGiftRedemption()              Sets the current record's "GiftRedemption" collection
 * @method sfGuardUser                 setComapnyFavouriteList()        Sets the current record's "ComapnyFavouriteList" collection
 * @method sfGuardUser                 setProductFavouriteList()        Sets the current record's "ProductFavouriteList" collection
 * @method sfGuardUser                 setComapnyContestFavouriteList() Sets the current record's "ComapnyContestFavouriteList" collection
 * @method sfGuardUser                 setProductContestFavouriteList() Sets the current record's "ProductContestFavouriteList" collection
 * @method sfGuardUser                 setGiftFavouriteList()           Sets the current record's "GiftFavouriteList" collection
 * @method sfGuardUser                 setProfesional()                 Sets the current record's "Profesional" value
 * @method sfGuardUser                 setProfesionalLetter()           Sets the current record's "ProfesionalLetter" value
 * @method sfGuardUser                 setUserProductCaseStudy()        Sets the current record's "UserProductCaseStudy" value
 * @method sfGuardUser                 setUserProductCaseStudyRequest() Sets the current record's "UserProductCaseStudyRequest" value
 * @method sfGuardUser                 setUserCompanyCaseStudy()        Sets the current record's "UserCompanyCaseStudy" value
 * @method sfGuardUser                 setUserCompanyCaseStudyRequest() Sets the current record's "UserCompanyCaseStudyRequest" value
 * @method sfGuardUser                 setListaCuestionarioUser()       Sets the current record's "ListaCuestionarioUser" collection
 * @method sfGuardUser                 setCuestionarioBajaValue()       Sets the current record's "CuestionarioBajaValue" collection
 * @method sfGuardUser                 setColaboradorPuntosHistorico()  Sets the current record's "ColaboradorPuntosHistorico" value
 * @method sfGuardUser                 setAuditorias()                  Sets the current record's "Auditorias" collection
 * @method sfGuardUser                 setComentarioListaNegra()        Sets the current record's "ComentarioListaNegra" collection
 * @method sfGuardUser                 setAuditanos()                   Sets the current record's "Auditanos" collection
 * @method sfGuardUser                 setContactanos()                 Sets the current record's "Contactanos" collection
 * @method sfGuardUser                 setOrderPreferences()            Sets the current record's "orderPreferences" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user');
        $this->hasColumn('is_disabled', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('email_address', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('username', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 32,
             ));
        $this->hasColumn('algorithm', 'string', 128, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardGroup as Groups', array(
             'refClass' => 'sfGuardUserGroup',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('sfGuardPermission as Permissions', array(
             'refClass' => 'sfGuardUserPermission',
             'local' => 'user_id',
             'foreign' => 'permission_id'));

        $this->hasMany('sfGuardUserPermission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserGroup', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardForgotPassword as ForgotPassword', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('Concurso', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('Contribucion', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('ConcursoReferendum', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardUserProfile as Profile', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserData as User', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('ContribucionCp', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('ConcursoReferendumCp', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('GanadoresConcursos', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('Informa', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UserNotification', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('Alertas as UserRelated', array(
             'local' => 'id',
             'foreign' => 'user_related_id'));

        $this->hasOne('ComentarioConcurso', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UsersOnlineYesterday', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('AlertasDeCaja', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('AdministrationEmails', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('RewardLog', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('GiftRedemption', array(
             'local' => 'id',
             'foreign' => 'user'));

        $this->hasMany('ComapnyFavouriteList', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('ProductFavouriteList', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('ComapnyContestFavouriteList', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('ProductContestFavouriteList', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('GiftFavouriteList', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('Profesional', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('ProfesionalLetter', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UserProductCaseStudy', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UserProductCaseStudyRequest', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UserCompanyCaseStudy', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UserCompanyCaseStudyRequest', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('ListaCuestionarioUser', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('CuestionarioBajaValue', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('ColaboradorPuntosHistorico', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('UserAuditoria as Auditorias', array(
             'local' => 'id',
             'foreign' => 'sf_guard_user_id'));

        $this->hasMany('ComentarioListaNegra', array(
             'local' => 'id',
             'foreign' => 'sf_guard_user_id'));

        $this->hasMany('Auditanos', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('Contactanos', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('OrderPreferences as orderPreferences', array(
             'local' => 'id',
             'foreign' => 'sf_guard_user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}