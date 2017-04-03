<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>S-W Colegio 5159</title>
	<script src="views/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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

</div>
<script src="views/js/validarRegistro.js" type="text/javascript">

</script>
</body>

</html>
