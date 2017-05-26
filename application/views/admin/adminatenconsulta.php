<?php $this->load->view('admin/admincabecera.php');?>
	<div class="navegacion1">
		<h1><b><span style="color:orange">Formatos de <?php echo $nombre ." " . $apellido;?></b></h1>
		<h1></h1>
		<!-- <pre> {{$data | json}}</pre> -->
	</div> 
	<div class="container">
	  	<div class="row">
		  	<div id="navegacion" class="col">
				<a href="<?=base_url()?>admin">Panel de control </a>
				<span> | </span> 
				<a class="nav-active">Formatos</a>
				<!-- <a class="active" href="#!"> </a> -->
			</div>
	  	</div>
	</div> 

	<form id="nombre" action="<?=base_url()?>EstuPerso" method="POST">
		
		<input name="nombre" type="hidden" value="<?php echo $nombre; ?>"> </input>
		<input name="apellido" type="hidden" value="<?php echo $apellido; ?>"> </input>
	</form>
	<form id="nombre2" action="<?=base_url()?>EntrePsico" method="POST">
		
		<input name="nombre" type="hidden" value="<?php echo $nombre; ?>"> </input>
		<input name="apellido" type="hidden" value="<?php echo $apellido; ?>"> </input>
	</form>
	<form id="nombre3" action="<?=base_url()?>EstuPsico" method="POST">
		
		<input name="nombre" type="hidden" value="<?php echo $nombre; ?>"> </input>
		<input name="apellido" type="hidden" value="<?php echo $apellido; ?>"> </input>
	</form>
	
	<form id="nombre4" action="<?=base_url()?>EstuBenefi" method="POST">
		
		<input name="nombre" type="hidden" value="<?php echo $nombre; ?>"> </input>
		<input name="apellido" type="hidden" value="<?php echo $apellido; ?>"> </input>
	</form>

	<form id="nombre5" action="<?=base_url()?>FormActivi" method="POST">
		
		<input name="nombre" type="hidden" value="<?php echo $nombre; ?>"> </input>
		<input name="apellido" type="hidden" value="<?php echo $apellido; ?>"> </input>
	</form>
	<form id="nombre6" action="<?=base_url()?>EstuClini" method="POST">
		
		<input name="nombre" type="hidden" value="<?php echo $nombre; ?>"> </input>
		<input name="apellido" type="hidden" value="<?php echo $apellido; ?>"> </input>
	</form>
			<div class="wrapper">
					  <div class="square7"><a href="#" onclick="$('#nombre').submit()">Estudio Inicial de Personalidad</a><h2><h2></div>
					  <div class="square8"><a href="#" onclick="$('#nombre2').submit()">Entrevista Psicologica</a></div>
					  <div class="square9"><a href="#" onclick="$('#nombre3').submit()">Estudio Psicológico</a><h2><h2></div>
					  <div class="square10"><a href="#" onclick="$('#nombre4').submit()">Estudio para beneficio</a><h2><h2></div>
					  <div class="square11"><a href="#" onclick="$('#nombre5').submit()">Formato de actividades</a><h2><h2></div>
					  <div class="square12"><a href="#" onclick="$('#nombre6').submit()">Estudio clinico criminológico</a><h2><h2></div>
			</div>	
	
<?php $this->load->view('admin/adminpie.php');?>

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