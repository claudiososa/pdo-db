<?php
require_once "conexion.php";
class Person extends Conexion{
  //Registro de usuarios

  public function registroPersonModel($datosModel,$tabla){
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (person_id, dni, cuil, lastname, firstname, birthday, sexo, phone, movil, email, address)
    VALUES (null, :dni, :cuil, :lastname, :firstname, :birthday, :sexo, :phone, :movil, :email, :address)");

    $stmt->bindParam(":dni",$datosModel["dni"],PDO::PARAM_INT);
    $stmt->bindParam(":cuil",$datosModel["cuil"],PDO::PARAM_STR);
    $stmt->bindParam(":lastname",$datosModel["lastname"],PDO::PARAM_STR);
    $stmt->bindParam(":firstname",$datosModel["firstname"],PDO::PARAM_STR);
    $stmt->bindParam(":birthday",$datosModel["birthday"],PDO::PARAM_STR);
    $stmt->bindParam(":sexo",$datosModel["sexo"],PDO::PARAM_STR);
    $stmt->bindParam(":phone",$datosModel["phone"],PDO::PARAM_STR);
    $stmt->bindParam(":movil",$datosModel["movil"],PDO::PARAM_STR);
    $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
    $stmt->bindParam(":address",$datosModel["address"],PDO::PARAM_STR);

  if($stmt->execute()){
      //return $stmt;
      return "success";
    }else{
      return "error";
    }

    $stmt->close();
  }

    //Vista de usuarios
    //******************************
        public function vistaPersonModel($tabla){
          $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
          $stmt->execute();
          return $stmt->fetchAll();
          $stmt->close();
        }

    //Editar usuarios
    //************************************************
    public function editarPersonModel($datos,$tabla){
      $stmt = Conexion::conectar()->prepare("SELECT person_id, dni, cuil, lastname, firstname, birthday, sexo, phone, movil, email, address
                                            FROM $tabla
                                            WHERE person_id=:person_id");
      $stmt->bindParam(":person_id",$datos,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch();
      $stmt->close();
    }

    //Actualizar usuarios
    //************************************************
    public function actualizarPersonModel($datos,$tabla){
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dni=:dni, cuil=:cuil, lastname=:lastname,
                                            firstname=:firstname, birthday=:birthday,
                                            sexo=:sexo, phone=:phone, movil=:movil, email=:email, address=:address
                                            WHERE person_id=:person_id");
      $stmt->bindParam(":person_id",$datos["id"],PDO::PARAM_INT);
      $stmt->bindParam(":dni",$datosModel["dni"],PDO::PARAM_INT);
      $stmt->bindParam(":cuil",$datosModel["cuil"],PDO::PARAM_STR);
      $stmt->bindParam(":lastname",$datosModel["lastname"],PDO::PARAM_STR);
      $stmt->bindParam(":firstname",$datosModel["firstname"],PDO::PARAM_STR);
      $stmt->bindParam(":birthday",$datosModel["birthday"],PDO::PARAM_DATE);
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
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE person_id=:person_id");
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
