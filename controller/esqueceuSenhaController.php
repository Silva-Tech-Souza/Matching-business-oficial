<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');

if(isset($_POST['sendEmail'])){

    $email = $_POST['email'];

    $UserClients = new UserClients($dbh);

    $UserClients->setemail($email);
    $result = $UserClients->consulta("WHERE email = :email and idFlagStatusCadastro = 1");

    if($result != null){

        $codigoCadastroIncompleto = "4matching7" . urlencode($email) . "274bussiness5";

        $from = "noreplay@matchingbusiness.online";
        $to = $email;
        $subject = "Matching Business Online - Confirmation Link";
        $message = "Dear User," . "\n" . "Thank you for using Matching Business Online." . "\n" . "We received a request to reset your password. Please follow the link below to create a new password and regain access to your account." . "\n" . "https://visual.matchingbusiness.online/view/createPass.php?codigoCadastroIncompleto=" . $codigoCadastroIncompleto.'&alteracao=2'."\r\n" . "If you did not request this password reset, please ignore this email. Your account security is important to us." . "\n" . "Thank you for choosing Matching Business Online!";
        $headers = "From:" . $from;
        $headers  .= 'MIME-Version: Matching Business Online' . "\r\n";
        $headers  .= 'Reply-To:'. $from . "\r\n";
        $headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
        
        if(mail($to, $subject, $message, $headers)){
            header("Location: ../view/esqueceuSenha.php?emailEnviado=1");
        } else {
            header("Location: ../view/esqueceuSenha.php?emailEnviado=0");
        }
    
    }else{

        header("Location: ../view/esqueceuSenha.php?emailEnviado=0");

    }

}

?>