<?php 
session_start();
 include('../model/classes/tblUserClients.php');
    include('../model/classes/tblEmpresas.php');
  if ($_POST["enviaremail"] != "") {
 echo "\n".$id = $_SESSION["id"] ;
echo "\n".$taxid =  $_POST["taxid"];
echo "\n". $emailcolab =  trim($_POST["emailcolab"]);


            ini_set('display_erros', 1);
            //error_reporting(E_ALL);
            $from = "noreplay@matchingbusiness.online";
            $to = $emailcolab;
            $subject = "Matching Business Online - Collaborator Registration";
            $message = "Prezado Usuário," . "\n" . "Agradecemos por iniciar o processo de registro conosco!" . "\n" . "Estamos empolgados em tê-lo(a) como parte da Matching Business Online. Este e-mail contém o link para completar o seu registro. Valorizamos o seu interesse e esperamos proporcionar uma experiência fantástica." . "\n" . "Para concluir o seu registro e associá-lo(a) à empresa que enviou este link, por favor clique no link abaixo:" . "\n" . "https://visual.matchingbusiness.online/view/signup.php?taxid=" . $taxid;
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
           header("Location: ../view/profile.php");
  }     
?>