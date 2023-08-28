<?php

    function retornarDadostblUserClients($iduser,$dbh){

        //consulta tblUserClients
        $sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
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

    function retornarDadostblOperations($corebusiness,$dbh){

        $sqlbusiness = "SELECT * from tblOperations WHERE idOperation = :idOperation";
        $querybusiness = $dbh->prepare($sqlbusiness);
        $querybusiness->bindParam(':idOperation', $corebusiness, PDO::PARAM_INT);
        $querybusiness->execute();
        $resultsbusiness = $querybusiness->fetchAll(PDO::FETCH_OBJ);
        if($querybusiness->rowCount() > 0){return $resultsbusiness;}else{return null;}

    }

    function retornarDadostblBusiness($satBusinessId,$dbh){

        $sqlbusinesscor = "SELECT * from tblBusiness WHERE idBusiness = :idBusiness";
        $querybusinesscor = $dbh->prepare($sqlbusinesscor);
        $querybusinesscor->bindParam(':idBusiness', $satBusinessId, PDO::PARAM_INT);
        $querybusinesscor->execute();
        $resultsbusinesscor = $querybusinesscor->fetchAll(PDO::FETCH_OBJ);
        if($querybusinesscor->rowCount() > 0){return $resultsbusinesscor;}else{return null;}

    }

    function retornarDadostblBusinessCategory($idoperation,$dbh){

        $sqlbusinesscateg = "SELECT * from tblBusinessCategory WHERE idBusinessCategory = :idBusinessCategory";
        $querybusinesscateg = $dbh->prepare($sqlbusinesscateg);
        $querybusinesscateg->bindParam(':idBusinessCategory', $idoperation, PDO::PARAM_INT);
        $querybusinesscateg->execute();
        $resultsbusinesscateg = $querybusinesscateg->fetchAll(PDO::FETCH_OBJ);
        if($querybusinesscateg->rowCount() > 0){return $resultsbusinesscateg;}else{return null;}

    }

    function retornarDadostblconect($geral,$iduser,$dbh){

        $sqlconect = "SELECT * FROM tblconect WHERE idUserPed = :idUserPed AND idUserReceb = :idUserReceb ";
        $queryconect = $dbh->prepare($sqlconect);
        $queryconect->bindParam(':idUserPed', $geral, PDO::PARAM_INT);
        $queryconect->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
        $queryconect->execute();
        $respoconect = $queryconect->fetchAll(PDO::FETCH_OBJ);
        if($queryconect->rowCount() > 0){return $respoconect;}else{return null;}

    }

    function retornarDadostbl($geral,$iduser,$url,$dbh){

        $sqlView = "SELECT * FROM tblviews WHERE idUser = :idUser AND idView = :idView AND  DATE(datacriacao) = CURDATE()";
        $queryView = $dbh->prepare($sqlView);
        $queryView->bindParam(':idUser', $geral, PDO::PARAM_INT);
        $queryView->bindParam(':idView', $iduser, PDO::PARAM_INT);
        $queryView->execute();
        $resultView = $queryView->fetchAll(PDO::FETCH_OBJ);
        if($queryView->rowCount() > 0){return $resultView;}else{
        
            $sqlViewinsert = "INSERT INTO tblviews(idUser, idView) VALUES (:idUser, :idView)";
            $queryViewinsert = $dbh->prepare($sqlViewinsert);
            $queryViewinsert->bindParam(':idUser', $geral, PDO::PARAM_INT);
            $queryViewinsert->bindParam(':idView', $iduser, PDO::PARAM_INT);
            $queryViewinsert->execute();
          
            $sqlinsertpost = "INSERT INTO tblsearchprofile_results (idUsuario, idClienteEncontrado, idTipoNotif, url) VALUES (:idUsuario, :idClienteEncontrado, '2', :url)";
            $queryinsertpost = $dbh->prepare($sqlinsertpost);
            $queryinsertpost->bindParam(':idUsuario', $geral, PDO::PARAM_INT);
            $queryinsertpost->bindParam(':idClienteEncontrado', $iduser, PDO::PARAM_INT);
            $queryinsertpost->bindParam(':url', $url, PDO::PARAM_STR);
            $queryinsertpost->execute();

            return null;
        }

    }

?>