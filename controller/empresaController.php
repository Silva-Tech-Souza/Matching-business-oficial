<?php

include("../model/classes/conexao.php");

if(isset($_POST["editarPerfilempresa"])){

    include_once('../model/classes/tblEmpresas.php');

    $idEmpresa = $_POST["idempresa"];
    $nomeEmpres = $_POST["nomeempresa"];
    $redesocial = $_POST["redesocial"];
    $site = $_POST["site"];
    $country = $_POST["country"];
    $descricao = $_POST["descricao"];
    $arquivoUser = $_FILES['user-image'];
    $arquivoBanner = $_FILES['banner-image'];

    if(isset($arquivoBanner)){

        if (!file_exists("../view/assets/img/empresas/banner/$idEmpresa")) {

            mkdir("../view/assets/img/empresas/banner/$idEmpresa", 0755);

        }

        var_dump($arquivoBanner);

        $nameFile = $arquivoBanner['name'];
        $file_temp = $arquivoBanner['tmp_name'];
        $file_type = $arquivoBanner["type"];

        if ($file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/gif' || $file_type == 'image/png') {

            if($file_type =='image/jpeg'){

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.jpeg";

            }else if($file_type =='image/jpg'){

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.jpg";

            }else if($file_type =='image/png'){

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.png";

            }else {

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.gif";

            }

            $caminho = "assets/img/empresas/banner/$idEmpresa/$nomeArquivoMaisTipo";


            if (move_uploaded_file($file_temp, "../view/" . $caminho)) {
    
                $Empresas = new Empresas($dbh);
                $Empresas-> setfotobanner($caminho);
                $Empresas-> setid($idEmpresa);

                var_dump($Empresas->getfotobanner());
                var_dump($Empresas->getId());
    
                $Empresas->atualizar('fotobanner = :fotobanner WHERE  id = :id');

            }else{

                new Exception($message = "Erro ao tentar fazer o upload da imagem.");

            }

        }
    }

    if(isset($arquivoUser)){

        var_dump($arquivoUser);

        
        if (!file_exists("../view/assets/img/empresas/user/$idEmpresa")) {

            mkdir("../view/assets/img/empresas/user/$idEmpresa", 0755);

        }

        $nameFile = $arquivoUser['name'];
        $file_temp = $arquivoUser['tmp_name'];
        $file_type = $arquivoUser["type"];

        if ($file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/gif' || $file_type == 'image/png') {

            if($file_type == 'image/jpeg'){

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.jpeg";

            }else if($file_type == 'image/jpg'){

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.jpg";

            }else if($file_type == 'image/png'){

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.png";

            }else {

                $nomeArquivoMaisTipo = "EmpresaUser_$idEmpresa.gif";

            }

            $caminho = "assets/img/empresas/user/$idEmpresa/$nomeArquivoMaisTipo";


            if (move_uploaded_file($file_temp, "../view/" . $caminho)) {
                
                $empresas = new Empresas($dbh);
                $empresas-> setfotoperfil($caminho);
                $empresas-> setid($idEmpresa);
    
                $empresas->atualizar("fotoperfil = :fotoperfil WHERE  id = :id");

            }else{

                new Exception($message = "Erro ao tentar fazer o upload da imagem.");

            }

        }

    }

    $idEmpresa = $_POST["idempresa"];
    $nomeEmpres = $_POST["nomeempresa"];
    $country = $_POST["country"];

    $empresas = new Empresas($dbh);

    $empresas->setid($idEmpresa);
    $empresas->setNome($nomeEmpres);
    $empresas->setpais($country);

    $string = 'nome = :nome ,pais = :pais ';

    if(isset($_POST["redesocial"]) && $_POST["redesocial"] != ""){

        $empresas->setredesocial($_POST["redesocial"]);

        $string = $string . ',redesocial = :redesocial ';

    }else{

        $string = $string . ',redesocial = NULL ';

    }

    if(isset($_POST["site"]) && $_POST["site"] != ""){

        $empresas->setsite($_POST["site"]);

        $string = $string . ',site = :site ';

    }else{

        $string = $string . ',site = NULL ';

    }

    if(isset($_POST["descricao"]) && $_POST["descricao"] != ""){

        $empresas->setdescricao($_POST["descricao"]);

        $string = $string . ',descricao = :descricao ';

    }else{

        $string = $string . ',descricao = NULL ';

    }

    $string = $string . 'WHERE id = :id';

    $empresas->atualizar($string);

    header("Location: ../view/empresa.php");


}else if (isset($_POST["enviaremail"])) {

    include_once('../model/classes/conexao.php');
    include_once('../model/classes/tblUserClients.php');
    include_once('../model/classes/tblEmpresas.php');

    //ini_set('display_erros', 1);
    //error_reporting(E_ALL);
    $emailcolab = $_POST["emailcolab"];
    $taxid = $_POST["taxid"];

    $from = "noreplay@matchingbusiness.online";
    $to = $emailcolab;
    $subject = "Matching Business Online - Collaborator Registration";
    $message = "Prezado Usuário," . "\n" . "Agradecemos por iniciar o processo de registro conosco!" . "\n" . "Estamos empolgados em tê-lo(a) como parte da Matching Business Online. Este e-mail contém o link para completar o seu registro. Valorizamos o seu interesse e esperamos proporcionar uma experiência fantástica." . "\n" . "Para concluir o seu registro e associá-lo(a) à empresa que enviou este link, por favor clique no link abaixo:" . "\n" . "https://visual.matchingbusiness.online/view/signup.php?dixat=" . openssl_encrypt($taxid, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema" );
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    header("Location: ../view/empresa.php");

}else{

    header("Location: ../view/empresa.php");

}


?>