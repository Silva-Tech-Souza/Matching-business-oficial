<?php 
include_once('../model/classes/conexao.php');
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

if (isset($_COOKIE["remember_me"])) {
    if($_COOKIE["remember_me"] != null){
        setcookie("remember_me",null,time() - 3600, "/");
    }
}

session_destroy(); 
header("location: ../view/login.php"); 

?>