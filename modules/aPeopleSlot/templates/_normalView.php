<?php include_partial('a/simpleEditButton', array('name' => $name, 'pageid' => $pageid, 'permid' => $permid)) ?>
<?php if ($people): ?>

<?php include_partial('aPeople/people', array('people' => $people)) ?>

<?php else: ?>
  
<p>Click the edit button above to choose people for this slot.</p>

<?php endif ?>
