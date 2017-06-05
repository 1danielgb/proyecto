<?php 


class consulController extends CI_Controller
{
    public function index(){
       // return view('administrador.panel');
        //	Nombre del interno 
        $nombre=$this->input->post('nombre');
        // Apellidos del interno
        $apellido=$this->input->post('apellido');
        //cargando el modelo de internos para hacer la busqueda 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        //comprobamos que el nombre exista
        if($fila==null){
			header("Location:" . base_url() . "admin");
		} else {
            $ape= $fila->apellido;
			$nom2 =$fila->nombre;
            $datos=array();
			$datos['nombre'] = $nom2;
            $datos['apellido']=$ape;
			//echo $nom2;
			$var['dato'] = array();
			$var['dato'] = $nom2; 

			$this->load->view('admin/adminatenconsulta',$datos);
			//return (echo json_encode($fila););//;$nom2;

			 // echo $nombre;
			 // $nom2 =$fila->nombre;
			 // echo $nom2;
		}

       

    }

     	
   

    public function internos(){    	 
    	 // $nom2 = $this->index();
    	 // echo $nom2;
    	 // $datos['nombre']=$nom;

    	//$this->load->view('admin/adminatenconsulta', $datos);
    }

    public function formpersonalidad(){
        //obteniendo el nombre del interno del input invisible de la vista anterior
        $nombre=$this->input->post('nombre');
        $apellido=$this->input->post('apellido');

        //echo $nombre;
        //echo $apellido;
        //die();
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        $datos= array();
        $datos['info']=$fila;
        //cargando la vista.
        $this->load->view('admin/adminformpersonalidad', $datos);
    	
    }
    public function formpersonalidadpost(){
    	//obteniendo los datos;
    	$fecha= $this->input->post('fecha');
    	$nombre = $this->input->post('nombre');
    	$apellido =$this->input->post('apellido');
    	$antecentes= $this->input->post('antece');
    	$examen= $this->input->post('examen');
    	$indiceLe= $this->input->post('indiceLe');
    	$nivelInt= $this->input->post('nivelInt');
    	$dinamicaPer= $this->input->post('dinamicaPer');
    	$impresionDiag= $this->input->post('impresionDiag');
    	//cargando el modelo
		$this->load->model('m_formato');
		//mandando los datos al modelo
        $fila = $this->m_formato->postpersonalidad($fecha,$nombre,$apellido,$antecentes,$examen,$indiceLe,$nivelInt,$dinamicaPer,$impresionDiag,$fecha);
        /*$nom2 =$fila->idUsuario;
        echo $nom2;*/
        
       // print_r($fila[0]);
       // die();
        //echo "hii";
        //die();
        header("Location:" . base_url() . "Pdf");
        
        if($fila!=false){
				
				header("Location:" . base_url() . "EstuPerso2");
		}else{
				echo "no puedes dar de alta";
			}

    }

