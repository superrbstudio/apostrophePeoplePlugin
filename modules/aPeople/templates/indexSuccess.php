<?php slot('body_class','a-person index') ?>

<?php slot('a-subnav') ?>
<div class="a-subnav-wrapper blog a-ui clearfix">
	<div class="a-subnav-inner">
		<h4 class="filter-title">Filter Fellows</h4>
		<?php include_component('aPeople', 'sidebar') ?>
	</div>
</div>
<?php end_slot() ?>

<div class="a-area a-area-body">

	<ul class="alphabet-navigation">
	<?php foreach ($navChars as $char => $people): ?>
		<?php if (count($people)): ?>
      <?php if ($anchorNavigation): ?>
  			<li><a href="#<?php echo $char ?>"><?php echo $char; ?></a></li>
      <?php else: ?>
  			<li><?php echo link_to($char, 'aPeople_char', array('char' => $char), array('class' => ($char == $sf_params->get('char')) ? 'active' : '')) ?></a></li>
      <?php endif ?>
		<?php else: ?>
			<li><span><?php echo $char; ?></span></li>			
		<?php endif ?>		
	<?php endforeach ?>
	  <li class="last"><?php echo link_to('View All People', 'aPeople') ?></li>
	</ul>
	
	<?php if (isset($school)): ?>
		<h4 class="filter-sentence">You are viewing people within <?php echo $school ?>. <a href="<?php echo url_for('aPeople') ?>">View Everyone</a></h4>
	<?php endif ?>
	
	<?php if ($sf_params->get('category')): ?>
		<h4 class="filter-sentence">You are viewing people interested in "<?php echo $category ?>." <a href="<?php echo url_for('aPeople') ?>">View Everyone</a></h4>
	<?php endif ?>
	
	<div class="people">
	<?php foreach ($peopleChars as $char => $people): ?>
		<?php if (count($people)): ?>
		<a class="person-anchor" name="<?php echo $char ?>"></a>
		<h3 class="person-letter"><?php echo $char ?></h3>
      <?php include_partial('aPeople/people', array('people' => $people)) ?>
		<?php endif ?>
	<?php endforeach ?>
	</div>
	
	<ul class="alphabet-navigation">
	<?php foreach ($navChars as $char => $people): ?>
		<?php if (count($people)): ?>
      <?php if ($anchorNavigation): ?>
  			<li><a href="#<?php echo $char ?>"><?php echo $char; ?></a></li>
      <?php else: ?>
  			<li><?php echo link_to($char, 'aPeople_char', array('char' => $char), array('class' => ($char == $sf_params->get('char')) ? 'active' : '')) ?></a></li>
      <?php endif ?>
		<?php else: ?>
			<li><span><?php echo $char; ?></span></li>			
		<?php endif ?>		
	<?php endforeach ?>
    <li class="last"><?php echo link_to('View All People', 'aPeople') ?></li>
	</ul>
</div>

<?php a_js_call('aPeople.personToggle(?)', array('toggle' => '.person-expand-toggle')) ?>