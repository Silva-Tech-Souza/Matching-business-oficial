<?php

    

    function retornarDadostblUserClients($email,$dbh){

        $sqlchekflag = "SELECT * from tblUserClients WHERE email = :email AND idFlagStatusCadastro != '1'";
        $querychekflag = $dbh->prepare($sqlchekflag);
        $querychekflag->bindParam(':email', $email, PDO::PARAM_STR);
        $querychekflag->execute();
        $resultschekflag = $querychekflag->fetchAll(PDO::FETCH_OBJ);
        if ($querychekflag->rowCount() > 0) {return $resultschekflag;}else{return null;}

    }

    function atualizarSenha($email,$senhaCodificada,$dbh){
        $sql = "UPDATE tblUserClients SET Password = :password, idFlagStatusCadastro = '1' WHERE email = :email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $senhaCodificada, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $sqllogin = "SELECT * from tblUserClients WHERE email = :email ";
        $querylogin = $dbh->prepare($sqllogin);
        $querylogin->bindParam(':email', $email, PDO::PARAM_STR);
        $querylogin->execute();
        $resultslogin = $querylogin->fetchAll(PDO::FETCH_OBJ);
        if ($querylogin->rowCount() > 0) {return $resultslogin;}else{return null;}
    }

?>