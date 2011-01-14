<?php slot('body_class','a-person') ?>

<?php slot('a-subnav') ?>
<div class="col1">
	<?php include_component('aPeople', 'sidebar') ?> &nbsp;
</div>
<?php end_slot() ?>

<h1><?php echo $person->getName() ?></h1>