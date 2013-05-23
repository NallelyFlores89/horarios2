$(document).ready(function(){
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
	 
})
