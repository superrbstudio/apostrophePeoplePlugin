<?php
class aPeopleSlotComponents extends BaseaSlotComponents
{
  public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new aPeopleSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
    
    $this->people = false;
    if ($this->values)
    {
      $this->people = Doctrine::getTable('aPerson')
        ->createQuery()
        ->whereIn('id', $this->values['people'])
        ->execute();
    }
  }
}
