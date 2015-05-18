$(document).ready(function(){
	
	$('input.submit').click(function(){
		var grupo = $('.grupo').val();

        //var x = document.getElementById("grupo").value;

		$('#carga').load('./wq.php', { grupo: grupo }, alert ('Termino de cargar :D'));
		
		return false;
	});
	
});
