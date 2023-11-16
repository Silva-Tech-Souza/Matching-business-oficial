<?php

$id = $_POST['id'];
$url = $_POST['url'];
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblSearchProfile_Results.php');

$searchProfileResults = new SearchProfile_Results($dbh);
$searchProfileResults->setid($id);

$searchProfileResults->atualizar('estadoNotif = 2 WHERE id = :id');

header("Location: ../view/".$url);

?>