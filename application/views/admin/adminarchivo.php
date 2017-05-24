<?php $this->load->view('admin/admincabecera.php');?>
	<div class="navegacion1">
		<h1><b><span style="color:orange">Archivo Clinico</b></h1>	
	</div>
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			  	<div id="navegacion" class="col">
					<a href="<?=base_url()?>admin">Panel de control </a>
					<span> | </span>
					<a class="nav-active">Archivo Clinico </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
		</div>
   		 <div class="input-group">
	      <input type="text" class="form-control" placeholder="Ingresa el nombre del interno para buscar">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Buscar</button>
	      </span>
	    </div>
	</div>
<?php $this->load->view('admin/adminpie.php');?>