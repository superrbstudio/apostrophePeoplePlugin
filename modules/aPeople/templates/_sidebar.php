<?php use_helper('a') ?>

<form id="aPeopleCategoryForm" class="a-ui a-people-category-form">
	<div class="a-form-row a-hidden">
		<?php echo $form->renderHiddenFields() ?>
	</div>
	<div class="a-form-row name">
		<?php echo $form['name']->renderLabel('Name') ?>
		<div class="a-form-field">
			<?php echo $form['name']->render() ?>
		</div>
		<?php echo $form['name']->renderError() ?>
	</div>
	<div class="a-form-row categories" id="aPeople-categories">
		<?php echo $form['categories']->renderLabel('Categories') ?>
		<div class="a-form-field">
			<?php echo $form['categories']->render() ?>
		</div>
		<?php echo $form['categories']->renderError() ?>
	</div>
	<div class="a-form-row submit">
				<?php echo a_submit_button('Filter', array('big','a-people-filter')) ?>			
	</div>
</form>

<?php a_js_call('aMultipleSelect(?, ?)', '#aPeople-categories', array('choose-one' => a_('Choose Categories'))) ?>