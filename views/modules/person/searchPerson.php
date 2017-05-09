<form class="" action="" method="post">
  <div class="col-md-12"><label class="control-label" for="lastnameRegistro">Tipo de Usuario</label></div>
  <div class="col-md-12">
    <select class="control-form" name="typeuser">
        <option value="Alumno">Alumno</option>
        <option value="Docente">Docente</option>
        <option value="Tutor">Tutor</option>
        <option value="Director/a">Director/a</option>
        <option value="Preceptor/a">Preceptor/a</option>
        <option value="todos">Todos</option>
    </select>
  </div>
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
                <th>Curso</th>
                <th>Tutor1</th>
                <th>Tutor2</th>';
  foreach ($dato as $key => $item) {
    echo '<tr>
      <td>'.$item["person_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["dni"].'</td>
      <td>'.$item["cuil"].'</td>
      <td>'.$item["type"].'</td>';
      echo '<td>';
      if($item["type"]=='Alumno'){
        $inscription = new ControllerCourse();
        //var_dump($inscription);
        $verificar = $inscription->searchStudentInCourseController($item["person_id"]);
        if($verificar){
          echo $verificar[0]['name'].' '.$verificar[0]['turn'];
        }else{
          echo "Sin Asignar";
        }


          //var_dump($verificar);


      }
      echo '</td>';
      echo '<td>tutor1</td>
      <td>tutor2</td>
      <td><a href="index.php?action=editarPerson&id='.$item["person_id"].'"><button>Editar</button></a></td>
      <td><a href="index.php?action=person&idBorrar='.$item["person_id"].'"><button>Borrar</button></a></td>
    </tr>';
  }
  echo '</table>';
}
?>
