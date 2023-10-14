<?php

include('../model/classes/tblFeeds.php');
session_start();
date_default_timezone_set('America/Sao_Paulo');

if ($_POST["post"] != "") {
    $_POST["post"] = "";
    $iduser=$_SESSION["id"];
    $txtpos = $_POST["txtpos"];
    $datapost = date("Y-m-d H:i:s");
    $postphoto = $_FILES['postphoto'];
    $postvideo = $_FILES['postvideo'];
    $postvideoconf = $_FILES['postvideo']['tmp_name'];
    $caminho = "";
    $caminho2 = "";

    if ($postphoto != "" && $postphoto != 0) {

        if (file_exists("../view/assets/img/feed/$iduser")) {

            $userfile = $postphoto['name'];
            $file_temp = $postphoto['tmp_name'];

            // Obtendo o tipo da imagem
            $file_type = $userfile;
            $file_type_length = strlen($file_type) - 3;
            $file_type = substr($file_type, $file_type_length);
            $file_type = strtolower($file_type);
            if ($file_type == 'peg') {
                $file_type = 'jpeg';
            }

            if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'jpeg' and $file_type != 'png') {
                // Tipo de arquivo não suportado
            } else {
                // Diretório para salvar a imagem compactada
                $target_directory = "assets/img/feed/$iduser/";
                $target_directory2 = "../view/assets/img/feed/$iduser/";
                // Nome do arquivo de destino
                $datapostimg = str_replace(":", "", $datapost);
                $datapostimg = str_replace(" ", "", $datapostimg);
                $nomeArquivoMaisTipo = "Post_" . $iduser . "_" .md5(uniqid()) . ".jpeg";

                // Compactar a imagem usando GD
                $image = imagecreatefromstring(file_get_contents($file_temp));
                $largura = imagesx($image);
                $altura = imagesy($image);
                $width = $largura; // Largura desejada
                $height = $altura; // Altura desejada
                $resized_image = imagescale($image, $width, $height);

                // Salvar a imagem compactada
                imagejpeg($resized_image, $target_directory2 . $nomeArquivoMaisTipo, 25);

                // Liberar a memória
                imagedestroy($image);
                imagedestroy($resized_image);

                $caminho = $target_directory . $nomeArquivoMaisTipo;
            }
        } else {
            // Criar o diretório
            mkdir("../view/assets/img/feed/$iduser", 0755);
            $userfile = $postphoto['name'];
            $file_temp = $postphoto['tmp_name'];

            $file_type = $userfile;
            $file_type_length = strlen($file_type) - 3;
            $file_type = substr($file_type, $file_type_length);
            $file_type = strtolower($file_type);
            if ($file_type == 'peg') {
                $file_type = 'jpeg';
            }

            if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'jpeg' and $file_type != 'png') {
                // Tipo de arquivo não suportado
            } else {
                // Diretório para salvar a imagem compactada
                $target_directory = "assets/img/feed/$iduser/";
                $target_directory2 = "../view/assets/img/feed/$iduser/";
                // Nome do arquivo de destino
                $datapostimg = str_replace(":", "", $datapost);
                $datapostimg = str_replace(" ", "", $datapostimg);
                $nomeArquivoMaisTipo = "Post_" . $iduser . "_" .md5(uniqid()) . ".jpeg";

                // Compactar a imagem usando GD
                $image = imagecreatefromstring(file_get_contents($file_temp));
                $largura = imagesx($image);
                $altura = imagesy($image);
                $width = $largura; // Largura desejada
                $height = $altura; // Altura desejada
                $resized_image = imagescale($image, $width, $height);

                // Salvar a imagem compactada
                imagejpeg($resized_image, $target_directory2 . $nomeArquivoMaisTipo, 25);

                // Liberar a memória
                imagedestroy($image);
                imagedestroy($resized_image);
                $caminho = $target_directory . $nomeArquivoMaisTipo;
            }
        }
    }

    if (!empty($_FILES['postvideo']['name'])) {
        $iduser = $_SESSION['id']; // Certifique-se de ter uma sessão iniciada com o ID do usuário
    
        $target_directory = "../view/assets/img/feed/$iduser/";
        $target_directory2 = "assets/img/feed/$iduser/";
        if (!is_dir($target_directory)) {
            mkdir($target_directory, 0755, true); // Cria o diretório recursivamente se não existir
        }
    
        $videoFile = $_FILES['postvideo']['tmp_name'];
        $videoFileName = $_FILES['postvideo']['name'];
    
        // Limpa o formato da data para ser usado no nome do arquivo
        $datapostimg = str_replace([" ", ":"], "", $datapost);
    
        // Define o nome do arquivo
        $nomeArquivoMaisTipo = "Post_VIDEO_{$iduser}_{$datapostimg}.mp4";
    
        $videoFilePath = $target_directory . $nomeArquivoMaisTipo;
        $videoFilePath2 = $target_directory2 . $nomeArquivoMaisTipo;
        $caminho2 =$videoFilePath2;
        if (move_uploaded_file($videoFile, $videoFilePath)) {
          
        } else {
           
        }
    } else {
        $caminho2 ="";
        
    }
    $_POST["post"] = "";
 
    $feeds = new Feeds();
    $feeds->setidClient($iduser);
    $feeds->setTitle($txtpos);
    $feeds->setText($txtpos);
    $feeds->setImage($caminho);
    $feeds->setVideo($caminho2);
    $feeds->cadastrar();

    
    /*$user = new UserClients();
    $user->setidClient($_SESSION["id"]);
    $user->setPontos(500);
    $user->atualizar("Pontos = Pontos + :Pontos WHERE idClient = :idClient");*/
      
    header("Location: ../view/home.php");
}
