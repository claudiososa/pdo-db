<?php

class ControllerCourse{

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
		}else{
			$enlaces = "index";
    }
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}


	// Nuevo Curso

	public function newCourseController(){
		if(isset($_POST["nameRegistro"])){

  		$datosController = array(
                      //"Course"=>$_POST["CourseRegistro"],
                      "name"=>$_POST["nameRegistro"],
                      "turn"=>$_POST["turnRegistro"]
  									);
  		$respuesta = Courses::newCourseModel($datosController, "courses");

  		if ($respuesta =="success") {
        return "saved";
  			//header("location:index.php?action=ok");
  		}else{
  			header("location:index.php");
  		}

		}
	}

	//Vista de usuarios
	//*******************************
  public function viewCourseController(){
		$respuesta = Courses::viewCourseModel("courses");
    return $respuesta;
    /*
		foreach ($respuesta as $key => $item) {
			# code...

		echo '<tr>
			<td>'.$item["course_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["name"].'</td>
      <td>'.$item["turn"].'</td>
      <td>'.$item["birthday"].'</td>
      <td>'.$item["sexo"].'</td>
      <td>'.$item["phone"].'</td>
			<td>'.$item["movil"].'</td>
			<td>'.$item["email"].'</td>
			<td>'.$item["address"].'</td>

			<td><a href="index.php?action=editarCourse&id='.$item["course_id"].'"><button>Editar</button></a></td>
			<td><a href="index.php?action=Course&idBorrar='.$item["course_id"].'"><button>Borrar</button></a></td>
		</tr>';
  }*/

		//var_dump($respuesta[1][2]);
	}

	// Editar usuarios
	//*********************************************************
	public function editCourseController(){
		$datos = $_GET["id"];
		$respuesta=Courses::editCourseModel($datos,"courses");
    return $respuesta;
    /*
		echo '<input type="hidden" value="'.$respuesta["course_id"].'" name="course_idEditar">
					<input type="text" value="'.$respuesta["name"].'" placeholder="name" name="nameEditar" required>
          <input type="text" value="'.$respuesta["turn"].'" placeholder="turn" name="turnEditar" required>
          <input type="text" value="'.$respuesta["lastname"].'" placeholder="Apellidos" name="lastnameEditar" required>
          <input type="text" value="'.$respuesta["firstname"].'" placeholder="Nombres" name="firstnameEditar" required>
          <input type="text" value="'.$respuesta["birthday"].'" placeholder="Fecha de Nacimiento" name="birthdayEditar" required>
          <input type="text" value="'.$respuesta["sexo"].'" placeholder="Sexo" name="sexoEditar" required>
          <input type="text" value="'.$respuesta["phone"].'" placeholder="Telefono Fijo" name="phoneEditar" required>
          <input type="text" value="'.$respuesta["movil"].'" placeholder="Telefono Celular" name="movilEditar" required>
					<input type="email" value="'.$respuesta["email"].'" placeholder="Email" name="emailEditar" required>
          <input type="text" value="'.$respuesta["address"].'" placeholder="Dirección" name="addressEditar" required>

					<input type="submit" value="Actualizar">
		';*/
		//echo $respuesta[1];
		//return $respuesta;
		//var_dump($respuesta);
	}

	// Actualizar usuarios
	//*********************************************************
	public function updateCourseController(){
		if(isset($_POST["course_idEditar"])){

			$datosController =  array(
                      "course_id"=>$_POST["course_idEditar"],
                      "name"=>$_POST["nameEditar"],
                      "turn"=>$_POST["turnEditar"]

			);

		$respuesta = Courses::updateCourseModel($datosController,"courses");
		if($respuesta == "success"){
			return 'saved';
		}else {
			echo "Error";
		}
		//echo $respuesta;
	}
}


// Borar usuarios
//*********************************************************
public function deleteCourseController(){
	if(isset($_GET["idBorrar"])){
		$datos=$_GET["idBorrar"];
		$respuesta= Courses::deleteCourseModel($datos,"courses");

		if($respuesta == "success"){
			header("location:index.php?action=Course");
		}
	}
}


}

?>
