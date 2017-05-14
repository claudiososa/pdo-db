<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="img/css/estilos.css" type="text/css">
<title>S-W Colegio 5159</title>


</head>

<body>
<div class="container">
<?php
//echo $_SESSION["typeUser"];
  //<link rel="stylesheet" href="views/bootstrap/bootstrap.min.css">

if(isset($_SESSION["typeUser"])){
	switch ($_SESSION["typeUser"]) {
		case 'Admin':
			include "modules/navegacion/navAdmin.php";
			break;
		case 'Alumno':
				include "modules/navegacion/navAlumno.php";
				break;
		case 'Docente':
				include "modules/navegacion/navDocente.php";
				break;
		case 'Preceptor/a':
						include "modules/navegacion/navPreceptor.php";
						break;

		default:
			# code...
			break;
	}
}else{
	include "modules/navegacion/navInicial.php";
}



?>


<section>

<?php

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

 ?>

</section>

<footer class="text-muted" id="footer">
      <div class="container">
        <p>
					<center>
          Colegio N° 5159<br>Salta-Capital<br>2017
				</center>
        </p>
      </div>

</footer>
</div>
<script src="views/js/validarRegistro.js" type="text/javascript">

</script>	<!-- Latest compiled and minified JavaScript -->

</body>

</html>
