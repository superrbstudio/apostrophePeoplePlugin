<?php

/**
 * aPerson actions.
 *
 * @package    cs
 * @subpackage aPerson
 * @author     P'unk Avenue
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PluginaPeopleActions extends aEngineActions
{
  /**
   * Executes index action
   *
   * Displays a list of Persons based on the PersonTypes selected in the engine settings.
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $query = $this->buildQuery(); 
    $this->navChars    = Doctrine::getTable('aPerson')->getAtoZ($request->getParameter('category'), null, $query);
		$query = $this->buildQuery();
    $this->peopleChars = Doctrine::getTable('aPerson')->getAtoZ($request->getParameter('category'), $request->getParameter('char'), $query);
		
		$peopleCount = 0;
		foreach ($this->navChars as $char => $people)
		{
			foreach ($people as $person)
			{
				$peopleCount++;
			}
		}
		$this->peopleCount = $peopleCount;
		
    // if we are filtering by tag or by school, we want to use A-Z links as anchors
    // otherwise, the list will be too long and we will want to browse by alpha
    $this->anchorNavigation = ($request->hasParameter('category') || $request->hasParameter('viewAll'));

    if ($request->hasParameter('viewAll'))
    {
      $this->setTemplate('viewAll');
    }
  }
  
	public function buildQuery()
	{
		$query = Doctrine::getTable('aPerson')
      ->createQuery('p')
			->leftJoin('p.Categories c');
		
		$ids = array();
		foreach($this->page->Categories as $category)
		{
			$ids = $category->id;
		}
		if(count($ids))
		{
			$query->andWhereIn('c.id', $ids);
		}
		
		return $query;
	}

  /**
   * Executes show action
   *
   * Displays more detailed information about a single Person. 
   *
   * @param sfRequest $request A request object
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->person = Doctrine::getTable('aPerson')->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->person);
    
    if ($request->getParameter('slim'))
    {
      return $this->renderPartial('aPeople/personSlim', array('person' => $this->person));
    }
    else
    {
      return $this->renderPartial('aPeople/person', array('person' => $this->person));
    }
			//	Should probably be something like this? so when slide-down ajax
			//  stuff isn't happening you get the showsuccess page
			
			//     if ($request->getParameter('ajax'))
			//     {
			//       return $this->renderPartial('aPeople/person', array('person' => $this->person));
			//     }
			//     else
			//     {
			// return;
			//     }


  }
}
