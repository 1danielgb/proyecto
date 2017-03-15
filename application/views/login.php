<?php include'partes/cabecera.php' ?>
<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>CERESO</strong></h1>
                            <div class="description">
                            	<p>
	                            	El acceso es confidencial, solo usuarios registrados pueden acceder al sistema 
	                            	para mayor información contacta con el administrador.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Acceso al sistema</h3>
                            		<p>Ingrese su usuario y contraseña para acceder</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?=base_url()?>panel" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-name">Nombre</label>
			                        	<input type="name" name="usuario" placeholder="Usuario..." class="form-email form-control" id="form-email">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Contraseña</label>
			                        	<input type="password" name="clave" placeholder="Contraseña..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Aceptar</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<!-- <h3>Registrar...:</h3> -->
                        	<div class="social-login-buttons">
	                        	<!-- <a class="btn btn-link-2" href="#">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a> -->
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class=""></i> Registrar
	                        	</a>
	                        	<!-- <a class="btn btn-link-2" href="#">
                                    <i class="fa fa-google-plus"></i> Google Plus
                                </a> -->
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

<?php include'partes/pie.php' ?>
