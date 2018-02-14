<?php

class Grupo{
    private $grupos;
    private $link;    

    public function __construct() {
        
        $this->grupos= array();
        $this->link = new mysqli('localhost','root','','agenda');
    }   
    
    private function idioma(){   
        
        return $this->link->query("SET NAMES 'utf8'");
    }
 
    public function mostrar_grupos() {
        
        self::idioma();
        $result=$this->link->query("CALL spMostrarComboGrupo()");       
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $this->grupos[]=$row;
        }
        
        return $this->grupos;
        
    
    }
}


?>