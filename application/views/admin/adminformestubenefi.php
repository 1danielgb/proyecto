<?php $this->load->view('admin/admincabecera.php');?>

	<div class="navegacion1">
		<h1><b><span style="color:orange">Estudio para beneficio de <?php echo $info->nombre ." ". $info->apellido?></b></h1>	
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
					<a class="nav-active">Estudio para Beneficio </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>EstuBenefi2" method="post" role="form">
					<div class="form-group">
			            <!-- <p type="hidden" >Fecha</p> -->
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
			            <p>Nombre completo:</p>
			            <input type="name" name="nombre" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->nombre . " ". $info->apellido; ?>">
			        </div>
			        <div class="form-group">
			            <p>Sobrenombre:</p>
			            <input type="name" name="sobrenom" placeholder="Sobrenombre" class="form-email form-control" id="form-email"  value="">
			        </div>
			        <div class="form-group">
			            <p>Edad:</p>
			            <input type="name" name="edad" placeholder="Edad" class="form-email form-control" id="form-email" value="<?php 
			            			$fecha=$info->fechaNac;
		                			list($Y,$m,$d)= explode("-", $fecha);
		                			$edad= date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y;
		                			echo $edad;
			            ?>">
			        </div>
			        <div class="form-group">
		                <p>Delito</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="delito" placeholder="Delito"></textarea>
		            </div>
		             <div class="form-group">
		                <p>Actitud tomada ante la entrevista</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="actitudTom" placeholder="Actitud tomada ante la entrevista"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Examen Mental</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="examMen" placeholder="Examen mental"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Pruebas aplicadas</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="prueApli" placeholder="Pruebas Aplicadas"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Nivel intelectual</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="nivelInt" placeholder="Nivel Intelectual"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Índice de lesión orgánica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="indiceLes" placeholder="Indice de lesión orgánica"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Dinámica de personalidad</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="dinaPerso" placeholder="Dinamica de personalidad"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Impresión diagnóstica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="impreDiag" placeholder="Impresión Diagnóstica"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Resultados de tratamiento</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-email form-control" rows="3" name="resulTrata" placeholder="Resultados de tratamiento"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Mencione los factores psicológicos que intervinieron en la comisión del delito</p>
		                <textarea class="form-email form-control" rows="3" name="menFactPsico" placeholder="Mencione los factores psicológicos..."></textarea>
		                <!-- <input type="name" name="menFactPsico" placeholder="Mencione los factores psicológicos..." class="form-email form-control" id="form-email"> -->
		            </div>
		            <div class="form-group">
			         	 <p>Requerimientos de continuación de tratamiento</p>
			        	 <!-- <p>Estado civil</p> -->
			           <select class="form-control" name="requerimientos">...
			            	<option disabled selected hiddent> Requerimientos de continuación de tratamiento...</option>
			            	<option>SI,INTERNO</option>
			            	<option>SI,EXTERNO</option>
			            	<option>NO</option>
			            </select>
			        </div>
					<div class="form-group">
		                <p>Especifique</p>
		                <textarea class="form-email form-control" rows="3" name="especifique" placeholder="Especifique"></textarea>
		                <!-- <textarea type="name" name="especifique" placeholder="Especifique" class="form-email form-control" id="form-email"> </textarea> -->
		            </div>
		            <div class="form-group">
		                <p>Sugerencia</p>
		                <textarea class="form-email form-control" rows="3" name="sugerencia" placeholder="Sugerencia"></textarea>
		                <!-- <textarea type="name" name="sugerencia" placeholder="Sugerencia" class="form-email form-control" id="form-email"> </textarea> -->
		            </div>
						<button type="submit" class="btn btn-primary" onclick="Materialize.toast('Registrado con exito !!', 3000, 'rounded');">Aceptar</button>    
				</form>
			</div>	
	  	</div>
	</div> 	        		

<?php $this->load->view('admin/adminpie.php');?>