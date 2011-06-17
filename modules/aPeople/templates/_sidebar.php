<h4><a href="" id="school-filter" class="a-people-nav-toggle">By Categories</a></h4>

<div id="aPeopleCategoryForm">
  <?php echo $form->renderFormTag($actionUrl) ?>
  <?php echo $form ?>
  <input type="submit" value="Filter" />
  </form>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    aMultipleSelect("#aPeopleCategoryForm", {'choose-one' : 'Choose a Category'});
  });

</script>