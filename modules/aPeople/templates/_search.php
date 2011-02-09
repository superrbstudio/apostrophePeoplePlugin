<ul class="people-search-results">
  <?php foreach ($results as $person): ?>
    <li><?php echo link_to($person, 'aPeople/show?' . http_build_query(array('slug' => $person->slug))) ?></li>
  <?php endforeach ?>
</ul>
