<?php $this->load->view('admin/admincabecera.php');?>
	<div class="navegacion1">
		<h1><b><span style="color:orange">Alta de Internos</b></h1>	
	</div>
	<div class="container">
	  	<div class="row">
		  	<div id="navegacion" class="col">
				<a href="<?=base_url()?>admin">Panel de control </a>
				<span> | </span>
				<a class="nav-active">Registro Internos </a>
				<!-- <a class="active" href="#!"> </a> -->
			</div>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>" method="post" role="form">
					<div class="form-group">
			            <label class="sr-only" for="form-name">Nombre</label>
			            <input type="name" name="usuario" placeholder="Nombre..." class="form-email form-control" id="form-email">
			        </div>
			        <div class="form-group">
			            <label class="sr-only" for="form-name">Apellidos</label>
			            <input type="name" name="usuario" placeholder="Apellidos..." class="form-email form-control" id="form-email">
			        </div>
			        <div class="form-group">
			        	 <!-- <label class="sr-only" for="form-name">Estado civil</label> -->
			            <select class="form-control" placeholder="Apellidos...">...
			            	<option disabled selected hiddent> Estado civil</option>
			            	<option>Casado</option>
			            	<option>Soltero</option>
			            	<option>Divorciado</option>
			            	<option>Union libre</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	 <!-- <label class="sr-only" for="form-name">Estado civil</label> -->
			            <select class="form-control" placeholder="Sexo...">...
			            	<option disabled selected hiddent> Sexo</option>
			            	<option>Masculino</option>
			            	<option>Femenino</option>
			            </select>
			        </div>
		            <div class="form-group">
		                <label class="sr-only" for="form-name">Lugar de nacimiento</label>
		                <input type="name" name="apellido" placeholder="apellido" class="form-email form-control" id="form-email">
		            </div>
		             <div class="well">
					  <div id="datetimepicker4" class="input-append">
					    <input data-format="dd-MM-yyyy" type="text" placeholder="Fecha de nacimiento"></input>
					    <span class="add-on">
					      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
					      </i>
					    </span>
					  </div>
					</div>
		            <div class="form-group">
		                <label class="sr-only" for="form-name">Lugar de nacimiento</label>
		                <input type="email" name="correo" placeholder="Lugar de nacimiento" class="form-email form-control" id="form-email">
		            </div>
		            <div class="form-group">
		                <label class="sr-only" for="form-name">Domicilio</label>
		                <input type="name" name="Domicilio" placeholder="Domicilio" class="form-email form-control" id="form-email">
		            </div>
		            <div class="form-group">
			        	 <!-- <label class="sr-only" for="form-name">Estado civil</label> -->
			            <select class="form-control" placeholder="Sexo...">...
			            	<option disabled selected hiddent> Escolaridad</option>
			            	<option>Prescolar</option>
			            	<option>Primaria</option>
			            	<option>Secundaría</option>
			            	<option>Bachillerato</option>
			            	<option>Universidad</option>
			            	<option>Posgrado</option>
			            	<option>Maestria</option>
			            	<option>Doctorado</option>
			            </select>
			        </div>
						<button type="submit" class="btn btn-primary">Aceptar</button>    
				</form>
			</div>	
	  	</div>
	</div> 	
<?php $this->load->view('admin/adminpie.php');?>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker4').datetimepicker({
      pickTime: false
    });
  });
</script> 