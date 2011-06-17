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
		$this->widgetSchema['sex']     = new sfWidgetFormChoice(array('choices' => array('' => '', 'Male' => 'Male', 'Female' => 'Female')));
		$this->validatorSchema['sex']  = new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'Male', 2 => 'Female'), 'required' => false));
		unset(
		  $this['headshot_id'],
		  $this['created_at'],
		  $this['updated_at'],
		  $this['slug']
		);

		// Alphabetize the Categories dropdown 
   	$this->getWidget('categories_list')->setOption('query', Doctrine::getTable('aCategory')->createQuery()->orderBy('aCategory.name asc'));	
	}
	
}
