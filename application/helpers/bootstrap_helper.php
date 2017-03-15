<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Gracias por usar mi helper
 * Este helper ayuda a programar un formulario con bootstrap de twitter 3
 * @version 1.0.1
 * @author Nekszer Lopez Espinoza
 * @package Bootstrap
 */


//---------- <load bootstrap>
/**
 * Este método carga los ficheros css y js de bootstrap
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('load_bootstrap')){
	function load_bootstrap()
	{
		$bootstrap = "";
		$bootstrap .= "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>";

		$bootstrap .= "<script src='//code.jquery.com/jquery-1.11.1.min.js'></script>";
		//$bootstrap .= "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>";
		$bootstrap .= "<script src='http://markusslima.github.io/bootstrap-filestyle/js/bootstrap-filestyle.min.js'></script>";
		return $bootstrap;
	}
}