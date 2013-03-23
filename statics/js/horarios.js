$(document).ready(function(){

 	$('.solicitarLabosBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	});
	
	 $('.recursosLabosBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	 });
	 
})
