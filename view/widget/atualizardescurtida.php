<?php
include_once('../../model/classes/conexao.php');
include_once("../../model/classes/tblCurtidas.php");

if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
if(isset($_SESSION['error'])){
    error_reporting(0);
}
date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");

$iduser = $_SESSION["id"];
$idpost = $_GET['id'];

//parte 1
$tblcurtidadelete = new Curtidas($dbh);;
$tblcurtidadelete->setidpost($idpost);
$tblcurtidadelete->setidusuario($iduser);
$tblcurtidadelete->deletar("WHERE idpost = :idpost AND idusuario = :idusuario");



$tbcurtidaSe = new Curtidas($dbh);;
$tbcurtidaSe->setidpost($idpost);
$tbcurtidaSeResults = $tbcurtidaSe->consulta("WHERE idpost = :idpost");

$numeroCurtidas = 0;

if ($tbcurtidaSeResults != null) {
    foreach ($tbcurtidaSeResults as $tbcurtida) {
        $numeroCurtidas++;
    }
} ?>




<input hidden type='text' name='idpost' value='<?php echo $idpost; ?>'>


<button class='btn btn-third pl-4 pr-4 no-border p-3' onClick='showCurtida(<?php echo $idpost; ?>);'>
    <span class='' style='font-size: 13px;'>
        <?php echo $numeroCurtidas; ?> &nbsp;&nbsp;<i class='fa-solid fa-thumbs-up'> Like</i>
    </span>
</button>