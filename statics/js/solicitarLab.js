$(document).ready(function(){
	$('#cancelarSolicitudBtn').click(function(){
  		window.close();
	});	
	
	$('.recursosLabosBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	 });
	 

})