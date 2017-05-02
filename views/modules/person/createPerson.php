<?php

if($_SESSION["typeUser"]<>'Admin'){
	header("location:index.php?action=ingresar");
	exit();
}

include_once 'forms/formNewPerson.php';

$registro = new ControllerPerson();
$save = $registro->registroPersonController();

if($_POST){
	if($save=="success"){
		echo "Se guardo correctamente";
	}else{
		echo "Error al guardar";
	}
}

 ?>
