<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, minimum-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/bootstrap.css" type="text/css">
	<script src="views/js/jquery-3.1.0.min.js"></script>
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


	<script src="views/js/bootstrap.min.js"></script>
<script src="views/js/validarRegistro.js" type="text/javascript">

</script>	<!-- Latest compiled and minified JavaScript -->

</body>

</html>
