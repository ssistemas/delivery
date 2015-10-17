var host = window.location.origin;

$(document).ready(function(){
	$("#loading").hide();
	// $('.money').mask('000.000.000.000.000,00', {reverse: true});
	$('.money2').mask("#.##0,00", {reverse: true});
});

window.setTimeout(function(){
	$(".alert").fadeTo(500, 0).slideUp(500, function(){
		$(this).remove();
	});
}, 5000);