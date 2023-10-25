<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
if(isset($_SESSION['error'])){
    error_reporting(0);
}
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Sao_Paulo');
$iduser = $_SESSION["id"];
$idPost = $_GET['id'];
$dataAtual = date('Y-m-d');
$horaAtual = date('H:i');

//cria
include_once("../../model/classes/tblCurtidas.php");

include_once("../../model/classes/tblUserClients.php");

$tbcurtida = new Curtidas;
$tbcurtida->setidusuario($iduser);
$tbcurtida->setidpost($idPost);
$tbcurtida->setdata($dataAtual);
$tbcurtida->sethora($horaAtual);
$tbcurtida->cadastrar();

$user = new UserClients();
$user->setidClient($iduser);
$user->setPontos(10);
$user->atualizar("Pontos = Pontos + :Pontos WHERE idClient = :idClient");



//parte 2
$tbcurtidaSe = new Curtidas;
$tbcurtidaSe->setidpost($idPost);
$tbcurtidaSeResults = $tbcurtidaSe->consulta("WHERE idpost = :idpost");

$numeroCurtidas = 0;

if ($tbcurtidaSeResults != null) {
    foreach($tbcurtidaSeResults as $tbcurtida){
        $numeroCurtidas++;
    }
    
}


//parte 3 notif

include_once("../../model/classes/tblFeeds.php");

$tblfeedsNotif = new Feeds;
$tblfeedsNotif->setidIdFeed($idPost);
$tblfeedsNotifResults = $tblfeedsNotif->consulta("WHERE IdFeed = :IdFeed");
if ($tblfeedsNotifResults != null) {
    foreach ($tblfeedsNotifResults as $rowfeed) {
        $idCliente = $rowfeed->IdClient;
    }
}

include_once("../../model/classes/tblSearchProfile_Results.php");

$searchProfile = new SearchProfile_Results;

$searchProfile->setidUsuario($iduser);
$searchProfile->setidClienteEncontrado($idCliente);
$searchProfile->setpostId($idPost);
$searchProfile->seturl("viewPost.php?post=" . $idPost);
$searchProfile->setidTipoNotif("5");
$searchProfile->setestadoNotif("0");
$searchProfile->cadastrar();

?>



<input hidden type='text' name='idpost' value='<?php echo $idPost ?>'>


<button class='btn like-comment-btn pl-4 pr-4 no-border p-3' onClick='showDCurtida(<?php echo $idPost ?>);'>
    <span class='' style='font-size: 13px;'>
        <?php echo $numeroCurtidas ?> &nbsp;&nbsp;<i class='fa-solid fa-thumbs-up'> Like</i>
    </span>
</button>