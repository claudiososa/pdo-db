<div class="container" >
		<div class="row">
		<div class="Absolute-Center is-Responsive">
		<div class="col-md-4 col-md-offset-4">
<form action="" name="iniciosesion"method="POST">
	<label class="">Inicio de Sesión</label>

		<div class="form-group input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input class="form-control" type="text" name="usuarioIngreso"  placeholder="Ingrese Usuario" id="formulario"  size="50" required>
		</div>

		<!--<div id="alerta" style="display:none;"><font color="crimsol">Ingrese 8 caracteres (solo números)</font></div>-->
		<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input class="form-control" type="password" name="passwordIngreso" placeholder="Ingrese Contraseña" size="50" required>
		</div>

		<div class="form-group" "input-group">
				<button class="btn btn-lg btn-primary btn-block" type="submit" id="btnvalidar" value="Ingresar">Ingresar</button>
		</div>
</form>
		</div>
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
