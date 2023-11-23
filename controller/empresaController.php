<?php

include_once("../model/classes/conexao.php");
include_once('../model/classes/tblEmpresas.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
  session_start();

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}else{

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}

if(isset($_POST["editarPerfilempresa"])){
    $idempresa = $_POST["idempresa"];
    $arquivoUser = $_FILES['user-image'];
    $arquivoCompany = $_FILES['banner-image'];
  
  
    if ($arquivoUser != "" && $arquivoUser != 0) {
      if (file_exists("../view/assets/img/$idempresa")) {
        $userfile = $arquivoUser['name'];
        $file_temp = $arquivoUser['tmp_name'];
  
        $file_type = $userfile;
        $file_type_length = strlen($file_type) - 3;
        $file_type = substr($file_type, $file_type_length);
  
        $file_type = strtolower($file_type);
        if ($file_type == 'peg') {
          $file_type = 'jpeg';
        }
        if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'gif' and $file_type != 'png') {
        } else {
          $nomeArquivoMaisTipo = "PersonalUser_$idempresa." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$idempresa/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$idempresa/$nomeArquivoMaisTipo";
  
            $empresaDados = new Empresas($dbh);
            $empresaDados->setId($idempresa);
            $empresaDados->setfotoperfil($caminho);
            $results = $empresaDados->atualizar(" fotoperfil = :fotoperfil WHERE id = :id");
          }
        }
      } else {
        mkdir("../view/assets/img/$idempresa", 0755);
        $userfile = $arquivoUser['name'];
        $file_temp = $arquivoUser['tmp_name'];
  
        $file_type = $userfile;
        $file_type_length = strlen($file_type) - 3;
        $file_type = substr($file_type, $file_type_length);
  
        $file_type = strtolower($file_type);
  
        if ($file_type == 'peg') {
          $file_type = 'jpeg';
        }
        if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'gif' and $file_type != 'png') {
        } else {
          $nomeArquivoMaisTipo = "PersonalUser_$idempresa." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$idempresa/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$idempresa/$nomeArquivoMaisTipo";
  
            $empresaDados = new Empresas($dbh);
            $empresaDados->setId($idempresa);
            $empresaDados->setfotoperfil($caminho);
            $results = $empresaDados->atualizar(" fotoperfil = :fotoperfil WHERE id = :id");
          }
        }
      }
    }
  
    if ($arquivoCompany != "" && $arquivoCompany != 0) {
      if (file_exists("../view/assets/img/$idempresa")) {
        $userfile = $arquivoCompany['name'];
        $file_temp = $arquivoCompany['tmp_name'];
  
        $file_type = $userfile;
        $file_type_length = strlen($file_type) - 3;
        $file_type = substr($file_type, $file_type_length);
  
        $file_type = strtolower($file_type);
  
        if ($file_type == 'peg') {
          $file_type = 'jpeg';
        }
        if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'gif' and $file_type != 'png') {
        } else {
          $nomeArquivoMaisTipo = "LogoPicture_$idempresa." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$idempresa/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$idempresa/$nomeArquivoMaisTipo";
  
            $empresaDados = new Empresas($dbh);
            $empresaDados->setId($idempresa);
            $empresaDados->setfotobanner($caminho);
            $results = $empresaDados->atualizar(" fotobanner = :fotobanner WHERE id = :id");
          }
        }
      } else {
        mkdir("../view/assets/img/$idempresa", 0755);
        $userfile = $arquivoCompany['name'];
        $file_temp = $arquivoCompany['tmp_name'];
  
        $file_type = $userfile;
        $file_type_length = strlen($file_type) - 3;
        $file_type = substr($file_type, $file_type_length);
  
        $file_type = strtolower($file_type);
  
  
        if ($file_type == 'peg') {
          $file_type = 'jpeg';
        }
        if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'gif' and $file_type != 'png') {
        } else {
          $nomeArquivoMaisTipo = "LogoPicture_$idempresa." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$idempresa/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$idempresa/$nomeArquivoMaisTipo";
            $empresaDados = new Empresas($dbh);
            $empresaDados->setId($idempresa);
            $empresaDados->setfotobanner($caminho);
            $results = $empresaDados->atualizar(" fotobanner = :fotobanner WHERE id = :id");
          }
        }
      }
    }
  
    $nomeempresa = $_POST["nomeempresa"];
    $redesocial = $_POST["redesocial"];
    $site = $_POST["site"];
    $country = $_POST["country"];
    $descricao = $_POST["descricao"];
  
    $empresaDados = new Empresas($dbh);
    $empresaDados->setId($idempresa);
    $empresaDados->setNome($nomeempresa);
    $empresaDados->setredesocial($redesocial);
    $empresaDados->setsite($site);
    $empresaDados->setdescricao($descricao);
    $empresaDados->setpais($country);
    $results = $empresaDados->atualizar(" nome = :nome, redesocial = :redesocial, site = :site, descricao = :descricao, pais = :pais WHERE id = :id");
    header("Location: ../view/empresa.php");

}else if (isset($_POST["enviaremail"])) {

    $email = $_POST["emailcolab"];
    $qtdcolab = $_POST["qtdcolab"];
    $nomeempresa = $_POST["nomeempresa"];

    $from = "noreplay@matchingbusiness.online";
    $to = $emailcolab;
    $subject = "Matching Business Online - Collaborator Registration";
    $message = "Dear User,"
    . "\n" . 
   "It is with great pleasure that we welcome you to ". $nomeempresa."! We are delighted to have you as part of our team and confident that together we will achieve great accomplishments." 
    . "\n" . 
   "To get started, we kindly request you to complete your registration in the Matching Business Official system. This will help us ensure that you have access to all the necessary tools and resources to perform your duties to the best of your ability."
     . "\n".
   "Please click on the link below to initiate the registration process:" 
     . "\n".
   "https://visual.matchingbusiness.online/view/cadastrarCoolab.php?email=".urlencode($email)."&dixat=".urlencode(openssl_encrypt($taxid, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema" ))."&balocdtq=".urlencode(openssl_encrypt($qtdcolab, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema" ));
    
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    header("Location: ../view/empresa.php");

}else{

  header('Location: ../view/login.php');

}


?>