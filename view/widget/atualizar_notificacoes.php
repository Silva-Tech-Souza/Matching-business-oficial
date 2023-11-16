<?php
include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tblSearchProfile_Results.php');
$iduser = $_SESSION["id"];
try {
    $tblSearchProfile = new SearchProfile_Results($dbh);
    $tblSearchProfile->setidClienteEncontrado($iduser);
    $resultsSearchProfile = $tblSearchProfile->quantidade("WHERE idClienteEncontrado = :idClienteEncontrado AND estadoNotif = '0' ORDER BY datahora DESC");
    
    if ($resultsSearchProfile != "0") {
        echo $resultsSearchProfile;
    }else{
       
        echo "";
    }
} catch (\Throwable $th) {
    
    echo "";
}
