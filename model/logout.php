<?php 
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
setcookie("remember_me","",time() - 3600, "/");
if (isset($_COOKIE["remember_me"])) {
    setcookie("remember_me","",time() - 3600, "/");
}

session_destroy(); 
header("location: ../view/login.php"); 

?>