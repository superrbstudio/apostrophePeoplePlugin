<?php use_helper('a') ?>

<?php foreach ($people as $person): ?>
<div id="person-<?php echo $person->id ?>" class="person">
  <h4 class="name">
    <a class="person-expand-toggle" href="<?php echo url_for('aPeople_show', array('slug' => $person->slug)) ?>" onclick="return false"><?php echo $person->getNameAndSuffix() ?></a>
    <div class="a-spinner a-hidden"></div>
  </h4>

  <?php // Any additional information to be displayed in the list view goes here ?>
  <div class="person-info">
  <?php if ($person->email): ?>
    <ul class="person-email">
      <li><?php echo $person->email ?></li>
    </ul>
  <?php endif ?>
  </div>
  
  <div class="person-info-expanded"></div>
</div>
<?php endforeach ?>
