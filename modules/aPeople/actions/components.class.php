<?php

/**
 * aPerson components.
 *
 * @package    cs
 * @subpackage aPerson
 * @author     P'unk Avenue
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class aPeopleComponents extends sfComponents
{
  /**
   * Executes sidebar component
   *
   * Displays the Program links that are used to filter the Person in the content area.
   *
   * @param sfRequest $request A request object
   */
  public function executeSidebar(sfWebRequest $request)
  {

  }
  
  public function executeSearch(sfWebRequest $request)
  {
    $q = $this->q;
    $this->results = Doctrine::getTable('aPerson')->createQuery('p')->where('concat(coalesce(p.first_name, ""), coalesce(p.middle_name, ""), coalesce(p.last_name, "")) LIKE ?', "%$q%")->limit(10)->execute();
  }
}