<?php

include_once('../model/classes/conexao.php');
    include_once('../model/classes/tblUserClients.php');
    include_once('../model/classes/tblEmpresas.php');
    if ($_POST["signupsubmitcoolab"] != "") {
        $_POST["signupsubmitcoolab"]=="";

        $name  = htmlspecialchars($_POST["nome"]);
        $lastname  =  htmlspecialchars($_POST["sobrenome"]);
        $email =  htmlspecialchars($_POST["email"]);
        $jobtitle =  htmlspecialchars($_POST["cargo"]);
        $phone =  htmlspecialchars($_POST["whatsapp"]);
        $contry =  htmlspecialchars($_POST["country"]);
        $senha =  htmlspecialchars($_POST["senha"]);
       
        $companyname =  htmlspecialchars($_POST["nomeEmpresa"]);
        $taxid =  htmlspecialchars($_POST["taxid"]);

        $senhaCodificada = md5($senha);


        $userClients = new UserClients($dbh);
        $userClients->setemail($email);

        $results = $userClients->consulta("WHERE email = :email");

        if ($results != null){
            $_SESSION['signuperro']= "Unable to register with this email";
            header("Location: ../view/cadastrarCoolab.php?email=".urlencode($email)."&taxid=".urlencode($taxid));
        }

        if($results == null){

            $Empresas = new Empresasview($dbh);
            $Empresas->setTaxid($taxid);

            $resultEmpresas = $Empresas->consulta("WHERE taxid = :taxid");

            if($resultEmpresas != null){

                foreach($resultEmpresas as $resultEmpresasUnid){

                    $userClients = new UserClients($dbh);

                    $userClients->setFirstName($name);
                    $userClients->setLastName($lastname);
                    $userClients->setJobTitle($jobtitle);
                    $userClients->setCompanyName($companyname);
                    $userClients->setidCountry($contry);
                    $userClients->setemail($email);
                    $userClients->setWhatsAppNumber($phone);
                    $userClients->settaxid($taxid);
                    //$userClients->setidEmpresa($resultEmpresasUnid->nome);
                    $userClients->cadastrar();

                    $userClients = new UserClients($dbh);

                    $userClients->setPassword($senhaCodificada);
                    $userClients->setemail($email);
                    $userClients->atualizar("Password = :Password WHERE email = :email ");


                    $_POST["signupsubmitcoolab"]=="";

                    $userClients = new UserClients($dbh);
                    $userClients->setemail($email);

                    $results2 = $userClients->consulta("WHERE email = :email");

                    foreach($results2 as $results2Unid){

                        $_SESSION['loginerro'] = "";
                        $_SESSION["id"] = $results2Unid->idClient;
                        $_SESSION['emailC'] = $email;
                        $_SESSION['idC'] = $results2Unid->idClient;
                        $_SESSION['fName'] = $name;
                        $_SESSION['lName'] = $lastname;

                    }


                    header("Location: ../view/qualificacao.php");

                }

            }

        }

    }
?>