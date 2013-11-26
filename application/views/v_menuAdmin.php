<!-- scripts para abrir las ventanas del menú breacrumbs.
podía hacerse de manera más sencilla, pero para cuando lo supe era demasiado tarde. -->

<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script>
<script> var base='<?= base_url(); ?>' </script> 
<script src="<?=base_url(); ?>statics/js/inicio_admin.js"></script>
<script> var trim = <?= $trimActual ?></script>

<!-- menú del administrador -->
<ul class="breadcrumbs">
  <li><a id="InicioAdminBtn" href="<?=base_url()?>index.php/inicio_admin_c/">Inicio</a></li>
  <li><a id="AgregarHorarioBtn" class="AgregarHorarioBtn">Agregar Horario</a></li>
  <li><a id="AgregarHorarioEspBtn" class="AgregarHorarioEspBtn">Horario esp</a></li>
  <li><a id="IrRecursosAdminBtn" href="<?=base_url()?>index.php/recursos_admin_c">Recursos</a></li>
  <li><a id="AdministracionBtn" href="<?=base_url()?>index.php/administracion_c/index/<?= $trimActual ?>">Grupos</a></li>
  <li><a id="AdministracionBtn" href="<?=base_url()?>index.php/ueas_c">UEA's</a></li>
  <li><a id="ProfesoresBtn" href="<?=base_url()?>index.php/profesores_c">Profesores</a></li>			  
  <li><a id="Administracion2Btn" href="<?=base_url()?>index.php/administracion2_c">Administración</a></li>
  <li><a id="Administracion2Btn" href="<?=base_url()?>index.php/trimestres_c">Trimestres</a></li>
  <li><a id="Administracion2Btn" target="blank" href="<?=base_url()?>index.php/pdf_c">Exportar PDF</a></li>
  <li><a href="<?=base_url()?>index.php/inicio_admin_c/do_logout">Salir</a></li>
</ul><br>
<br>	