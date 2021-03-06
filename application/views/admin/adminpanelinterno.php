<?php $this->load->view('admin/admincabecera.php');?>

	<div class="navegacion1">
		<!-- <h1><b><span style="color:orange">Bienvendio</b></h1>	 -->
		<h1><b><span style="color:orange">Internos</b></h1>
	</div>
	<div class="row">
		<form id="nombre" action="<?=base_url()?>AtenConsul" method="POST">
			  	<div id="navegacion" class="col">
					<a href="<?=base_url()?>admin">Panel de control </a>
					<span> | </span>
					<a class="nav-active">Internos </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	</div>
	
	

	<div class="wrapper">
	  <!-- <div class="square1"><a href="<?=base_url()?>PanelInter">Internos</a><h2><h2></div> -->
	  <div class="square7"><a href="<?=base_url()?>AltaPract">Registrar Interno</a><h2><h2></div>
	  <div class="square8"><a href="<?=base_url()?>AltaIntern">Editar interno</a></div>
	  <div class="square9"><a >Eliminar interno</a><h2><h2></div>
	  <div class="square10"><a  v-on:click="modalIsOpen = true" href="#">Internos que tienen la misma conducta antisocial habitual</a><h2><h2></div>
	  <div class="square11"><a href="<?=base_url()?>Archivo">Internos con mayores consultas psicológicas</a><h2><h2></div>
	  <div class="square12"><a href="<?=base_url()?>AltaIntern">Internos con problemas interpersonales específicamente</a><h2><h2></div>
	</div>
	<!-- modal -->
	<form slot="modal-header" class="modal-header"  action="<?=base_url()?>AtenConsul" method="post" >
		<modal :show.sync="modalIsOpen" efect="fade">
			
				<section slot="modal-body" class="modal-body">
					<h1>Ingresa el nombre del interno</h1>
					<input  id="nombre" name="nombre"v-model="nombre" type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
				</section>
				<footer slot="modal-footer" class="modal-footer">
					<div class="row">
						<div class="col-xs-12">
							<button class="btn btn-default btn-block" v-on:click="saveChanges()">Aceptar</button>			
						</div>
					</div>	
				</footer>		
			
		</modal>
	</form>
	<!-- <pre>
		{{ $data | json }}
	</pre> -->
<?php $this->load->view('admin/adminpie.php');?>

<!-- Scrip del modal <?=base_url()?>AtenConsul -->
<script type="text/javascript">
	function mostrarDatos(valor){
		$.ajax({
			url:"http://127.0.0.1:8081/cereso/administrador/consulController/index",
			type:"POST",
			data: {nombre:valor},
			success:function(respuesta){
				alert(respuesta);
			}
		});
	}
</script> 