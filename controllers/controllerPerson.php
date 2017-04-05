<?php

class ControllerPerson{

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

	public function registroPersonController(){
		if(isset($_POST["dniRegistro"])){

  		$datosController = array(
                      //"person"=>$_POST["personRegistro"],
                      "dni"=>$_POST["dniRegistro"],
                      "cuil"=>$_POST["cuilRegistro"],
                      "lastname"=>$_POST["lastnameRegistro"],
                      "firstname"=>$_POST["firstnameRegistro"],
                      "birthday"=>$_POST["birthdayRegistro"],
                      "sexo"=>$_POST["sexoRegistro"],
                      "phone"=>$_POST["phoneRegistro"],
                      "movil"=>$_POST["movilRegistro"],
  									  "email"=>$_POST["emailRegistro"],
  										"address"=>$_POST["addressRegistro"]

  									);
  		$respuesta = Person::registroPersonModel($datosController, "persons");

  		if ($respuesta =="success") {
  			header("location:index.php?action=ok");
  		}else{
  			header("location:index.php");
  		}

		}
	}

	//Vista de usuarios
	//*******************************
  public function vistaPersonController(){
		$respuesta = Person::vistaPersonModel("persons");
		foreach ($respuesta as $key => $item) {
			# code...

		echo '<tr>
			<td>'.$item["person_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["dni"].'</td>
      <td>'.$item["cuil"].'</td>
      <td>'.$item["birthday"].'</td>
      <td>'.$item["sexo"].'</td>
      <td>'.$item["phone"].'</td>
			<td>'.$item["movil"].'</td>
			<td>'.$item["email"].'</td>
			<td>'.$item["address"].'</td>

			<td><a href="index.php?action=editarPerson&id='.$item["person_id"].'"><button>Editar</button></a></td>
			<td><a href="index.php?action=person&idBorrar='.$item["person_id"].'"><button>Borrar</button></a></td>
		</tr>';
		}
		//var_dump($respuesta[1][2]);
	}

	// Editar usuarios
	//*********************************************************
	public function editarPersonController(){
		$datos = $_GET["id"];
		$respuesta=Person::editarPersonModel($datos,"persons");

		echo '<input type="hidden" value="'.$respuesta["person_id"].'" name="person_idEditar">
					<input type="text" value="'.$respuesta["dni"].'" placeholder="DNI" name="dniEditar" required>
          <input type="text" value="'.$respuesta["cuil"].'" placeholder="CUIL" name="cuilEditar" required>
          <input type="text" value="'.$respuesta["lastname"].'" placeholder="Apellidos" name="lastnameEditar" required>
          <input type="text" value="'.$respuesta["firstname"].'" placeholder="Nombres" name="firstnameEditar" required>
          <input type="text" value="'.$respuesta["birthday"].'" placeholder="Fecha de Nacimiento" name="birthdayEditar" required>
          <input type="text" value="'.$respuesta["sexo"].'" placeholder="Sexo" name="sexoEditar" required>
          <input type="text" value="'.$respuesta["phone"].'" placeholder="Telefono Fijo" name="phoneEditar" required>
          <input type="text" value="'.$respuesta["movil"].'" placeholder="Telefono Celular" name="movilEditar" required>
					<input type="email" value="'.$respuesta["email"].'" placeholder="Email" name="emailEditar" required>
          <input type="email" value="'.$respuesta["address"].'" placeholder="Dirección" name="addressEditar" required>

					<input type="submit" value="Actualizar">
		';
		//echo $respuesta[1];
		//return $respuesta;
		//var_dump($respuesta);
	}

	// Actualizar usuarios
	//*********************************************************
	public function actualizarPersonController(){
		if(isset($_POST["personEditar"])){

			$datosController =  array(
                      "person_id"=>$_POST["person_idEditar"],
                      "dni"=>$_POST["dniEditar"],
                      "cuil"=>$_POST["cuilEditar"],
                      "lastname"=>$_POST["lastnameEditar"],
                      "firstname"=>$_POST["firstnameEditar"],
                      "birthday"=>$_POST["birthdayEditar"],
                      "sexo"=>$_POST["sexoEditar"],
                      "phone"=>$_POST["phoneEditar"],
                      "movil"=>$_POST["movilEditar"],
  									  "email"=>$_POST["emailEditar"],
  										"address"=>$_POST["addressEditar"],
			);

		$respuesta = Person::actualizarPersonModel($datosController,"persons");
		if($respuesta == "success"){
			header("location:index.php?action=cambioperson");
		}else {
			echo "Error";
		}
		//echo $respuesta;
	}
}


// Borar usuarios
//*********************************************************
public function borrarPersonController(){
	if(isset($_GET["idBorrar"])){
		$datos=$_GET["idBorrar"];
		$respuesta= Person::borrarPersonModel($datos,"persons");

		if($respuesta == "success"){
			header("location:index.php?action=person");
		}
	}
}


}

?>
