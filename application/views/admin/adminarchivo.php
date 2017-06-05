<?php $this->load->view('admin/admincabecera.php');?>
	<div class="navegacion1">
		<h1><b><span style="color:orange">Archivo Clínico</b></h1>	
	</div>
	<div class="container">
		<div class="row">
			  	<div id="navegacion" class="col">
					<a href="<?=base_url()?>admin">Panel de control </a>
					<span> | </span>
					<a class="nav-active">Archivo Clínico </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>buscar" method="post" role="form">
					<div class="form-group">
					  <p>Nombre del interno</p>
				      	<input type="text" name ="nombre" class="form-control" placeholder="Ingresa el nombre del interno para buscar">
					</div>
					<div class="form-group">
						<p>Lista de formatos</p>
			        	 <!-- <p>Estado civil</p> -->
			            <select class="form-control" name="formato">...
			            	<option disabled selected hiddent>Selecciona el formato a buscar</option>
			            	<option>Estudio inicial de personalidad</option>
			            	<option>Entrevista Psicológica</option>
			            	<option>Estudio Psicológico</option>
			            	<option>Estudio para beneficio</option>
			            	<option>Formato de actividades</option>
			            	<option>Estudio clínico-criminológico</option>
			            </select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
			    </form>  
			</div>
		</div>

	</div>	
   		
	
<?php $this->load->view('admin/adminpie.php');?>