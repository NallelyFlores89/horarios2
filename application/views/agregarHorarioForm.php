<body>
    <title>Agregar horario</title>
    	<script>
    		//No mover este script. Sirve para limpiar los campos del formulario cuando el usuario elige la opción 
    		//"Agregar otro" del formulario 
			$(document).ready(function(){
				if(<?= $limpia?> == 1){
					$('#nombreInput, #numInput, #grupoInput, #correoInput, #ueaInput, #siglasInput').val('')
					// $('#numInput').val('')
					// $('#grupoInput').val('')
					// $('#correoInput').val('')
					// $('#ueaInput').val('')
					// $('#claveInput').val('')
					// $('#siglasInput').val('')
					$('#divisionesDropdown').val(9)
					$('#laboratoriosDropdown').val(1)
					$('#HoraIDropdown').val(1)
					$('#HoraFDropdown').val(2)
				}
			});    		
    	</script>
			
		<?php  
			foreach ($Data['trim'] as $value) {
				$trimestre[$value['idtrim']] = $value['trim'];
			}	
		?>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<h2>Agregar horario</h2><br>
				<p class="instrucciones">Por favor, llene el formulario</p>
				<p class="instrucciones">Los campos con * son obligatorios</p>
				<fieldset >
					<form id="formulario" class="custom" action="" method="post">
						<div class="row">
							<div class="nine columns">
								<label for="nombreInput">*Nombre del profesor</label>
					  			<input type="text" id="nombreInput" name="nombreInput" value="<?php echo set_value('nombreInput'); ?>" required title="Necesito saber el nombre del profesor"/>
						  		<input type="hidden" id="id_prof">
						 	</div>
						 	
							<div class="three columns">
								<label for="numInput">No. Empleado</label>
					  			<input type="text" id="numInput" name="numInput" value="<?php echo set_value('numInput'); ?>"/>
						 	</div>
						</div><hr>
						<div class="row">
							<div class="nine columns">
								<label for="correoInput">Correo</label>
				  				<input type="text" id="correoInput" name="correoInput" value="<?php echo set_value('correoInput'); ?>"/>
				  			</div>
				  			<div class="three columns">
				  				<label>Trimestre</label>
								<?php  echo form_dropdown('trimestre', $trimestre,$Data['trimActual'],'id="trimestre"'); ?>
				  			</div>
						</div><hr>
							
						<div class="row">
							<div class="six columns">
								<label for="ueaInput">*Nombre de la UEA</label>
					  			<input type="text" id="ueaInput" name="ueaInput" value="<?php echo set_value('ueaInput'); ?>" required title="Necesito saber el nombre de la uea"/>
					  			<input type="hidden" id="ueaId" name="ueaId" />
						   	</div>
						  	<div class="two columns">
						  		<label for="claveInput">Clave</label>
						  		<input type="text" id="claveInput" name="claveInput" value="<?php echo set_value('claveInput'); ?>"/>
						  	</div>
							<div class="two columns">
						  		<label for="grupoInput">*Grupo</label>
						  		<input type="text" id="grupoInput" name="grupoInput" value="<?php echo set_value('grupoInput'); ?>" required title="Necesito saber el grupo"/>
						  	</div>
							<div class="two columns">
						  		<label for="siglasInput">*Siglas</label>
						  		<input type="text" id="siglasInput" name="siglasInput" value="<?php echo set_value('siglasInput'); ?>" required title="¿Siglas?" />
						  	</div>
						</div><hr>
		
						<div class="row">
						<div class="twelve columns">
							<div class="row">
						        <div class="six columns">
						           	<label for="divisionesDropdown">Sección</label>
										<?php echo form_dropdown('divisionesDropdown', $Data['division'], set_value('divisionesDropdown'), 'id="divisionesDropdown"' ); ?>
								</div>
		
				                <div class="six columns">
					                <label for="laboratoriosDropdown">Laboratorio</label>
										<?php 
											foreach ($Data['labos'] as $value) {
												$labos[$value['idlaboratorios']]=$value['nombrelaboratorios'];
											}
											echo form_dropdown('laboratoriosDropdown', $labos, set_value('laboratoriosDropdown'), 'id="laboratoriosDropdown"');
									    ?>

								</div>
							</div><hr>
							
							<div class="twelve">
								<div class="row>">
						    	    <div class="six columns">
							        	<label for="HoraIDropdown">Hora de inicio</label>
											<?php 
												foreach ($Data['hora'] as $index => $value) {
													$time[$index]=substr($value,0,-6);							
												}
												
												echo form_dropdown('HoraIDropdown', $time, set_value('HoraIDropdown'), 'id="HoraIDropdown"');
											?>
										</div>
								</div>
									
								<div class="row">
									<div class="six columns">
						                <label for="HoraFDropdown">Hora de Term</label>
										<?php 
											foreach ($Data['hora'] as $index => $value) {
												$time[$index]=substr($value,0,-6);							
											}
											$time[27]='21:00';
											echo form_dropdown('HoraFDropdown', $time, set_value('HoraFDropdown'), 'id="HoraFDropdown"' );
										?>
									</div>
								</div>
							</div><hr><!--twelve -->	
								
						</div> <!--twelve columns-->
						</div>	<!--row-->