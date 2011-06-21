<?php if ($a_person->getHeadshotId()): ?>
  <?php include_component('aSlideshowSlot', 'slideshow', array(
  	'items' => array($a_person->getHeadshot()),
  	'id' => $a_person->getId().'-headshot',
  	'options' => array('width' => 80, 'height' => 100, 'flexHeight' => false, 'resizeType' => 'c', 'constraints' => array('minimum-width' => 160, 'minimum-height' => 200, 'aspect-width' => 160, 'aspect-height' => 200)),
  )) ?>
<?php endif ?>
