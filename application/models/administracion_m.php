<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Administracion_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
		}

		function obtenListaUeaProfesorGrupo($trim){
			$this->db->select('grupo.idgrupo,grupo.siglas, profesores.idprofesores, divisiones.nombredivision, profesores.nombre, profesores.numempleado, profesores.correo, uea.nombreuea, uea.iduea, uea.divisiones_iddivisiones, uea.clave, grupo.grupo,idlaboratorios');
			$this->db->from('grupo'); 
			$this->db->join('profesores', 'grupo.profesores_idprofesores=profesores.idprofesores');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->join('divisiones','divisiones_iddivisiones=divisiones.iddivisiones');
			$this->db->join('laboratorios_grupo','grupo.idgrupo=laboratorios_grupo.idgrupo');
			$this->db->where('trimestre_idtrim', $trim);
			$this->db->distinct(); //Para que no se repitan los datos
			$this->db->order_by('profesores.nombre');
			$listaUeaProfesorGrupo=$this->db->get();
			
			if(($listaUeaProfesorGrupo->num_rows())>0){
				$indice=1;
				
				foreach ($listaUeaProfesorGrupo->result_array() as $value) {
					$arregloUPG[$indice] = $value;
					$indice=$indice+1;
				}
				return ($arregloUPG);
			}else{
				return -1;
			}
			
		} //fin obtenListaUeaProfesorGrupo
		
		function obtenLaboratorios(){
			$this->db->select('idlaboratorios, nombrelaboratorios');
			$this->db->from('laboratorios');

			$labos=$this->db->get(); 
			$indice=1;
			if(($labos->num_rows())>0){ 
				foreach ($labos->result_array() as $value) {
					$laboratorios[$indice] = $value; 
					$indice++;
				 }
				return($laboratorios);
			}else{
				return(-1);
			}			
		} //Fin obtenLaboratorios

		function obtenDiv(){
			$this->db->select('iddivisiones, nombredivision');
			$this->db->from('divisiones');

			$labos=$this->db->get(); 
			$indice=1;
			if(($labos->num_rows())>0){ 
				foreach ($labos->result_array() as $value) {
					$laboratorios[$indice] = $value; 
					$indice++;
				 }
				return($laboratorios);
			}else{
				return(-1);
			}			
		} //Fin obtenLaboratorios				

		function obtenDatosProfesor($numEmp){
			$this->db->select('nombre, numempleado, correo');
			$this->db->from('profesores');
			$this->db->where('numempleado', $numEmp);

			$profe=$this->db->get(); 
			if(($profe->num_rows())>0){
				foreach ($profe->result_array() as $value) {
					$profesor[1] = $value; 
				 }
			
				return($profesor[1]);
			}else{
				return(-1);
			}			
		} //Fin obtenLaboratorios				

		function obtenIdProf($nombre){
			$this->db->select('idprofesores');
			$this->db->from('profesores');
			$this->db->where('nombre', $nombre);

			$ids=$this->db->get(); 
			if(($ids->num_rows())>0){
				foreach ($ids->result_array() as $value) {
					$id[1] = $value['idprofesores']; 
				 }
			
				return($id[1]);
			}else{
				return(-1);
			}			
		} //Fin obtenLaboratorios
		
		function obtenDatosUEA($clave){
			$this->db->select('iduea, nombreuea, clave, divisiones_iddivisiones');
			$this->db->from('uea');
			$this->db->where('iduea', $clave);

			$uea=$this->db->get(); 
			if(($uea->num_rows())>0){ 
				foreach ($uea->result_array() as $value) {
					$uea_a[1] = $value;
				 }
				return($uea_a[1]);
			}else{
				return(-1);
			}			
		} //Fin obtenLaboratorios	

		function obtenUEAxNombre($nombre){
			$this->db->select('iduea, nombreuea, clave, divisiones_iddivisiones');
			$this->db->from('uea');
			$this->db->where('nombreuea', $nombre);

			$uea=$this->db->get(); 
			if(($uea->num_rows())>0){ 
				foreach ($uea->result_array() as $value) {
					$uea_a[1] = $value;
				 }
				return($uea_a[1]);
			}else{
				return(-1);
			}			
		}		
		
		function obtenListaUEAS(){
			$this->db->select('iduea, nombreuea, clave, divisiones_iddivisiones, divisiones.nombredivision');
			$this->db->join('divisiones', 'uea.divisiones_iddivisiones=divisiones.iddivisiones');

			$this->db->from('uea');

			$uea=$this->db->get(); 
			if(($uea->num_rows())>0){
				$indice=1; 
				foreach ($uea->result_array() as $value) {
					$uea_a[$indice] = $value;
					$indice++;
				 }
				return($uea_a);
			}else{
				return(-1);
			}			
		} //Fin obtenLaboratorios
		
		function obtenDatosGrupo($idgrupo){
			$this->db->select('grupo.siglas, profesores.idprofesores, profesores.nombre, profesores.numempleado, profesores.correo, uea.nombreuea, uea.iduea, uea.clave, grupo.grupo,idlaboratorios, uea.divisiones_iddivisiones');
			$this->db->from('grupo'); 
			$this->db->join('profesores', 'grupo.profesores_idprofesores=profesores.idprofesores');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->join('laboratorios_grupo','grupo.idgrupo=laboratorios_grupo.idgrupo');
			$this->db->where('grupo.idgrupo',$idgrupo);
							
			$this->db->distinct(); //Para que no se repitan los datos
			$listaUeaProfesorGrupo=$this->db->get();
			
			if(($listaUeaProfesorGrupo->num_rows())>0){
				$indice=1;
				
				foreach ($listaUeaProfesorGrupo->result_array() as $value) {
					$arregloUPG[$indice] = $value;
					$indice=$indice+1;
				}
				return ($arregloUPG);
			}else{
				return -1;
			}
		}
		
		function editaUEA($uea, $nuevo_nombre, $clave, $div){
			$datos=Array(
				'nombreuea' => $nuevo_nombre,
				'clave' => $clave,
				'divisiones_iddivisiones' => $div
			);
			
			$this->db->where('nombreuea', $uea);
			$this->db->update('uea', $datos); 	
		}

		function editaU($iduea, $nuevo_nombre, $clave, $div){
			$datos=Array(
				'nombreuea' => $nuevo_nombre,
				'clave' => $clave,
				'divisiones_iddivisiones' => $div
			);
			
			$this->db->where('iduea', $iduea);
			$this->db->update('uea', $datos); 	
		}
		function obtenGruposxProf($idprofesor){
			$this->db->select('idgrupo');
			$this->db->from('grupo');
			$this->db->where('profesores_idprofesores', $idprofesor);

			$res=$this->db->get(); 
			if(($res->num_rows())>0){ 
				$indice=1;
				foreach ($res->result_array() as $value) {
					$resultado[$indice] = $value; 
					$indice++;
				 }
				return($resultado);
			}else{
				return(-1);
			}						
		}
		
		function obtenDatosLaboratoriosGrupo($idgrupo, $idtrim){
			$this->db->select('idlaboratorios, semanas_idsemanas, dias_iddias, horarios_idhorarios');
			$this->db->from('laboratorios_grupo');
			$this->db->where('idgrupo', $idgrupo);
			$this->db->where('trimestre_idtrim', $idtrim);
			$res=$this->db->get(); 
			if(($res->num_rows())>0){ 
				$indice=1;
				foreach ($res->result_array() as $value) {
					$resultado[$indice] = $value; 
					$indice++;
				 }
				return($resultado);
			}else{
				return(-1);
			}			
			
		}

		function obtenDatosLaboratoriosGrupo2($idgrupo, $idlab){
			$this->db->select('semanas_idsemanas, dias_iddias, horarios_idhorarios');
			$this->db->where('idgrupo', $idgrupo);
			$this->db->where('idlaboratorios', $idlab);
			
			$res=$this->db->get('laboratorios_grupo'); 
			if(($res->num_rows())>0){ 
				$indice=1;
				foreach ($res->result_array() as $value) {
					$resultado[$indice] = $value; 
					$indice++;
				 }
			
				return($resultado);
			}else{
				return(-1);
			}			
			
		}		
		function editaGrupo($idgrupo, $nuevo_grupo, $nuevas_siglas, $iduea){ //Edita las columnas de la tabla grupo
			echo "entra editaGrupo con el id $idgrupo <br>";
			$datos=Array(
				'grupo' => $nuevo_grupo,
				'siglas' => $nuevas_siglas,
				'uea_iduea' => $iduea
			);
			
			$this->db->where('idgrupo', $idgrupo);
			$this->db->update('grupo', $datos); 			
		}
		
		function actualizaU($iduea, $iddiv){
			$datos=Array(
				'divisiones_iddivisiones' => $iddiv,
			);
			
			$this->db->where('iduea', $iduea);
			$this->db->update('uea', $datos); 			
		}

		function borraGrupo($idgrupo, $idlab, $idtrim){ //Esta función se utiliza para cambiar de horario
			$datos=Array(
				'idgrupo' => $idgrupo,
				'idlaboratorios' => $idlab,
				'trimestre_idtrim' => $idtrim
				);
		
			$this->db->delete('laboratorios_grupo', $datos); 	
		}
		
		function eliminaGrupo($idgrupo){ //Esta función elimina el grupo definitivamente 
			//Primero, eliminamos el grupo de la tabla laboratorios_grupo
			$datos=Array(
				'idgrupo' => $idgrupo,
			);
			$this->db->delete('laboratorios_grupo', $datos); 	

			//Después eliminamos el grupo
			$datos=Array( 'idgrupo' => $idgrupo	);
			$this->db->delete('grupo', $datos); 				
		}


		function eliminaUEA($iduea){ //Esta función elimina la UEA 
			$this->db->select('idgrupo');
			$this->db->from('grupo');
			$this->db->where('uea_iduea', $iduea);

			$grupos=$this->db->get(); //Obteniendo ids de los grupos a eliminar
			 
			$indice=1;
			foreach ($grupos->result_array() as $value) {
				//Primero, eliminamos el grupo de la tabla laboratorios_grupo					
				$datos=Array(
					'idgrupo' => $value['idgrupo'],
				);
				$this->db->delete('laboratorios_grupo', $datos); 					
				
				//Después eliminamos el grupo
				$datos=Array('idgrupo' => $value['idgrupo']);
				$this->db->delete('grupo', $datos); 	
			}
			$datos=Array(  //Finalmente, eliminamos la UEA
				'iduea' => $iduea
			);
			$this->db->delete('uea', $datos); 				
		}

		function eliminaProfesor($id){
			$datos = Array(	'idprofesores' => $id);
			$this->db->delete('profesores', $datos); 	
		}
		
		function cambiaProfesor($idgrupo, $idprof){
			$datos = Array(	'profesores_idprofesores' => $idprof);
			$this->db->where('idgrupo', $idgrupo);
			$this->db->update('grupo', $datos); 
		}
						
		function editaLabo($idlab, $idgrupo, $iddia, $idsem, $idhora){
			$datos= Array('idgrupo'=>$idgrupo);
			$this->db->where('idlaboratorios',$idlab);
			$this->db->where('semanas_idsemanas', $idsem);
			$this->db->where('dias_iddias', $iddia);
			$this->db->where('horarios_idhorarios', $idhora);
			$this->db->update('laboratorios_grupo', $datos); 			
		}		
	
	} //Fin de la clase

?>


		

 