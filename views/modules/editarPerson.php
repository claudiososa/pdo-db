<?php

if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}

 ?>
<h1>Editar Datos de Persona</h1>

<form method="post">
	<?php
	$editar = new ControllerPerson();
	$editar->editarPersonController();
	$editar->actualizarPersonController();
 ?>

</form>