    public function entrepsicologica(){
    	//obteniendo el nombre del interno del input invisible de la vista anterior
    	$nombre=$this->input->post('nombre');
        $apellido=$this->input->post('apellido');
    	//cargando el modelo de internos para hacer la busqueda 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        $datos= array();
        $datos['info']=$fila;
        //$nom2 =$fila->nombre;

        //$nombre=['nombre']->$fila;
        //$datos['nombre']=$fila;
        //$datos['fechan']=$fechan;
        //cargando la vista.
        $this->load->view('admin/adminformentrevista', $datos);
    }
     public function entrevistapost(){
        //obteniendo los datos de la vista formentrevista
        $fecha = $this->input->post('fecha');
        $nombre = $this->input->post('nombre');
        $fechan = $this->input->post('fechanacimi');
        $recidencia = $this->input->post('recidencia');
        $ocupacion = $this->input->post('ocupacion');
        $estadocivil= $this->input->post('estadocivil');
        $delito=$this->input->post('delito');
        $mtvconsulta= $this->input->post('mtvconsulta');
        $edad= $this->input->post('edad');
        $lugnacimiento=$this->input->post('lugnacimiento');
        $domicilio=$this->input->post('domicilio');
        $escolaridad=$this->input->post('escolaridad');
        $nombrePa=$this->input->post('nombrePa');
        $escolaridadPa=$this->input->post('escolaridadPa');
        $ocupacionPa=$this->input->post('ocupacionPa');
        $edadPa=$this->input->post('edadPa');
        $nombreMa=$this->input->post('nombreMa');
        $escolaridadMa=$this->input->post('escolaridadMa');
        $ocupacionMa = $this->input->post('ocupacionMa');
        $edadMa=$this->input->post('edadMa');
        $idI=$this->input->post('id');

        //datos de los hermanos en arreglos
        $items1 = $this->input->post('nombreE');
        $items2 = $this->input->post('escolaridadE');
        $items3 = $this->input->post('ocupacionE');
        $items4 = $this->input->post('edadE') ;

        ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    $item4 = current($items4);
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
                    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                    $valores='"'.$id.'","'.$nom.'","'.$carr.'","'.$gru.'",';

                    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                    $valoresQ= substr($valores, 0, -1);
                    
                    //echo $valores;
                    ///////// QUERY DE INSERCIÓN ////////////////////////////

                    $SQL1 = "INSERT INTO hijo(idhijo,nombre,escolaridad,ocupacion,edad,interno_idInterno) VALUES (null,$valoresQ,$idI);";
                    //$sql = "INSERT INTO alumnos (id_alumno, nombre, carrera, grupo) 
                    //VALUES $valoresQ";
                    //generando la consulta
                    $this->db->query($SQL1);
                    //$sqlRes=$conexion->query($sql) or mysql_error();

                    
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    $item4 = next( $items4 );
                    
                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
    
                }
        //continuacion del formato entrevista
        $antecentes = $this->input->post('antecedentes');
        $factoresIntCons=$this->input->post('factoresIntCons');
        $escolaridad2=$this->input->post('escolaridad2');
        $actividades=$this->input->post('actividades');
        $relacFami=$this->input->post('relacFami');

        // Apartado del examen mental
        $relacion=$this->input->post('relacion');
        $vestido=$this->input->post('vestio');
        $higiene=$this->input->post('higiene');
        $apariencia=$this->input->post('apariencia');
        $postura=$this->input->post('postura');
        $forma=$this->input->post('forma');
        $expresionfare=$this->input->post('expesionfare');
        $expresionesfa=$this->input->post('expresionesfa');
        $intGenExam=$this->input->post('intGenExam');
        $interaciones=$this->input->post('interaciones');
        $actividadmo=$this->input->post('actividadmo');
        $conductama=$this->input->post('conductama');
        $tonovoz=$this->input->post('tonovoz');
        $problemasint=$this->input->post('problemasint');
        $historiacond=$this->input->post('historiacond');
        $conductaant=$this->input->post('conductaant');
        $historilprole=$this->input->post('historilprole');
        $problemaslega=$this->input->post('problemaslega');
        $ajustesinte=$this->input->post('ajustesinte');
        $autoconcepto=$this->input->post('autoconcepto');
        $expectativafu=$this->input->post('expectativafu');
        $impresiondia=$this->input->post('impresiondia');
        $observaciones=$this->input->post('observaciones');


        //echo $observaciones;
        //die();
        //cargando el modelo
        $this->load->model('m_formato');
        //mandando los datos al modelo
       
        $fila = $this->m_formato->postentrevista($fecha,$nombre,$fechan,$recidencia,$ocupacion,$estadocivil,$delito,$mtvconsulta,$edad,
            $lugnacimiento,$domicilio,$escolaridad,$nombrePa,$escolaridadPa,$ocupacionPa,$edadPa,$nombreMa,$escolaridadMa,$ocupacionMa,
            $edadMa,$antecentes,$factoresIntCons,$escolaridad2,$actividades,$relacFami,$relacion,$vestido,$higiene,$apariencia,$postura,
            $forma,$expresionfare,$expresionesfa,$intGenExam,$interaciones,$actividadmo,$conductama,$tonovoz,$problemasint,$historiacond,$conductaant,
            $historilprole,$problemaslega,$ajustesinte,$autoconcepto,$expectativafu,$impresiondia,$observaciones,$idI);


        header("Location:" . base_url() . "PdfEntrevista");
         
