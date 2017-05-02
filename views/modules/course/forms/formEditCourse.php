<h4>Editar Curso</h4>

<form method="post">
	<?php

  echo '<input type="hidden" value="'.$respuesta["course_id"].'" name="course_idEditar">
        <input type="text" value="'.$respuesta["name"].'" placeholder="name" name="nameEditar" required>';
  echo '<select class="control-label" name="turnEditar">';
  echo '<option ';
  if ($respuesta["turn"]=='Mañana')
  {
    echo 'selected ';
  }
  echo 'value="Mañana">Mañana</option>';
  echo '<option ';

  if ($respuesta["turn"]=='Tarde')
  {
    echo 'selected ';
  }

  echo 'value="Tarde">Tarde</option>';

  echo '</select>';
  echo '<input type="submit" name="updateCourse" value="Actualizar">';
echo '</form>';
