<?php
  $courses = new ControllerCourse();
  $mycourses = $courses->myCoursesController($_SESSION["user_id"]);
  var_dump($mycourses);
  foreach ($mycourses as $key => $value) {
    echo 'course';
  }
?>
