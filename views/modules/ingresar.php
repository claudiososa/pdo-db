<div class="container">
	<div class="row justify-content-md-center">
<div class="col-md-4 col-md-offset-4">
		 <form class="form-signin" action="" name="iniciosesion"method="POST">
			 <h3 class="form-signin-heading">Inicio de Sesión</h3>

			 <label for="" class="sr-only">Usuario:</label>
			 <input class="form-control" type="text" name="usuarioIngreso"  placeholder="Ingrese Usuario" id="formulario"  size="50" required autofocus>

			 <label for="" class="sr-only">Contraseña:</label>
				<input class="form-control" type="password" name="passwordIngreso" placeholder="Ingrese Contraseña" size="50" required>

			 <button class="btn btn-md btn-primary btn-block" type="submit"id="btnvalidar" value="Ingresar">Ingresar</button>
		 </form>
</div>
</div>
	 </div>


<?php

$ingreso = new MvcController();
$ingreso->ingresoUsuarioController();

if(isset($_GET["action"])){
	if($_GET["action"]=="fallo"){
		echo "<div>Datos Incorrectos</div>";
	}

	if($_GET["action"]=="fallo3intentos"){
		echo "<div>Debe hacer el captcha</div>";
	}
}
 ?>
