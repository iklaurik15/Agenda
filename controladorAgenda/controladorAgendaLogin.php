<?php 
    session_start();

    require_once '../modeloAgenda/modeloAgendaUsuario.php';
    
    if(isset($_POST['chkRecordar'])&&($_POST['chkRecordar']) == true ){
        setcookie("cook_user", $_POST['usuario'], time()+60);
        setcookie("cook_pass", $_POST['password'], time()+60);
    }    
    
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
    
    