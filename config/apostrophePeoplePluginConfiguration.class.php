<?php

/**
 * aPeoplePlugin configuration.
 * 
 * @package     apostrophePeoplePlugin
 * @subpackage  config
 * @author      Your name here
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class apostrophePeoplePluginConfiguration extends sfPluginConfiguration
{

  static $registered = false;
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    // Yes, this can get called twice. This is Fabien's workaround:
    // http://trac.symfony-project.org/ticket/8026
    
    if (!self::$registered)
    {
      $this->dispatcher->connect('a.merge_category', array($this, 'listenToMergeCategory'));
      
      self::$registered = true;
    }
  }

  public function listenToMergeCategory($event)
  {
    Doctrine::getTable('aPersonToACategory')->mergeCategory($event['old_id'], $event['new_id']);
  }
}
