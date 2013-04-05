function ventanaEliminaGrupo(idgrupo){
	liga=base+'index.php/administracion_c/elimina_grupo/'+idgrupo
	window.open(liga, 'Elimina Grupo', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function ventanaEliminaUea(claveuea){
	liga=base+'index.php/administracion_c/elimina_uea/'+claveuea
	window.open(liga, 'Elimina UEA', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function edita(iduea){
	liga=base+'index.php/ueas_c/edita/'+iduea
	window.open(liga, 'Edita Uea', 'status=1,width=450,height=520, resizable=0, scrollbars=1') 
	return 0;	
}

function ventanaAgregaU(){
	liga=base+'index.php/ueas_c/agrega/'
	window.open(liga, 'Agrega uea', 'status=1,width=450,height=520, resizable=0, scrollbars=1') 
	return 0;	
	
}

function ventanaEdita(idgrupo){
	liga=base+'index.php/administracion_c/edita/'+idgrupo
	window.open(liga, 'Edita', 'status=1,width=850,height=520, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaLabo(idgrupo,lab){
	liga=base+'index.php/administracion_c/cambia_labo/'+idgrupo+'/'+lab
	window.open(liga, 'Cambia laboratorio', 'status=1,width=300,height=420, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaProfe(idgrupo, idprofesor){
	liga=base+'index.php/administracion_c/cambiaProfe/'+idgrupo+'/'+idprofesor
	window.open(liga, 'Cambia profesor', 'status=1,width=400,height=420, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaHora(idgrupo, siglas, idlab){
	liga=base+'index.php/administracion_c/cambiaHora/'+idgrupo+'/'+siglas+'/'+idlab
	window.open(liga, 'Cambia hora', 'status=1,width=900,height=400, resizable=0, scrollbars=1') 
	return 0;
}

//Función que sirve para la barra de búsqueda
$(document).ready(function(){
	$("#kwd_search").keyup(function(){
		if( $(this).val() != "")
		{
			$("#my-table tbody>tr").hide();
			$("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else
		{
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