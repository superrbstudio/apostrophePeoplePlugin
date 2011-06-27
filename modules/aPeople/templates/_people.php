<?php use_helper('a') ?>

<?php foreach ($people as $person): ?>
<div id="person-<?php echo $person->id ?>" class="person clearfix">
  <h4 class="name clearfix">
    <a class="person-expand-toggle" href="<?php echo url_for('aPeople_showPreview', array('slug' => $person->slug)) ?>" onclick="return false"><?php echo $person->getNameAndSuffix() ?></a>
  </h4>

  <?php // Any additional information to be displayed in the list view goes here ?>
  <div class="person-info clearfix">
  </div>
  
  <div class="person-info-expanded clearfix">
  </div>
</div>
<?php endforeach ?>
