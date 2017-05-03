<h4>Inscripción de Alumnos</h4>
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
  $resultado = new ControllerPerson();
  $dato=$resultado->searchPersonController('form');
  //var_dump($dato);
  echo '<table class="table table-condensed">';
  echo '<thead>
              <tr>
                <th>Id</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>CUIL</th>
                <th>Tipo</th>
                <th>Tutor1</th>
                <th>Tutor2</th>';
  foreach ($dato as $key => $item) {
    echo '<tr>
      <td>'.$item["person_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["dni"].'</td>
      <td>'.$item["cuil"].'</td>
      <td>'.$item["type"].'</td>
      <td>tutor1</td>
      <td>tutor2</td>
      <td><a href="index.php?action=editarPerson&id='.$item["person_id"].'"><button>Inscribir</button></a></td>      
    </tr>';
  }
  echo '</table>';
}
if($_GET['action']=='inscription' AND $_GET['id'] ){
  $registro = new ControllerCourse();
  $viewCourse = $registro->viewStudentController($_GET['id']);
  echo '<table class="table table-condensed">
        <thead>
        <th>Id</th>
        </thead>
        <tbody>';
        foreach ($viewCourse as $key => $item) {
          echo '<tr><td>';
          echo $item['student_id'];
          echo '</td></tr>';
        }
  echo '</tbody></table>';
  echo 'tiene todo';
}
?>
