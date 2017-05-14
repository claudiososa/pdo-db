
<script type="text/javascript" src="views/modules/course/js/validateAttendance.js"></script>
<?php
if($_POST){
//  var_dump($_POST);
}
$registro = new ControllerCourse();
$viewCourse = $registro->viewStudentController($_GET['id']);
$studends = count($viewCourse);

echo "<script>
	$(document).ready(function () {";
		foreach ($viewCourse as $key => $item) {

		echo '$("#bt'.$item['student_id'].'").click(function(){';

      //echo 'alert("hola mundo");';
      //	total1=150;
  		//	cuotas=1;
  		//	subtotal='.$y.';
  		//	siguiente='.$y.'+1;
		echo 'if($(this).attr("value")=="Presente"){';
      echo '$(this).attr("value","Ausente");';
      //echo 'alert($(this).attr("value"));';
      echo '$("#tr'.$item['student_id'].'").removeClass("bg-success");';
      echo '$("#tr'.$item['student_id'].'").addClass("bg-danger");';
      echo '$("#bt'.$item['student_id'].'").removeClass("btn btn-success");';
      echo '$("#bt'.$item['student_id'].'").addClass("btn btn-danger");';
      //echo '$("#tr'.$item['student_id'].'").removeClass("bg-success")';
      //echo '$("#tr'.$item['student_id'].'").addClass("bg-warning");';


    echo '}else{';
      echo '$(this).attr("value","Presente");';
      //echo 'alert($(this).attr("value"));';
      echo '$("#tr'.$item['student_id'].'").removeClass("bg-danger");';
      echo '$("#tr'.$item['student_id'].'").addClass("bg-success");';
      echo '$("#bt'.$item['student_id'].'").removeClass("btn btn-danger");';
      echo '$("#bt'.$item['student_id'].'").addClass("btn btn-success");';
    echo '}

		});';
		}
	echo "});";


echo "</script>";

echo '<label class="btn btn-success">Tomar Asistencia para...</label>';
$course = new ControllerCourse();
$nameCourse = $course->viewCourseStudentController();
echo 'Curso: '.$nameCourse [0] ['name'].' Turno: '.$nameCourse [0] ['turn'];

echo '<br><br>';
echo '<form class="formAttendance" action="" method="post">';



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
        echo '<td><input class="btn btn-success" type="text" id="bt'.$item['student_id'].'" name="bt'.$item['student_id'].'" value="Presente"></td>';
        //echo '<td><a id="bt'.$item['student_id'].'" class="btn btn-success" href="">Presente</a></td>';

        echo '</tr>';
      }
echo '</tbody></table>';
//var_dump($nameCourse);
?>
<input type="submit" name="submit" value="Guardar Asistencia">
</form>
