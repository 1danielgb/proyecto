<?php $this->load->view('admin/admincabecera.php');?>

	<div class="navegacion1">
		<h1><b><span style="color:orange">Estudio de actividades de <?php echo $info->nombre ." ". $info->apellido?></b></h1>	
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
					<a class="nav-active">Formato de Actividades </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>FormActivi2" method="post" role="form">
					<div class="form-group">
			            <!-- <p type="hidden" >Fecha</p> -->
			            <input type="hidden" name="fecha" placeholder="Fecha..." class="form-email form-control" id="form-email"  value="<?php setlocale(LC_ALL,"es_ES"); 
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
		            	<h4>Modalidades de intervención</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
			            <!-- <p>Nombre completo:</p> -->
			            <input type="hidden" name="nombre" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->nombre . " ". $info->apellido; ?>">
			        </div>
					<div class="form-group">
			            <p>Tratamiento psicológico por dependencia a psico-fármacos</p>
			            <textarea class="form-email form-control" rows="3" name="trataPsico" placeholder=""><?php 
			                 	echo "No. de sesiones:_____  Tiempo: 3(), 6(), 9() meses. Horario:________  Lugar:____________"; 

			            	?>
			            </textarea>
			            <!-- <input type="name" name="nombre" placeholder="Nombre..." class="form-email form-control" id="form-email"  value="<?php echo $info->nombre; ?>"> -->
			        </div>
			        <div class="form-group">
			            <p>Psicoterapia Individual</p>
			             <textarea class="form-email form-control" rows="3" name="psicoIndi" placeholder=""><?php 
			                 	echo "No. de sesiones:_____  Tiempo: 3(), 6(), 9() meses. Horario:________  Lugar:____________"; 

			            	?>
			            </textarea>
			        </div>
			        <div class="form-group">
			            <p>Psicoterapia Grupal</p>
			             <textarea class="form-email form-control" rows="3" name="psicoGrup" placeholder=""><?php 
			                 	echo "Nombre del programa:_______________ Fecha de inicio:___________ Fecha de cierre:___________ No. de sesiones:_____  Tiempo: 3(), 6(), 9() meses. Horario:________  Lugar:____________  Área varonil ()  Área femenil ()." ; 

			            	?>
			            </textarea>
			        </div>
			        <div class="form-group">
		                <p>Terapia Familiar</p>
		                 <textarea class="form-email form-control" rows="3" name="teraFami" placeholder=""><?php 
			                 	echo "No. de sesiones:_____  Tiempo: 3(), 6(), 9() meses. Horario:________  Lugar:____________"; 

			            	?>
			            </textarea>
		                </div>
		            <div class="form-group">
		                <p>Programa de Instituciones Externas</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
						 <textarea class="form-email form-control" rows="3" name="progInsti" placeholder=""><?php 
			                 	echo "Grupo:_______  Centro de integración Juvenil ()  Alcohólicos Anónimos ()  Neuróticos Anónimos ()  Grupo Religioso ()  nombre:___________  Fecha de inicio:___________  Fecha de cierre:___________  No. de sesiones:_____  Tiempo: 3(), 6(), 9() meses. Horario:________  Lugar:____________  Área varonil ()  Área Femenil ()"; 

			            	?>
			            </textarea>
		            </div>
						<button type="submit" class="btn btn-primary" onclick="Materialize.toast('Registrado con exito !!', 3000, 'rounded');">Aceptar</button>    
				</form>
			</div>	
	  	</div>
	</div> 	        		

<?php $this->load->view('admin/adminpie.php');?>