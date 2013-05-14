<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Pdf_c extends CI_Controller {
 
    function __construct() {
        parent::__construct();
		$this->load->helper(array('html', 'url'));
		$this->load->model('Inicio_m'); //Cargando mi modelo
		$this->load->model('pdf_m'); //Cargando mi modelo
		$this->load->helper('form');
    }
 
    public function index(){
    	$data['trim'] = $this->Inicio_m->ObtenTrim();
		$this->load->view('exportar_v', $data);
    }
	
	public function prueba(){
		$trim = 1;
		$Data['datosCBI']=$this->Inicio_m->obtenListaUeasDiv(1, $trim);
		$Data['datosCBS']=$this->Inicio_m->obtenListaUeasDiv(2, $trim); 
		$Data['datosCSH']=$this->Inicio_m->obtenListaUeasDiv(3, $trim); 
		$Data['datosCompu']=$this->Inicio_m->obtenListaUeasDiv(4, $trim); 
		$Data['datosBio']=$this->Inicio_m->obtenListaUeasDiv(5, $trim); 
		$Data['datosElec']=$this->Inicio_m->obtenListaUeasDiv(6, $trim); 
		$Data['datosPCITI']=$this->Inicio_m->obtenListaUeasDiv(7, $trim);
		$Data['datosCC']=$this->Inicio_m->obtenListaUeasDiv(8, $trim);
		$Data['datosOtros']=$this->Inicio_m->obtenListaUeasDiv(9, $trim);
		$Data['laboratorios']=$this->Inicio_m->ObtenLabos();
		$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();
		$trimestres['trimActual'] = $trim;
		$trimestres['trim'] = $this->Inicio_m->ObtenTrim();
		$lb = array('1'=>105, '2'=>106, '3'=>219, '4'=>220);
		
		for ($dia=1; $dia <=5 ; $dia++){ 
			$vacio= array_fill(1,27, null);
			$ocupados = $this->pdf_m->ueas2(105, $dia, $trim);
			if($ocupados == -1){
				 $Data['$DataU105_'.$dia]=$vacio;
			}else{
				 $Data['$DataU105_'.$dia]=array_replace($vacio,$ocupados);
			}
		}

		for ($dia=1; $dia <=5 ; $dia++){ 
			$vacio= array_fill(1,27, null);
			$ocupados = $this->pdf_m->ueas2(106,$dia, $trim);
			if($ocupados == -1){
				 $Data['$DataU106_'.$dia]=$vacio;
			}else{
				 $Data['$DataU106_'.$dia]=array_replace($vacio,$ocupados);
			}
		}
		
		for ($dia=1; $dia <=5 ; $dia++){ 
			$vacio= array_fill(1,27, null);
			$ocupados = $this->pdf_m->ueas2(219,$dia, $trim);
			if($ocupados == -1){
				 $Data['$DataU219_'.$dia]=$vacio;
			}else{
				 $Data['$DataU219_'.$dia]=array_replace($vacio,$ocupados);
			}
		}
	

		for ($dia=1; $dia <=5 ; $dia++){ 
			$vacio= array_fill(1,27, null);
			$ocupados = $this->pdf_m->ueas2(220,$dia, $trim);
			if($ocupados == -1){
				 $Data['$DataU220_'.$dia]=$vacio;
			}else{
				 $Data['$DataU220_'.$dia]=array_replace($vacio,$ocupados);
			}
		}
		
		for ($dia=1; $dia <=5 ; $dia++) { 
			$vacio= array_fill(1,27, null);
			$ocupados = $this->pdf_m->ueas2(221,$dia, $trim);
			if($ocupados == -1){
				 $Data['$DataU221_'.$dia]=$vacio;
			}else{
				 $Data['$DataU221_'.$dia]=array_replace($vacio,$ocupados);
			}
		}
		
		$i=1;
		foreach ($lb as $labo){
			for($dia=1; $dia<=5; $dia++){
				for($hora=1; $hora<=27; $hora++){
					if($this->pdf_m->obtenGruposEsp($labo, $dia, $hora, $trim) != 0){
						$esp[$i] = $this->pdf_m->obtenGruposEsp($labo, $dia, $hora, $trim);
						$i++;
					}					
				}
			}
		}

		$datos = Array(
			'Data' => $Data,
			'DataHorarios' =>  $DataHorarios['hora'],
			'trimestres' => $trimestres,
			'esp' => $esp
		);
		$this->load->view('prueba_v', $datos);
	}
 
	public function generar(){
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setPageOrientation(L);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('LDCBI-UAMI');
        $pdf->SetTitle('Horarios LDCBI');
        $pdf->SetSubject('Horarios ');
        $pdf->SetKeywords('TCPDF, PDF, horarios, uami');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(NULL, NULL, PDF_HEADER_TITLE . ' 001', NULL, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('freemono', '', 14, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 		$trim = $_POST['trim'];
// Establecemos el contenido para imprimir
        $Data['datosCBI']=$this->Inicio_m->obtenListaUeasDiv(1, $trim);
		$Data['datosCBS']=$this->Inicio_m->obtenListaUeasDiv(2, $trim); 
		$Data['datosCSH']=$this->Inicio_m->obtenListaUeasDiv(3, $trim); 
		$Data['datosCompu']=$this->Inicio_m->obtenListaUeasDiv(4, $trim); 
		$Data['datosBio']=$this->Inicio_m->obtenListaUeasDiv(5, $trim); 
		$Data['datosElec']=$this->Inicio_m->obtenListaUeasDiv(6, $trim); 
		$Data['datosPCITI']=$this->Inicio_m->obtenListaUeasDiv(7, $trim);
		$Data['datosCC']=$this->Inicio_m->obtenListaUeasDiv(8, $trim);
		$Data['datosOtros']=$this->Inicio_m->obtenListaUeasDiv(9, $trim);
		$Data['laboratorios']=$this->Inicio_m->ObtenLabos();
		$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();
		$trimestres['trimActual'] = $trim;
		$trimestres['trim'] = $this->Inicio_m->ObtenTrim();
		
		for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 105
			for ($dia=1; $dia <=5 ; $dia++) { 
				$vacio= array_fill(1,27, null);
				$ocupados = $this->Inicio_m->ueas(105,$sem,$dia, $trim);
				if($ocupados == -1){
					 $Data['$DataU105_'.$sem.'_'.$dia]=$vacio;
				}else{
					$Data['$DataU105_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
				}
			}
		}

		for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 106
			for ($dia=1; $dia <=5 ; $dia++) { 
				$vacio= array_fill(1,27, null);
				$ocupados = $this->Inicio_m->ueas(106,$sem,$dia, $trim);
				if($ocupados == -1){
					 $Data['$DataU106_'.$sem.'_'.$dia]=$vacio;
				}else{
					$Data['$DataU106_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
				}
			}
		}
		
		for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 219
			for ($dia=1; $dia <=5 ; $dia++) { 
				$vacio= array_fill(1,27, null);
				$ocupados = $this->Inicio_m->ueas(219,$sem,$dia, $trim);
				if($ocupados == -1){
					 $Data['$DataU219_'.$sem.'_'.$dia]=$vacio;
				}else{
					$Data['$DataU219_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
				}
			}
		}			

		for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 220
			for ($dia=1; $dia <=5 ; $dia++) { 
				$vacio= array_fill(1,27, null);
				$ocupados = $this->Inicio_m->ueas(220,$sem,$dia, $trim);
				if($ocupados == -1){
					 $Data['$DataU220_'.$sem.'_'.$dia]=$vacio;
				}else{
					 $Data['$DataU220_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
				}
			}
		}
		
		for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 220b
			for ($dia=1; $dia <=5 ; $dia++) { 
				$vacio= array_fill(1,27, null);
				$ocupados = $this->Inicio_m->ueas(221,$sem,$dia, $trim);
				if($ocupados == -1){
					 $Data['$DataU221_'.$sem.'_'.$dia]=$vacio;
				}else{
					 $Data['$DataU221_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
				}
			}
		}
        //preparamos y maquetamos el contenido a crear
        $html = '';
		$html .= "<style>";
        $html .= "th{color: #000; font-weight: bold; background-color: #fff; font-size:35px}";
        $html .= "td{background-color: #fff; color: #000; font-size:32px}
        		  table{border=1}";
        $html .= "</style>";
        $html .= "
        <table border='1' class='responsive'>
					<tr>
						<th>Día</th><th colspan='5'>Lunes</th><th colspan='5'>Martes</th><th colspan='5'>Miércoles</th><th colspan='5'>Jueves</th><th colspan='5'>Viernes</th>
					</tr>
        		  <tr>
        		  	<td>Labo</td>
        		  	<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
        		  	<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
        		  </tr>
				</table>
        
        ";
        $html .= "</table>";
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Horarios");
		ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');
    }
}