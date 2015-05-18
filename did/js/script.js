$(document).ready(function(){

	$('input.submit').click(function(){

		var client = $('.client').val();

        $('#carga').load('./troncatable.php', {client:client});
		return false;
	});

});
