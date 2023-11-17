<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblChat.php');
include_once("../model/classes/tblSearchProfile_Results.php");

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}
if (!isset($_SESSION["id"])) {
    header("Location: ../view/login.php");
}

    date_default_timezone_set('America/Sao_Paulo');
    $response = array();

    if($_POST["acao"] == "cadastrar"){


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
    }
    header('Content-Type: application/json');
    echo json_encode($response);

?>