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
						
						<div class="two columns"></div>						
							<input type="submit" id="AgregarHorarioBtn" class="button normal four columns" name="uno" value="Agregar" />
							<input type="submit" id="AgregarHorarioBtn" class="button normal four columns" name="otro" value="Agregar otro" />

						<div class="two columns"></div>						
	
				</fieldset>
	
			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
