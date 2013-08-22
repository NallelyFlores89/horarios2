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
//Función que sirve para la barra de búsqueda
$(document).ready(function(){
	$("#kwd_search").keyup(function(){
		if( $(this).val() != ""){
			$("#my-table tbody>tr").hide();
			$("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else{
			$("#my-table tbody>tr").show();
		}
	});

    $('#trimestre').change(function(){
    	var dir = base+'index.php/administracion_c/index/'+$('#trimestre').val()
		location.href=dir
   	});	
});

$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});