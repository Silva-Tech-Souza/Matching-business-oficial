<?php

    function retornarDadostblUserClients($iduser,$dbh){
        $sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
        $query = $dbh->prepare($sql);
        $query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {return $results;} else{return null;}
    }

?>