<?php
include_once('../../model/classes/conexao.php');
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
if(isset($_SESSION['error'])){
    error_reporting(0);
}
date_default_timezone_set('America/Sao_Paulo');
include('../../../conexao/conexao.php');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header("Location: ../view/inicio/index.php");
}
$iduser = $_SESSION["id"];
$idpost = $_POST['idpost'];



$sqlinsertpost = "DELETE FROM tbcurtidas WHERE idpost = :idpost AND idusuario = :idusuario";
$queryinsertpost = $dbh->prepare($sqlinsertpost);
$queryinsertpost->bindParam(':idpost', $idpost, PDO::PARAM_INT);
$queryinsertpost->bindParam(':idusuario', $iduser, PDO::PARAM_INT);
$queryinsertpost->execute();


#DELETE FROM `tbcurtidas` WHERE `tbcurtidas`.`id` = 15;