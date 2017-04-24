<?php
require_once "conexion.php";
class General extends Conexion {

  public static function camposet($campo,$tabla){

    $conexion = new Conexion();
    $stmt = $conexion->prepare("SHOW COLUMNS FROM $tabla LIKE '$campo'");
    $stmt->execute();

    $result = $stmt->fetchAll();
    $result=$result[0]["Type"];
    $result=substr($result, 5, strlen($result)-5);
    $result=substr($result, 0, strlen($result)-2);
    $result = explode("','",$result);
    return $result;
  }
}

 ?>
