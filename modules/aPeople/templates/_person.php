<?php if ($person->getLink()): ?>
<div class="person-website">
   <?php echo link_to('View Website', $person->getLink()) ?>
 </div>
<?php endif ?>
 
<?php if ($person->getHeadshotId()): ?>
<div class="person-image">
  <?php include_component('aSlideshowSlot', 'slideshow', array(
  	'items' => array($person->getHeadshot()),
  	'id' => $person->getId().'-headshot',
  	'options' => array('width' => 100, 'height' => 80, 'resizeType' => 'c', 'arrows' => false )
  )) ?>
</div>
<?php endif ?>							

<div class="person-info">
	<?php if ($person->getBody()): ?>
		<div class="class"><?php echo html_entity_decode($person->getBody()) ?></div>
	<?php endif ?>
	<?php if ($person->getEmail()): ?>
		<div class="email"><?php echo mail_to($person->getEmail(), $person->getEmail()) ?></div>
	<?php endif ?>
</div>