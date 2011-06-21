<?php
  use_helper('a');
?>
<div id="aPeopleCategoryForm" class="a-ui">
  <?php echo $form->renderFormTag($actionUrl) ?>
  <?php echo $form ?>
  <input type="submit" class="a-btn a-submit a-people-filter"value="Go" />
  </form>
</div>

<?php $options = array('choose-one' => a_('Select to Filter')) ?>
<?php a_js_call('aMultipleSelect(?, ?)', '#aPeopleCategoryForm', $options) ?>