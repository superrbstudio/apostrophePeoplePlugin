<?php
  // Compatible with sf_escaping_strategy: true
  $editable = isset($editable) ? $sf_data->getRaw('editable') : null;
  $feed = isset($feed) ? $sf_data->getRaw('feed') : null;
  $invalid = isset($invalid) ? $sf_data->getRaw('invalid') : null;
  $name = isset($name) ? $sf_data->getRaw('name') : null;
  $pageid = isset($pageid) ? $sf_data->getRaw('pageid') : null;
  $permid = isset($permid) ? $sf_data->getRaw('permid') : null;
  $options = isset($options) ? $sf_data->getRaw('options') : null;
  $slot = isset($slot) ? $sf_data->getRaw('slot') : null;
  $url = isset($url) ? $sf_data->getRaw('url') : null;
?>

<?php use_helper('a') ?>

<?php slot("a-slot-controls-$pageid-$name-$permid") ?>
		<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot, 'page' => $page, 'controlsSlot' => false, 'label' => a_get_option($options, 'editLabel', a_('Edit')))) ?>
<?php end_slot() ?>

<?php if ($people): ?>

<?php include_partial('aPeople/people_slot', array('people' => $people)) ?>

<?php else: ?>
  
<p>Click the edit button above to choose people for this slot.</p>

<?php endif ?>
