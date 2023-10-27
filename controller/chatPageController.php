<?php
include_once('../model/classes/conexao.php');

    date_default_timezone_set('America/Sao_Paulo');
    $response = array();

    if($_POST["acao"] == "cadastrar"){

        include_once('../model/classes/tblChat.php');

        $chat = new Chat($dbh);

        $chat->setidClient($_POST["iduser"]);
        $chat->setidClientEnviado($_POST["idClientConversa"]);
        $chat->setText($_POST["Texto"]);

        $chat->cadastrar();
        $response['success'] = true;
      //  header('Location: ../view/chatPage.php?idClientConversa='.$_POST["idClientConversa"]);

    }
    header('Content-Type: application/json');
    echo json_encode($response);

?>