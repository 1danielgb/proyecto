<!DOCTYPE html>
<html>
<head>
	<title>CERESO</title>

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="<?= base_url() ?>css/materialize.min.css"> -->
        <!-- <link rel="stylesheet" href="<?= base_url() ?>css/materialize.css"> -->
        <link rel="stylesheet" href="<?= base_url() ?>css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/css/form-elements.css">
        <link rel="stylesheet" href="<?= base_url() ?>css/css/styleadmin.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/justificado.css">
		<link href="<?= base_url() ?>css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  media="screen" href="<?=base_url() ?>css/bootstrap-datetimepicker.min.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="css/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="css/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="css/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="css/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="css/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
	<!-- Inicia menu -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">CERESO
					<!-- <img src="<?=base_url()?>css/img/colima5.png" alt="company logo" style="width: 100%;"> -->
				</a>
			</div>

			<?php if($this->session->userdata('usuario') != null){ ?>
			<ul class="nav navbar-nav">
				<!-- <li class="active"><a href="#">Home</a></li> -->
				<!-- <li><a href="#">Page 1</a></li> -->
				<!-- <li><a href="#">Page 2</a></li> -->
			</ul>
			<?php } ?>

			<?php if($this->session->userdata('usuario') == null){ ?>

			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="index.php/Cereso/loguearse"><span class="glyphicon glyphicon-user"></span>Entrar</a></li> -->
				<!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
			</ul>

			<?php } ?>

			<?php if($this->session->userdata('usuario') != null){ ?>


			<ul class="nav navbar-nav navbar-right">
				<li><a><?php  echo $this->session->userdata('nombre') ?> </a></li>
				<li><a href="<?=base_url()?>login/logout">Cerrar sesión</a></li>

				<?php } ?>

			</div>
		</nav>
		<!-- Fin menu -->

		<div class="header-row" id="header-row" style="padding: 0px; ">
	        <!-- container-fluid is the same as container but spans a wider viewport, 
	    it still has padding though so you need to remove this either by adding 
	    another class with no padding or inline as I did below -->
	   <div class="container-fluid" style="padding: 0px;">
	      <div class="row"> 
	        <!-- You originally has it set up for two columns, remove the second 
	    column as it is unneeded and set the first to always span all 12 columns 
	    even when at its smallest (xs). Set the overflow to hidden so no matter 
	    the height of your image it will never show outside this div-->
	         <div class="col-xs-12"> 
	            <a class=" navbar-inverse" href="index.html">
	        <!-- place your image here -->
	               <img src="<?=base_url()?>css/img/cerso.png" alt="company logo" style="width: 100%; margin-top:-20px">
	            </a> 
	         </div>     
	      </div>
	   </div>
	</div>

	