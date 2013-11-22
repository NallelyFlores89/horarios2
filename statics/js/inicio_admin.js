$(document).ready(function(){
	//OCULTAMOS EL TOOLTIP DE DATOS UEA
	$("#datosGrupo").hide();
	
 	$('#AdministracionBtn, #Administracion2Btn, #IrRecursosAdminBtn, #ProfesoresBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	});
		
	$('.AgregarHorarioBtn').popupWindow({ 
		windowURL:base+'index.php/agregar_horario_c/index/'+trim, 
		scrollbars:'1',
		resizable:'0',
		height:500,
		width:800,
	}); 

	$('.AgregarHorarioEspBtn').popupWindow({ 
		windowURL:base+'index.php/agHorarioEsp_c/index/'+trim, 
		scrollbars:'1',
		resizable:'0',
		height:500,
		width:800,
	});
	
    $('#trimestre').change(function(){
    	var dir = base+'index.php/inicio_admin_c/horarioxTrimestre/'+$('#trimestre').val()
		location.href=dir
   	});
   	
   	$(".close").click(function(){
   		$(".close > p").html("");
   		$("#datosGrupo").hide();
   	})
	 
})

function muestraInfo(idgrupo){
	$.ajax({
		url: base+'index.php/administracion_c/traeDatosGrupoAJAX/'+idgrupo,
		dataType: "json",
		type: "POST",
		success:function(datos){ //Si el dominio no es correcto, mostrará la clase incorrecto y el mensaje de alerta
			$("#ueaNombreG").html(datos[1].nombreuea);
			$("#seccionG").html(datos[1].divisiones_iddivisiones);
			$("#profesorG").html(datos[1].nombre);
			$("#datosGrupo").show();

		}
	})	
}
