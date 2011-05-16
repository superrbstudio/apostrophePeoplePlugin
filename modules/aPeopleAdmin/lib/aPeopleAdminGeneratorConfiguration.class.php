<?php

/**
 * person module configuration.
 *
 * @package    pennldi
 * @subpackage person
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class aPeopleAdminGeneratorConfiguration extends BaseAPeopleAdminGeneratorConfiguration
{
	public function getEditTitle()
  {
    return 'Editing Person';
  }

  public function getNewTitle()
  {
    return 'New Person';
  }
  
}
