<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblFeeds.php');

date_default_timezone_set('America/Sao_Paulo');

$deletar = $_GET["deletar"];
$idfeededit = $_GET["idfeed"];
$idclienteedit =  $_GET["idcliente"];

if($deletar != "" && $deletar != null){
    if($idclienteedit  == $_SESSION["id"]){
    $feedsedit = new Feeds($dbh);
    $feedsedit->setidIdFeed($idfeededit);
    $feedsedit->setidClient($idclienteedit);
    //echo $idfeededit ."<br>".$idclienteedit ."<br>". $_SESSION["id"];
    $feedsedit->deletar(" WHERE IdFeed = :IdFeed AND idClient = :idClient");
   echo '<script>window.location.href = "../view/home.php";</script>';
    }
    
     
}else if ($_POST["post"] != "" && $deletar == null || $deletar == "") {
    $_POST["post"] = "";
    $iduser=$_SESSION["id"];
    $txtpos = $_POST["txtpos"];
    $datapost = date("Y-m-d H:i:s");
    $postphoto = $_FILES['postphoto'];
    $postphotocamera = $_FILES['postphotocamera'];
  //  print_r($postphotocamera);
   
    $postvideo = $_FILES['postvideo'];
    $postvideoconf = $_FILES['postvideo']['tmp_name'];
    $caminho = "";
    $caminho2 = "";

    if ($postphoto["name"] != "" && $postphoto["size"] != 0  ) {

        if (!file_exists("../view/assets/img/feed/$iduser")) {
            // Criar o diretório
            mkdir("../view/assets/img/feed/$iduser", 0755);
        }

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
            imagejpeg($resized_image, $target_directory2 . $nomeArquivoMaisTipo, 50);

            // Liberar a memória
            imagedestroy($image);
            imagedestroy($resized_image);

            $caminho = $target_directory . $nomeArquivoMaisTipo;
        }
    
    }else if($postphotocamera["name"] != "" && $postphotocamera["size"] != 0  ){

        if (!file_exists("../view/assets/img/feed/$iduser")) {
            // Criar o diretório
            mkdir("../view/assets/img/feed/$iduser", 0755);
        }

        $userfile = $postphotocamera['name'];
        $file_temp = $postphotocamera['tmp_name'];

        $fileType = $postphotocamera["type"];

        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png') {
            // Tipo de arquivo não suportado
        } else {

            if($fileType == 'image/jpg'){
                $extensao = ".jpg";
            }else if($fileType == 'image/jpeg'){
                $extensao = ".jpeg";
            }else if($fileType == 'image/png'){
                $extensao = ".png";
            }

            // Diretório para salvar a imagem compactada
            $target_directory = "assets/img/feed/$iduser/";
            $target_directory2 = "../view/assets/img/feed/$iduser/";
            // Nome do arquivo de destino
            $datapostimg = str_replace(":", "", $datapost);
            $datapostimg = str_replace(" ", "", $datapostimg);
            $nomeArquivoMaisTipo = "Post_" . $iduser . "_" .md5(uniqid()) . $extensao;

            // Compactar a imagem usando GD
            $image = imagecreatefromstring(file_get_contents($file_temp));
            //var_dump($image);
            $largura = imagesx($image);
            $altura = imagesy($image);
            $width = $largura; // Largura desejada
            $height = $altura; // Altura desejada
            $resized_image = imagescale($image, $width, $height);

            $exif = exif_read_data($file_temp);
           // var_dump($exif);

            if (!empty($exif['Orientation'])) {
                
                $original = $resized_image;

                $new = $target_directory2 . $nomeArquivoMaisTipo;
    
                switch($exif['Orientation']) {
                    case 8:
                        $new_photo = imagerotate($original,90,0);
                        imagejpeg($new_photo, $new, 50); 
                        imagedestroy($original);
                        imagedestroy($new_photo);
                       // echo "caso 8";
                        break;
                    case 1:
                        $new_photo = imagerotate($original,0,0);
                        imagejpeg($new_photo, $new, 50); 
                        imagedestroy($original);
                        imagedestroy($new_photo);
                       // echo "caso 8";
                        break;
                    case 3:
                        $new_photo = imagerotate($original,180,0);
                        imagejpeg($new_photo, $new,50); 
                        imagedestroy($original);
                        imagedestroy($new_photo);
                       // echo "caso 3";
                        break;
                    case 6:
                        $new_photo = imagerotate($original,-90,0);
                        imagejpeg($new_photo, $new,50); 
                        imagedestroy($original);
                        imagedestroy($new_photo);
                     //   echo "caso 6";
                        break;
                }
    
            }else{

                // Salvar a imagem compactada
                imagejpeg($resized_image, $target_directory2 . $nomeArquivoMaisTipo, 50);

                // Liberar a memória
                imagedestroy($image);
                imagedestroy($resized_image);

            }

            $caminho = $target_directory . $nomeArquivoMaisTipo;

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
 
    $feeds = new Feeds($dbh);
    $feeds->setidClient($iduser);
    $feeds->setTitle($txtpos);
    $feeds->setText($txtpos);
    $feeds->setImage($caminho);
    $feeds->setVideo($caminho2);
    $feeds->cadastrar();

    include_once("../model/classes/tblUserClients.php");
    
    $user = new UserClients($dbh);
    $user->setidClient($_SESSION["id"]);
    $user->setPontos(500);
    $user->atualizar("Pontos = Pontos + :Pontos WHERE idClient = :idClient");
    //echo"TEste1";
   echo '<script>window.location.href = "../view/home.php";</script>';
}else{
   echo '<script>window.location.href = "../view/home.php";</script>';
}