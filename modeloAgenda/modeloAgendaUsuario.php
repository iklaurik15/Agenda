<?php

class Usuario{
    
    private $usuarios;
    private $contactos;
    private $link;
    
 public function __construct() {
    $this->usuarios = array();  
    $this->contactos = array(); 
    $this->link = new mysqli('localhost','root','','agenda'); //Establecer la conexion a la BBDD.
 }
 
 private function idioma(){
     
    return $this->link->query("SET NAMES 'utf8'"); //
 }
 
 public function lista_contactos(){
     
    self::idioma();
    $result=$this->link->query("CALL spMostrarListado();");
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $this->contactos[]=$row;
    }
    return $this->contactos;
    
 }
 
 public function registrar($user,$passEncriptada) {     
     $this->link->query("CALL spRegistrar('$user','$passEncriptada')");     
 }
 
 public function comprobarLogin(){
     
     $user=$_POST['usuario'];
     $pass=$_POST['password'];
     
     $sql="SELECT * FROM usuarios WHERE nom_usuario='$user'";      
     $result = mysqli_query($this->link, $sql);
     
     if ($result->num_rows > 0) {    
         
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        if(password_verify($pass, $row['contrasena'])){    

           $_SESSION['id'] = $row['id_usuario'];        
           $_SESSION['nomUsuario'] = $user;
           $_SESSION['rol'] = $row['rol'];
           $_SESSION['loggedin'] = true;
           $_SESSION['start'] = time();
           $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);      

           return true;

        }else{                      
            return false;
        }
     
     }
     
 }

}


?>