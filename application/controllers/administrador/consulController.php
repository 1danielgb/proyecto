<?php 


class consulController extends CI_Controller
{
    public function index(){
       // return view('administrador.panel');
        //	Nombre del interno 
        $nombre=$this->input->post('nombre');
        
        //cargando el modelo de internos para hacer la busqueda 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre);
        //comprobamos que el nombre exista
        if($fila==null){
			header("Location:" . base_url() . "admin");
		} else {
			$nom2 =$fila->nombre;
			$datos['nombre'] = $nom2;
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
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre);
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
    	//cargando el modelo de internos para hacer la busqueda 
        $this->load->model("m_interno");
        //mandando el nombre al modelo
        $fila = $this->m_interno->getnominterno($nombre);
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
    public function registrarIntern(){
    	
    }
}