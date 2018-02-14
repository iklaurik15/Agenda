<?php
    
    require_once '../modeloAgenda/modeloAgendaUsuario.php';
    
    $user=$_POST['usuario'];
    $pass=$_POST['password'];
    
    $options= ['cost'=>12];
    $passEncriptada= password_hash($pass,PASSWORD_BCRYPT,$options);
    
    $usuario = new Usuario();
    $usuario->registrar($user,$passEncriptada);
    
    header("Location: ../index.php");   
    
