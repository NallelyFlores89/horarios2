<?php
class Pdf_m extends CI_Model
{
    function __construct(){
        parent::__construct();
    }
	
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

	function obtenGruposEsp($labo, $dia, $hora, $trim){
		// echo "recibi labo = $labo, dia=$dia, hora=$hora, trim = $trim, ";
		// $this->db->select('laboratorios_grupo.idgrupo, grupo.grupo, grupo.siglas, idlaboratorios,horarios_idhorarios, horarios.hora, uea.divisiones_iddivisiones, semanas_idsemanas');
		$this->db->select('laboratorios_grupo.idgrupo, grupo.grupo, grupo.siglas, horarios_idhorarios, horarios.hora, idlaboratorios, grupo.uea_iduea, grupo.siglas, semanas_idsemanas, dias_iddias');
		$this->db->join('grupo','laboratorios_grupo.idgrupo=grupo.idgrupo');
		$this->db->join('uea','grupo.uea_iduea=uea.iduea');
		$this->db->join('horarios','horarios_idhorarios=horarios.idhorarios');
		$this->db->where('idlaboratorios',$labo);
		$this->db->where('dias_iddias',$dia);
		$this->db->where('horarios_idhorarios', $hora);
		$this->db->where('trimestre_idtrim',$trim);	
		$this->db->distinct();
		$ueaL=$this->db->get('laboratorios_grupo');
		// echo "<br>ueaL = "; print_r($ueaL->result_array()); echo "<br>";
		if(($ueaL->num_rows())<12 && $ueaL->num_rows()>1){
			// echo "este grupo es especial <br>";
			return $ueaL->result_array();
		}else{
			// echo "este grupo no es especial <br>";
			return 0;
		}
		
		
	}
   
}