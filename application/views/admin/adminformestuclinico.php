<?php $this->load->view('admin/admincabecera.php');?>

	<div class="navegacion1">
		<h1><b><span style="color:orange">Estudio clínico criminológico de <?php echo $info->nombre ." ". $info->apellido?></b></h1>	
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
					<a class="nav-active">Estudio Clínico Criminológico </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>EstuClini2" method="post" role="form">
					<div class="form-group">
			            <!-- <p>Fecha</p> -->
			            <input type="hidden" name="fecha" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php setlocale(LC_ALL,"es_ES"); 
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
			            <p>Ubicación</p>
						<input type="text" name="ubicacion" placeholder="Ubicacion" class="form-email form-control" id="form-email">
			        </div>
					<div class="form-group">
			            <!-- <p>Nombre</p> -->
						<input type="hidden" name="nombre" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->nombre . " ". $info->apellido; ?>">
					</div>
					<div class="form-group">
			            <p>Descipción</p>
			            <textarea class="form-email form-control" rows="3" name="descripcionInicial"><?php 
			            		$fecha=$info->fechaNac;
		                		list($Y,$m,$d)= explode("-", $fecha);
		                		$edad= date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y; 
			            		echo "Se refiere a una persona del sexo masculino de ".$edad . " años de edad, fecha de nacimiento: "
			            		. $fecha=$info->fechaNac .". Originario de ".$info->lugNaci. " Colima; en la actualidad su dirección se ubica en el "
			            		. $info->domicilio. ". De ocupación: ".$info->ocupacion.". Estudios Máximos: ".$info->escolaridad.". Estado civil: "
			            		. $info->estadoCiv.", quien se encuentra procesado por su presunta responsabilidad en ";
			            	?>
			            </textarea>
			        </div>
			        <div class="form-group">
			            <p>Antecedentes familiares y personales</p>
			            <textarea class="form-email form-control" rows="3" name="antFP" placeholder="Antecedentes familiares y personales"></textarea>
			        </div>
			        <div class="form-group">
			            <p>Versión del delito</p>
			            <textarea class="form-email form-control" rows="3" name="versiondeldelito" placeholder="Versión del delito:"></textarea>
			        </div>
			        <div class="form-group">
		                <p>Examen mental</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="examenmental" placeholder="Examen mental"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Pruebas aplicadas</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="pruebasaplicadas" placeholder="Dinamica de personalidad"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Indice de lessiones organica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="indiceLO" placeholder="Indice de lesiones organica nivel intelectual"></textarea>
		            </div>
		             <div class="form-group">
		                <p>Nivel intelectual</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="Nvlintelectual" placeholder="Nivel intelectual"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Factores psicológicos que intervinieron en la comisión del delito</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="facPsicoDelito" placeholder="Factores psicológicos que intervinieron..."></textarea>
		            </div>
		             <div class="form-group">
		                <p>Dinámica de personalidad</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="dinamicaResp" placeholder="Dinámica de personalidad"></textarea>
		            </div>
		            <div class="form-group">
		                <p>imprensión diagnóstica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="impreDiagnostica" placeholder="Impresión diagnóstica"></textarea>
		            </div>
						<button type="submit" class="btn btn-primary" onclick="Materialize.toast('Registrado con exito !!', 3000, 'rounded');">Aceptar</button>    
				</form>
			</div>	
	  	</div>
	</div> 	        		

<?php $this->load->view('admin/adminpie.php');?>