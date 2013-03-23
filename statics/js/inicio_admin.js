$(document).ready(function(){
 	$('#AdministracionBtn, #Administracion2Btn, #IrRecursosAdminBtn, #ProfesoresBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	});
		
	$('.AgregarHorarioBtn').popupWindow({ 
		windowURL:base+'index.php/agregar_horario_c', 
		scrollbars:'1',
		resizable:'0',
		height:500,
		width:800,
	}); 

	$('.AgregarHorarioEspBtn').popupWindow({ 
		windowURL:base+'index.php/agHorarioEsp_c', 
		scrollbars:'1',
		resizable:'0',
		height:500,
		width:800,
	});
	
	$('.vaciarHorariosBtn').popupWindow({ 
		windowURL:base+'index.php/vaciar_confirm_c', 
		scrollbars:'1',
		resizable:'0',
		height:400,
		width:770,
	});
	 
})
