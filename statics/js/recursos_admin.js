$(document).ready(function(){
	//Agrega más inputs para que el administrador pueda agregar más de un recurso a la vez
	agrega = 1;
	$("#agMas").click(function(){
		agrega = agrega+1
		aux = '<label class="" for="recursoInput'+agrega+'">Recurso'+agrega+'</label>'
		aux2 = '<input type="text" id="recursoInput'+agrega+'" name="recursos[]"/>'
		$("#recNombre").append(aux).append(aux2)
		aux = '<label class="" for="rLink'+agrega+'">Link de descarga</label>'
		aux2 = '<input type="text" id="rLink'+agrega+'" name="rLink'+agrega+'"/>'	
		$("#links").append(aux).append(aux2)
	})

	$('.AgregarRecursosBtn').popupWindow({ 
		scrollbars:'1',
		height:450,
		width:900,

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