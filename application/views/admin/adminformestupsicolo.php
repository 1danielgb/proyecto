<?php $this->load->view('admin/admincabecera.php');?>

	<div class="navegacion1">
		<h1><b><span style="color:orange">Estudio psicológico de <?php echo $info->nombre ." ". $info->apellido?></b></h1>	
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
					<a class="nav-active">Estudio Psicológico </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>EstuPsico2" method="post" role="form">
					<div class="form-group">
			            <p for="form-name">Fecha:</p>
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
			            <p >Nombre:</p>
			            <input type="name" name="nombre" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->nombre; ?>">
			        </div>
			        <div class="form-group">
			            <p >Apellido:</p>
			            <input type="name" name="apellido" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->apellido; ?>">
			        </div>
			        <div class="form-group">
			            <p >Proceso Penal:</p>
			            <input type="name" name="procePenal" placeholder="Proceso Penal" class="form-email form-control" id="form-email">
			        </div>
			        <div class="form-group">
			            <p>Descripción:</p>
			            <textarea class="form-control" rows="20" name="descripcion" placeholder="Proceso Penal"><?php 
			            			$fecha=$info->fechaNac;
		                			list($Y,$m,$d)= explode("-", $fecha);
		                			$edad= date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y; 
			            		echo 
			           				"Se refiere a un individuo de " . $edad . " años de edad, originario de "
			            			. $info->lugNaci . " ,Colima. Tenía su domicilio en ". $info->domicilio ." Colima, Colima. Último grado de estudios " 
			            			. $info->escolaridad . " terminado. De ocupación " . $info->ocupacion . ". Estado civil: " . $info->estadoCiv 
			            			. ". Quien se encuentra en proceso por su presunta responsabilidad en el delito de "; 
			            	?>
			            </textarea>
			        </div>
			        <div class="form-group" id="alin">
			            <p >Antecedentes Familiares y personales:</p>
			            <!-- <input type="name" name="antece" placeholder="Antecedentes familiares y personales" class="form-email form-control" id="form-email"> -->
			        	<textarea class="form-email form-control" rows="3" name="antece" placeholder="Antecedentes familiares y personales"></textarea>
			        </div>
			        <div class="form-group">
		                <p>Examen mental</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="examen" placeholder="Examen mental"></textarea>
		            </div>
					<div class="form-group">
		                <p>Nivel intelectual</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="nivelInt" placeholder="Nivel intelectual"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Índice de lesión orgánica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="indiceLe" placeholder="Indice de lesiones organica nivel intelectual"></textarea>
		            </div>
		            
		            <div class="form-group">
		                <p>Dinámica de personalidad</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="dinamicaPer" placeholder="Dinamica de personalidad"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Factores psicológicos que influyeron para la comisión del delito:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="factPsico" placeholder="Factores psicológicos ..."></textarea>
		            </div>
		            <div class="form-group">
		                <p>Imprensión diagnóstica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="impresionDiag" placeholder="Impresion diagnostica"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Conclusión:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="conclusion" placeholder="Conclusión"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>Estambul</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
		                <p>Versión de tortura:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="vertur" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>Reporte de preguntas del capitulo VI de estambul signos psicológicos indicativos de tortura</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
		                <p>Reexperimentación del trauma:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="reexpertor" placeholder="Respuesta"></textarea>
		            </div>
					<div class="form-group">
		                <p>Invitación emocional:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="inviemo" placeholder="Respuesta"></textarea>
		            </div>
					<div class="form-group">
		                <p>Hiperexitación:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="hiperex" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Sintomas de depresión:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="sintdepre" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Disminución de la autoestima y desesperanza en cuanto al futuro:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="disaut" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Disociación. Despersonalización y comportamiento atípico:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="disodesp" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Quejas psicosomáticas:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="quejaspsi" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Psicosis:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="psicosis" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Deterioro neuropsicológico:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="deteneupsi" placeholder="Respuesta"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Diagnostico:</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="diagnostico" placeholder="Diagnostico"></textarea>
		            </div>
						<button type="submit" class="btn btn-primary" onclick="Materialize.toast('Registrado con exito !!', 3000, 'rounded');">Aceptar</button>    
				</form>
			</div>	
	  	</div>
	</div> 	        		

<?php $this->load->view('admin/adminpie.php');?>