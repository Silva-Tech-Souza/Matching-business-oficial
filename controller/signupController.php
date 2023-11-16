<?php
include_once('../model/classes/conexao.php');
    include_once('../model/classes/tblUserClients.php');
    include_once('../model/classes/tblEmpresas.php');
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


        $userClients = new UserClients($dbh);
        $userClients->setemail($email);

        $results = $userClients->consulta("WHERE email = :email");

        if ($results != null){
            $_SESSION['signuperro']= "Unable to register with this email";
            header("Location: ../view/signup.php");
        }

        $userClients2 = new UserClients($dbh);
        $userClients2->settaxid($taxid);
        
        $results2 = $userClients2->consulta("WHERE taxid = :taxid");

        if ($results2 != null){
            $_SESSION['signuperro']= "Unable to register with this taxid";
            header("Location: ../view/signup.php");
        }

        if($results == null && $results2 == null){

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

            $cadastrarEmpresas = new Empresas($dbh);
            $cadastrarEmpresas->setNome($companyname); 
            $cadastrarEmpresas->setTaxid($taxid); 
            $cadastrarEmpresas->setpais($contry); 
            $cadastrarEmpresas->setcolab1($resultCadastro);
            $cadastrarEmpresas->cadastrar();

    
            $codigoCadastroIncompleto = "4matching7" . urlencode($email) . "274bussiness5";
            
            $from = "noreplay@matchingbusiness.online";
            $to = $email;
            $subject = "Matching Business Online - Confirmation Link";
            $message = "Dear User," . "\n" . "Thank you for registering with us!" . "\n" . "We are excited to have you join Matching Business Online. This email serves as confirmation of your successful registration. We appreciate your interest and look forward to providing you with a fantastic experience." . "\n" . "Please click on the link below to enter your password and complete your registration." . "\n" . "https://visual.matchingbusiness.online/view/createPass.php?codigoCadastroIncompleto=" . $codigoCadastroIncompleto."\r\n";
            $headers = "From:" . $from;
            $headers  .= 'MIME-Version: Matching Business Online' . "\r\n";
            $headers  .= 'Reply-To:'. $from . "\r\n";
           $headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
           
            if(mail($to, $subject, $message, $headers)){
                 header("Location: ../view/signup.php?showModal=true");
            } else {
                 header("Location: ../view/signup.php?showModal=true");
            }
           
            $_SESSION['signuperro']="";
           
        }

        $_POST["signupsubmit"]=="";
    }
?>