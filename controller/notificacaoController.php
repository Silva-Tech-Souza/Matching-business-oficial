<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblSearchProfile_Results.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}
if (!isset($_SESSION["id"])) {
    header("Location: ../view/login.php");
}

$id = $_POST['id'];
$url = $_POST['url'];


$searchProfileResults = new SearchProfile_Results($dbh);
$searchProfileResults->setid($id);

$searchProfileResults->atualizar('estadoNotif = 2 WHERE id = :id');

header("Location: ../view/".$url);

?>