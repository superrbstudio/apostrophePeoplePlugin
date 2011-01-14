<?php foreach ($people as $person): ?>
<div id="a-person-<?php echo $person->getId() ?>" class="a-person ajax">
	<p class="name">
		<a href="#" class="person-expand-toggle ajax" id="person-expand-toggle-<?php echo $person->getId() ?>"><?php echo $person->getName() ?></a>
  </p>
	<div class="a-person-content" id="a-person-content-<?php echo $person->getId() ?>"></div>
	<?php // We need a way to get an individual person's URL into javascript land so lets attach it to the #personID as .data() ?>
	<?php a_js_call('aPeople.personUrl(?)', array('id' => '#a-person-'.$person->getId(), 'url' => url_for('aPeople_show', array('slug' => $person->getSlug())))) ?>	
</div>
<?php endforeach ?>

