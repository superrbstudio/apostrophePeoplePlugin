<?php foreach ($people as $person): ?>
<div id="a-person-<?php echo $person->getId() ?>" class="a-person">
	<p class="name">
		<?php echo link_to($person->getName(), 'aPeople_show', array('slug' => $person->getSlug())) ?>
  </p>
</div>
<?php endforeach ?>

