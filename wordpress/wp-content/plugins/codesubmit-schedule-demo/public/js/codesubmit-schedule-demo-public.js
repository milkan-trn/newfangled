(function( $ ) {
	'use strict';

	var modal = $("#schedule-demo-modal");
	var button = $("#schedule-demo-modal-button");
	var close = $(".close");
	
	button.click(function() {
		modal.css("display", "block");
	});
	
	close.click(function() {
		modal.css("display", "none");
	});
	
	$(window).click(function(event) {
		if (event.target === modal[0]) {
			modal.css("display", "none");
		}
	});

})( jQuery );
