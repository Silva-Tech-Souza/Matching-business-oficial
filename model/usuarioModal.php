<?php 


session_start();
date_default_timezone_set('America/Sao_Paulo');

function retornarDadostblUserClients($iduser,$dbh){
    $sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {return $results;}else{return null;}
}


function retornarDadostblCountry($idcountry,$dbh){
    //consulta tblCountry
    $sqlCountry = "SELECT * from tblCountry WHERE idCountry = :idCountry";
    $queryCountry = $dbh->prepare($sqlCountry);
    $queryCountry->bindParam(':idCountry', $idcountry, PDO::PARAM_INT);
    $queryCountry->execute();
    $resultsCountry = $queryCountry->fetchAll(PDO::FETCH_OBJ);
    if ($queryCountry->rowCount() > 0) {return $resultsCountry;}else{return null;}
}

?>