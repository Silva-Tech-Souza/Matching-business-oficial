<?php 

    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    function retornarDadostblUserClients($iduser,$dbh){
        $sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
        $query = $dbh->prepare($sql);
        $query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {return $results;}else{return null;}
    }

    function retornarDadostblOperations($dbh){

        $sqlOperation = "SELECT * from tblOperations WHERE FlagOperation != '0' LIMIT 8";
        $queryOperation = $dbh->prepare($sqlOperation);
        $queryOperation->execute();
        $resultsOperation = $queryOperation->fetchAll(PDO::FETCH_OBJ);
        if($queryOperation->rowCount() > 0){return $resultsOperation;}else{return null;}

    }

?>