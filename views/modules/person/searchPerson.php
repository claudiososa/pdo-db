<form class="" action="" method="post">
  <label for="">Nombre</label>
  <input type="text" name="firstname" value="">
  <label for="">Apellido</label>
  <input type="text" name="lastname" value="">
  <input type="submit" name="submit" value="Buscar">
</form>

<?php
$resultado = new ControllerPerson();
$resultado->searchPersonController();
?>
