<?php
include('../model/classes/tblConect.php');
include('../model/classes/tblSearchProfile_Results.php');

if ($_POST["conectar"] != "") {
    //$sqlconect = "INSERT INTO tblconect (idUserPed, idUserReceb, status) VALUES (:idUserPed, :idUserReceb, '0')";
    //$queryconect = $dbh->prepare($sqlconect);
    //$queryconect->bindParam(':idUserPed', $geral, PDO::PARAM_INT);
    //$queryconect->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
    //$queryconect->execute();

    $conect = new Conect();

    $conect->setidUserPed($geral);
    $conect->setidUserReceb($iduser);
    $conect->setstatus('0');

    $conect->cadastrar();
  
    //$sqlinsertpost = "INSERT INTO tblsearchprofile_results (idUsuario, idClienteEncontrado, idTipoNotif, url) VALUES (:idUsuario, :idClienteEncontrado, '4', :url)";
    //$queryinsertpost = $dbh->prepare($sqlinsertpost);
    //$queryinsertpost->bindParam(':idUsuario', $geral, PDO::PARAM_INT);
    //$queryinsertpost->bindParam(':idClienteEncontrado', $iduser, PDO::PARAM_INT);
    //$queryinsertpost->bindParam(':url', $url, PDO::PARAM_STR);
    //$queryinsertpost->execute();

    $searchProfile_results = new SearchProfile_Results();

    $searchProfile_results->setidUsuario($geral);
    $searchProfile_results->setidClienteEncontrado($iduser);
    $searchProfile_results->seturl($url);
    $searchProfile_results->setidTipoNotif('4');

    $searchProfile_results->cadastrar();
    

    header("Location: viewProfile.php?profile=$geral");
}
  
if ($_POST["desconectar"] != "") {
    $idconect = $_POST["idconectar"];
    $idperfilpedido = $_POST["idperfilpedido"];


    //$sqlconectdelet = "DELETE FROM tblconect WHERE  id = :id";
    //$queryconectdelet = $dbh->prepare($sqlconectdelet);
    //$queryconectdelet->bindParam(':id', $idconect, PDO::PARAM_INT);
    //$queryconectdelet->execute();

    $conect = new Conect();

    $conect->setid($idconect);

    $conect->deletar("WHERE  id = :id");

    header("Location: viewProfile.php?profile=$geral");
}

?>