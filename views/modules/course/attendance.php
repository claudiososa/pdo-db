<?php
echo '<label class="btn btn-success">Tomar Asistencia para...</label>';
$course = new ControllerCourse();
$nameCourse = $course->viewCourseStudentController();
echo 'Curso: '.$nameCourse [0] ['name'].' Turno: '.$nameCourse [0] ['turn'];

echo '<br><br>';

$registro = new ControllerCourse();
$viewCourse = $registro->viewStudentController($_GET['id']);
//var_dump($viewCourse);
echo '<table class="table table-bordered">
      <thead>
      <th>Id</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>DNI</th>
      <th>Acción</th>
      </thead>
      <tbody>';
      foreach ($viewCourse as $key => $item) {
        echo '<tr class="bg-success" id="tr'.$item["student_id"].'">';
        echo '<th scope="row">'.$item['student_id'].'</th>';
        echo '<td>'.$item['lastname'].'</td>';
        echo '<td>'.$item['firstname'].'</td>';
        echo '<td>'.$item['dni'].'</td>';
        echo '<td><a class="btn btn-primary" href="index.php?action=inscription&delete&student_id='.$item['student_id'].'">Presente</a></td>';
        echo '</tr>';
      }
echo '</tbody></table>';
//var_dump($nameCourse);
 ?>
