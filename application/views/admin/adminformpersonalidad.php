
<?php $this->load->view('admin/admincabecera.php');?>
	<div class="navegacion1">
		<h1><b><span style="color:orange">Estudio de personalidad de <?php echo $info->nombre ?></b></h1>	
	</div>
	<div class="container">
	  	<div class="row">
		  	<form id="nombre" action="<?=base_url()?>AtenConsul" method="POST">
			  	<div id="navegacion" class="col">
					<a href="<?=base_url()?>admin">Panel de control </a>
					<span> | </span>
					
						<input name="nombre" type="hidden" value="<?php echo $info->nombre; ?>"></input>
						<input name="apellido" type="hidden" value="<?php echo $info->apellido; ?>"></input>
						<a href="#" onclick="$('#nombre').submit()">Formatos </a> 
					
					<span> | </span>
					<a class="nav-active">Estudio de personalidad </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>EstuPerso2" method="post" role="form">
					<div class="form-group">
			            <p>Fecha</p>
			            <input type="name" name="fecha" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php setlocale(LC_ALL,"es_ES"); 
			            	$mes = date("F");
			            	//$arrayName = array('' => , );
			            	$meses = array('Enero', 'Febrero', 'Marzo','Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
							$ing= array('January','Febrary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
							//print_r($meses);
							//echo [$meses->0];
							for ($i=0; $i < 11; $i++) { 
								if ($ing[$i]== $mes) {
									$mesdef=$meses[$i];
								}
							}
			            	echo date("d") . " de " . $mesdef . " del " . date("Y"); ?>">
			        </div>
					<div class="form-group">
			            <p>Nombre</p>
			            <input type="name" name="nombre" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->nombre; ?>">
			        </div>
			        <div class="form-group">
			            <p>Apellido</p>
			            <input type="name" name="apellido" placeholder="Apellido..." class="form-email form-control" id="form-email"  value="<?php echo $info->apellido; ?>">
			        </div>
			        <div class="form-group">
			            <p>Antecedentes Familiares y personales</p>
			            <input type="name" name="antece" placeholder="Antecedentes familiares y personales" class="form-email form-control" id="form-email">
			        </div>
			        <div class="form-group">
		                <p>Examen mental</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="examen" placeholder="Examen mental"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Indice de lessiones organica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="indiceLe" placeholder="Indice de lesiones organica nivel intelectual"></textarea>
		            </div>
		             <div class="form-group">
		                <p>Nivel intelectual<p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="nivelInt" placeholder="Nivel intelectual"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Dinamica de personalidad</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="dinamicaPer" placeholder="Dinamica de personalidad"></textarea>
		            </div>
		            <div class="form-group">
		                <p>imprension diagnostica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="impresionDiag" placeholder="Impresion diagnostica"></textarea>
		            </div>
						<button type="submit" class="btn btn-primary" onclick="Materialize.toast('Registrado con exito !!', 3000, 'rounded');">Aceptar</button>    
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
