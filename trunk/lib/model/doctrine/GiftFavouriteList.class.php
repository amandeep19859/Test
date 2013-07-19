<?php

/**
 * GiftFavouriteList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class GiftFavouriteList extends BaseGiftFavouriteList
{

  /**
   * craete favourit record into db
   * @param String $user_id User Id
   * @param String $gift_id Gift Id
   */
  public function create($user_id, $gift_id){
    //set attributes
    $this->setUserId($user_id);
    $this->setGiftId($gift_id);
    $this->setCreatedAt(date('Y-m-d H:i:s'));
    //inset record into db
    $this->save();
  }
}