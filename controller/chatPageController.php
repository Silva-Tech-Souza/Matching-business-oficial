<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');


    if($_POST["acao"] == "cadastrar"){

        include_once('../model/classes/tblChat.php');

        $chat = new Chat();

        $chat->setidClient($_POST["iduser"]);
        $chat->setidClientEnviado($_POST["idClientConversa"]);
        $chat->setText($_POST["Texto"]);

        $chat->cadastrar();

        header('Location: ../view/chatPage.php?idClientConversa='.$_POST["idClientConversa"]);

    }


?>