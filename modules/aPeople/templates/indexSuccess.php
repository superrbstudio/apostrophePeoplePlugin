<?php slot('body_class','a-person index') ?>

<?php slot('a-subnav') ?>
<div class="a-ui a-subnav-wrapper clearfix">
	<div class="a-subnav-inner">
		<h4 class="filter-title">Filter By:</h4>
		<?php include_component('aPeople', 'sidebar') ?>
	</div>
</div>
<?php end_slot() ?>

<div class="people-wrapper">
  <?php include_partial('aPeople/alphabetNav', array('navChars' => $navChars, 'anchorNavigation' => $anchorNavigation, 'sf_params' => $sf_params)) ?>
	
	<div class="people clearfix">
	  <?php foreach ($peopleChars as $char => $people): ?>
  		<?php if (count($people)): ?>
  		  <a class="person-anchor" name="<?php echo $char ?>"></a>
  		  <h3 class="person-letter"><?php echo $char ?></h3>
        <?php include_partial('aPeople/people', array('people' => $people)) ?>
  		<?php endif ?>
  	<?php endforeach ?>
	</div>

	<?php include_partial('aPeople/alphabetNav', array('navChars' => $navChars, 'anchorNavigation' => $anchorNavigation, 'sf_params' => $sf_params)) ?>
</div>
