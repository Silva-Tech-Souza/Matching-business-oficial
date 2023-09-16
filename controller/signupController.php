<?php

    include('../model/classes/tblUserClients.php');
    include('../model/classes/tblEmpresas.php');
    if ($_POST["signupsubmit"] != "") {
        $_POST["signupsubmit"]=="";

        $name  = htmlspecialchars($_POST["nome"]);
        $lastname  =  htmlspecialchars($_POST["sobrenome"]);
        $email =  htmlspecialchars($_POST["email"]);
        $jobtitle =  htmlspecialchars($_POST["cargo"]);
        $phone =  htmlspecialchars($_POST["whatsapp"]);
        $contry =  htmlspecialchars($_POST["country"]);
       

        $companyname =  htmlspecialchars($_POST["nomeEmpresa"]);
        $taxid =  htmlspecialchars($_POST["taxid"]);


        $userClients = new UserClients();
        $userClients->setemail($email);
        $userClients->settaxid($taxid);

        $results = $userClients->consulta("WHERE email = :email AND taxid = :taxid");

        if ($results != null){
            $_SESSION['signuperro']= "Unable to register with this email";
            header("Location: ../view/signup.php?teste=true");
        }else{

            $cadastrarEmpresas = new Empresas();
            $cadastrarEmpresas->setNome($companyname);
            $cadastrarEmpresas->setTaxid($taxid);
            $idemrpesa = $cadastrarEmpresas->cadastrar();

            $userClients = new UserClients();

            $userClients->setFirstName($name);
            $userClients->setLastName($lastname);
            $userClients->setJobTitle($jobtitle);
            $userClients->setCompanyName($companyname);
            $userClients->setidCountry($contry);
            $userClients->setemail($email);
            $userClients->setWhatsAppNumber($phone);
            $userClients->settaxid($taxid);
            $userClients->setidEmpresa($idemrpesa);
            $userClients->cadastrar();

    
            $codigoCadastroIncompleto = "4matching7" . urlencode($email) . "274bussiness5";
            ini_set('display_erros', 1);
            //error_reporting(E_ALL);
            $from = "noreplay@matchingbusiness.online";
            $to = $email;
            $subject = "Matching Business Online - Confirmation Link";
            $message = "Dear User," . "\n" . "Thank you for registering with us!" . "\n" . "We are excited to have you join Matching Business Online. This email serves as confirmation of your successful registration. We appreciate your interest and look forward to providing you with a fantastic experience." . "\n" . "Please click on the link below to enter your password and complete your registration." . "\n" . "https://visual.matchingbusiness.online/view/createPass.php?codigoCadastroIncompleto=" . $codigoCadastroIncompleto;
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
            header("Location: ../view/signup.php?showModal=true");
            $_SESSION['signuperro']="";
           
        }

        $_POST["signupsubmit"]=="";
    }
?>