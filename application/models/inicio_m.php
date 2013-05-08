<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Inicio_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function obtenListaUeasDiv($idDivision, $trim){
			$this->db->select('nombreuea, grupo.siglas, nombredivision');
			$this->db->from('uea');
			$this->db->join('divisiones', 'uea.divisiones_iddivisiones=divisiones.iddivisiones');
			$this->db->join('grupo', 'uea.iduea=grupo.uea_iduea');
			$this->db->join('laboratorios_grupo', 'grupo.idgrupo=laboratorios_grupo.idgrupo');
			$this->db->where('uea.divisiones_iddivisiones',$idDivision);
			$this->db->where('laboratorios_grupo.trimestre_idtrim',$trim);
			$this->db->distinct();
			$listaUeasCBS=$this->db->get(); 
			if(($listaUeasCBS->num_rows())>0){
				$indice=1;
				foreach ($listaUeasCBS->result_array() as $value) {
					$arregloUeasCBS[$indice] = $value;
					$indice=$indice+1;
				}
				return ($arregloUeasCBS);
			}else{
				$mensaje_error="No hay datos que cargar";
				return (-1);
			}//fin del else
		}//Fin de obtenListaUeasCBS
				
		function obtenListaUeaProfesorGrupo(){
			$this->db->select('uea.nombreuea, grupo.siglas, grupo.grupo, profesores.nombre, idlaboratorios');
			$this->db->from('grupo');
			$this->db->join('profesores', 'grupo.profesores_idprofesores=profesores.idprofesores');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->join('laboratorios_grupo','grupo.idgrupo=laboratorios_grupo.idgrupo');
			$this->db->distinct(); //Para que no se repitan los datos
			

			$listaUeaProfesorGrupo=$this->db->get(); //Vacía el contenido de la consulta en la variable
			
			if(($listaUeaProfesorGrupo->num_rows())>0){
				$indice=1;
				
				foreach ($listaUeaProfesorGrupo->result_array() as $value) {
					$arregloUPG[$indice] = $value;
					$indice=$indice+1;
				}
				return ($arregloUPG);
			}else{
				return -1;
			}//fin del else
			
		} //fin obtenListaUeaProfesorGrupo

		function obtenListaId($trim){
			$this->db->select('uea.nombreuea, grupo.siglas, grupo.grupo, profesores.nombre, idlaboratorios');
			$this->db->from('grupo');
			$this->db->join('profesores', 'grupo.profesores_idprofesores=profesores.idprofesores');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->join('laboratorios_grupo','grupo.idgrupo=laboratorios_grupo.idgrupo');
			$this->db->where('laboratorios_grupo.trimestre_idtrim', $trim);
			$this->db->distinct(); //Para que no se repitan los datos
			

			$listaUeaProfesorGrupo=$this->db->get(); //Vacía el contenido de la consulta en la variable
			
			if(($listaUeaProfesorGrupo->num_rows())>0){
				$indice=1;
				
				foreach ($listaUeaProfesorGrupo->result_array() as $value) {
					$arregloUPG[$indice] = $value;
					$indice=$indice+1;
				}
				return ($arregloUPG);
			}else{
				return -1;
			}//fin del else
			
		} //fin obtenListaUeaProfesorGrupo
		
		function ueas($labo,$sem, $dia, $trim){
			$this->db->select('laboratorios_grupo.idgrupo, grupo.grupo, grupo.siglas,horarios_idhorarios,uea.divisiones_iddivisiones');
			$this->db->join('grupo','laboratorios_grupo.idgrupo=grupo.idgrupo');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->where('idlaboratorios',$labo);
			$this->db->where('semanas_idsemanas', $sem);			
			$this->db->where('dias_iddias',$dia);			
			$this->db->where('trimestre_idtrim',$trim);			
			$this->db->order_by('horarios_idhorarios', "asc"); 
			$this->db->from('laboratorios_grupo');
			
			$ueaL=$this->db->get();
			
			if(($ueaL->num_rows())>0){
				$indice=1;	
				foreach ($ueaL->result_array() as $value) {
					$datos[$value['horarios_idhorarios']]=$value;
					$indice++;
				}
				
				return ($datos);
			 }else{
			 	return -1;
			}//fin del else
		} //fin ueas

		function ueas2($labo, $dia, $trim){
			$this->db->select('laboratorios_grupo.idgrupo, grupo.grupo, grupo.siglas,horarios_idhorarios,uea.divisiones_iddivisiones, semanas_idsemanas');
			$this->db->join('grupo','laboratorios_grupo.idgrupo=grupo.idgrupo');
			$this->db->join('uea','grupo.uea_iduea=uea.iduea');
			$this->db->where('idlaboratorios',$labo);
			$this->db->where('dias_iddias',$dia);			
			$this->db->where('trimestre_idtrim',$trim);			
			$this->db->order_by('horarios_idhorarios', "asc"); 
			$this->db->from('laboratorios_grupo');
			
			$ueaL=$this->db->get();
			if(($ueaL->num_rows())>0){
				$guarda=Array(); //Array que llevará el control del grupo/grupos que habrá en el laboratorio, día, trimestre y horario correspondiente
				$i=1; $j=1;
				foreach ($ueaL->result_array() as $value) {
					//Revisamos si hay más de dos grupos en el mismo laboratorio a lo largo del trimestre
					$this->db->select('idgrupo');
					$this->db->where('idlaboratorios',$labo);
					$this->db->where('dias_iddias',$dia);			
					$this->db->where('trimestre_idtrim',$trim);
					$this->db->where('horarios_idhorarios', $value['horarios_idhorarios']);
					$this->db->distinct();
					$aux=$this->db->get('laboratorios_grupo');
					if(($aux->num_rows())>1){ //Hay más de 2 grupos en el mismo horario y laboratorio, pero en diferentes semanas
						foreach ($aux->result_array() as $value2) {							
							if(array_search($value2['idgrupo'], $guarda)){
								$datos[$value['horarios_idhorarios']]=$esp=Array('siglas'=>'*', 'divisiones_iddivisiones'=>'esp');
							}else{
								$i++;
								$guarda[$i] = $value2['idgrupo'];
								$datos[$value['horarios_idhorarios']]=$guarda[$i];
							}
						}
					}else{
						$datos[$value['horarios_idhorarios']]=$value;						
					}
				}
				return ($datos);
			 }else{
			 	return -1;
			}//fin del else
		}		

						
		function ObtenLabos(){
			$this->db->select('nombrelaboratorios');
			$this->db->from('laboratorios');
			
			$lHorarios=$this->db->get();

			if(($lHorarios->num_rows())>0){
				$indice=1;
				foreach ($lHorarios->result_array() as $value) {
					$arregloHorarios[$indice] = $value['nombrelaboratorios'];
					$indice++;
				}
				return ($arregloHorarios);
			}else{
				return 0;
			}//fin del else
			
		} //fin Obtenhorarios
						
 				
		function Obtenhorarios(){
			$this->db->select('hora');
			$this->db->from('horarios');
			
			$lHorarios=$this->db->get();

			if(($lHorarios->num_rows())>0){
				$indice=1;
				foreach ($lHorarios->result_array() as $value) {
					$arregloHorarios[$indice] = $value['hora'];
					$indice++;
				}
				return ($arregloHorarios);
			}else{
				return 0;
			}//fin del else
			
		} //fin Obtenhorarios

		function ObtenTrim(){
			$this->db->select('idtrim, trim');
			$lHorarios=$this->db->get('trimestre');

			if(($lHorarios->num_rows())>0){
				$indice=1;
				foreach ($lHorarios->result_array() as $value) {
					$arregloHorarios[$indice] = $value;
					$indice++;
				}
				return ($arregloHorarios);
			}else{
				return 0;
			}//fin del else
			
		} //fin Obtenhorarios		
								
	} //Fin de la clase

?>


		

 