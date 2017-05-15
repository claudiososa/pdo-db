<script type="text/javascript" src="views/modules/course/js/validateAttendance.js"></script>
<?php
if($_POST){
	$attendanceStudent1 = new ControllerAttendance();
	$attendance = new ControllerAttendance();
  //var_dump($_POST);
	//echo '<br><br>';
	//echo count($_POST);
	//
foreach ($_POST as $key => $value) {
	//echo $_POST[$key]."<br>";
	//echo $key."<br>";
}
	foreach ($_POST as $key => $value) {

		if ($key <> "date" AND $key <> "submitAttendance"){
			switch ($_POST[$key]) {
				case 'Presente':
					$status='P';
					break;
				case 'Ausente':
					$status='A';
					break;
				case 'Media F.':
						$status='M';
						break;

				default:
					# code...
					break;
			}
			//if ($key <> "Presente" AND $key <> "Ausente" AND $key <> "Media F."){
					$searchAttendance1 = $attendanceStudent1->viewAttendanceStudentController($key,date("Y-m-d"));
					if(isset($searchAttendance1)){
						if(count($searchAttendance1)>0){
							$attendance->updateAttendanceController($searchAttendance1[0]['attendance_id'],$key,$status);
					  }else{
							$attendance->newAttendanceController($key,$status);
						}
				  }
		}
	}
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
			echo '$("#'.$item['student_id'].'").attr("value","Ausente");';
      //echo 'alert($(this).attr("value"));';
      //echo '$("#tr'.$item['student_id'].'").removeClass("bg-success");';
      echo '$("#tr'.$item['student_id'].'").addClass("bg-danger text-white");';
      echo '$("#bt'.$item['student_id'].'").removeClass("btn btn-success");';
      echo '$("#bt'.$item['student_id'].'").addClass("btn btn-danger");';
      //echo '$("#tr'.$item['student_id'].'").removeClass("bg-success")';
      //echo '$("#tr'.$item['student_id'].'").addClass("bg-warning");';


    echo '}else if ($(this).attr("value")=="Ausente"){';
      echo '$(this).attr("value","Media F.");';
			echo '$("#'.$item['student_id'].'").attr("value","Media F.");';
      //echo 'alert($(this).attr("value"));';
      echo '$("#tr'.$item['student_id'].'").removeClass("bg-danger text-white");';
      echo '$("#tr'.$item['student_id'].'").addClass("bg-info text-white");';
      echo '$("#bt'.$item['student_id'].'").removeClass("btn btn-danger");';
      echo '$("#bt'.$item['student_id'].'").addClass("btn btn-info");';
    echo '}else{';
			echo '$(this).attr("value","Presente");';
			echo '$("#'.$item['student_id'].'").attr("value","Presente");';
      //echo 'alert($(this).attr("value"));';
      echo '$("#tr'.$item['student_id'].'").removeClass("bg-info text-white");';
      echo '$("#tr'.$item['student_id'].'").addClass("text-black");';
      echo '$("#bt'.$item['student_id'].'").removeClass("btn btn-danger");';
      echo '$("#bt'.$item['student_id'].'").addClass("btn btn-success");';
		echo '}

		});';
		}
	echo "});";


echo "</script>";

echo '<label class="btn btn-success">Tomar Asistencia para...</label>';

$attendanceStudent = new ControllerAttendance();

$course = new ControllerCourse();
$nameCourse = $course->viewCourseStudentController();
echo 'Curso: '.$nameCourse [0] ['name'].' Turno: '.$nameCourse [0] ['turn'];
echo date("d-m-Y");
echo '<br><br>';

echo '<br><br>';
echo '<form class="formAttendance" action="" method="post">';
echo '<input type="date" readonly name="date" value="'.date("Y-m-d").'">';
//var_dump($viewCourse);
echo '<table class="table table-sm table-bordered">
      <thead>
      <th>Id</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>DNI</th>
      <th>Acción</th>
      </thead>
      <tbody>';
      foreach ($viewCourse as $key => $item) {
				$searchAttendance = $attendanceStudent->viewAttendanceStudentController($item["student_id"],date("Y-m-d"));
				if(isset($searchAttendance)){
				if(count($searchAttendance)>0){
						//echo $searchAttendance[0]['status'];
						switch ($searchAttendance[0]['status']) {
							case 'P':
								echo '<tr  id="tr'.$item["student_id"].'">';
								break;
							case 'A':
								echo '<tr class="bg-danger text-white" id="tr'.$item["student_id"].'">';
									break;
							case 'M':
									echo '<tr class="bg-info text-white" id="tr'.$item["student_id"].'">';
											break;
							default:

								break;
						}
				}else{
					echo '<tr  id="tr'.$item["student_id"].'">';
				}
			}


        echo '<th scope="row">'.$item['student_id'].'</th>';
        echo '<td>'.$item['lastname'].'</td>';
        echo '<td>'.$item['firstname'].'</td>';
        echo '<td>'.$item['dni'].'</td>';


				if(count($searchAttendance)>0){
						//echo $searchAttendance[0]['status'];
						//echo '<input  type="hidden" name="st'.$item["student_id"].'" value="'.$searchAttendance[0]['attendance_id'].'">';
						//echo '<input  type="hidden" name="st'.$item["student_id"].'" value="'.$item["student_id"].'">';
						switch ($searchAttendance[0]['status']) {
							case 'P':
								echo '<td><input  type="hidden" id="'.$item['student_id'].'" name="'.$item['student_id'].'" value="Presente"></td>';
								echo '<td><input class="btn btn-success" type="button" id="bt'.$item['student_id'].'" name="bt'.$item['student_id'].'" value="Presente"></td>';
								break;
							case 'A':
								echo '<td><input  type="hidden" id="'.$item['student_id'].'" name="'.$item['student_id'].'" value="Ausente"></td>';
								echo '<td><input class="btn btn-danger" type="button" id="bt'.$item['student_id'].'" name="bt'.$item['student_id'].'" value="Ausente"></td>';
									break;
							default:
								echo '<td><input  type="hidden" id="'.$item['student_id'].'" name="'.$item['student_id'].'" value="Media F."></td>';
								echo '<td><input class="btn btn-info" type="button" id="bt'.$item['student_id'].'" name="bt'.$item['student_id'].'" value="Media F."></td>';
								break;
						}
				}else{
					echo '<td><input  type="hidden" id="'.$item['student_id'].'" name="'.$item['student_id'].'" value="Presente"></td>';
						echo '<td><input class="btn btn-success" type="button" id="bt'.$item['student_id'].'" name="bt'.$item['student_id'].'" value="Presente"></td>';
				}
				//echo '<input  type="hidden" id="'.$item['student_id'].'" name="'.$item['student_id'].'" value="Presente">';
				//echo '<td>'.var_dump($searchAttendance).'<br><br></td>';

        //echo '<td><a id="bt'.$item['student_id'].'" class="btn btn-success" href="">Presente</a></td>';

        echo '</tr>';
      }
echo '</tbody></table>';
//var_dump($nameCourse);
?>
<input type="submit" name="submitAttendance" value="Guardar Asistencia">
</form>
