<?php $this->load->view('admin/admincabecera.php');?>


<h1><b><span style="color:orange">Alta de practicantes</b></h1>	
	<div class="container">
	  	<div class="row">
		  	<div id="navegacion" class="col">
				<a href="<?=base_url()?>admin">Panel de control </a>
				<span> | </span>
				<a class="nav-active"> Registro Practicantes </a>
			</div>
	  		<div class="col-sm-6 col-sm-offset-3 form-box">
				<form class="login-form" action="<?=base_url()?>regpra" method="post" role="form">
					     <div class="form-group">
			            <label class="sr-only" for="form-name">Nombre</label>
			            <input type="name" name="usuario" placeholder="Nombre..." class="form-email form-control" id="form-email">
			        </div>
			        <div class="form-group">
			            <label class="sr-only" for="form-password">Contraseña</label>
			            <input type="password" name="clave" placeholder="Contraseña..." class="form-password form-control" id="form-password">
			        </div>
              <div class="form-group">
                  <label class="sr-only" for="form-name">Apellido</label>
                  <input type="name" name="apellido" placeholder="apellido" class="form-email form-control" id="form-email">
              </div>
              <div class="form-group">
                  <label class="sr-only" for="form-name">Correo</label>
                  <input type="email" name="correo" placeholder="correo" class="form-email form-control" id="form-email">
              </div>
              <div class="form-group">
                  <label class="sr-only" for="form-name">Telefono</label>
                  <input type="name" name="telefono" placeholder="telefono" class="form-email form-control" id="form-email">
              </div>
			        
				        <button type="submit" class="btn btn-primary">Aceptar</button>
				    
				</form>
			</div>	
	  	</div>
	<!-- <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Example select</label>
    <select class="form-control" id="exampleSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Example textarea</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
  </div>
  <fieldset class="form-group">
    <legend>Radio buttons</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
        Option one is this and that&mdash;be sure to include why it's great
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        Option two can be something else and selecting it will deselect option one
      </label>
    </div>
    <div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
        Option three is disabled
      </label>
    </div>
  </fieldset>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
<?php $this->load->view('admin/adminpie.php');?>