$(document).ready(function(){
	$('.AgregarRecursosBtn').popupWindow({ 
		scrollbars:'1',
		height:350,
		width:800,

	});
	
	$('.VaciarRecursosBtn').popupWindow({ 
		scrollbars:'1',
		height:350,
		width:800,

	});  
})

function ventanaElimina(idrecurso, idlab){
	liga= base + 'index.php/recursos_admin_c/eliminar_recurso/'+idrecurso+'/'+idlab
	window.open(liga, 'Confirmación', 'status=1,width=310,height=320, resizable=0') 
}

function ventanaEdita(idrecurso){
	liga= base + 'index.php/recursos_admin_c/editar_recurso/'+idrecurso
	window.open(liga, 'Confirmación', 'status=1,width=310,height=320, resizable=0') 
}