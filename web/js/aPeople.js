function aPeopleConstructor()
{
	this.indexSuccess = function(options) {

	  $('a.person-expand-toggle').click(function() {

	    var toggle = $(this);
	    var url = toggle.attr('href');
	    var person = toggle.closest('.person');
	    var personInfo = person.find('div.person-info');
	    var bodyExpanded = person.find('div.person-info-expanded');

			toggle.toggleClass('open');

	    // If this person's info is toggled open, hide it
	    if (bodyExpanded.hasClass('expanded'))
	    {
	      bodyExpanded.hide();
	      bodyExpanded.removeClass('expanded');
	      personInfo.show();
	    }
	    else
	    {
	      $.ajax({
	        type: 'post',
	        url: url,
	        success: function(data) {
	          personInfo.hide();
	          bodyExpanded.html(data);
	          bodyExpanded.addClass('expanded');
	          bodyExpanded.show();
	        },
	        dataType: 'html',
	      });
	    };
	  });
	};
}

window.aPeople = new aPeopleConstructor();