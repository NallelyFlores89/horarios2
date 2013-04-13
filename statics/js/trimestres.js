function limpiar(id,trim){
	liga=base+'index.php/trimestres_c/limpiar/'+id+'/'+trim
	window.open(liga, 'Limpiar horarios', 'status=1,width=810,height=420, resizable=0')
	return 0;
} 

function eliminar(id,trim){
	liga=base+'index.php/trimestres_c/eliminar/'+id+'/'+trim
	window.open(liga, 'Eliminar trimestre', 'status=1,width=350,height=320, resizable=0')
	return 0;
}

function agregar(){
	liga=base+'index.php/trimestres_c/agregar'
	window.open(liga, 'Agregar trimestre', 'status=1,width=350,height=360, resizable=0')
	return 0;
}