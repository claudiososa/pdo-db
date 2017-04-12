<?php
require_once "conexion.php";
class Person extends Conexion{
  //Registro de usuarios

  public function registroPersonModel($datosModel,$tabla){
    $conexion = new Conexion();
    $stmt = $conexion->prepare("INSERT INTO $tabla (person_id, dni, cuil, lastname, firstname, birthday, sexo, phone, movil, email, address)
    VALUES (null, :dni, :cuil, :lastname, :firstname, :birthday, :sexo, :phone, :movil, :email, :address)");

    $stmt->bindParam(":dni",$datosModel["dni"],PDO::PARAM_STR);
    $stmt->bindParam(":cuil",$datosModel["cuil"],PDO::PARAM_STR);
    $stmt->bindParam(":lastname",$datosModel["lastname"],PDO::PARAM_STR);
    $stmt->bindParam(":firstname",$datosModel["firstname"],PDO::PARAM_STR);
    $stmt->bindParam(":birthday",$datosModel["birthday"],PDO::PARAM_STR);
    $stmt->bindParam(":sexo",$datosModel["sexo"],PDO::PARAM_STR);
    $stmt->bindParam(":phone",$datosModel["phone"],PDO::PARAM_STR);
    $stmt->bindParam(":movil",$datosModel["movil"],PDO::PARAM_STR);
    $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
    $stmt->bindParam(":address",$datosModel["address"],PDO::PARAM_STR);
var_dump($datosModel);
  if($stmt->execute()){

    $lastId = $conexion->lastInsertId();
    echo $lastId;
    $conexion = new Conexion();
    $stmt = $conexion->prepare("SELECT * FROM persons WHERE person_id=$lastId");
    //var_dump($sentencia);
    $stmt->execute();
    $row = $stmt->fetchobject();
    //echo $fila->lastname;
    //var_dump($row);

    //$fila = $stmt->fetch();

     //
      $encriptar = md5($row->dni);
      $datosController = array(
                  "user_id"=>$row->person_id,
                  "usuario"=>$row->dni,
                  "password"=>$encriptar,
                  //"email"=>$_POST["emailRegistro"],
                  "type"=>$datosModel["type"],
                  "status"=>$datosModel["status"]
                );
  //  var_dump($datosController);
    $respuesta = Datos::registroUsuarioModel($datosController, "users");

    if ($respuesta =="success") {
      echo "-----Guardo Usuario correctamente";
    }else{
      echo "-----NOOOOO Guardo Usuario";
    }


      return "success";
    }else{
      return "error";
    }

    $stmt->close();
  }

  //buscar personas
  public function searchPersonModel(){

  }

    //Vista de usuarios
    //******************************
        public function vistaPersonModel($tabla){
          $conexion = new Conexion();
          $stmt = $conexion->prepare("SELECT * FROM $tabla ");
          $stmt->execute();
          return $stmt->fetchAll();
          $stmt->close();
        }

    //Editar usuarios
    //************************************************
    public function editarPersonModel($datos,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("SELECT person_id, dni, cuil, lastname, firstname, birthday, sexo, phone, movil, email, address
                                            FROM $tabla
                                            WHERE person_id=:person_id");
      $stmt->bindParam(":person_id",$datos,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch();
      $stmt->close();
    }

    //Actualizar usuarios
    //************************************************
    public function actualizarPersonModel($datosModel,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("UPDATE $tabla SET dni=:dni, cuil=:cuil, lastname=:lastname,
                                            firstname=:firstname, birthday=:birthday,
                                            sexo=:sexo, phone=:phone, movil=:movil, email=:email, address=:address
                                            WHERE person_id=:person_id");
      $stmt->bindParam(":person_id",$datosModel["person_id"],PDO::PARAM_INT);
      $stmt->bindParam(":dni",$datosModel["dni"],PDO::PARAM_INT);
      $stmt->bindParam(":cuil",$datosModel["cuil"],PDO::PARAM_STR);
      $stmt->bindParam(":lastname",$datosModel["lastname"],PDO::PARAM_STR);
      $stmt->bindParam(":firstname",$datosModel["firstname"],PDO::PARAM_STR);
      $stmt->bindParam(":birthday",$datosModel["birthday"]);
      $stmt->bindParam(":sexo",$datosModel["sexo"],PDO::PARAM_STR);
      $stmt->bindParam(":phone",$datosModel["phone"],PDO::PARAM_STR);
      $stmt->bindParam(":movil",$datosModel["movil"],PDO::PARAM_STR);
      $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
      $stmt->bindParam(":address",$datosModel["address"],PDO::PARAM_STR);

    if($stmt->execute()){
        return "success";
      }else{
        return "error";
      }

      $stmt->close();
    }

    //Actualizar usuarios
    //************************************************
    public function borrarPersonModel($datos,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("DELETE FROM $tabla WHERE person_id=:person_id");
      $stmt->bindParam(":person_id",$datos,PDO::PARAM_INT);

    if($stmt->execute()){
        return "success";
      }else{
        return "error";
      }

      $stmt->close();
    }


}
?>
