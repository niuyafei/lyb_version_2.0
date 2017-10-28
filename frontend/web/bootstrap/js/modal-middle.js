$('.modal').on('show.bs.modal', function(e) {
	$(this).find('.modal-dialog').css({
		'top': function() {
			var modalHeight = $('.modal').find('.modal-dialog').height();
			return ($(window).height() / 4 - (modalHeight / 2));
		}
	});
});