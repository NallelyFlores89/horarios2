	<script type="text/javascript">
		$(document).ready(function() {
			$("#nombreInput").autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('agregar_horario_c/propon_profesor'); ?>",
						data: { term: $("#nombreInput").val()},
						dataType: "json",
						type: "POST",
						success: function(data){	
							response(data);
							$("#nombreInput").change(function(){
								$("#numInput").removeAttr('disabled')
								$("#correoInput").removeAttr('disabled')
								$.ajax({
									url: "<?php echo site_url('agregar_horario_c/busca_id_prof'); ?>",
									data: { term2:$("#nombreInput").val() },
									dataType: "json",
									type: "POST",
									success:function(data2){
										$("#id_prof").val(data2);
											$.ajax({
												url: "<?php echo site_url('agregar_horario_c/busca_num_empleado'); ?>",
												data: { term3: $("#id_prof").val() },
												dataType: "json",
												type: "POST",
												success:function(data3){
													if(data3==0000){
														$("#numInput").val('No número')
														$("#numInput").attr('disabled','')
													}else{
														if(data3=='No número'){
															$("#numInput").val('')
														}else{
															$("#numInput").val(data3)
															$("#numInput").attr('disabled','')															
															
														}
													
													}
												}										
											})
											
											$.ajax({
												url:"<?php echo site_url('agregar_horario_c/busca_correo_empleado'); ?>",
												data: { term4: $("#id_prof").val()},
												dataType: "json",
												type: "POST",
												success: function(data4){
													if(data4==""){
														$("#correoInput").val('No correo')
														$("#correoInput").attr('disabled','')
													}else{
														if(data4=='No correo'){
															$("#correoInput").val('')
														}else{
															$("#correoInput").val(data4)
															$("#correoInput").attr('disabled','')
														}
													}
												}
											}) 
										} //Fin del success data2
									}) //Fin del ajax
								}) //Fin del change
							} //Fin del success data
						}); //Fin del ajax
					}, //Fin del source
				minLength: 1
			});

			$("#ueaInput").autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('agregar_horario_c/propon_uea'); ?>",
						data: { term: $("#ueaInput").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
							$("#ueaInput").change(function(){
								$("#claveInput").removeAttr('disabled')
								$.ajax({
									url: "<?php echo site_url('agregar_horario_c/busca_id_uea'); ?>",
									data: { termUea: $("#ueaInput").val() },
									dataType: "json",
									type: "POST",
									success:function(data){								
										$("#ueaId").val(data)
										$.ajax({
											url: "<?php echo site_url('agregar_horario_c/busca_clave'); ?>",
											data: { idUea: $("#ueaId").val() },
											dataType: "json",
											type: "POST",
											success:function(data){	
												if(data == -1){
													$("#claveInput").val('')
												}else{
													if(data==''){
														$("#claveInput").val('No clave')
														$("#claveInput").attr('disabled','')	
													}else{
														$("#claveInput").val(data)
														$("#claveInput").attr('disabled','')
													}
												}				
											}
										})
										
										$.ajax({
											url: "<?php echo site_url('agregar_horario_c/busca_division'); ?>",
											data: { idUea: $("#ueaId").val() },
											dataType: "json",
											type: "POST",
											success:function(data){
												if(data == -1){
 													$('#divisionesDropdown').val(9)
 												}else{
 													$('#divisionesDropdown').val(data)
												}				
											}
										})
		
									} //Fin del success		
								}) //Fin del ajax
							}) //Fin del change
						} //Fin del success
					}); //Fin del ajax
				}, //Fin del source
				minLength: 1
			});	 //Fin de auto complete	
    
			// setTimeout("alert('Tu sesión ha expirado. Recarga la página y vuelve a loguearte para seguir trabajando')",7199);	
		}); //Fin del ready function
		
		$(document).ready(function(){
			$('#HoraFDropdown').val(2)
	        $('#HoraIDropdown').change(function(){ 
				$.ajax({
					url: "<?php echo site_url('agregar_horario_c/envia_hora_dsps'); ?>",
					data: { horaI: $('#HoraIDropdown').val() },
					dataType: "json",
					type: "POST",
					success:function(hora){
						$('#HoraFDropdown').val(hora)
					}
				})
        	});
   		 });

	</script>
</head>