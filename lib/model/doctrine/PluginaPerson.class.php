<?php

/**
 * Person
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    pennldi
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginaPerson extends BaseaPerson
{
  protected $engineSlug = null;
  
  public function getName()
  {
    if ($this->getMiddleName())
    {
      return $this->getFirstName() . ' ' . $this->getMiddleName() . ' ' . $this->getLastName();
    }

    return $this->getFirstName() . ' ' . $this->getLastName();
  }
  
  public function getNameAndSuffix()
  {
    $name = $this->getName();
    
    if ($this->getSuffix()) $name .= ', ' . $this->getSuffix();
    
    return $name;
  }
  
  /**
   * This function attempts to find the "best" engine to route a given person to.
   * based on the categories that are used on various engine pages.
   *
   * @return aPage the best engine page
   */
  public function findBestEngine()
  {
    return Doctrine::getTable('aPage')->findOneBy('slug', $this->getEngineSlug());
  }

  public function getEngineSlug()
  {    
    if(!isset($this->engineSlug))
    {
      $this->engineSlug = aEngineTools::getEngineSlug($this);
    }

    return $this->engineSlug;
  }
  
}
