<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblConect.php');
include_once('../model/classes/tblSearchProfile_Results.php');

if ($_POST["conectar"] != "") {

    $geral= $_POST["geral"];
    $iduser =$_POST["iduser"];
    $conect = new Conect($dbh);
    $conect->setidUserPed($geral);
    $conect->setidUserReceb($iduser);
    $conect->cadastrar();
  
  
    $url = "viewProfile.php?profile=$iduser";
    $searchProfile_results = new SearchProfile_Results($dbh);
    $searchProfile_results->setidUsuario($geral);
    $searchProfile_results->setidClienteEncontrado($iduser); 
    $searchProfile_results->seturl($url);
    $searchProfile_results->setpostId('0');
    $searchProfile_results->setidTipoNotif('4');
    $searchProfile_results->setestadoNotif("0");
    $searchProfile_results->cadastrar();

   


    header("Location: ../view/viewProfile.php?profile=$iduser");
}
  
if ($_POST["desconectar"] != "") {
    $idconect = $_POST["idconectar"];
    $idperfilpedido = $_POST["idperfilpedido"];


    //$sqlconectdelet = "DELETE FROM tblconect WHERE  id = :id";
    //$queryconectdelet = $dbh->prepare($sqlconectdelet);
    //$queryconectdelet->bindParam(':id', $idconect, PDO::PARAM_INT);
    //$queryconectdelet->execute();

    $conect = new Conect($dbh);

    $conect->setid($idconect);

    $conect->deletar("WHERE id = :id");

    header("Location: ../view/viewProfile.php?profile=".$geral);
}

if ($_POST["aceitarConexao"] != "") {

    $geral= $_POST["geral"];
    $iduser =$_POST["iduser"];
    $idconectar =$_POST["idconectar"];

    $conect = new Conect($dbh);
    $conect->setid($idconectar);
    $conect->setstatus("1");
    $conect->atualizar('status = :status WHERE id = :id');
  
    //notificação de conexão aceita
    $url = "viewProfile.php?profile=$iduser";
    $searchProfile_results = new SearchProfile_Results($dbh);
    $searchProfile_results->setidUsuario($geral);
    $searchProfile_results->setidClienteEncontrado($iduser); 
    $searchProfile_results->seturl($url);
    $searchProfile_results->setpostId('0');
    $searchProfile_results->setidTipoNotif('7');
    $searchProfile_results->setestadoNotif("0");
    $searchProfile_results->cadastrar();

   


    header("Location: ../view/viewProfile.php?profile=$iduser");
}

?>