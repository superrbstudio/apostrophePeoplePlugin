<h4><a href="" id="school-filter" class="a-people-nav-toggle">By Schools</a></h4>

<?php /* ?>
<h4><a href="" id="tag-filter" class="a-people-nav-toggle">By Research Interests</a></h4>
<div class="a-nav-subnav a-people-nav research-interests-subnav">
<?php foreach ($categoryGroups as $group): ?>
	<?php if (count($group->getCategoriesOrderByAlpha())): ?>
		<h5 class="research-interests-set"><?php echo $group ?></h5>
		<ul>
		<?php foreach ($group->getCategoriesOrderByAlpha() as $category): ?>
		  <li class="a-nav-item person-interest<?php echo ($sf_params->get('category') == $category) ? ' a-current-page' : '' ?>"><?php echo link_to($category, 'person_interest', array('category' => $category->getSlug())) ?></li>	
		<?php endforeach ?>
		</ul>
	<?php endif ?>
<?php endforeach ?>
<span class="a-btn icon a-close nobg">Close</span>
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.a-people-nav-toggle').click(function(event){
			event.preventDefault();
			var toggle = $(this);
			if (toggle.hasClass('open')) {
				toggle.parent().next().hide();
			}
			else
			{
				$(this).parent().next().fadeIn();
			};
			toggle.toggleClass('open');
		});
		$('.a-people-nav .a-close').click(function(event){
			event.preventDefault();
			var close = $(this);
			close.parent().prev().children().removeClass('open');
			close.parent().hide();
		});
	});
</script>
<?php //*/ ?>