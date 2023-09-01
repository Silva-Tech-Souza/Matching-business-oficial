<?php 
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

if (isset($_COOKIE["remember_me"])) {
    setcookie("remember_me",path:"/");
}

session_destroy(); 
header("location: ../view/login.php"); 

?>