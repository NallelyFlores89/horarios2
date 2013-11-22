<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Pdf_c extends CI_Controller {
 
    function __construct() {
        parent::__construct();
		$this->load->helper(array('html', 'url'));
		$this->load->model(Array('Inicio_m','pdf_m')); //Cargando modelos
		$this->load->helper('form');
    }
 
    public function index(){
    	$data['trim'] = $this->Inicio_m->ObtenTrim();
		$this->load->view('exportar_v', $data);
    }

	public function vistaWeb($trim){
		$Data['datosCBI']=$this->Inicio_m->obtenListaUeasDiv(1, $trim);
		$Data['datosCBS']=$this->Inicio_m->obtenListaUeasDiv(2, $trim); 
		$Data['datosCSH']=$this->Inicio_m->obtenListaUeasDiv(3, $trim); 
		$Data['datosCompu']=$this->Inicio_m->obtenListaUeasDiv(4, $trim); 
		$Data['datosBio']=$this->Inicio_m->obtenListaUeasDiv(5, $trim); 
		$Data['datosElec']=$this->Inicio_m->obtenListaUeasDiv(6, $trim); 
		$Data['datosPCITI']=$this->Inicio_m->obtenListaUeasDiv(7, $trim);
		$Data['datosCC']=$this->Inicio_m->obtenListaUeasDiv(8, $trim);
		$Data['datosOtros']=$this->Inicio_m->obtenListaUeasDiv(9, $trim);
		$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();
		$trimestres['trimActual'] = $trim;
		$trimestres['trim'] = $this->Inicio_m->ObtenTrim();
		$lb = array('1'=>105, '2'=>106, '3'=>219, '4'=>220, '5'=>221);
		
		
		//Generando variables para cargar la lista de UEAS
		foreach ($lb as  $labo) {
			for ($dia=1; $dia <=5 ; $dia++){ 
				$vacio= array_fill(1,27, null);
				$ocupados = $this->pdf_m->ueas2($labo, $dia, $trim);
				if($ocupados == -1){
					 $Data['$DataU'.$labo.'_'.$dia]=$vacio;
				}else{
					 $Data['$DataU'.$labo.'_'.$dia]=array_replace($vacio,$ocupados);
				}
			}			
		}
		
		//Obteniendo grupos especiales
		$i=1; $j=1;
		foreach ($lb as $labo){
			for($dia=1; $dia<=5; $dia++){
				for($hora=1; $hora<=27; $hora++){
					if($this->pdf_m->obtenGruposEsp($labo, $dia, $hora, $trim) != 0){
						$esp[$i] = $this->pdf_m->obtenGruposEsp($labo, $dia, $hora, $trim);
						foreach ($esp[$i] as $valor) {
							$aux[$i] = $valor;
							$i++;
						}
					}else{
						$esp[$i] = NULL;
						$aux[$i]=NULL;
						$esp_aux[105] = $esp_aux[106] = $esp_aux[219] = $esp_aux[220] = $esp_aux[221] = NULL;
					}
				}
			}
		}
		if(count($aux)>1 || $aux[1]){
			foreach ($aux as $value){
				$esp_aux[$value['idlaboratorios']][$i]=$value; $i++;
			}
			//Acomodando los horarios para la lista Grupoes especiales
			$igrupo = $isemf = $ihoraf = $isemi = $ihorai = 0;
			foreach ($lb as $laboratorio){ //Laboratorios
				$array_grupos = array();
				if($esp_aux[$laboratorio] != NULL){
					foreach ($esp_aux[$laboratorio] as $value) {
						//Comprueba si el grupo existe o no en el arreglo array_grupos
						$igrupo = $value['idgrupo'];	
						if(in_array($value['idgrupo'],$array_grupos)){
							//Actualiza la semana
							if($value['semanas_idsemanas'] > $filtro[$laboratorio][$value['idgrupo']]['semanai']){
								$isemf = $value['semanas_idsemanas'];
							}
							
							if($value['horarios_idhorarios'] > $filtro[$laboratorio][$value['idgrupo']]['horai']){
								$ihoraf = $value['horarios_idhorarios'];
							}						
							$filtro[$laboratorio][$igrupo]['horai'] = $ihorai;	
							$filtro[$laboratorio][$igrupo]['horaf'] = $ihoraf;
							$filtro[$laboratorio][$igrupo]['semanai'] = $isemi;
							$filtro[$laboratorio][$igrupo]['semanaf'] = $isemf;
							$filtro[$laboratorio][$igrupo]['hora_final'] = substr($value['hora'], 6, 10);
						}else{
							array_push($array_grupos, $value['idgrupo']);	
							$igrupo = $value['idgrupo']; 		
							$isemi = $isemf = $value['semanas_idsemanas'];
							$ihorai = $ihoraf= $value['horarios_idhorarios'];
							$hora_inicial = $hora_final = $value['hora'];
							$filtro[$laboratorio][$igrupo]['horai'] = $ihorai;	
							$filtro[$laboratorio][$igrupo]['horaf'] = $ihoraf;
							$filtro[$laboratorio][$igrupo]['hora_inicial'] = substr($value['hora'], 0, 5);					
							$filtro[$laboratorio][$igrupo]['hora_final'] = substr($value['hora'], 6, 10);
							$filtro[$laboratorio][$igrupo]['semanai'] = $isemi;
							$filtro[$laboratorio][$igrupo]['semanaf'] = $isemf;
							$filtro[$laboratorio][$igrupo]['siglas'] = $value['siglas'];
							$filtro[$laboratorio][$igrupo]['grupo'] = $value['grupo'];
							$filtro[$laboratorio][$igrupo]['dia'] = $value['nombredia'];
							$filtro[$laboratorio][$igrupo]['labo'] = $value['idlaboratorios'];							
							$filtro[$laboratorio][$igrupo]['uea'] = $value['nombreuea'];							
														
						}
					}				
				}
			}
		}else{	$filtro = NULL;	}
		
		for($i=1; $i<=5; $i++){
			foreach ($lb as $l) {
				$horaxDia["trim".$trim."_dia".$i."_lab".$l]=$this->pdf_m->obtenHorasxDia($trim,$i, $l);
			}
		}

		$datos = Array(
			'Data' => $Data,
			'DataHorarios' =>  $DataHorarios['hora'],
			'trimestres' => $trimestres,
			'esp' => $esp,
			'filtro' => $filtro,
			'horaxDia' => $horaxDia
		);
	
		$pdfFilePath = FCPATH."download/prueba.pdf";
 
		if (file_exists($pdfFilePath) == FALSE)
		{
		    ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
			$vista = $this->load->view('pdf_v', $datos, TRUE);
		    $this->load->library('Pdf');
			$pdf=$this->pdf->load();
		    $pdf->WriteHTML($vista); // write the HTML into the PDF
		    $pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		
		redirect(base_url()."download/prueba.pdf");		
		
	}


}