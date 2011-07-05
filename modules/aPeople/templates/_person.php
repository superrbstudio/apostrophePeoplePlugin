<div id="person-<?php echo $person->id ?>" class="person clearfix">
  <h4 class="name clearfix">
    <a class="person-expand-toggle" href="<?php echo url_for('aPeople_showPreview', array('slug' => $person->slug)) ?>" onclick="return false"><?php echo $person->getNameAndSuffix() ?></a>
  </h4>

  <?php /* Any additional information to be displayed in the list view goes here ?>

		<div class="person-image clearfix">
		  <?php if (!is_null($person->headshot_id)): ?>
		    <?php include_component('aSlideshowSlot', 'slideshow', array(
			  	'items' => array($person->Headshot),
			  	'id' => $person->id.'-headshot',
			  	'options' => array('width' => 50, 'height' => 50, 'resizeType' => 'c', 'arrows' => false, 'idSuffix' => 'person'),
			  )) ?>
			<?php endif ?>
		</div>

	  <div class="person-info clearfix"></div>
  	<div class="person-info-expanded clearfix">
			<?php // Do Not Remove :: Ajax outputs HTML to this container ?>
		</div>
	<?php //*/ ?>

</div>
