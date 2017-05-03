<?php
require_once "conexion.php";
class Courses extends Conexion{
  //Registro de usuarios

  public function newCourseModel($datosModel,$tabla){
    $conexion = new Conexion();
    $stmt = $conexion->prepare("INSERT INTO $tabla (course_id, name,turn,preceptor)
    VALUES (null, :name, :turn, :preceptor)");

    $stmt->bindParam(":name",$datosModel["name"],PDO::PARAM_STR);
    $stmt->bindParam(":turn",$datosModel["turn"],PDO::PARAM_STR);
    $stmt->bindParam(":preceptor",$datosModel["preceptor"],PDO::PARAM_INT);

//var_dump($datosModel);
    if($stmt->execute()){
      return "success";
    }else{
      return "error";
    }

    $stmt->close();
  }
  //Vista de cursos
  //******************************
    public function viewCourseModel($tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("SELECT * FROM $tabla ");
      $stmt->execute();
      return $stmt->fetchAll();
      $stmt->close();
    }

    //Vista de alumnos en curso
    //******************************
      public function viewStudentModel($tabla,$course){
        $conexion = new Conexion();
        $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE course_id = $course");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
      }



    //Editar usuarios
    //************************************************
    public function editCourseModel($datos,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("SELECT *
                                  FROM $tabla
                                  WHERE course_id=:course_id");
      $stmt->bindParam(":course_id",$datos,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch();
      $stmt->close();
    }

    //Actualizar Curso
    //************************************************
    public function updateCourseModel($datosModel,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("UPDATE $tabla
                                  SET name=:name, turn=:turn, preceptor=:preceptor
                                  WHERE course_id=:course_id");

      $stmt->bindParam(":course_id",$datosModel["course_id"],PDO::PARAM_INT);
      $stmt->bindParam(":name",$datosModel["name"],PDO::PARAM_STR);
      $stmt->bindParam(":turn",$datosModel["turn"],PDO::PARAM_STR);
      $stmt->bindParam(":preceptor",$datosModel["preceptor"],PDO::PARAM_INT);

      if($stmt->execute()){
        return "success";
      }else{
        return "error";
      }

      $stmt->close();
    }

    //Actualizar usuarios
    //************************************************
    public function deleteCourseModel($datos,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("DELETE FROM $tabla WHERE course_id=:course_id");
      $stmt->bindParam(":course_id",$datos,PDO::PARAM_INT);

    if($stmt->execute()){
        return "success";
      }else{
        return "error";
      }

      $stmt->close();
    }


}
?>
