<?php

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}
if (!isset($_SESSION["id"])) {
    header("Location: ../view/login.php");
}


 $from = "noreplay@matchingbusiness.online";
            $to = "llucas.silva2231@gmail.com";
            $subject = "Matching Business Online - Confirmation Link";
             $message = "Dear User,"
   . "\r\n" . 
  "It is with great pleasure that we welcome you to ". $nomeempresa."! We are delighted to have you as part of our team and confident that together we will achieve great accomplishments." 
   . "\r\n" . 
  "To get started, we kindly request you to complete your registration in the Matching Business Official system. This will help us ensure that you have access to all the necessary tools and resources to perform your duties to the best of your ability."
    . "\r\n".
  "Please click on the link below to initiate the registration process:" 
    . "\r\n".
     "https://visual.matchingbusiness.online/view/cadastrarCoolab.php?email=".urlencode($email)."&dixat=".urlencode(openssl_encrypt($taxid, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema" ))."&balocdtq=".urlencode(openssl_encrypt($qtdcolab, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema" )) . "\r\n";
    $headers = "From:" . $from;
            $headers  .= 'MIME-Version: Matching Business Online' . "\r\n";
            $headers  .= 'Reply-To:'. $from . "\r\n";
           $headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
           if(mail($to, $subject, $message, $headers)){
                 echo "Sucesso ao enviar o e-mail."; 
            } else {
                echo "Erro ao enviar o e-mail.";
            }

?>