<?php 
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');
include_once('../model/classes/tbPostComent.php');
include_once('../model/classes/tblFeeds.php');
include_once('../model/classes/tblProducts.php');
include_once('../model/classes/tblEmpresas.php');
include_once('../model/classes/tblConect.php');
include_once('../model/classes/tblChat.php');

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

$idcolab = $_GET["idcolab"];
$numero = $_GET["numero"];

$Message_Results = new Chat($dbh);
$Message_Results->setidClient($idcolab);
$Message_Results->setidClientEnviado($idcolab);
$Message_Results->deletar('WHERE idClientEnviado = :idClient || idClient = :idClientEnviado');

$conects = new Conect($dbh);
$conects->setidUserPed($idcolab);
$conects->setidUserReceb($idcolab);
$resultsConect = $conects->deletar("WHERE (idUserPed = :idUserPed)  OR (idUserReceb = :idUserReceb)  ");


$feeds = new Feeds($dbh);
$feeds->setidClient($idcolab);
$feeds->deletar("WHERE idClient = :idClient ");

$products = new Products($dbh);
$products->setidClient($idcolab);
$products->deletar("WHERE idClient = :idClient");
 

$viewcomentarios = new PostComent($dbh);
$viewcomentarios->setiduser($idcolab);
$resultstbPostComentview =  $viewcomentarios->deletar(" WHERE iduser = :iduser ");





if($numero == 2){
    $empresaDados = new Empresas($dbh);
    $empresaDados->setcolab2($idcolab);
    $results = $empresaDados->atualizar(" colab2 = '0' WHERE colab2 = :colab2");
}else if($numero==3){
    $empresaDados = new Empresas($dbh);
    $empresaDados->setcolab3($idcolab);
    $results = $empresaDados->atualizar(" colab3 = '0' WHERE colab3 = :colab3");
}else if($numero==4){
    $empresaDados = new Empresas($dbh);
    $empresaDados->setcolab4($idcolab);
    $results = $empresaDados->atualizar(" colab4 = '0' WHERE colab4 = :colab4");
}else if($numero==5){
    $empresaDados = new Empresas($dbh);
    $empresaDados->setcolab5($idcolab);
    $results = $empresaDados->atualizar(" colab5 = '0' WHERE colab5 = :colab5");
}

$userClients = new UserClients($dbh);
$userClients->setidClient($idcolab);
$userClients->deletar("WHERE idClient  = :idClient");
header("Location: ../view/profile.php");
?>