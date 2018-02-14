<?php 
    session_start();

    require_once '../modeloAgenda/modeloAgendaUsuario.php';
            
    $usuario=new Usuario();
    $usuario->comprobarLogin();

    if($usuario->comprobarLogin()){ 
        
        if($_SESSION['rol'] == "administrador"){
            require_once '../vistaAgenda/vistaAgendaAdmin.php';
        }else{
            require_once '../vistaAgenda/vistaAgendaUsuario.php';
        }       
        
    }else{        
        header("Location:../index.php");            
        
    }
    
    