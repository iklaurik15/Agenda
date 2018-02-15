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
 
 public function crear_contacto_Fichero($nombre,$apellido,$telefono) {
     $this->link->query("CALL spInsertarContactoFichero('$nombre','$apellido','$telefono')");
 }
 
 public function crear_contactoSP($nombre,$apellido,$telefono){
     $query="INSERT INTO contactos(nombre,apellido,telefono) VALUES(?,?,?)";// ? sinboloak parametroa adierazten du
     $sqlPrep = $this->link->prepare($query); 
     $sqlPrep->bind_param("s","s","i",$nombre,$apellido,$telefono);     
     $sqlPrep->execute();        
     $this->link->close();
 }
 
 public function crear_contactoTransac($nombre,$apellido,$telefono,$email1) {
     
     $this->link->autocommit(false);
     $stop = false;
     
     $sql1 = "INSERT INTO contactos(nombre,apellido,telefono) VALUES ('$nombre','$apellido','$telefono')";
     $sql2 = "SELECT MAX(id_contacto) FROM contactos" ;
     
     $result = $this->link->query($sql1);
     
     if($this->link->errno) {
      $stop = true; // Si entro aqui, habra un error, entonces STOP!
      echo "Error: " . $this->link->error . ". ";
     }
      
          
     $idContacto= mysqli_fetch_array($this->link->query($sql2))[0];

     $sql3 = "INSERT INTO email (correo,id_contacto) VALUES ('$email1','$idContacto')";

     $result = $this->link->query($sql3);

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
 
 public function eliminar_contacto($id_contacto){
     $this->link->query("CALL spBorrarContacto('$id_contacto')");
     
 } 
 
 public function modificar_contacto($id_contacto,$nombre,$apellido,$telefono,$email1,$email2,$grupo1,$grupo2,$grupo3){
     $this->link->query("CALL spModificarContacto('$id_contacto','$nombre','$apellido','$telefono','$email1','$email2','$grupo1','$grupo2','$grupo3')");
 }
 
}

?>