<?php

include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');
include_once('../model/classes/tblEmpresas.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}


    if ($_POST["signupsubmitcoolab"] != "") {
        $_POST["signupsubmitcoolab"]=="";
        $qtdcolab  =$_POST["qtdcolab"];
        $name  = htmlspecialchars($_POST["nome"]);
        $lastname  =  htmlspecialchars($_POST["sobrenome"]);
        $email =  htmlspecialchars($_POST["email"]);
        $jobtitle =  htmlspecialchars($_POST["cargo"]);
        $phone =  htmlspecialchars($_POST["whatsapp"]);
        $contry =  htmlspecialchars($_POST["country"]);
        $companyname =  htmlspecialchars($_POST["nomeEmpresa"]);
        $taxid =  htmlspecialchars($_POST["taxid"]);
        
        $idoperation =  htmlspecialchars($_POST["idoperation"]);
        $corebusiness =  htmlspecialchars($_POST["corebusiness"]);
        $satBusinessId =  htmlspecialchars($_POST["satBusinessId"]);

        if($taxid != ""){
            $userClients = new UserClients($dbh);

            $userClients->setFirstName($name);
            $userClients->setLastName($lastname);
            $userClients->setJobTitle($jobtitle);
            $userClients->setCompanyName($companyname);
            $userClients->setidCountry($contry);
            $userClients->setemail($email);
            $userClients->setWhatsAppNumber($phone);
            $userClients->settaxid($taxid);
         
            
            $resultCadastro = $userClients->cadastrar();
            
            
            $userClients2 = new UserClients($dbh);
            $userClients2->setidClient($resultCadastro);
            $userClients2->setCoreBusinessId($corebusiness);
            $userClients2->setSatBusinessId($satBusinessId); 
            $userClients2->setIdOperation($idoperation);
            if(isset($_POST["category"])){
              
                  $userClients2->atualizar("CoreBusinessId = :CoreBusinessId, IdOperation = :IdOperation, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
            }else{
              
                  $userClients2->atualizar("CoreBusinessId = :CoreBusinessId, IdOperation = NULL, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
            }
            
            if($qtdcolab == "1"){
              $cadastrarEmpresas = new Empresas($dbh);
                $cadastrarEmpresas->setTaxid($taxid);  
                $cadastrarEmpresas->setcolab2($resultCadastro);
                $cadastrarEmpresas->atualizar(" colab2 = :colab2 WHERE taxid = :taxid ");
            }else if($qtdcolab == "2"){
               $cadastrarEmpresas = new Empresas($dbh);
                $cadastrarEmpresas->setTaxid($taxid);  
                $cadastrarEmpresas->setcolab3($resultCadastro);
                $cadastrarEmpresas->atualizar(" colab3 = :colab3 WHERE taxid = :taxid ");
            }else if($qtdcolab == "3"){
                $cadastrarEmpresas = new Empresas($dbh);
                $cadastrarEmpresas->setTaxid($taxid);  
                $cadastrarEmpresas->setcolab4($resultCadastro);
                $cadastrarEmpresas->atualizar(" colab4 = :colab4 WHERE taxid = :taxid ");
            }else if($qtdcolab == "4"){
                $cadastrarEmpresas = new Empresas($dbh);
                $cadastrarEmpresas->setTaxid($taxid);  
                $cadastrarEmpresas->setcolab5($resultCadastro);
                $cadastrarEmpresas->atualizar(" colab5 = :colab5 WHERE taxid = :taxid ");
            }else if($qtdcolab == "5"){

            }
            $codigoCadastroIncompleto = "4matching7" . urlencode($email) . "274bussiness5";
            header("Location: ../view/createPass.php?codigoCadastroIncompleto=" . $codigoCadastroIncompleto);
            
        }else{

        }

        $_POST["signupsubmitcoolab"]=="";

    }
