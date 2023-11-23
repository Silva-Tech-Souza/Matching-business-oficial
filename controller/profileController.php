<?php

include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');
include_once('../model/classes/tblProductPictures.php');
include_once('../model/classes/tblProducts.php');
include_once("../model/classes/tblBusiness.php");
include_once('../model/classes/tblcertificado.php');
include_once('../model/classes/tblCertificadoImg.php');
include_once('../model/classes/tblConect.php');
include_once('../model/classes/tblEmpresas.php');
include_once('../model/classes/tblSearchProfile_Results.php');

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


if (isset($_POST["AdicionarProdutos"])) {
  $POSTnomeproduto = $_POST["nomeproduto"];
  $POSTdescricao = $_POST["descricao"];



  $userClients = new UserClients($dbh);

  $userClients->setidClient($iduser);

  $resultsClient = $userClients->consulta("WHERE idClient = :idClient");

  foreach ($resultsClient as $resultsClientUnid) {

    $corebusiness = $resultsClientUnid->CoreBusinessId;
    $satBusinessId = $resultsClientUnid->SatBusinessId;
  }

  //$sqlprodutos = "INSERT INTO tblProducts(idClient, idBusinessCategory, ProductName, ProdcuctDescription, ProdcuctEspecification, flagExcluido, Category) VALUES (:idClient, :idBusinessCategory, :ProductName, :ProdcuctDescription, :ProdcuctEspecification, '0', :Category)";
  //$queryprodutos = $dbh->prepare($sqlprodutos);
  //$queryprodutos->bindParam(':idClient', $iduser, PDO::PARAM_INT);
  //$queryprodutos->bindParam(':idBusinessCategory', $corebusiness, PDO::PARAM_INT);
  //$queryprodutos->bindParam(':ProductName', $POSTnomeproduto, PDO::PARAM_STR);
  //$queryprodutos->bindParam(':ProdcuctDescription', $POSTdescricao, PDO::PARAM_STR);
  //$queryprodutos->bindParam(':ProdcuctEspecification', $POSTspecification, PDO::PARAM_STR);
  //$queryprodutos->bindParam(':Category', $satBusinessId, PDO::PARAM_INT);
  //$queryprodutos->execute();

  
  $Produtos = new Products($dbh);

  $Produtos->setidClient($iduser);
  $Produtos->setidBusinessCategory($corebusiness);
  $Produtos->setProductName($POSTnomeproduto);
  $Produtos->setProdcuctDescription($POSTdescricao);
  if (isset($_POST["specification"]) && $_POST["specification"] != null) {

    $Produtos->setProdcuctEspecification($_POST["specification"]);
  } else {

    $Produtos->setProdcuctEspecification('.');
  }
  $Produtos->setCategory($satBusinessId);
  $Produtos->setflagExcluido('0');

  $lastInsertedId = $Produtos->cadastrar();




  $total = count($_FILES['user-produto']['name']);

  for ($num = 0; $num < $total; $num++) {

    $arquivoUser = $_FILES['user-produto'];

    if ($arquivoUser != "" && $arquivoUser != 0) {

      if (file_exists("../view/assets/img/$iduser")) {
        $userfile = $arquivoUser['name'][$num];
        $file_temp = $arquivoUser['tmp_name'][$num];

        $file_type = $userfile;
        $file_type_length = strlen($file_type) - 3;
        $file_type = substr($file_type, $file_type_length);

        $file_type = strtolower($file_type);
        if ($file_type == 'peg') {
          $file_type = 'jpeg';
        }
        if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'gif' and $file_type != 'png') {
        } else {
          $nomeArquivoMaisTipo = "Produto_" . $lastInsertedId . "_" . $iduser . "_" . $num . "." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";

            

            $ProductPictures = new ProductPictures($dbh);

            $ProductPictures->settblProductPicturePath($caminho);
            $ProductPictures->setidProduct($lastInsertedId);

            $ProductPictures->cadastrar();

            //$sqlupimg = "INSERT INTO tblProductPictures(idProduct, tblProductPicturePath) VALUES (:idProduct, :tblProductPicturePath)";
            //$queryupimg = $dbh->prepare($sqlupimg);
            //$queryupimg->bindParam(':tblProductPicturePath', $caminho, PDO::PARAM_STR);
            //$queryupimg->bindParam(':idProduct', $lastInsertedId, PDO::PARAM_INT);
            //$queryupimg->execute();

          }
        }
      } else {
        mkdir("../view/assets/img/$iduser", 0755);
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
          $nomeArquivoMaisTipo = "Produto_" . $lastInsertedId . "_" . $iduser . "_" . $num . "." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";

            

            $ProductPictures = new ProductPictures($dbh);

            $ProductPictures->settblProductPicturePath($caminho);
            $ProductPictures->setidProduct($lastInsertedId);

            $ProductPictures->cadastrar();

            //$sqlupimg = "INSERT INTO tblProductPictures(idProduct, tblProductPicturePath) VALUES (:idProduct, :tblProductPicturePath)";
            //$queryupimg = $dbh->prepare($sqlupimg);
            //$queryupimg->bindParam(':tblProductPicturePath', $caminho, PDO::PARAM_STR);
            //$queryupimg->bindParam(':idProduct', $lastInsertedId, PDO::PARAM_INT);
            //$queryupimg->execute();
          }
        }
      }
    }
  }


  $_POST["AdicionarProdutos"] = "";

  
  $user = new UserClients($dbh);
  $user->setidClient($_SESSION["id"]);
  $user->setPontos(1000);
  $user->atualizar("Pontos = Pontos + :Pontos WHERE idClient = :idClient");

  header("Location: ../view/profile.php");
} else if (isset($_POST["editarPerfil"])) {
  




  $_POST["editarPerfil"] = "";
  $POSTFirstName = $_POST["nome"];
  $POSTLastName = $_POST["lastname"];
  $POSTJobTitle = $_POST["jobtitle"];
  $POSTCompanyName = $_POST["conpany"];
  $POSTdescricao = $_POST["descricao"];

  $CoreBusinessIdpost = $_POST["coreBusiness"];

  if ($_POST["coreBusiness"] >= 6) {

    

    $operation = new Business($dbh);

    $operation->setidOperation($CoreBusinessIdpost);
    $resultOperation = $operation->consulta('WHERE IdOperation = :IdOperation');

    if ($resultOperation != null) {

      foreach ($resultOperation as $resultOperationUNID) {

        $_POST["satellite"] = $resultOperationUNID->idBusiness;
      }
    }
  }

  $userClients = new UserClients($dbh);
  $userClients->setidClient($iduser);
  $userClients->setFirstName($POSTFirstName);
  $userClients->setLastName($POSTLastName);
  $userClients->setJobTitle($POSTJobTitle);

  $userClients->setCompanyName($POSTCompanyName);
  $userClients->setdescricao($POSTdescricao);
  $userClients->setCoreBusinessId($CoreBusinessIdpost);

  if (isset($_POST["satellite"])) {
    $userClients->setSatBusinessId($_POST["satellite"]);
  }
  if (isset($_POST["category"])) {
    $userClients->setIdOperation($_POST["category"]);
  }

  if ($POSTdescricao != "") {
    if (isset($_POST["category"])) {

      $userClients->atualizar("FirstName =:FirstName, LastName =:LastName, JobTitle = :JobTitle, CompanyName = :CompanyName, descricao = :descricao, CoreBusinessId = :CoreBusinessId, IdOperation = :IdOperation, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
    } else {

      $userClients->atualizar("FirstName =:FirstName, LastName =:LastName, JobTitle = :JobTitle, CompanyName = :CompanyName, descricao = :descricao, CoreBusinessId = :CoreBusinessId, IdOperation = NULL, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
    }
  } else {

    $userClients->setdescricao(null);

    if (isset($_POST["category"])) {

      $userClients->atualizar("FirstName =:FirstName, LastName =:LastName, JobTitle = :JobTitle, CompanyName = :CompanyName, descricao = NULL, CoreBusinessId = :CoreBusinessId, IdOperation = :IdOperation, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
    } else {

      $userClients->atualizar("FirstName =:FirstName, LastName =:LastName, JobTitle = :JobTitle, CompanyName = :CompanyName, descricao = NULL, CoreBusinessId = :CoreBusinessId, IdOperation = NULL, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
    }
  }

  if ($CoreBusinessIdpost == "3" || $CoreBusinessIdpost == "4") {
    if ($_POST["dadossistribuidor"] == null) {
      header("Location: ../view/qualidistribuidor.php");
    } else {
      header("Location: ../view/profile.php");
    }
  } else {

    header("Location: ../view/profile.php");
  }
} else if (isset($_POST["salvar"])) {
  
  $arquivoUser = $_FILES['user-image'];
  $arquivoCompany = $_FILES['banner-image'];

  if ($arquivoUser != "" && $arquivoUser != 0) {
    if (file_exists("../view/assets/img/$iduser")) {
      $userfile = $arquivoUser['name'];
      $file_temp = $arquivoUser['tmp_name'];

      $file_type = $userfile;
      $file_type_length = strlen($file_type) - 3;
      $file_type = substr($file_type, $file_type_length);

      $file_type = strtolower($file_type);
      if ($file_type == 'peg') {
        $file_type = 'jpeg';
      }
      if ($file_type != 'peg' && $file_type != 'jpg' && $file_type != 'gif' && $file_type != 'png') {
      } else {
        $nomeArquivoMaisTipo = "PersonalUser_$iduser." . $file_type;
        if (move_uploaded_file($file_temp, "assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
          $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";

          

          $userClients = new UserClients($dbh);

          $userClients->setPersonalUserPicturePath($caminho);
          $userClients->setidClient($iduser);

          $userClients->atualizar("PersonalUserPicturePath = :PersonalUserPicturePath WHERE idClient = :idClient");

          //$sqlupimg = "UPDATE tblUserClients SET PersonalUserPicturePath = :PersonalUserPicturePath WHERE idClient = :idClient";
          //$queryupimg = $dbh->prepare($sqlupimg);
          //$queryupimg->bindParam(':PersonalUserPicturePath', $caminho, PDO::PARAM_STR);
          //$queryupimg->bindParam(':idClient', $iduser, PDO::PARAM_INT);
          //$queryupimg->execute();

        }
      }
    } else {
      mkdir("../view/assets/img/$iduser", 0755);
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
        $nomeArquivoMaisTipo = "PersonalUser_$iduser." . $file_type;
        if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
          $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";
          //$sqlupimg = "UPDATE tblUserClients SET PersonalUserPicturePath = :PersonalUserPicturePath WHERE idClient = :idClient";
          //$queryupimg = $dbh->prepare($sqlupimg);
          //$queryupimg->bindParam(':PersonalUserPicturePath', $caminho, PDO::PARAM_STR);
          //$queryupimg->bindParam(':idClient', $iduser, PDO::PARAM_INT);
          //$queryupimg->execute();

          

          $userClients = new UserClients($dbh);

          $userClients->setPersonalUserPicturePath($caminho);
          $userClients->setidClient($iduser);

          $userClients->atualizar("PersonalUserPicturePath = :PersonalUserPicturePath WHERE idClient = :idClient");
        }
      }
    }
  }
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

          //$sqlupimg = "UPDATE tblUserClients SET LogoPicturePath = :LogoPicturePath WHERE idClient = :idClient";
          //$queryupimg = $dbh->prepare($sqlupimg);
          //$queryupimg->bindParam(':LogoPicturePath', $caminho, PDO::PARAM_STR);
          //$queryupimg->bindParam(':idClient', $iduser, PDO::PARAM_INT);
          //$queryupimg->execute();          

          

          $userClients = new UserClients($dbh);

          $userClients->setLogoPicturePath($caminho);
          $userClients->setidClient($iduser);

          $userClients->atualizar("LogoPicturePath = :LogoPicturePath WHERE idClient = :idClient");
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

          //$sqlupimg = "UPDATE tblUserClients SET LogoPicturePath = :LogoPicturePath WHERE idClient = :idClient";
          //$queryupimg = $dbh->prepare($sqlupimg);
          //$queryupimg->bindParam(':LogoPicturePath', $caminho, PDO::PARAM_STR);
          //$queryupimg->bindParam(':idClient', $iduser, PDO::PARAM_INT);
          //$queryupimg->execute();
        }
      }
    }
  }
  $_POST["salvar"] = "";

  
  $user = new UserClients($dbh);
  $user->setidClient($_SESSION["id"]);
  $user->setPontos(200);
  $user->atualizar("Pontos = Pontos + :Pontos WHERE idClient = :idClient");
  header("Location: ../view/profile.php");
} else if (isset($_POST["addcertificado"])) {
  $titulocartificado = $_POST["titulocartificado"];
  $POSTdescricao = $_POST["descricao"];

  
  $certificado = new Certificado($dbh);
  $certificado->setIduser($iduser);
  $certificado->setTitulo($titulocartificado);
  $certificado->setDescricao($POSTdescricao);
  $lastInsertedId = $certificado->cadastrar();


  $total = count($_FILES['user-certificado']['name']);

  for ($num = 0; $num < $total; $num++) {

    $arquivoUser = $_FILES['user-certificado'];

    if ($arquivoUser != "" && $arquivoUser != 0) {

      if (file_exists("../view/assets/img/$iduser")) {
        $userfile = $arquivoUser['name'][$num];
        $file_temp = $arquivoUser['tmp_name'][$num];

        $file_type = $userfile;
        $file_type_length = strlen($file_type) - 3;
        $file_type = substr($file_type, $file_type_length);

        $file_type = strtolower($file_type);
        if ($file_type == 'peg') {
          $file_type = 'jpeg';
        }
        if ($file_type != 'peg' and $file_type != 'jpg' and $file_type != 'gif' and $file_type != 'png') {
        } else {
          $nomeArquivoMaisTipo = "Certificado_" . $iduser . "_" . $num . "." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";

            
            $ProductPictures = new CertiPicture($dbh);
            $ProductPictures->setCaminho($caminho);
            $ProductPictures->setIdCertificado($lastInsertedId);
            $ProductPictures->cadastrar();
          

          }
        }
      } else {
        mkdir("../view/assets/img/$iduser", 0755);
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
          $nomeArquivoMaisTipo = "Certificado_" . $iduser . "_" . $num . "." . $file_type;
          if (move_uploaded_file($file_temp, "../view/assets/img/$iduser/" . $nomeArquivoMaisTipo)) {
            $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";

            
            $ProductPictures = new CertiPicture($dbh);
            $ProductPictures->setCaminho($caminho);
            $ProductPictures->setIdCertificado($lastInsertedId);
            $ProductPictures->cadastrar();
          
          
          }
        }
      }
    }
  }

  header("Location: ../view/profile.php");
}else if (isset($_POST["deletecertificado"])) {
  $idproduto = $_POST["idproduto"];
  
  $certificado = new Certificado($dbh);
  $certificado->setId($idproduto);
  $certificado->deletar("WHERE id = :id");
  header("Location: ../view/profile.php");
}
 else if (isset($_POST["deleteproduto"])) {

  $idproduto = $_POST["idproduto"];
  $_POST["deleteproduto"] = "";

  

  $Product = new Products($dbh);

  $Product->setidProduct($idproduto);

  $Product->deletar('WHERE idProduct = :idProduct');

  //$sqldelete = "DELETE FROM tblProducts WHERE idProduct = :idProduct";
  //$querydelete = $dbh->prepare($sqldelete);
  //$querydelete->bindParam(':idProduct', $idproduto, PDO::PARAM_INT);
  //$querydelete->execute();
  header("Location: ../view/profile.php");
} else if (isset($_POST["updatecertificado"])) {
  $idproduto = $_POST["idproduto"];
  $nomeproduto = $_POST["nomeproduto"];
  $descricao = $_POST["descricao"];

   
  $certificado = new Certificado($dbh);
  $certificado->setTitulo($nomeproduto);
  $certificado->setDescricao($descricao);
  $certificado->setId($idproduto);
  $lastInsertedId = $certificado->atualizar(" titulo = :titulo, descricao = :descricao WHERE id = :id");


  $total = count($_FILES['imgproduto']['name']);
  if ($_FILES['imgproduto']['name'][0] != "") {
    
    $ProductPictures = new CertiPicture($dbh);
    $ProductPictures->setIdCertificado($idproduto);
    $ProductPictures->deletar("WHERE idcertificado = :idcertificado");
  }

  for ($num = 0; $num < $total; $num++) {

    if (isset($_FILES['imgproduto'])) {

      if (!file_exists("../view/assets/img/$iduser")) {

        mkdir("../view/assets/img/$iduser", 0755);
      }

      $nameFile = $_FILES['imgproduto']['name'][$num];
      $file_temp = $_FILES['imgproduto']['tmp_name'][$num];
      $file_type = $_FILES['imgproduto']["type"][$num];

      if ($file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/gif' || $file_type == 'image/png') {

        if ($file_type == 'image/jpeg') {

          $nomeArquivoMaisTipo = "Certificado_" . $idproduto . "_" . $iduser . "_" . $num . ".jpeg";
        } else if ($file_type == 'image/jpg') {

          $nomeArquivoMaisTipo = "Certificado_" . $idproduto . "_" . $iduser . "_" . $num . ".jpg";
        } else if ($file_type == 'image/png') {

          $nomeArquivoMaisTipo = "Certificado_" . $idproduto . "_" . $iduser . "_" . $num . ".png";
        } else {

          $nomeArquivoMaisTipo = "Certificado_" . $idproduto . "_" . $iduser . "_" . $num . ".gif";
        }

        $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";


        if (move_uploaded_file($file_temp, "../view/" . $caminho)) {

          
          $ProductPictures = new CertiPicture($dbh);
          $ProductPictures->setCaminho($caminho);
          $ProductPictures->setIdCertificado($idproduto);
          $ProductPictures->cadastrar(" caminho = :caminho WHERE idcertificado = :idcertificado");
        } else {

          new Exception($message = "Erro ao tentar fazer o upload da imagem.");
        }
      }
    }
  }


  header("Location: ../view/profile.php");
}else if (isset($_POST["updateproduto"])) {
  

  $userClients = new UserClients($dbh);

  $userClients->setidClient($iduser);

  $resultsClient = $userClients->consulta("WHERE idClient = :idClient");

  foreach ($resultsClient as $resultsClientUnid) {

    $corebusiness = $resultsClientUnid->CoreBusinessId;
    $satBusinessId = $resultsClientUnid->SatBusinessId;
  }

  $idproduto = $_POST["idproduto"];
  $nomeproduto = $_POST["nomeproduto"];
  $descricao = $_POST["descricao"];
  $specification = $_POST["specification"];

  $_POST["updateproduto"] = "";
  //$sqlprodutos = "UPDATE tblproducts SET idBusinessCategory = :idBusinessCategory, ProductName= :ProductName,ProdcuctDescription = :ProdcuctDescription,ProdcuctEspecification=:ProdcuctEspecification,Category = :Category WHERE idProduct = :idProduct ";
  //$queryprodutos = $dbh->prepare($sqlprodutos);
  //$queryprodutos->bindParam(':idProduct', $idproduto, PDO::PARAM_INT);
  //$queryprodutos->bindParam(':idBusinessCategory', $satBusinessId, PDO::PARAM_INT);
  //$queryprodutos->bindParam(':ProductName', $nomeproduto, PDO::PARAM_STR);
  //$queryprodutos->bindParam(':ProdcuctDescription', $descricao, PDO::PARAM_STR);
  //$queryprodutos->bindParam(':ProdcuctEspecification', $specification, PDO::PARAM_STR);
  //$queryprodutos->bindParam(':Category', $CoreBusinessIdpost, PDO::PARAM_INT);
  //$queryprodutos->execute();



  $Product = new Products($dbh);

  if (isset($_POST["specification"]) && $_POST["specification"] != null) {

    $Product->setidProduct($idproduto);
    $Product->setidBusinessCategory($satBusinessId);
    $Product->setProductName($nomeproduto);
    $Product->setProdcuctDescription($descricao);
    $Product->setProdcuctEspecification($specification);
    $Product->setCategory($corebusiness);

    $Product->atualizar("idBusinessCategory = :idBusinessCategory, ProductName= :ProductName,ProdcuctDescription = :ProdcuctDescription,ProdcuctEspecification=:ProdcuctEspecification,Category = :Category WHERE idProduct = :idProduct ");
  } else {

    $Product->setidProduct($idproduto);
    $Product->setidBusinessCategory($satBusinessId);
    $Product->setProductName($nomeproduto);
    $Product->setProdcuctDescription($descricao);
    $Product->setCategory($corebusiness);

    $Product->atualizar('idBusinessCategory = :idBusinessCategory, ProductName= :ProductName,ProdcuctDescription = :ProdcuctDescription,ProdcuctEspecification= "" ,Category = :Category WHERE idProduct = :idProduct ');
  }
  $total = count($_FILES['imgproduto']['name']);


  if ($_FILES['imgproduto']['name'][0] != "") {

    

    $ProductPictures = new ProductPictures($dbh);
    $ProductPictures->setidProduct($idproduto);

    $ProductPictures->deletar("WHERE idProduct  = :idProduct");
  }

  for ($num = 0; $num < $total; $num++) {

    if (isset($_FILES['imgproduto'])) {

      if (!file_exists("../view/assets/img/$iduser")) {

        mkdir("../view/assets/img/$iduser", 0755);
      }

      $nameFile = $_FILES['imgproduto']['name'][$num];
      $file_temp = $_FILES['imgproduto']['tmp_name'][$num];
      $file_type = $_FILES['imgproduto']["type"][$num];

      if ($file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/gif' || $file_type == 'image/png') {

        if ($file_type == 'image/jpeg') {

          $nomeArquivoMaisTipo = "Produto_" . $idproduto . "_" . $iduser . "_" . $num . ".jpeg";
        } else if ($file_type == 'image/jpg') {

          $nomeArquivoMaisTipo = "Produto_" . $idproduto . "_" . $iduser . "_" . $num . ".jpg";
        } else if ($file_type == 'image/png') {

          $nomeArquivoMaisTipo = "Produto_" . $idproduto . "_" . $iduser . "_" . $num . ".png";
        } else {

          $nomeArquivoMaisTipo = "Produto_" . $idproduto . "_" . $iduser . "_" . $num . ".gif";
        }

        $caminho = "assets/img/$iduser/$nomeArquivoMaisTipo";


        if (move_uploaded_file($file_temp, "../view/" . $caminho)) {

          

          $ProductPictures = new ProductPictures($dbh);

          $ProductPictures->settblProductPicturePath($caminho);
          $ProductPictures->setidProduct($idproduto);

          $ProductPictures->cadastrar();
        } else {

          new Exception($message = "Erro ao tentar fazer o upload da imagem.");
        }
      }
    }
  }

  header("Location: ../view/profile.php");
} else if (isset($_POST["conectar"])) {
  
  $idconect = $_POST["idconectar"];
  $idperfilpedido = $_POST["idperfilpedido"];

  //$sqlconectup = "UPDATE tblconect SET status = '1' WHERE id  = :id ";
  //$queryconectup = $dbh->prepare($sqlconectup);
  //$queryconectup->bindParam(':id', $idconect, PDO::PARAM_INT);
  //$queryconectup->execute();


  $conect = new Conect($dbh);

  $conect->setid($idconect);
  $conect->setstatus('1');

  $conect->atualizar("status = :status WHERE id = :id ");


  //$sqlinsertpost = "INSERT INTO tblsearchprofile_results (idUsuario, idClienteEncontrado, idTipoNotif) VALUES (:idUsuario, :idClienteEncontrado, '6')";
  //$queryinsertpost = $dbh->prepare($sqlinsertpost);
  //$queryinsertpost->bindParam(':idUsuario', $iduser, PDO::PARAM_INT);
  //$queryinsertpost->bindParam(':idClienteEncontrado', $idperfilpedido, PDO::PARAM_INT);
  //$queryinsertpost->execute();


  $tblsearchprofile_results = new SearchProfile_Results($dbh);

  $tblsearchprofile_results->setidUsuario($iduser);
  $tblsearchprofile_results->setidClienteEncontrado($idperfilpedido);
  $tblsearchprofile_results->setidTipoNotif('8');
  $tblsearchprofile_results->setestadoNotif('0');
  $tblsearchprofile_results->setpostId('0');
  $tblsearchprofile_results->seturl("viewProfile.php?profile=" . $iduser);

  $tblsearchprofile_results->cadastrar();


  $user = new UserClients($dbh);
  $user->setidClient($_SESSION["id"]);
  $user->setPontos(1000);
  $user->atualizar("Pontos = Pontos + :Pontos WHERE idClient = :idClient");

  header("Location: ../view/viewProfile.php?profile=$iduser");
} else if (isset($_POST["desconectar"])) {

  $idconect = $_POST["idconectar"];
  $idperfilpedido = $_POST["idperfilpedido"];


  $conect = new Conect($dbh);

  $conect->setid($idconect);

  $conect->deletar("WHERE  id = :id");

  //$sqlconectdelet = "DELETE FROM tblconect WHERE  id = :id";
  //$queryconectdelet = $dbh->prepare($sqlconectdelet);
  //$queryconectdelet->bindParam(':id', $idconect, PDO::PARAM_INT);
  //$queryconectdelet->execute();

  $user = new UserClients($dbh);
  $user->setidClient($_SESSION["id"]);
  $user->setPontos(500);
  $user->atualizar("Pontos = Pontos - :Pontos WHERE idClient = :idClient");

  header("Location: ../view/profile.php");
} else if (isset($_POST["enviaremail"])) {

  $email = $_POST["emailcolab"];
  $qtdcolab = $_POST["qtdcolab"];
  $nomeempresa = $_POST["nomeempresa"];
  $taxid = $_POST["taxid"];
  $codigoCadastroIncompleto = urlencode($email);
  ini_set('display_erros', 1);
  error_reporting(E_ALL);
  $from = "noreplay@matchingbusiness.online";
  $to = $email;
  $subject = "Matching Business Online - Confirmation Link"; //"Matching Business Online - Confirmation Link";
  $message = "Dear User,"
    . "\r\n" .
    "It is with great pleasure that we welcome you to " . $nomeempresa . "! We are delighted to have you as part of our team and confident that together we will achieve great accomplishments."
    . "\r\n" .
    "To get started, we kindly request you to complete your registration in the Matching Business Official system. This will help us ensure that you have access to all the necessary tools and resources to perform your duties to the best of your ability."
    . "\r\n" .
    "Please click on the link below to initiate the registration process:"
    . "\r\n" .
    "https://visual.matchingbusiness.online/view/cadastrarCoolab.php?email=" . urlencode($email) . "&dixat=" . urlencode(openssl_encrypt($taxid, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema")) . "&balocdtq=" . urlencode(openssl_encrypt($qtdcolab, openssl_get_cipher_methods()[2], "matchingBussinessMelhorSistema")) . "\r\n";

  $headers = "From:" . $from;
  $headers  .= 'MIME-Version: Matching Business Online' . "\r\n";
  $headers  .= 'Reply-To:' . $from . "\r\n";
  $headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
  if (mail($to, $subject, $message, $headers)) {
    header("Location: ../view/empresa.php");
  } else {
    header("Location: ../view/empresa.php");
  }
} else if (isset($_POST["EditDistribuidor"])) {

  $numEmpregados = $_POST["numEmpregados"];
  $rangeValues = $_POST["rangeValues"];

  $anoFundacao = $_POST["year"];

  $nivelOperacao = $_POST["nivelOperacao"];

  $labelano1 = $_POST["labelfob1"];
  $labelano2 = $_POST["labelfob2"];
  $labelano3 = $_POST["labelfob3"];

  $Vol_1Y = $_POST["ano1"];

  $Vol_2Y = $_POST["ano2"];

  $Vol_3Y = $_POST["ano3"];

  $ano11 = $_POST["ano11"];
  $ano22 = $_POST["ano22"];
  $ano33 = $_POST["ano33"];


  $distributorProfile = new UserClients($dbh);

  $distributorProfile->setAnoFundacao($anoFundacao);
  $distributorProfile->setNumEmpregados($numEmpregados);
  $distributorProfile->setNumVendedores($rangeValues);
  $distributorProfile->setNivelOperacao($nivelOperacao);
  $distributorProfile->setidClient($iduser);

  $distributorProfile->setFob_1Y($labelano1);
  $distributorProfile->setFob_2Y($labelano2);
  $distributorProfile->setFob_3Y($labelano3);

  $distributorProfile->setFobImports_1Y($labelano1);
  $distributorProfile->setFobImports_2Y($labelano2);
  $distributorProfile->setFobImports_3Y($labelano3);

  $distributorProfile->setVol_1Y($Vol_1Y);
  $distributorProfile->setVol_2Y($Vol_2Y);
  $distributorProfile->setVol_3Y($Vol_3Y);

  $distributorProfile->setVolImports_1Y($ano11);
  $distributorProfile->setVolImports_2Y($ano22);
  $distributorProfile->setVolImports_3Y($ano33);

  $resultsdistributorProfile = $distributorProfile->atualizar("AnoFundacao = :AnoFundacao, NumEmpregados = :NumEmpregados, NumVendedores = :NumVendedores,NivelOperacao = :NivelOperacao, Fob_3Y = :Fob_3Y, Vol_3Y = :Vol_3Y, Fob_2Y = :Fob_2Y, Vol_2Y = :Vol_2Y, Fob_1Y = :Fob_1Y, Vol_1Y = :Vol_1Y, FobImports_3Y = :FobImports_3Y, VolImports_3Y = :VolImports_3Y, FobImports_2Y = :FobImports_2Y, VolImports_2Y = :VolImports_2Y, FobImports_1Y = :FobImports_1Y, VolImports_1Y= :VolImports_1Y  WHERE idClient = :idClient");
  header("Location: ../view/profile.php");
} else if (isset($_POST["editarPerfilempresa"])) {

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
} else {

  header("Location: ../view/profile.php");
}
