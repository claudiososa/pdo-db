<?php

/**
 * Verificar si el usuario es de tipo Admin para acceder a este archivo
 * en el caso que no sea asi se redireccion a pagina ingresar
 */
if($_SESSION["typeUser"]<>'Admin' && $_SESSION["typeUser"]<>'Preceptor/a'){
	header("location:index.php?action=ingresar");
	exit();
}

if(isset($_GET)){
  $course = new ControllerCourse();
  $viewCourse = $course->viewCourseStudentController();
}

 ?>
<h4>Inscripción de Alumnos para el Curso: <?php echo '<label class="btn btn-primary">'.$viewCourse[0]['name'].'</label>'; ?> Turno: <?php echo '<label class="btn btn-primary">'.$viewCourse[0]['turn'].'</label>'; ?></h4>
<form class="" action="" method="post">
  <input type="hidden" name="typeuser" value="Alumno">
  <label for="">Apellido</label>
  <input type="text" name="lastname" value="">
  <label for="">Nombre</label>
  <input type="text" name="firstname" value="">
  <label for="">DNI</label>
  <input type="text" name="dni" value="">
  <input type="submit" name="searchPersonSubmit" value="Buscar">

</form>

<?php
if($_POST){

	/**
	 * toma los datos de post para realizar busqueda en tabla persona. muestra informacion en formato tabla
	 */
  $resultado = new ControllerPerson();
  $dato=$resultado->searchPersonController('inscription');
  //var_dump($dato);
  echo '<table class="table table-condensed">';
  echo '<thead>
              <tr>
                <th>Id</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Tipo</th>
                <th>Tutor1</th>';
  foreach ($dato as $key => $item) {
    echo '<tr>
      <td>'.$item["person_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["dni"].'</td>
      <td>'.$item["type"].'</td>
      <td>tutor1</td>
      <td><a href="index.php?action=inscription&id='.$_GET['id'].'&person_id='.$item["person_id"].'"><button>Inscribir</button></a></td>
    </tr>';
  }
  echo '</table>';
}

if($_GET['action']=='inscription' AND $_GET['id'] AND $_GET['person_id']  ){
  $registro = new ControllerCourse();
  $viewCourse = $registro->newInscriptionController();
  $url = 'location:index.php?action=inscription&id='.$_GET['id'];
  header($url);
  /*echo '<table class="table table-condensed">
        <thead>
        <th>Id</th>
        </thead>
        <tbody>';
        foreach ($viewCourse as $key => $item) {
          echo '<tr><td>';
          echo $item['student_id'];
          echo '</td></tr>';
        }
  echo '</tbody></table>';*/
  echo 'tiene lista para guardar';
}
if($_GET['action']=='inscription' AND isset($_GET['delete'])){
	$registro = new ControllerCourse();
	$delete = $registro->deleteStudentCourseController($_GET['student_id']);
	//var_dump($delete);
}

if($_GET['action']=='inscription' AND $_GET['id'] ){

	$registro = new ControllerCourse();
  $viewCourse = $registro->viewStudentController($_GET['id']);
  //var_dump($viewCourse);
  echo '<table class="table table-condensed">
        <thead>
        <th>Id</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>DNI</th>
				<th>Acción</th>
        </thead>
        <tbody>';
        foreach ($viewCourse as $key => $item) {
          echo '<tr>';
          echo '<td>'.$item['student_id'].'</td>';
          echo '<td>'.$item['lastname'].'</td>';
          echo '<td>'.$item['firstname'].'</td>';
          echo '<td>'.$item['dni'].'</td>';
					echo '<td><a class="btn btn-primary" href="index.php?action=inscription&delete&student_id='.$item['student_id'].'">Eliminar Inscripción</a></td>';
          echo '</tr>';
        }
  echo '</tbody></table>';
  echo 'tiene todo';
}
?>
