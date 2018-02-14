<?php
class Contacto{
    private $contactos;
    private $link;    

    public function __construct() {
        
        $this->contactos= array();
        $this->link = new mysqli('localhost','root','','agenda');
    }   
    
    private function idioma(){   
        
        return $this->link->query("SET NAMES 'utf8'");
    }
 
    public function mostrar_contactos() {
        
        self::idioma();
        $result=$this->link->query("CALL spMostrarComboContacto()");       
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $this->contactos[]=$row;
        }
        
        return $this->contactos;
        
    
    }
}
?>