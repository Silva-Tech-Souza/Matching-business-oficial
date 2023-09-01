<?php

    include('../model/classes/tblUserClients.php');

    if($_POST["create"] !=""){
        $senha = $_POST["password"];
        $confmsenha= $_POST["password-confirm"];
        $email= $_POST["email"];
        
        $senhaCodificada = md5($senha);
        $senhaCodificada2 = md5($confmsenha);
        if($senhaCodificada == $senhaCodificada2 ){
            $errosenha="";

            //$resultschekflag = retornarDadostblUserClients($email,$dbh);//

            $tblUserClients = new UserClients();
            $tblUserClients->setemail($email);

            $resultschekflag = $tblUserClients->consulta("WHERE email = :email AND idFlagStatusCadastro != '1'");
            foreach ($resultschekflag as $rowchekflag) {

                
                //$resultslogin = atualizarSenha($email,$senhaCodificada,$dbh);//

                $tblUserClients = new UserClients();
                $tblUserClients->setemail($email);
                $tblUserClients->setPassword($senhaCodificada);
                

                $resultslogin = $tblUserClients->atualizar("Password = :Password, idFlagStatusCadastro = '1' WHERE email = :email");

                if ($resultslogin != null) {
                    foreach ($resultslogin as $rowlogin) {
                        $_SESSION['loginerro'] = "";
                        $_SESSION["id"] = $rowlogin->idClient;
                        $_SESSION['emailC'] = $rowlogin->email;
                        $_SESSION['idC'] = $rowlogin->idClient;
                        $_SESSION['fName'] = $rowlogin->FirstName;
                        $_SESSION['lName'] = $rowlogin->LastName;
                    }
                
                    header("Location: qualificacao.php");
                }
                else{
                    $errosenha= "Not allowed to change password";
                }
            }
            }else{
                $errosenha= "The passwords are different";
                
            }

        $_POST["create"] ="";
    }
