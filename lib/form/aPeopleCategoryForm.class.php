<?php

class aPeopleCategoryForm extends BaseForm
{
  public function  configure() {
    parent::configure();


    $categories = Doctrine_Query::create()
      ->from('aCategory INDEXBY id')
      ->select('name')
      ->fetchArray();

    $choices = array();

    foreach($categories as $id => $category)
    {
      $choices[$id] = $category['name'];
    }

    $this->widgetSchema['categories'] = new sfWidgetFormChoice(array('multiple' => true, 'choices' => $choices));
    $this->validatorSchema['categories'] = new sfValidatorChoice(array('choices' => array_keys($choices)));

    $this->widgetSchema->setNameFormat('aPeopleCategoryFilter[%s]');
  }
}