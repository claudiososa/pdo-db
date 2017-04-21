<form class="" action="" method="post">
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
  $dato=$resultado->searchPersonController();
  //var_dump($dato);
  echo '<table border="1">';
  foreach ($dato as $key => $item) {
    echo '<tr>
      <td>'.$item["person_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["dni"].'</td>
      <td>'.$item["cuil"].'</td>
      <td>'.$item["birthday"].'</td>
      <td>'.$item["sexo"].'</td>
      <td>'.$item["phone"].'</td>
      <td>'.$item["movil"].'</td>
      <td>'.$item["email"].'</td>
      <td>'.$item["address"].'</td>

      <td><a href="index.php?action=editarPerson&id='.$item["person_id"].'"><button>Editar</button></a></td>
      <td><a href="index.php?action=person&idBorrar='.$item["person_id"].'"><button>Borrar</button></a></td>
    </tr>';
  }
  echo '</table>';
}
?>
