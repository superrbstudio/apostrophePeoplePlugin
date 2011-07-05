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
    // Set default categories for the people sidebar as a session variable
    if ($request->getParameter('aPeopleCategoryFilter'))
    {
      $defaultCategories = array();
      $name = '';
      
      $categoryFilter = $this->getRequest()->getParameter('aPeopleCategoryFilter');

      if (!empty($categoryFilter['categories']))
      {
        $defaultCategories = $categoryFilter['categories'];
      }

      if (!empty($categoryFilter['name']))
      {
        $name = $categoryFilter['name'];
      }

      aPeopleTools::setAttribute('name_filter', $name);
      aPeopleTools::setAttribute('categories_filter', $defaultCategories);
    }

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
    $this->anchorNavigation = ($request->hasParameter('category'));

    return $this->pageTemplate;
  }
  
	public function buildQuery()
	{
		$query = Doctrine::getTable('aPerson')
      ->createQuery('p')
			->leftJoin('p.Categories c');
		$ra = $query->getRootAlias();

    $ids = $this->getQueryCategoryIds();
    if(count($ids))
		{
			$query->andWhereIn('c.id', $ids);
		}

    $name = aPeopleTools::getAttribute('name_filter');
    if (!empty($name))
    {
      $nameParts = explode(' ', $name);

      $wheres = array();
      $params = array();

      foreach ($nameParts as $part)
      {
        $part = trim($part, ', ');

        if (!empty($part))
        {
          $part = "%$part%";
          $wheres[] = "LOWER(CONCAT($ra.first_name, $ra.middle_name, $ra.last_name))";
          $params[] = "$part";

          $wheres[] = "LOWER(CONCAT($ra.first_name, $ra.last_name, $ra.middle_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.first_name, $ra.last_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.first_name, $ra.middle_name))";
          $params[] = $part;

          $wheres[] = "LOWER($ra.first_name)";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.middle_name, $ra.first_name, $ra.last_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.middle_name, $ra.last_name, $ra.first_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.middle_name, $ra.last_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.middle_name, $ra.first_name))";
          $params[] = $part;

          $wheres[] = "LOWER($ra.middle_name)";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.last_name, $ra.first_name, $ra.middle_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.last_name, $ra.middle_name, $ra.first_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.last_name, $ra.first_name))";
          $params[] = $part;

          $wheres[] = "LOWER(CONCAT($ra.last_name, $ra.middle_name))";
          $params[] = $part;

          $wheres[] = "LOWER($ra.last_name)";
          $params[] = $part;
        }
      }

      $whereString = '';
      foreach($wheres as $where)
      {
        $whereString .= " or $where LIKE ?";
      }
      $whereString = substr($whereString, 4);

      $query->addWhere($whereString, $params);
    }
		
		return $query;
	}

  protected function getQueryCategoryIds()
  {
    $ids = array();
		foreach($this->page->Categories as $category)
		{
			$ids[] = $category->id;
		}

    foreach(aPeopleTools::getAttribute('categories_filter', array()) as $id)
    {
      $ids[] = $id;
    }

    return $ids;
  }

	public function executeShowPreview(sfWebRequest $request)
	{
		$this->person = Doctrine::getTable('aPerson')->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->person);
    
	  return $this->renderPartial('aPeople/personPreview', array('person' => $this->person));
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
		
    return $this->pageTemplate;
  }
}
