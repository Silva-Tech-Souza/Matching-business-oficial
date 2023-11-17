<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblFeeds.php');
date_default_timezone_set('America/Sao_Paulo');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}
if (!isset($_SESSION["id"])) {
    header("Location: ../view/login.php");
}

?>