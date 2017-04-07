<?php

class Conexion{
  public function conectar(){
    $link = new PDO("mysql:host=localhost;dbname=vicomser_pdo","vicomser_pdo","Vicomser.c79");
    //var_dump($link);
    return $link;
  }
}

?>
