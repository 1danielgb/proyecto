<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['panel'] = 'login/ingresar';
$route['admin'] = 'administrador/adminController/index';
$route['AltaPract'] ='administrador/adminController/altauser';
$route['regpra'] ='administrador/adminController/registrar';
//Ruta panel interno 
$route['PanelInter']='administrador/adminController/panelinterno';
//routes of the interno.
$route['AltaIntern']='administrador/internoController/altainterno';
$route['regint'] = 'administrador/internoController/registrar';
//routes of the atender citas
$route['AtenConsul'] = 'administrador/consulController/index';
//routes for the format of personalidad 
$route['EstuPerso'] = 'administrador/consulController/formpersonalidad';
$route['EstuPerso2'] = 'administrador/consulController/formpersonalidadpost';
$route['Pdf'] = 'administrador/pdfController/index';
//routes for the format of entrevista
$route['EntrePsico'] = 'administrador/consulController/entrepsicologica';
$route['EntrePsico2'] = 'administrador/consulController/entrevistapost';
$route['PdfEntrevista']='administrador/pdfEntrevistaController/index';
//routes for the format of estudio psicologico
$route['EstuPsico']= 'administrador/consulController/estupsicologico';
$route['EstuPsico2'] = 'administrador/consulController/estupsicolpost';
$route['PdfEstuPsi']='administrador/pdfEstudiPsicoController/index';
//routes for the format of estudio para beneficio 
$route['EstuBenefi']='administrador/consulController/esbeneficio';
$route['EstuBenefi2'] = 'administrador/consulController/estubenefipost';
$route['PdfEstuBenefi']='administrador/pdfEstBenefiController/index';
//route for the format activity 
$route['FormActivi']='administrador/consulController/formactivity';
$route['FormActivi2'] = 'administrador/consulController/formactivitypost';
$route['PdfFormAct']='administrador/pdfFormActController/index';
//$route for the format of estudio clinico criminológico 
$route['EstuClini']= 'administrador/consulController/estuclinico';
$route['EstuClini2'] = 'administrador/consulController/estuclinipost';
$route['PdfEstuClini']='administrador/pdfEstCliniController/index';
//routes of the archive historic
$route['Archivo'] = 'administrador/archivoController/index';
$route['translate_uri_dashes'] = FALSE;
