<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');

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

$iduser = $_SESSION["id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arquivoCompany = $_FILES['croppedImage'];
    $destination = '../' . $file['name'];


    if ($arquivoCompany != "" && $arquivoCompany != 0) {
        if (file_exists("../view/assets/img/$iduser")) {
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
            $nomeArquivoMaisTipo = "LogoPicture_$iduser." . $file_type;
            if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
              $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";
    
              $userClients = new UserClients($dbh);
    
              $userClients->setLogoPicturePath($caminho);
              $userClients->setidClient($iduser);
    
              $userClients->atualizar("LogoPicturePath = :LogoPicturePath WHERE idClient = :idClient");
              echo json_encode(['url' => $caminho]);
            }
          }
        } else {
          mkdir("../view/assets/img/$iduser", 0755);
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
            $nomeArquivoMaisTipo = "LogoPicture_$iduser." . $file_type;
            if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
              $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";
    
    
              $userClients = new UserClients($dbh);
    
              $userClients->setLogoPicturePath($caminho);
              $userClients->setidClient($iduser);
    
              $userClients->atualizar("LogoPicturePath = :LogoPicturePath WHERE idClient = :idClient");
    
              echo json_encode(['url' => $caminho]);
            }
          }
        }
      }else {
        // Ocorreu um erro ao salvar a imagem
        echo json_encode(['error' => 'Erro ao salvar a imagem.']);
    }
} else {
    // Método de requisição inválido
    echo json_encode(['error' => 'Método de requisição inválido.']);
}
?>