        if($fila!=false){
                header("Location:" . base_url() . "PdfEntrevista");
                //header("Location:" . base_url() . "EntrePsico");
        }else{
                echo "no puedes dar de alta";
            }

     }

    public function estupsicologico(){
        //obteniendo el nombre del interno del input invisible de la vista anterior
        $nombre=$this->input->post('nombre');
        //apellido del interno
        $apellido=$this->input->post('apellido');
        //cargando el modelo de internos para hacer la busqueda
        //echo $nombre;
        //echo $apellido;
        //die(); 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        $datos= array();
        $datos['info']=$fila;
        //print_r($datos);
        //die();
        //$nom2 =$fila->nombre;

        //$nombre=['nombre']->$fila;
        //$datos['nombre']=$fila;
        //$datos['fechan']=$fechan;
        //cargando la vista.
        $this->load->view('admin/adminformestupsicolo', $datos);
    }
    public function estupsicolpost(){
        //obteniendo los datos;
        $fecha= $this->input->post('fecha');
        $nombre = $this->input->post('nombre');
        $apellido =$this->input->post('apellido');
        $procePenal=$this->input->post('procePenal');
        $descripcion=$this->input->post('descripcion');
        $antecentes= $this->input->post('antece');
        $examen= $this->input->post('examen');
        $indiceLe= $this->input->post('indiceLe');
        $nivelInt= $this->input->post('nivelInt');
        $dinamicaPer= $this->input->post('dinamicaPer');
        $factPsico=$this->input->post('factPsico');
        $impresionDiag= $this->input->post('impresionDiag');
        $conclusion=$this->input->post('conclusion');
        //Variables del Estambul
        $vertur=$this->input->post('vertur');
        $reexpertor=$this->input->post('reexpertor');
        $inviemo=$this->input->post('inviemo');
        $hiperex=$this->input->post('hiperex');
        $sintdepre=$this->input->post('sintdepre');
        $disaut=$this->input->post('disaut');
        $disodesp=$this->input->post('disodesp');
        $quejaspsi=$this->input->post('quejaspsi');
        $psicosis=$this->input->post('psicosis');
        $deteneupsi=$this->input->post('deteneupsi');
        $diagnostico=$this->input->post('diagnostico');

        // $vertur,$reexpertor,$inviemo,$hiperex,$sintdepre,$disaut,$disodesp,$quejaspsi,$psicosis,$deteneupsi,$diagnostico
        //echo $vertur;
        // echo'</br>';
        // echo $disaut;
        //die();
        //cargando el modelo
        $this->load->model('m_formato');
        //mandando los datos al modelo
        $fila = $this->m_formato->postestupsicol($fecha,$nombre,$apellido,$procePenal,$antecentes,$descripcion,$examen,$nivelInt,$indiceLe,$dinamicaPer,$factPsico,$impresionDiag,$conclusion,
                $vertur,$reexpertor,$inviemo,$hiperex,$sintdepre,$disaut,$disodesp,$quejaspsi,$psicosis,$deteneupsi,$diagnostico);
        //$nom2 =$fila->descripEstuPsic;
        
        
        //header("Location:" . base_url() . "PdfEstuPsi");
         
        if($fila!=false){
                //echo "Datos almacenados";
                header("Location:" . base_url() . "PdfEstuPsi");
                //header("Location:" . base_url() . "EntrePsico");
        }else{
                echo "no puedes dar de alta";
            }

    }
    public function esbeneficio(){
        //obteniendo el nombre del interno del input invisible de la vista anterior
        $nombre=$this->input->post('nombre');
        //apellido del interno
        $apellido=$this->input->post('apellido');
        //cargando el modelo de internos para hacer la busqueda
        //echo $nombre;
        //echo $apellido;
        //die(); 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        $datos= array();
        $datos['info']=$fila;
        //print_r($datos);
        //die();
        //$nom2 =$fila->nombre;

        //$nombre=['nombre']->$fila;
        //$datos['nombre']=$fila;
        //$datos['fechan']=$fechan;
        //cargando la vista.
        $this->load->view('admin/adminformestubenefi', $datos);   
    }
    public function estubenefipost(){
        $fecha= $this->input->post('fecha');
        $nombre = $this->input->post('nombre');
        $sobrenom= $this->input->post('sobrenom');
        $edad= $this->input->post('edad');
        $delito= $this->input->post('delito');
        $indiceLes= $this->input->post('indiceLes');
        $actitudTom= $this->input->post('actitudTom');
        $examMen= $this->input->post('examMen');
        $prueApli= $this->input->post('prueApli');
        $nivelInt= $this->input->post('nivelInt');
        $indiceLes= $this->input->post('indiceLes');
        $dinaPerso= $this->input->post('dinaPerso');
        $impreDiag= $this->input->post('impreDiag');
        $resulTrata= $this->input->post('resulTrata');
        $menFactPsico= $this->input->post('menFactPsico');
        $requerimientos= $this->input->post('requerimientos');
        $especifique= $this->input->post('especifique');
        $sugerencia= $this->input->post('sugerencia');


         //$fecha,$nombre,$sobrenom,$edad,$delito,$indiceLes,$actitudTom,$examMen,$prueApli,$nivelInt,$indiceLes,$dinaPerso,$impreDiag,$resulTrata,$menFactPsico,$requerimientos,$especifique,$sugerencia

         //cargando el modelo
        $this->load->model('m_formato');
        //mandando los datos al modelo
        $fila = $this->m_formato->postestubenefi($fecha,$nombre,$sobrenom,$edad,$delito,$actitudTom,$examMen,$prueApli,
                                                 $nivelInt,$indiceLes,$dinaPerso,$impreDiag,$resulTrata,$menFactPsico,$requerimientos,$especifique,$sugerencia);
        //$nom2 =$fila->descripEstuPsic;

        if($fila!=false){
                //echo "Datos almacenados";
                header("Location:" . base_url() . "PdfEstuBenefi");
                //header("Location:" . base_url() . "EntrePsico");
        }else{
                echo "no puedes dar de alta";
            }
        
    }

    public function formactivity(){
        //obteniendo el nombre del interno del input invisible de la vista anterior
        $nombre=$this->input->post('nombre');
        //apellido del interno
        $apellido=$this->input->post('apellido');
        //cargando el modelo de internos para hacer la busqueda
        //echo $nombre;
        //echo $apellido;
        //die(); 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        $datos= array();
        $datos['info']=$fila;
        //print_r($datos);
        //die();
        //$nom2 =$fila->nombre;

        //$nombre=['nombre']->$fila;
        //$datos['nombre']=$fila;
        //$datos['fechan']=$fechan;
        //cargando la vista.
        $this->load->view('admin/adminformactivity', $datos);
    }

    public function formactivitypost(){
        $fecha= $this->input->post('fecha');
        $nombre=$this->input->post('nombre');
        $trataPsico= $this->input->post('trataPsico');
        $psicoIndi= $this->input->post('psicoIndi');
        $psicoGrup= $this->input->post('psicoGrup');
        $teraFami= $this->input->post('teraFami');
        $progInsti= $this->input->post('progInsti');
         //cargando el modelo
        $this->load->model('m_formato');
        //mandando los datos al modelo
        $fila = $this->m_formato->postformactivity($fecha,$nombre,$trataPsico,$psicoIndi,$psicoGrup,$teraFami,$progInsti);
        //$nom2 =$fila->descripEstuPsic;

        if($fila!=false){
                //echo "Datos almacenados";
                header("Location:" . base_url() . "PdfFormAct");
                //header("Location:" . base_url() . "EntrePsico");
        }else{
                echo "no puedes dar de alta";
            }
    }

    public function estuclinico(){
        //obteniendo el nombre del interno del input invisible de la vista anterior
        $nombre=$this->input->post('nombre');
        //apellido del interno
        $apellido=$this->input->post('apellido');
        //cargando el modelo de internos para hacer la busqueda
        //echo $nombre;
        //echo $apellido;
        //die(); 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre,$apellido);
        $datos= array();
        $datos['info']=$fila;
        //print_r($datos);
        //die();
        //$nom2 =$fila->nombre;

        //$nombre=['nombre']->$fila;
        //$datos['nombre']=$fila;
        //$datos['fechan']=$fechan;
        //cargando la vista.
        $this->load->view('admin/adminformestuclinico', $datos);
    }
    public function estuclinipost(){
        $fecha= $this->input->post('fecha');
        $ubicacion=$this->input->post('ubicacion');
        $nombreInterno=$this->input->post('nombre');
        $descripcionInicial=$this->input->post('descripcionInicial');
        $antFP= $this->input->post('antFP');
        $versiondeldelito= $this->input->post('versiondeldelito');
        $examenmental= $this->input->post('examenmental');
        $pruebasaplicadas= $this->input->post('pruebasaplicadas');
        $indiceLO= $this->input->post('indiceLO');
        $Nvlintelectual= $this->input->post('Nvlintelectual');
        $factPsicoDelito= $this->input->post('facPsicoDelito');
        $dinamicaResp= $this->input->post('dinamicaResp');
        $impreDiagnostica= $this->input->post('impreDiagnostica');


         //cargando el modelo
        $this->load->model('m_formato');
        //mandando los datos al modelo
        $fila = $this->m_formato->postestuclinico($fecha,$ubicacion,$nombreInterno,$descripcionInicial,$antFP,$versiondeldelito,
                                                $examenmental,$pruebasaplicadas,$indiceLO,$Nvlintelectual,$factPsicoDelito,
                                                $dinamicaResp,$impreDiagnostica);
        //$nom2 =$fila->descripEstuPsic;
        //header("Location:" . base_url() . "PdfEstuClini");
        if($fila!=false){
                //echo "Datos almacenados";
                header("Location:" . base_url() . "PdfEstuClini");
                //header("Location:" . base_url() . "EntrePsico");
        }else{
                echo "no puedes dar de alta";
            }
    }

    public function registrar(){
	    	if ($this->session->userdata('id')==1){
	    		//obteniendo los datos del formulario 
	        $usuario =$this->input->post('usuario');
			$clave =$this->input->post('clave');
			$apellido=$this->input->post('apellido');
			$correo =$this->input->post('correo');
			$telefono=$this->input->post('telefono');
			//asignando el valor 2 por defecto para el usuario practicante
			$tipouser=2;

			//echo $id; 
			//echo $usuario . "" . $clave . "" . $id;
			//cargando el modelo
			$this->load->model('m_cereso');
			//Mandando los datos al metodo registrarpract del modelo
			$fila=$this->m_cereso->registrarpract($usuario,$clave,$tipouser,$apellido,$correo,$telefono);
			if($fila!=null){
				header("Location:" . base_url() . "AltaPract");
			}else{
				echo"no puedes dar de alta";
			}

    	}
    	
    }
    public function buscar(){
            $buscar= $this->input->post('nombre');
            $formato=$this->input->post('formato');
            //echo $formato;
            //echo "</br>";
            //echo $buscar;
            //die();
            $nombre=$buscar.'.pdf';
            //echo $buscar;
            ///die();

            if ($formato =='Estudio inicial de personalidad') {
                $pdf= 'C:/xampp/htdocs/cereso/Formatos/estudioinicialdepersonalidad/'.utf8_decode($buscar).'.pdf';
                //header('Content-type:application/pdf');
                //header('Content-Disposition:attachment; filename="'.$nombre.'"');
                //readfile($pdf);
                if (file_exists($pdf)) {
                    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                    header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                    header ("Pragma: no-cache");
                    header ("Content-type: application/pdf");
                    header ("Content-Disposition: inline ; filename=".basename($nombre));
                    ob_clean();
                    flush();
                    readfile($pdf);
                    exit;
                }else{
                    ?>
                     <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                    <?php
                }
            }
            if ($formato=='Entrevista Psicológica') {
                $pdf= 'C:/xampp/htdocs/cereso/Formatos/entrevistapsicologica/'.utf8_decode($buscar).'.pdf';
                //header('Content-type:application/pdf');
                //header('Content-Disposition:attachment; filename="'.$nombre.'"');
                //readfile($pdf);
                if (file_exists($pdf)) {
                    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                    header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                    header ("Pragma: no-cache");
                    header ("Content-type: application/pdf");
                    header ("Content-Disposition: inline ; filename=".basename($nombre));
                    ob_clean();
                    flush();
                    readfile($pdf);
                    exit;
                }else{
                      ?>
                        <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                      <?php
                     }
            }

            if ($formato=='Estudio Psicológico') {
                $pdf= 'C:/xampp/htdocs/cereso/Formatos/estudiopsicologico/'.utf8_decode($buscar).'.pdf';
                //header('Content-type:application/pdf');
                //header('Content-Disposition:attachment; filename="'.$nombre.'"');
                //readfile($pdf);
                if (file_exists($pdf)) {
                    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                    header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                    header ("Pragma: no-cache");
                    header ("Content-type: application/pdf");
                    header ("Content-Disposition: inline ; filename=".basename($nombre));
                    ob_clean();
                    flush();
                    readfile($pdf);
                    exit;
                }else{
                      ?>
                        <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                      <?php
                     }
            }

            if ($formato=='Estudio para beneficio') {
                $pdf= 'C:/xampp/htdocs/cereso/Formatos/estudioparabeneficio/'.utf8_decode($buscar).'.pdf';
                //header('Content-type:application/pdf');
                //header('Content-Disposition:attachment; filename="'.$nombre.'"');
                //readfile($pdf);
                if (file_exists($pdf)) {
                    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                    header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                    header ("Pragma: no-cache");
                    header ("Content-type: application/pdf");
                    header ("Content-Disposition: inline ; filename=".basename($nombre));
                    ob_clean();
                    flush();
                    readfile($pdf);
                    exit;
                }else{
                      ?>
                        <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                      <?php
                     }
            }

            if ($formato=='Formato de actividades') {
                $pdf= 'C:/xampp/htdocs/cereso/Formatos/formatodeactividades/'.utf8_decode($buscar).'.pdf';
                //header('Content-type:application/pdf');
                //header('Content-Disposition:attachment; filename="'.$nombre.'"');
                //readfile($pdf);
                if (file_exists($pdf)) {
                    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                    header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                    header ("Pragma: no-cache");
                    header ("Content-type: application/pdf");
                    header ("Content-Disposition: inline ; filename=".basename($nombre));
                    ob_clean();
                    flush();
                    readfile($pdf);
                    exit;
                }else{
                      ?>
                        <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                      <?php
                     }
            }
            if ($formato=='Estudio clínico-criminológico') {
                $pdf= 'C:/xampp/htdocs/cereso/Formatos/estudioclinicocriminologico/'.utf8_decode($buscar).'.pdf';
                //header('Content-type:application/pdf');
                //header('Content-Disposition:attachment; filename="'.$nombre.'"');
                //readfile($pdf);
                if (file_exists($pdf)) {
                    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                    header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                    header ("Pragma: no-cache");
                    header ("Content-type: application/pdf");
                    header ("Content-Disposition: inline ; filename=".basename($nombre));
                    ob_clean();
                    flush();
                    readfile($pdf);
                    exit;
                }else{
                      ?>
                        <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                      <?php
                     }
            }

    }
    public function buscar2(){
            $buscar= $this->input->post('buscar');
            $nombre=$buscar.'.pdf';
            //echo $buscar;
            ///die();
            
                
    }
     public function buscar3(){
            $buscar= $this->input->post('buscar');
            $nombre=$buscar.'.pdf';
            //echo $buscar;
            ///die();
            
                
    }
    public function buscar4(){
            $buscar= $this->input->post('buscar');
            $nombre=$buscar.'.pdf';
            //echo $buscar;
            ///die();
            $pdf= 'C:/xampp/htdocs/cereso/Formatos/estudioparabeneficio/'.utf8_decode($buscar).'.pdf';
            //header('Content-type:application/pdf');
            //header('Content-Disposition:attachment; filename="'.$nombre.'"');
            //readfile($pdf);
            if (file_exists($pdf)) {
                header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                header ("Pragma: no-cache");
                header ("Content-type: application/pdf");
                header ("Content-Disposition: inline ; filename=".basename($nombre));
                ob_clean();
                flush();
                readfile($pdf);
                exit;
            }else{
                ?>
                 <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                <?php
            }
                
    }
     public function buscar5(){
            $buscar= $this->input->post('buscar');
            $nombre=$buscar.'.pdf';
            //echo $buscar;
            ///die();
            $pdf= 'C:/xampp/htdocs/cereso/Formatos/formatodeactividades/'.utf8_decode($buscar).'.pdf';
            //header('Content-type:application/pdf');
            //header('Content-Disposition:attachment; filename="'.$nombre.'"');
            //readfile($pdf);
            if (file_exists($pdf)) {
                header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                header ("Pragma: no-cache");
                header ("Content-type: application/pdf");
                header ("Content-Disposition: inline ; filename=".basename($nombre));
                ob_clean();
                flush();
                readfile($pdf);
                exit;
            }else{
                ?>
                 <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                <?php
            }
                
    }
     public function buscar6(){
            $buscar= $this->input->post('buscar');
            $nombre=$buscar.'.pdf';
            //echo $buscar;
            ///die();
            $pdf= 'C:/xampp/htdocs/cereso/Formatos/estudioclinicocriminologico/'.utf8_decode($buscar).'.pdf';
            //header('Content-type:application/pdf');
            //header('Content-Disposition:attachment; filename="'.$nombre.'"');
            //readfile($pdf);
            if (file_exists($pdf)) {
                header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
                header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
                header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
                header ("Pragma: no-cache");
                header ("Content-type: application/pdf");
                header ("Content-Disposition: inline ; filename=".basename($nombre));
                ob_clean();
                flush();
                readfile($pdf);
                exit;
            }else{
                ?>
                 <p style='font-family: georgia; text-align: center; color: #CC0000; font-weight: bold; font-size: 22pt; padding-top: 120pt;'>Archivo inexistente</p>
                <?php
            }
                
    }
    public function registrarIntern(){
    	
    }
}