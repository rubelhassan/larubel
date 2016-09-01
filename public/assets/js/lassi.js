$(document).ready(function() {
	$('.toggle').click(function() {
		console.log('hello');
		$('.nav').slideToggle();
	});

	$('.submenu').click(function() {
		$(this).children('ul').slideToggle();
	});
});