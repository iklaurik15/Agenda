<?php

session_start();

if(isset($_COOKIE["cook_user"])){
    setcookie("cook_user",'',0);
    setcookie("cook_pass",'',0);
}

session_destroy();

header("Refresh:0; url=../index.php");
