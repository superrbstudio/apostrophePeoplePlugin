function aPeopleConstructor() 
{
	this.personUrl = function(options)
	{
		var person = $(options['id']); 
		var url = options['url'];
		if (person.length)
		{
			person.data('url',url);
		}
		else
		{
			apostrophe.log('aPeople.personUrl -- No person found.');
		};
	}
	
	this.personToggle = function(options)
	{
		var toggle = $(options['toggle']);
		var method = (options['method'])? options['method']:'GET';

		toggle.bind('click.personToggle', function(e){
			e.preventDefault();
			var thisToggle = $(this)
			var person = thisToggle.closest('.a-person');
			var personContent = person.find('.a-person-content');
			
			(person.length) ? apostrophe.log('aPerson.personToggle -- No person found. ') : '';

			if (thisToggle.hasClass('ajax'))
			{
				
				var remote_url = person.data('url');
				(remote_url === undefined) ? apostrophe.log('aPerson.personToggle -- No person URL found. Cannot ajax in their data.') : '';
				
				$.ajax({
					type:method,
					dataType:'html',
					success:function(data, textStatus)
					{
						personContent.html(data);
						thisToggle.removeClass('ajax').addClass('open');
						person.removeClass('ajax').addClass('open');
					},
					url:remote_url
				}); 
				return false;
			}
			else if (thisToggle.hasClass('open'))
			{
				thisToggle.removeClass('open').addClass('closed');
				person.removeClass('open').addClass('closed');
				apostrophe.log('open');
			}
			else
			{
				thisToggle.addClass('open').removeClass('closed');
				person.addClass('open').removeClass('closed');
				apostrophe.log('closed');
			};
		});
	}
}

window.aPeople = new aPeopleConstructor();