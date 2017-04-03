<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	//Registro usuarios

	public function registroUsuarioController(){
		if(isset($_POST["usuarioRegistro"])){
		$datosController = array("usuario"=>$_POST["usuarioRegistro"],
									  "password"=>$_POST["passwordRegistro"],
										"email"=>$_POST["emailRegistro"],
										"type"=>$_POST["typeRegistro"],
										"status"=>$_POST["statusRegistro"]

									);
		$respuesta = Datos::registroUsuarioModel($datosController, "users");

		if ($respuesta =="success") {
			header("location:index.php?action=ok");
		}else{
			header("location:index.php");
		}

		}
	}

	//ingreso de usuarios
  //******************************************************
	public function ingresoUsuarioController(){
		if(isset($_POST["usuarioIngreso"])){
		$datosController = array("usuario"=>$_POST["usuarioIngreso"],
										"password"=>$_POST["passwordIngreso"]
									);

		$respuesta = Datos::ingresoUsuarioModel($datosController, "users");


		if($respuesta["user_name"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"] ){
			session_start();
			$tipoUsuario= $respuesta["type"];
			$_SESSION["validar"]=true;
			$_SESSION["typeUser"]=$respuesta["type"];

			header("location:index.php?action=ok");
		}else{
			header("location:index.php?action=fallo");
		}

		}

	}

	//Vista de usuarios
	//*******************************
  public function vistaUsuariosController(){
		$respuesta = Datos::vistaUsuarioModel("users");
		foreach ($respuesta as $key => $item) {
			# code...

		echo '<tr>
			<td>'.$item["user_name"].'</td>
			<td>'.$item["password"].'</td>
			<td>'.$item["email"].'</td>
			<td>'.$item["type"].'</td>
			<td>'.$item["status"].'</td>
			<td><a href="index.php?action=editar&id='.$item["user_id"].'"><button>Editar</button></a></td>
			<td><a href="index.php?action=usuarios&idBorrar='.$item["user_id"].'"><button>Borrar</button></a></td>
		</tr>';
		}
		//var_dump($respuesta[1][2]);
	}

	// Editar usuarios
	//*********************************************************
	public function editarUsuarioController(){
		$datos = $_GET["id"];
		$respuesta=Datos::editarUsuarioModel($datos,"users");

		echo '<input type="hidden" value="'.$respuesta["user_id"].'" name="idEditar">
					<input type="text" value="'.$respuesta["user_name"].'" placeholder="Usuario" name="usuarioEditar" required>
					<input type="password" value="'.$respuesta["password"].'" placeholder="Contraseña" name="passwordEditar" required>
					<input type="email" value="'.$respuesta["email"].'" placeholder="Email" name="emailEditar" required>
					<input type="submit" value="Actualizar">
		';
		//echo $respuesta[1];
		//return $respuesta;
		//var_dump($respuesta);
	}

	// Actualizar usuarios
	//*********************************************************
	public function actualizarUsuarioController(){
		if(isset($_POST["usuarioEditar"])){
			$datosController =  array("id"=>$_POST["idEditar"],
											"usuario"=>$_POST["usuarioEditar"],
											"password"=>$_POST["passwordEditar"],
											"email"=>$_POST["emailEditar"],
			);

		$respuesta = Datos::actualizarUsuarioModel($datosController,"users");
		if($respuesta == "success"){
			header("location:index.php?action=cambio");
		}else {
			echo "Error";
		}
		//echo $respuesta;
	}
}


// Borar usuarios
//*********************************************************
public function borrarUsuarioController(){
	if(isset($_GET["idBorrar"])){
		$datos=$_GET["idBorrar"];
		$respuesta= Datos::borrarUsuarioModel($datos,"users");

		if($respuesta == "success"){
			header("location:index.php?action=usuarios");
		}
	}
}


}

?>
