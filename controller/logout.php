<?php 
include_once('../model/classes/conexao.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
  session_start();

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}else{

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}


error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
 setcookie("remember_me","",time() - 3600, "/");
/*if (isset($_COOKIE["remember_me"])) {
    if($_COOKIE["remember_me"] != null){
        setcookie("remember_me",null,time() - 3600, "/");
    }
}*/

session_destroy(); 
header("location: ../view/login.php"); 

?>