							
								<div class="row">
									<div class="six columns">
							                <label for="SemIDropdown">Semana de inicio</label>
											<?php
												$i=1;
												foreach ($sem as $value) {
													$weeks[$i]=$value['semana'];
													$i++;
												}											
												echo form_dropdown('SemIDropdown', $weeks, set_value('SemIDropdown') );
											?>
									</div>
			
									
									<div class="six columns">
							                <label for="SemFDropdown">Semana Final</label>
											<?php
												$i=1;
												foreach ($sem as $value) {
													$weeks[$i]=$value['semana'];
													$i++;
												}											
												echo form_dropdown('SemFDropdown', $weeks, set_value('SemFDropdown') );
											?>
									</div>
								</div><hr> <!--row -->	
								
					
								<div class="row">
									<div class="twelve columns">
										<label for="dias">*Días</label>
										<?php 
											foreach ($dias as $value) {
										?>
												<div class="two columns">
												<label><?= $value['nombredia'] ?></label>
												<?php echo form_checkbox('checkboxes[]', $value['iddias'])?>
												</div>
										<?php }	?>
								  		<?php echo form_error('checkboxes[]'); ?>
										<div class="one columns"></div>
									</div>
		
								</div> <hr>
						
						<div class="four columns"></div>						
						<input type="submit" id="AgregarHorarioBtn" class="button normal four columns" value="Agregar" />
						<div class="four columns"></div>						

				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
