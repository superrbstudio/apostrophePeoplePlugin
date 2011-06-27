<?php if ($a_person->getHeadshotId()): ?>
  <?php include_component('aSlideshowSlot', 'slideshow', array(
  	'items' => array($a_person->getHeadshot()),
  	'id' => $a_person->getId().'-headshot',
  	'options' => array('width' => 60, 'height' => 80, 'flexHeight' => false, 'resizeType' => 'c', 'constraints' => array('minimum-width' => 200, 'minimum-height' => 240, 'aspect-width' => 200, 'aspect-height' => 240)),
  )) ?>
<?php endif ?>
