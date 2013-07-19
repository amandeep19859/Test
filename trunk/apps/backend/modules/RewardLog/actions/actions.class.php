<?php

require_once dirname(__FILE__) . '/../lib/RewardLogGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/RewardLogGeneratorHelper.class.php';

/**
 * RewardLog actions.
 *
 * @package    symfony
 * @subpackage RewardLog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RewardLogActions extends autoRewardLogActions {

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);
    
    $tempFilters = $this->getFilters();      

    // process for customize filter query

    if(isset($tempFilters['cash']['text']) && trim($tempFilters['cash']['text']) != "")
    {
      $cash = trim($tempFilters['cash']['text']);

      $cashTemp = str_replace('.', '', $cash);            
      $cashTemp2 = str_replace(',', '.', $cash);
      $cashTemp3 = str_replace(',', '', $cash);

      $tempFilters['cash']['text']= '';      

    }
    
    if(isset($tempFilters['gift']['text']) && trim($tempFilters['gift']['text']) != "")
    {
      $gift = trim($tempFilters['gift']['text']);
      $tempFilters['gift']['text']= '';
    }

    
    $query = $this->filters->buildQuery($tempFilters);
    
    $filter_column = $this->getUser()->getAttribute('RewardLog.filters', null, 'admin_module');
    $this->filtershow = $filter_column;

    if(isset($cash))
    {      
      // process for customize filter query
      $query->andWhere('cash  LIKE \'%' . addslashes($cash) . '%\''.' OR cash  LIKE \'%' . addslashes($cashTemp) . '%\''. ' OR cash  LIKE \'%' . addslashes($cashTemp2) . '%\''.' OR cash  LIKE \'%' . addslashes($cashTemp3) . '%\'');
      
    }
    
    if(isset($gift))
    {
      // process for customize filter query
      $query->andWhere('gift  LIKE \'%' . addslashes($gift) . '%\'');

    }

    
    $this->addSortQuery($query);
    //echo $query->getSqlQuery();exit;
    
    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }


  public function executeUpdate(sfWebRequest $request) {
    $this->reward_log = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->reward_log);

    if ($request->getMethod() == sfWebRequest::PUT) {
      $reward_log_parameters = $request->getParameter($this->form->getName());
      $reward_log_parameters['created_at'] = $this->reward_log->getCreatedAt();
      $this->form->bind($reward_log_parameters);

      if ($this->form->isValid()) {
          $this->form->save();
          $this->getUser()->setFlash('notice', 'The item was updated successfully.');
          $this->redirect('@reward_log');
      }
    }

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request) {    
    $this->reward_log = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->reward_log);
    $cash = $this->getUser()->getMoneyInFormat($this->reward_log->getCash());
    $this->form->setDefault('cash', $cash);
  }

  public function executeCreate(sfWebRequest $request) {
    $this->form = $this->configuration->getForm();
    $this->reward_log = $this->form->getObject();

    if ($request->getMethod() == sfWebRequest::POST) {    
      
      $reward_log_parameters = $request->getParameter($this->form->getName());
      $reward_log_parameters['created_at'] = date('Y-m-d H:i:s');
      $reward_log_parameters['updated_at'] = date('Y-m-d H:i:s');
      $this->form->bind($reward_log_parameters);

      if ($this->form->isValid()) {
          $this->form->save();
          $this->getUser()->setFlash('notice', 'The item was created successfully.');
          $this->redirect('@reward_log');
      }
    }

    $this->setTemplate('new');
  }

}
