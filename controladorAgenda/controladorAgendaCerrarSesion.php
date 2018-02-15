<?php

session_start();

unset ($SESSION['nomUsuario']);

session_destroy();

if(isset($_COOKIE["cook_user"])){
    setcookie("cook_user",'',0);
    setcookie("cook_pass",'',0);
}

header("Refresh:0; url=../index.php");

?>