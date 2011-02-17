<?php

/**
 * PluginaPerson form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginaPersonForm extends BaseaPersonForm
{
	public function setup()
	{
		parent::setup();
		$this->widgetSchema['body']    = new aWidgetFormRichTextarea(array('editor' => 'fck', 'height' => '300', 'width' => '500'));
		$this->validatorSchema['body'] = new sfValidatorHtml(array('required' => false));
		$this->widgetSchema['created_at']    = new awidgetformjquerydate(array('image' => '/apostrophePlugin/images/a-icon-datepicker.png'));
		$this->validatorSchema['created_at'] = new sfValidatorDate(array('required' => false));
		$this->widgetSchema['updated_at']    = new awidgetformjquerydate(array('image' => '/apostrophePlugin/images/a-icon-datepicker.png'));
		$this->validatorSchema['updated_at'] = new sfValidatorDate(array('required' => false));
		unset($this['headshot_id']);

		// Alphabetize the Categories dropdown 
   	$this->getWidget('categories_list')->setOption('query', Doctrine::getTable('aCategory')->createQuery()->orderBy('aCategory.name asc'));	
	}
	
}
