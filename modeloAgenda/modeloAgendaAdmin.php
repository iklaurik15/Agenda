<?php

class Contacto{      
    private $link;  
                
 public function __construct() {         
    $this->link = new mysqli('localhost','root','','agenda'); //Establecer la conexion a la BBDD.
 }
 
 private function idioma(){     
    return $this->link->query("SET NAMES 'utf8'"); //
 }
 
 public function crear_contacto($nombre,$apellido,$telefono,$email1,$email2,$grupo1,$grupo2,$grupo3){     
    
    $this->link->query("CALL spInsertarContacto('$nombre','$apellido','$telefono','$email1','$email2','$grupo1','$grupo2','$grupo3')");            
    
 }
 
 public function eliminar_contacto($id_contacto){
     $this->link->query("CALL spBorrarContacto('$id_contacto')");
     
 } 
 
 public function modificar_contacto($id_contacto,$nombre,$apellido,$telefono,$email1,$email2,$grupo1,$grupo2,$grupo3){
     $this->link->query("CALL spModificarContacto('$id_contacto','$nombre','$apellido','$telefono','$email1','$email2','$grupo1','$grupo2','$grupo3')");
 }
 
 public function crear_contactoTransac($nombre,$apellido,$telefono,$email1) {
     
     $this->link->autocommit(false);
     $stop = false;
     
     $sql1 = "CALL spInsertarContactoTransac('$nombre','$apellido','$telefono')";
          
     $result = $this->link->query($sql1);
     
     if($this->link->errno) {
      $stop = true; // Si entro aqui, habra un error, entonces STOP!
      echo "Error: " . $this->link->error . ". ";
     }
     
     foreach ($result as $res){
          $idContactoRes=$res;
     }

     $idcontacto = $idContactoRes['ultimoId'];

     $sql2 = "CALL spInsertarEmailTransac('$email1','$idcontacto')";

     $result = $this->link->query($sql2);

     if($this->link->errno) {
       $stop = true; // Si entro aqui, habra un error, entonces STOP!
       echo "Error: " . $this->link->error . ". ";
     }
     
     if ($stop == false) { // Si no ha habido ningun error, se meteran a la base de datos todos los querys
        $this->link->commit();
        echo "Datos insertados correctamente";
     } else {
        $this->link->rollback(); // Si hay error, se anulan todos los querys
        echo "No se han metido datos a la base de datos";
     }
    
  }
}

?>