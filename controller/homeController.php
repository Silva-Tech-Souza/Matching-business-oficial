<?php

    include('../model/classes/tblFeeds.php');

    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    if ($_POST["post"] != "") {
        $_POST["post"] = "";
        $txtpos = $_POST["txtpos"];
        $datapost = date("Y-m-d H:i:s");
        $postphoto = $_FILES['postphoto'];
        $postvideo = $_FILES['postvideo'];
        $postvideoconf = $_FILES['postvideo']['tmp_name'];
        $caminho = "";
        $caminho2 = "";
    
        // Adicionar a variável $iduser com o ID do usuário
        // Substitua pelo ID do usuário, obtido de onde você armazena essa informação
    
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
                    $target_directory = "../view/assets/img/feed/$iduser/";
    
                    // Nome do arquivo de destino
                    $datapostimg = str_replace(":", "", $datapost);
                    $datapostimg = str_replace(" ", "", $datapostimg);
                    $nomeArquivoMaisTipo = "Post_" . $iduser . "_" . $datapostimg . ".jpeg";
    
                    // Compactar a imagem usando GD
                    $image = imagecreatefromstring(file_get_contents($file_temp));
                    $largura = imagesx($image);
                    $altura = imagesy($image);
                    $width = $largura; // Largura desejada
                    $height = $altura; // Altura desejada
                    $resized_image = imagescale($image, $width, $height);
    
                    // Salvar a imagem compactada
                    imagejpeg($resized_image, $target_directory . $nomeArquivoMaisTipo, 25);
    
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
    
                // Restante do código permanece igual para compactar e salvar a imagem
                // ... (mesmo código de compactação e salvamento da imagem)
    
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
                    $target_directory = "../view/assets/img/feed/$iduser/";
    
                    // Nome do arquivo de destino
                    $datapostimg = str_replace(":", "", $datapost);
                    $datapostimg = str_replace(" ", "", $datapostimg);
                    $nomeArquivoMaisTipo = "Post_" . $iduser . "_" . $datapostimg . ".jpeg";
    
                    // Compactar a imagem usando GD
                    $image = imagecreatefromstring(file_get_contents($file_temp));
                    $largura = imagesx($image);
                    $altura = imagesy($image);
                    $width = $largura; // Largura desejada
                    $height = $altura; // Altura desejada
                    $resized_image = imagescale($image, $width, $height);
    
                    // Salvar a imagem compactada
                    imagejpeg($resized_image, $target_directory . $nomeArquivoMaisTipo, 25);
    
                    // Liberar a memória
                    imagedestroy($image);
                    imagedestroy($resized_image);
    
                    $caminho = $target_directory . $nomeArquivoMaisTipo;
                }
            }
        }
    
        if ($postvideoconf != "" ) {
            if (file_exists("../view/assets/img/feed/$iduser")) {
                mkdir("../view/assets/img/feed/$iduser", 0755);
            }
            $videoFile = $_FILES['postvideo']['tmp_name'];
            $videoFileName = $_FILES['postvideo']['name'];
    
    
    
            $datapostimg = str_replace(":", "", $datapost);
            $datapostimg = str_replace(" ", "", $datapostimg);
            $nomeArquivoMaisTipo = "Post_VIDEO_" . $iduser . "_" . $datapostimg . ".mp4";
    
    
            $target_directory = "../view/assets/img/feed/$iduser/";
            $caminho2 = $target_directory . $nomeArquivoMaisTipo;
            $videoFilePath = $target_directory . $nomeArquivoMaisTipo;
    
            //$comando = "ffmpeg -i \"$videoFile\" -c:v libx264 -crf 23 -r 30 -vf \"scale=640:480\" -t 60 \"$nomeArquivoMaisTipo\"";
            //exec($comando);
            move_uploaded_file($videoFile, $videoFilePath);
            echo "Upload do vídeo realizado com sucesso.";
        } else {
            // Nenhum arquivo de vídeo foi enviado
            echo "Erro ao fazer o upload do vídeo.";
        }
    
    
            //$sqlinsertpost = "INSERT INTO tblFeeds (IdClient, Title, Text, Image, Video) VALUES (:IdClient, :Title, :Text, :Image, :Video)";
            //$queryinsertpost = $dbh->prepare($sqlinsertpost);
            //$queryinsertpost->bindParam(':IdClient', $iduser, PDO::PARAM_INT);
            //$queryinsertpost->bindParam(':Title', $idcountry, PDO::PARAM_STR);
            //$queryinsertpost->bindParam(':Text', $txtpos, PDO::PARAM_STR);
            //$queryinsertpost->bindParam(':Image', $caminho, PDO::PARAM_STR);
            //$queryinsertpost->bindParam(':Video', $caminho2, PDO::PARAM_STR);
            //$queryinsertpost->execute();

            $feeds = new Feeds();
            $feeds->setidClient($iduser);
            $feeds->setTitle($idcountry);
            $feeds->setText($txtpos);
            $feeds->setImage($caminho);
            $feeds->setVideo($caminho2);

            $feeds->cadastrar();

    
            $txtpos = "";
            header("Location: home.php");
        
    
        $_POST["post"] = "";
    }
    

?>