<?php $this->load->view('admin/admincabecera.php');?>
	<div class="navegacion1">
		<h1><b><span style="color:orange">Entrevista Psicologica de <?php echo $info->nombre . " ". $info->apellido; ?></b></h1>	

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
					<a class="nav-active">Entrevista Psicologica </a>
					<!-- <a class="active" href="#!"> </a> -->
				</div>
			</form>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>EntrePsico2" method="post" role="form">
					<div class="form-group">
			            <p>Fecha</p>
			            <input type="name" name="fecha" placeholder="Fecha..." class="form-email form-control" id="form-email" value="<?php setlocale(LC_ALL,"es_ES"); 
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
			            <input type="name" name="nombre" placeholder="Nombre" class="form-email form-control" id="form-email" 
			            	value="<?php echo $info->nombre . " " . $info->apellido;?>">
			        </div>
			        <div class="form-group">
		                <p>Fecha de nacimiento</p>
		                <input type="name" name="fechanacimi" placeholder="Fecha de nacimiento" class="form-email form-control" id="form-email" value="<?php echo $info->fechaNac;?>">
		            </div>
		             <div class="form-group">
		                <p>Recidencia</p>
		               <input type="name" name="recidencia" placeholder="Residencia" class="form-email form-control" id="form-email">
		            </div>

		            <div class="form-group">
		                <p>Ocupación</p>
		               <input type="name" name="ocupacion" placeholder="Ocupación" class="form-email form-control" id="form-email" value="<?php echo $info->ocupacion;?>">
		            </div>
		            
		            <div class="form-group">
		                <p>Estado civil</p>
		                <input type="name" name="estadocivil" placeholder="Estado Civil" class="form-email form-control" id="form-email" value="<?php echo $info->estadoCiv;?>">
		            </div>
		       
		            <div class="form-group">
		                <p>Delitos</p>
		               <textarea class="form-email form-control" rows="3" name="delito" placeholder="Delitos"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Motivo de la consulta</p>
		                <input type="name" name="mtvconsulta" placeholder="Motivo de la consulta" class="form-email form-control" id="form-email">
		            </div>
		            <div class="form-group">
		                <p>Edad</p>
		                <input type="name" name="edad" placeholder="Edad" class="form-email form-control" id="form" value="<?php
		                	$fecha=$info->fechaNac;
		                	list($Y,$m,$d)= explode("-", $fecha); 
		                	echo date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y; 
		                ?>">
		            </div>
		            <div class="form-group">
		                <p>Lugar de nacimiento</p>
		                <input type="name" name="lugnacimiento" placeholder="Lugar de nacimiento" class="form-email form-control" id="form-email" value="<?php echo $info->lugNaci;?>">
		            </div>
		            <div class="form-group">
		                <p>Domicilio</p>
		                <input type="name" name="domicilio" placeholder="Domicilio" class="form-email form-control" id="form-email" value="<?php echo $info->domicilio;?>">
		            </div>
		            <div class="form-group">
		                <p>Escolaridad</p>
		                <input type="name" name="escolaridad" placeholder="Escolaridad" class="form-email form-control" id="form-email" value="<?php echo $info->escolaridad;?>">
		            </div>
		            <div class="form-group">
		            	<h4>2.-  Datos Familiares</h4>
		            	<!-- <p></p> -->
		            </div>
		             <div class="form-group">
			            <p>Nombre del padre</p>
			            <input type="name" name="nombrePa" placeholder="Nombre del padre" class="form-email form-control" id="form-email" 
			            	value="">
			        </div>
			         <div class="form-group">
			         	 <p>Escolaridad del padre</p>
			        	 <!-- <p>Estado civil</p> -->
			            <select class="form-control" name="escolaridadPa">...
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
		            <div class="form-group">
		                <p>Ocupación del padre</p>
		               <input type="name" name="ocupacionPa" placeholder="Ocupación del padre" class="form-email form-control" id="form-email" value="">
		            </div>
		            <div class="form-group">
		                <p>Edad del padre</p>
		                <input type="name" name="edadPa" placeholder="Edad del padre" class="form-email form-control" id="form-email">
		            </div>
		            <div class="form-group">
			            <p>Nombre de la madre</p>
			            <input type="name" name="nombreMa" placeholder="Nombre de la madre" class="form-email form-control" id="form-email" 
			            	value="">
			        </div>
			         <div class="form-group">
			         	 <p>Escolaridad de la madre</p>
			        	 <!-- <p>Estado civil</p> -->
			            <select class="form-control" name="escolaridadMa">...
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
		            <div class="form-group">
		                <p>Ocupación de la madre</p>
		               <input type="name" name="ocupacionMa" placeholder="Ocupación de la madre" class="form-email form-control" id="form-email" value="">
		            </div>
		            <div class="form-group">
		                <p>Edad de la madre</p>
		                <input type="name" name="edadMa" placeholder="Edad de la madre" class="form-email form-control" id="form-email">
		            </div>
		             <div class="form-group">
		            	<h4>2.1.-  Datos Familiares de hermanos</h4>
		            	<!-- <p></p> -->
		            </div>
			            <table class="table bg-info"  id="tabla">
							<tr class="fila-fija">
								<td><input  class="form form-control" required name="nombreE[]" placeholder="Nombre"/></td>
								<td><input  class="form form-control" required name="escolaridadE[]" placeholder="Escolaridad"/></td>
								<td><input  class="form form-control"required name="ocupacionE[]" placeholder="Ocupación"/></td>
								<td><input  class="form form-control" required name="edadE[]" placeholder="Edad"/></td>
								<td class="eliminar"><input type="button"   value="Menos -"/></td>
							</tr>
						</table>
					<div class="form-group">
						<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>
					</div>
					<div class="form-group">
		            	<h4>3.-  Antecedentes del interno</h4>
		            	<!-- <p></p> -->
		            </div>
					<div class="form-group">
		                <p>Antecentes del interno</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="antecedentes" placeholder="Antecedentes del interno"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>4.- Factores que intervinieron</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
		                <p>Factores que intervinieron en la comision del delito</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="factoresIntCons" placeholder="Factores que intervinieron en la comision del delito"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>5.- Escolaridad</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
		                <p>Escolaridad</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="escolaridad2" placeholder="Escolaridad"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>6.- Actividades</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
		                <p>Actividades</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="actividades" placeholder="Actividades"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>6.- Relaciones familiares</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
		                <p>Relaciones familiares</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="relacFami" placeholder="Relaciones Familiares"></textarea>
		            </div>
		            <div class="form-group">
		            	<h4>Examen mental</h4>
		            	<!-- <p></p> -->
		            </div>
		            <div class="form-group">
			        	<p>Relacion entre la edad aparente y edad real</p>
			            <select class="form-control" name="relacion">...
			            	<option disabled selected hiddent> Relacion entre la edad aparente y edad real</option>
			            	<option>Parece mas joven</option>
			            	<option>Aparenta la edad que tiene</option>
			            	<option>Parece mas viejo</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Vesido</p>
			            <select class="form-control" name="vestio">...
			            	<option disabled selected hiddent>Vesido</option>
			            	<option>Apropiado</option>
			            	<option>Inadecuado</option>
			            	<option>Inusual</option>
			            	<option>Grotesco</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Higiene personal</p>
			            <select class="form-control" name="higiene">...
			            	<option disabled selected hiddent>Higiene personal</option>
			            	<option>Buena</option>
			            	<option>Negligente</option>
			            	<option>Pobre</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Apariencia total<</p>
			            <select class="form-control" name="apariencia">...
			            	<option disabled selected hiddent>Apariencia total</option>
			            	<option>Limpio</option>
			            	<option>Meticuloso</option>
			            	<option>Desaliñado</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Postura</p>
			            <select class="form-control" name="postura">...
			            	<option disabled selected hiddent>Postura</option>
			            	<option>Normal</option>
			            	<option>Rigido</option>
			            	<option>Extremadamente rígido</option>
			            	<option>Desplomado</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Forma de caminar</p>
			            <select class="form-control" name="forma">...
			            	<option disabled selected hiddent> Forma de caminar</option>
			            	<option>Normal</option>
			            	<option>Errático</option>
			            	<option>Acelerado</option>
			            	<option>Lento</option>
			            	<option>Requiere ayuda mecánica</option>
			            	<option>No puede caminar</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Expresión facial reflejado</p>
			            <select class="form-control" name="expesionfare">...
			            	<option disabled selected hiddent>Expresión facial reflejado</option>
			            	<option>No afectado particularmente</option>
			            	<option>Depresion</option>
			            	<option>Ansiedad</option>
			            	<option>Jubiloso</option>
			            	<option>Interesado</option>
			            	<option>Suspicaz</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Expresiones faciales</p>
			            <select class="form-control" name="expresionesfa">...
			            	<option disabled selected hiddent>Expresiones faciales</option>
			            	<option>Apropiado al contenido verbal</option>
			            	<option>Inapropiado</option>
			            	<option>De variedad máxima</option>
			            	<option>Decreciente variabilidad</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	 <p>Interación general con el examinador</p>
			            <select class="form-control" name="intGenExam">...
			            	<option disabled selected hiddent>Interación general con el examinador</option>
			            	<option>Coperador</option>
			            	<option>Rechazante</option>
			            </select>	
			        </div>
			        <div class="form-group">
			        	<p>Interación específica con el examinador</p>
			            <select class="form-control" name="interaciones">...
			            	<option disabled selected hiddent>Interación específica con el examinador</option>
			            	<option>Apropiado</option>
			            	<option>Dominante</option>
			            	<option>Atractivo</option>
			            	<option>Seductivo</option>
			            	<option>Dependiente</option>
			            	<option>Evacivo</option>
			            	<option>Defensivo</option>
			            	<option>Hostil</option>
			            	<option>Comprometido con distuibios de conciencia</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>La actividad motora es:</p>
			            <select class="form-control" name="actividadmo">...
			            	<option disabled selected hiddent>La actividad motora es:</option>
			            	<option>Espontanea</option>
			            	<option>Relajada</option>
			            	<option>Organizada</option>
			            	<option>Coordinada</option>
			            	<option>Incordinada</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Conducta manifiesta:</p>
			            <select class="form-control" name="conductama">...
			            	<option disabled selected hiddent>Conducta manifiesta:</option>
			            	<option>Llanto</option>
			            	<option>Júbilo</option>
			            	<option>Actos impulsivos</option>
			            	<option>Retardo Motor</option>
			            	<option>Movimientos ineccesarios</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Tono de voz:</p>
			            <select class="form-control" name="tonovoz">...
			            	<option disabled selected hiddent>Tono de voz:</option>
			            	<option>Normal</option>
			            	<option>Fuerte</option>
			            	<option>Bajo</option>
			            	<option>Coordinada</option>
			            	<option>Incordinada</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Problemas Interpesonales ocurridos específicamente con:</p>
			            <select class="form-control" name="problemasint">...
			            	<option disabled selected hiddent>Problemas Interpesonales ocurridos específicamente con:</option>
			            	<option>No mayores en su vida diaria</option>
			            	<option>Con los compañeros</option>
			            	<option>En el matrimonio</option>
			            	<option>Otras relaciones intímas</option>
			            	<option>Con la educación</option>
			            	<option>En el trabajo</option>
			            	<option>Con las autoridades</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	 <p>Historia de conductas antisociales</p>
			            <select class="form-control" name="historiacond">...
			            	<option disabled selected hiddent>Historia de conductas antisociales.</option>
			            	<option>Ninguna</option>
			            	<option>Robo</option>
			            	<option>Asalto</option>
			            	<option>Destrucción en propiedad ajena</option>
			            	<option>Tráfico de drogas</option>
			            	<option>Prostitución</option>
			            	<option>Conductas sexuales desviadas</option>
			            	<option>Abuso y/o violación el cónyuge</option>
			            	<option>Abuso y/o violación de menores</option>
			            	<option>Homicidio</option>
			            	<option>Otras:</option>
			            </select>
			        </div>
			        <div class="form-group">
			        	<p>Conducta antisocial habitual</p>
			            <select class="form-control" name="conductaant">...
			            	<option disabled selected hiddent>Conducta antisocial habitual.</option>
			            	<option>Ninguna</option>
			            	<option>Robo</option>
			            	<option>Asalto</option>
			            	<option>Destrucción en propiedad ajena</option>
			            	<option>Tráfico de drogas</option>
			            	<option>Prostitución</option>
			            	<option>Conductas sexuales desviadas</option>
			            	<option>Abuso y/o violación el cónyuge</option>
			            	<option>Abuso y/o violación de menores</option>
			            	<option>Homicidio</option>
			            	<option>Otras:</option>
			            </select>
			        </div>
			        <div class="form-group">
		                <p>Historial de problemas legales</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="historilprole" placeholder="Historial de problemas legales"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Problemas legales habituales </p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="problemaslega" placeholder="Problemas legales habituales"></textarea>
		            </div>
		            <div class="form-group">
			        	 <p>Clasificación general de ajustes interpesonal</p>
			            <select class="form-control" name="ajustesinte">...
			            	<option disabled selected hiddent>Clasificación general de ajustes interpesonal.</option>
			            	<option>Inmadurez consistente y pobre socialización</option>
			            	<option>Inmaduerez en áreas específicas y pobre socialización</option>
			            	<option>Madurez consistente</option>
			            </select>
			        </div>
			        <div class="form-group">
		                <p>Autoconcepto: </p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="autoconcepto" placeholder="Autoconcepto"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Expectativas a futuro</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="expectativafu" placeholder="Expectativas a futuro"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Impresión diagnostica</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="impresiondia" placeholder="Impresión diagnostica"></textarea>
		            </div>
		            <div class="form-group">
		                <p>Observaciones</p>
		                <!-- <input type="name" name="descripcion" placeholder="Descripción" class="form-email form-control" id="form-email"> -->
		            	<textarea class="form-control" rows="3" name="observaciones" placeholder="Observaciones"></textarea>
		            </div>
		            <div class="form-group">
		            	<input type"hidden" name="id" style="display:none" value="<?php echo $info->idInterno; ?>">
		            </div>
						<button type="submit" class="btn btn-primary" onclick="Materialize.toast('Registrado con exito !!', 3000, 'rounded');">Aceptar</button>    
				</form>
			</div>	
	  	</div>
	</div> 	
<?php $this->load->view('admin/adminpie.php');?>

<script>
			
    $(function(){
		// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
		$("#adicional").on('click', function(){
			$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
			});
			 
		// Evento que selecciona la fila y la elimina 
		$(document).on("click",".eliminar",function(){
			var parent = $(this).parents().get(0);
			$(parent).remove();
		});
	});
</script>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker4').datetimepicker({
      pickTime: false
    });
  });
</script> 