<?php

if($_SESSION["typeUser"]<>'Admin'){
	header("location:index.php?action=ingresar");
	exit();
}

$registro = new ControllerCourse();

/**
 * Inclusion de script de formulario para nuevo curso
 */

var_dump($_POST);
if(!empty($_POST)){
	if(!empty($_POST['saveCourse'])){
		$newCourse = $registro->newCourseController();
		if($newCourse=='saved')
	  {
	    echo "El curso fue con Exito";
	  }
		include_once 'forms/formNewCourse.php';
	}
}elseif(!empty($_POST['updateCourse'])){
	$respuesta = $registro->editCourseController();
	$updateCourse = $registro->updateCourseController();
	include_once 'forms/formEditCourse.php';
	if($updateCourse=='saved')
	{
		//header("location:index.php?action=createCourse&savedUpdate=".$_POST['course_idEditar']);
		echo "El curso fue actualizado con Exito";
	//	include_once 'forms/formNewCourse.php';
	}
//	if($updateCourse=='saved')
	//{
	  //header("location:index.php?action=createCourse&savedUpdate=".$_POST['course_idEditar']);
	  echo "El curso fue actualizado con Exito";
		include_once 'forms/formNewCourse.php';
//	}
}elseif(isset($_GET['edit'])){
	$respuesta = $registro->editCourseController();
	$updateCourse = $registro->updateCourseController();
	include_once 'forms/formEditCourse.php';
	if($updateCourse=='saved')
	{
		//header("location:index.php?action=createCourse&savedUpdate=".$_POST['course_idEditar']);
		echo "El curso fue actualizado con Exito";
	//	include_once 'forms/formNewCourse.php';
	}
}else{
	include_once 'forms/formNewCourse.php';

}




/**
 * Lista de Cursos creados con la boton de Editar y Eliminar
 * @var [type]
 */
if(isset($_GET['savedUpdate']))
{
  echo 'Se actualizo con exito';
}

$viewCourse = $registro->viewCourseController();
echo '<table class="table table-condensed">
      <thead>
      <th>Id</th>
      <th>Nombre del Curso</th>
      <th>Turno</th>
      <th>Editar</th>
      <th>Borrar</th>
      <th></th>
      </thead>
      <tbody>';

foreach ($viewCourse as $key => $item) {

  echo '<tr';
  if(isset($_POST['updateCourse'])){
    if ($item["course_id"]==$_POST["course_idEditar"]){
      echo ' class="info" ';
    }
  }
  echo '>';

  echo '
  <td>'.$item["course_id"].'</td>
  <td>'.$item["name"].'</td>
  <td>'.$item["turn"].'</td>
  <td><a class="btn btn-primary" href="index.php?action=createCourse&id='.$item["course_id"].'&edit='.$item["course_id"].'">Editar</a></td>
  <td><a  class="btn btn-primary" href="index.php?action=deleteCourse&id='.$item["course_id"].'">Borrar</a></td>';

  if(isset($_POST['updateCourse'])){
    if ($item["course_id"]==$_POST["course_idEditar"]){
      echo '<td>Modificado..</td>';
    }
  }

  echo '</tr>';
}
echo '</tbody></table>';
 ?>
