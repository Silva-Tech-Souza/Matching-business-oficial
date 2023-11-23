<?php
include_once('../model/classes/tblChat.php');
include_once("../model/classes/tblSearchProfile_Results.php");
include_once('../model/classes/conexao.php');

date_default_timezone_set('America/Sao_Paulo');

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


if($_POST["acao"] == "cadastrar"){
  $response = array();

  $chat = new Chat($dbh);

  $chat->setidClient($_POST["iduser"]);
  $chat->setidClientEnviado($_POST["idClientConversa"]);
  $chat->setText($_POST["Texto"]);

  $chat->cadastrar();
  $response['success'] = true;
  //  header('Location: ../view/chatPage.php?idClientConversa='.$_POST["idClientConversa"]);

  $searchProfile = new SearchProfile_Results($dbh);;
  $idPost = "0";
  $searchProfile->setidUsuario($_POST["iduser"]);
  $searchProfile->setidClienteEncontrado($_POST["idClientConversa"]);
  $searchProfile->setpostId($idPost);
  $searchProfile->seturl("chatPage.php");
  $searchProfile->setidTipoNotif("9");
  $searchProfile->setestadoNotif("0");
  $searchProfile->cadastrar();
}else{

  header('Location: ../view/login.php');

}
//header('Content-Type: application/json');
//echo json_encode($response);

?>