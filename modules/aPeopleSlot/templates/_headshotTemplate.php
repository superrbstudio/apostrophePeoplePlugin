<?php
  // Compatible with sf_escaping_strategy: true
  $editable = isset($editable) ? $sf_data->getRaw('editable') : null;
  $item = isset($item) ? $sf_data->getRaw('item') : null;
  $itemId = isset($itemId) ? $sf_data->getRaw('itemId') : null;
  $name = isset($name) ? $sf_data->getRaw('name') : null;
  $options = isset($options) ? $sf_data->getRaw('options') : null;
  $page = isset($page) ? $sf_data->getRaw('page') : null;
  $pageid = isset($pageid) ? $sf_data->getRaw('pageid') : null;
  $permid = isset($permid) ? $sf_data->getRaw('permid') : null;
  $slot = isset($slot) ? $sf_data->getRaw('slot') : null;
  $slug = isset($slug) ? $sf_data->getRaw('slug') : null;
?>
<?php foreach ($people as $person): ?>
<div id="a-person-<?php echo $person->getId() ?>" class="a-person headshot">
	<?php if ($person->getHeadshotId()): ?>
		<div class="person-image">
		  <?php include_component('aSlideshowSlot', 'slideshow', array(
		  	'items' => array($person->getHeadshot()),
		  	'id' => $person->getId().'-headshot',
		  	'options' => $options['slideshowOptions']
		  )) ?>
		</div>
	<?php endif ?>
	<div class="name">
		<?php echo link_to($person->getName(), 'aPeople_show', array('slug' => $person->getSlug())) ?>
  </div>
	<div class="department">
		<?php echo ($person->getDepartment()) ?>
  </div>
	<div class="email">
		<?php echo mail_to($person->getEmail(), $person->getEmail()) ?>
	</div>
	<div class="body">
		<?php echo aHTML::limitWords(html_entity_decode($person->getBody()), 15, array('append_ellipsis' => true, )) ?>
	</div>
	<div class="read-more">
		<?php echo link_to('View&nbsp;'.$person->getFirstName().'&#x27;s Profile', 'aPeople_show', array('slug' => $person->getSlug())) ?>
	</div>
</div>
<?php endforeach ?>

&#x27;