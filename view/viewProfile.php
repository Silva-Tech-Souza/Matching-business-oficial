<?php
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: index.php");
}

$iduser = $_GET["profile"];

$geral = $_SESSION["id"];

//$sqlgeral = "SELECT * from tblUserClients WHERE idClient = :idClient";
//$querygeral = $dbh->prepare($sqlgeral);
//$querygeral->bindParam(':idClient', $geral, PDO::PARAM_INT);
//$querygeral->execute();
//$resultsgeral = $querygeral->fetchAll(PDO::FETCH_OBJ);
//if ($querygeral->rowCount() > 0) {
//  foreach ($resultsgeral as $rowgeral) {
//    $imgperfilgeral = $rowgeral->PersonalUserPicturePath;
//  }
//}
include_once('../model/classes/tblUserClients.php');

$UserClient = new UserClients();
$UserClient->setidClient($geral);
$resultsgeral = $UserClient->consulta("WHERE idClient = :idClient");

if ($resultsgeral != null) {
  foreach ($resultsgeral as $rowgeral) {
    $imgperfilgeral = $rowgeral->PersonalUserPicturePath;
  }
}

$_SESSION["n"] = 5;
//$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
//$query = $dbh->prepare($sql);
//$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
//$query->execute();
//$results = $query->fetchAll(PDO::FETCH_OBJ);
//if ($query->rowCount() > 0) {
//  foreach ($results as $row) {
//    $username =  $row->FirstName . " " . $row->LastName;
//    $FirstName = $row->FirstName;
//    $LastName = $row->LastName;
//    $jobtitle = $row->JobTitle;
//    $idcountry = $row->idCountry;
//    $idoperation = $row->IdOperation;
//    $corebusiness = $row->CoreBusinessId;
//    $satBusinessId =  $row->SatBusinessId;
//    $companyname = $row->CompanyName;
//    $imgperfil = $row->PersonalUserPicturePath;
//    $imgcapa = $row->LogoPicturePath;
//    $descricao =  $row->descricao;
//  }
//}

$UserClient = new UserClients();
$UserClient->setidClient($iduser);
$results = $UserClient->consulta("WHERE idClient = :idClient");

if ($results != null) {
  foreach ($results as $row) {
    $username =  $row->FirstName . " " . $row->LastName;
    $FirstName = $row->FirstName;
    $LastName = $row->LastName;
    $jobtitle = $row->JobTitle;
    $idcountry = $row->idCountry;
    $idoperation = $row->IdOperation;
    $corebusiness = $row->CoreBusinessId;
    $satBusinessId =  $row->SatBusinessId;
    $companyname = $row->CompanyName;
    $imgperfil = $row->PersonalUserPicturePath;
    $imgcapa = $row->LogoPicturePath;
    $descricao =  $row->descricao;
  }
}


//$sqlCountry = "SELECT * from tblCountry WHERE idCountry = :idCountry";
//$queryCountry = $dbh->prepare($sqlCountry);
//$queryCountry->bindParam(':idCountry', $idcountry, PDO::PARAM_INT);
//$queryCountry->execute();
//$resultsCountry = $queryCountry->fetchAll(PDO::FETCH_OBJ);
//if ($queryCountry->rowCount() > 0) {
//  foreach ($resultsCountry as $rowCountry) {
//    $pais =  $rowCountry->NmCountry;
//  }
//}

include_once('../model/classes/tblCountry.php');

$Country = new Country();
$Country->setidCountry($idcountry);
$resultsCountry = $Country->consulta("WHERE idCountry = :idCountry");

if ($resultsCountry != null) {
  foreach ($resultsCountry as $rowCountry) {
    $pais =  $rowCountry->NmCountry;
  }
}

//$sqlbusiness = "SELECT * from tblOperations WHERE idOperation = :idOperation";
//$querybusiness = $dbh->prepare($sqlbusiness);
//$querybusiness->bindParam(':idOperation', $corebusiness, PDO::PARAM_INT);
//$querybusiness->execute();
//$resultsbusiness = $querybusiness->fetchAll(PDO::FETCH_OBJ);
//if ($querybusiness->rowCount() > 0) {
//  foreach ($resultsbusiness as $rowbusiness) {
//    $NmBusiness =  $rowbusiness->NmOperation;
//  }
//}

include_once('../model/classes/tblOperations.php');

$Operations = new Operations();
$Operations->setidOperation($corebusiness);
$resultsbusiness = $Operations->consulta("WHERE idOperation = :idOperation");

if ($resultsbusiness != null) {
  foreach ($resultsbusiness as $rowbusiness) {
    $NmBusiness =  $rowbusiness->NmOperation;
  }
}


//$sqlbusinesscor = "SELECT * from tblBusiness WHERE idBusiness = :idBusiness";
//$querybusinesscor = $dbh->prepare($sqlbusinesscor);
//$querybusinesscor->bindParam(':idBusiness', $satBusinessId, PDO::PARAM_INT);
//$querybusinesscor->execute();
//$resultsbusinesscor = $querybusinesscor->fetchAll(PDO::FETCH_OBJ);
//if ($querybusinesscor->rowCount() > 0) {
// foreach ($resultsbusinesscor as $rowbusinesscor) {
//    $NmBusinesscor =  $rowbusinesscor->NmBusiness;
//  }
//}

include_once('../model/classes/tblBusiness.php');

$Business = new Business();
$Business->setidBusiness($satBusinessId);
$resultsbusinesscor = $Business->consulta("WHERE idBusiness = :idBusiness");

if ($resultsbusinesscor != null) {
  foreach ($resultsbusinesscor as $rowbusinesscor) {
    $NmBusinesscor =  $rowbusinesscor->NmBusiness;
  }
}

//$sqlbusinesscateg = "SELECT * from tblBusinessCategory WHERE idBusinessCategory = :idBusinessCategory";
//$querybusinesscateg = $dbh->prepare($sqlbusinesscateg);
//$querybusinesscateg->bindParam(':idBusinessCategory', $idoperation, PDO::PARAM_INT);
//$querybusinesscateg->execute();
//$resultsbusinesscateg = $querybusinesscateg->fetchAll(PDO::FETCH_OBJ);
//if ($querybusinesscateg->rowCount() > 0) {
//  foreach ($resultsbusinesscateg as $rowbusinesscateg) {
//    $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
//    $idbusinesscateg = $rowbusinesscateg->idBusiness;
//  }
//}

include_once('../model/classes/tblBusinessCategory.php');

$BusinessCategory = new BusinessCategory();
$BusinessCategory->setidBusinessCategory($idoperation);
$resultsbusinesscateg = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

if ($resultsbusinesscateg != null) {
  foreach ($resultsbusinesscateg as $rowbusinesscateg) {
    $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
    $idbusinesscateg = $rowbusinesscateg->idBusiness;
  }
}

//$sqlView = "SELECT * FROM tblviews WHERE idUser = :idUser AND idView = :idView AND  DATE(datacriacao) = CURDATE()";
//$queryView = $dbh->prepare($sqlView);
//$queryView->bindParam(':idUser', $geral, PDO::PARAM_INT);
//$queryView->bindParam(':idView', $iduser, PDO::PARAM_INT);
//$queryView->execute();
//$resultView = $queryView->fetchAll(PDO::FETCH_OBJ);

include_once('../model/classes/tblViews.php');

$Views = new Views();
$Views->setidUser($geral);
$Views->setidView($iduser);
$resultView = $Views->consulta("WHERE idUser = :idUser AND idView = :idView AND  DATE(datacriacao) = CURDATE()");

if ($resultView == null) {

  //$sqlViewinsert = "INSERT INTO tblviews(idUser, idView) VALUES (:idUser, :idView)";
  //$queryViewinsert = $dbh->prepare($sqlViewinsert);
  //$queryViewinsert->bindParam(':idUser', $geral, PDO::PARAM_INT);
  //$queryViewinsert->bindParam(':idView', $iduser, PDO::PARAM_INT);
  //$queryViewinsert->execute();

  include_once('../model/classes/tblViews.php');

  $Views = new Views();
  $Views->setidUser($geral);
  $Views->setidView($iduser);
  $Views->setdatacriacao(date("Y/m/d"));

  $Views->cadastrar();

  //$sqlinsertpost = "INSERT INTO tblsearchprofile_results (idUsuario, idClienteEncontrado, idTipoNotif) VALUES (:idUsuario, :idClienteEncontrado, '2')";
  //$queryinsertpost = $dbh->prepare($sqlinsertpost);
  //$queryinsertpost->bindParam(':idUsuario', $geral, PDO::PARAM_INT);
  //$queryinsertpost->bindParam(':idClienteEncontrado', $iduser, PDO::PARAM_INT);
  //$queryinsertpost->execute();

  include_once('../model/classes/tblSearchProfile_Results.php');

  $searchprofile_results = new SearchProfile_Results();

  $searchprofile_results->setidUsuario($geral);
  $searchprofile_results->setidClienteEncontrado($iduser);
  $searchprofile_results->setidTipoNotif(2);

  $searchprofile_results->cadastrar();
}



//$sqlconect = "SELECT * FROM tblconect WHERE idUserPed = :idUserPed AND idUserReceb = :idUserReceb ";
//$queryconect = $dbh->prepare($sqlconect);
//$queryconect->bindParam(':idUserPed', $geral, PDO::PARAM_INT);
//$queryconect->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
//$queryconect->execute();
//$respoconect = $queryconect->fetchAll(PDO::FETCH_OBJ);
//if ($queryconect->rowCount() > 0) {
//  foreach ($respoconect as $rowconnect) {
//    $temconexao = $rowconnect->status;
//  }
//} else {
//  $temconexao = "";
//}

include_once('../model/classes/tblConect.php');

$connect = new Conect();

$connect->setidUserPed($geral);
$connect->setidUserReceb($iduser);

$respoconect = $connect->consulta("WHERE idUserPed = :idUserPed AND idUserReceb = :idUserReceb");

if ($respoconect != null) {
  foreach ($respoconect as $rowconnect) {
    $temconexao = $rowconnect->status;
  }
} else {
  $temconexao = "";
}



if ($_POST["conectar"] != "") {
  //$sqlconect = "INSERT INTO tblconect (idUserPed, idUserReceb, status) VALUES (:idUserPed, :idUserReceb, '0')";
  //$queryconect = $dbh->prepare($sqlconect);
  //$queryconect->bindParam(':idUserPed', $geral, PDO::PARAM_INT);
  //$queryconect->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
  //$queryconect->execute();

  include_once('../model/classes/tblConect.php');

  $connect = new Conect();

  $connect->setidUserPed($geral);
  $connect->setidUserReceb($iduser);
  $connect->setstatus(0);

  $connect->cadastrar();

  //$sqlinsertpost = "INSERT INTO tblsearchprofile_results (idUsuario, idClienteEncontrado, idTipoNotif) VALUES (:idUsuario, :idClienteEncontrado, '4')";
  //$queryinsertpost = $dbh->prepare($sqlinsertpost);
  //$queryinsertpost->bindParam(':idUsuario', $geral, PDO::PARAM_INT);
  //$queryinsertpost->bindParam(':idClienteEncontrado', $iduser, PDO::PARAM_INT);
  //$queryinsertpost->execute();

  include_once('../model/classes/tblSearchProfile_Results.php');

  $searchprofile_results = new SearchProfile_Results();

  $searchprofile_results->setidUsuario($geral);
  $searchprofile_results->setidClienteEncontrado($iduser);
  $searchprofile_results->setidTipoNotif(4);

  $searchprofile_results->cadastrar();

  header("Location: viewProfile.php?profile=$geral");
}

if ($_POST["desconectar"] != "") {
  $idconect = $_POST["idconectar"];
  $idperfilpedido = $_POST["idperfilpedido"];


  //$sqlconectdelet = "DELETE FROM tblconect WHERE  id = :id";
  //$queryconectdelet = $dbh->prepare($sqlconectdelet);
  //$queryconectdelet->bindParam(':id', $idconect, PDO::PARAM_INT);
  //$queryconectdelet->execute();

  include_once('../model/classes/tblConect.php');

  $connect = new Conect();

  $connect->setid($idconect);
  $connect->deletar("WHERE  id = :id");

  header("Location: viewProfile.php?profile=$geral");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="assets/css/geral.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="assets/css/feed.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

</head>

<body class="funcolinhas">
  <script>
    function showbusines(str) {
      document.getElementById("refHint2").innerHTML = "";
      if (str == "") {
        document.getElementById("refHint").innerHTML = "";
        return;
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("refHint").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "modal/qualibuisines.php?q=" + str, true);
      xmlhttp.send();
    }

    function showbusines2(str) {

      if (str == "") {
        document.getElementById("refHint2").innerHTML = "";
        return;
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("refHint2").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "modal/qualibuisines2.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>
  <?php include_once("widget/navbar.php"); ?>
  <div class="telacheia">
    <div class="col-md-12 p-2 m-0">
      <div class="col-md-12 d-flex justify-content-center  ">
        <div class="row telacheia margemmnavbar">
            <div class="col-lg-4 scrollable-column">
              <div class="card mb-4 cardbg">
                <div class="card-body text-center  cardbg shadow">
                  <img src="<?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                              echo $imgperfil;
                            } else {
                              echo "/assets/img/Avatar.png";
                            } ?>" alt="avatar" class="rounded-circle img-fluid img-viewprofile-card">
                  <h5 class="my-3 txtnomeperfil"><?php echo $username; ?></h5>
                  <p class="text-muted mb-1 txttipoperfil"> <?php echo $jobtitle . " at " . $companyname; ?></p>
                  <p class="text-muted mb-4 txttipoperfil"><?php echo $pais; ?></p>
                  <div class="d-flex justify-content-center mb-2">
                    <form method="POST" action="../controller/viewProfileController.php" enctype="multipart/form-data">
                      <?php if ($temconexao == 1) { ?>
                        <button type="submit" name="desconectar" value="desconectar" class="btn btn-outline-danger ms-1 m-1"><i class="bi bi-person-x-fill icon-btn-card"></i>&nbsp;Disconnect</button>
                      <?php   } else 
                  if ($temconexao == 0) { ?>
                        <button type="submit" name="desconectar" value="desconectar" class="btn btn-outline-warning ms-1 m-1"><i class="bi bi-person-x-fill icon-btn-card"></i>&nbsp;Pending</button>
                      <?php   } else { ?>
                        <button type="submit" name="conectar" value="conectar" class="btn btn-outline-primary ms-1 m-1"><i class="bi bi-person-plus-fill icon-btn-card"></i>&nbsp;Connect</button>
                      <?php   } ?>
                      <a href="chatPage.php" class="btn btn-outline-primary ms-1 m-1"><i class="bi bi-chat-dots-fill icon-btn-card"></i>&nbsp;Message</a>
                    </form>
                  </div>
                </div>
              </div>




              <div class="card mb-4 cardbg ">
                <div class="card-body p-0 cardbg shadow">
                  <ul class="list-group cardbg list-group-flush rounded-3 txtopertion">
                    <li class="list-group-item cardbg d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><b>Core Business:</b></p>
                      <p class="mb-0"> <?php echo $NmBusiness; ?></p>
                    </li>
                    <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") {
                    ?>
                      <li class="list-group-item d-flex cardbg justify-content-between align-items-center p-3">
                        <p class="mb-0"><b>Business:</b></p>
                        <p class="mb-0"> <?php echo $NmBusinesscor; ?></p>
                      </li>
                      <li class="list-group-item d-flex cardbg justify-content-between align-items-center p-3">
                        <p class="mb-0"><b>Business Category:</b></p>
                        <p class="mb-0"> <?php echo $NmBusinessCategory; ?></p>
                      </li>
                    <?php }  ?>
                  </ul>
                </div>
              </div>

              <div class="card mb-4 cardbg mb-lg-0">
                <div class="card-body cardbg cardbg shadow">
                  <h3 class="text-muted valoresinsi "><b>Description:</b></h3>
                  <p class="text-muted mb-4 txttipoperfil"><?php echo $descricao; ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-8  scrollable-column ">
              <div class="card cardbg mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-11">
                      <h2 class="text-muted valoresinsi"><b>Products</b></h2>
                    </div>
                    <div class="col-sm-1">

                    </div>
                  </div>
                  <hr class="m-1">
                  <div class="row rowProduct overflow-auto">

                    <?php
                    //$sqlProdutos = "SELECT * from tblProducts WHERE idClient = :idClient  ORDER BY idProduct ASC limit 8";
                    //$queryProdutos = $dbh->prepare($sqlProdutos);
                    //$queryProdutos->bindParam(':idClient', $iduser, PDO::PARAM_INT);
                    //$queryProdutos->execute();
                    //$resultsProdutos = $queryProdutos->fetchAll(PDO::FETCH_OBJ);

                    include_once('../model/classes/tblProducts.php');

                    $products = new Products();
                    $products->setidClient($iduser);

                    $resultsProdutos = $products->consulta("WHERE idClient = :idClient  ORDER BY idProduct ASC limit 8");

                    if ($resultsProdutos != null) {
                      foreach ($resultsProdutos as $rowProdutos) {
                    ?>
                        <div class="mb-4 ml-1">
                          <div class="card-container">
                            <a data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                              <img class="hero-image produto-img" src="<?php // data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto"
                                                                        //$sqlProdutos = "SELECT * from tblProductPictures WHERE idProduct = :idProduct ";
                                                                        //$queryProdutos1 = $dbh->prepare($sqlProdutos);
                                                                        //$queryProdutos1->bindParam(':idProduct', $rowProdutos->idProduct, PDO::PARAM_INT);
                                                                        //$queryProdutos1->execute();
                                                                        //$resultsProdutos1 = $queryProdutos1->fetchAll(PDO::FETCH_OBJ);

                                                                        include_once('../model/classes/tblProductPictures.php');

                                                                        $productspictures =  new ProductPictures();
                                                                        $productspictures->setidProduct($rowProdutos->idProduct);

                                                                        $resultsProdutos1 = $productspictures->consulta("WHERE idProduct = :idProduct");

                                                                        if ($queryProdutos1 != null) {
                                                                          foreach ($resultsProdutos1 as $rowProdutos1) {
                                                                            echo "../../" . $rowProdutos1->tblProductPicturePath;
                                                                          }
                                                                        } else {
                                                                          echo "https://images.unsplash.com/photo-1507608158173-1dcec673a2e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80";
                                                                        }
                                                                        ?>" alt="Spinning glass cube" />
                            </a>
                            <main class="main-content mt-0 w-auto">
                              <h1 class="mb-0"><a class="cortardescricao color-branco" href="#"><?php echo $rowProdutos->ProductName; ?></a></h1>
                              <p class="cortardescricao color-cinza produto-desc-text"><?php echo $rowProdutos->ProdcuctDescription; ?></p>
                            </main>
                          </div>
                        </div>

                    <?php }
                    } ?>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  <script src="../../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script src="../../assets/js/select2.min.js"></script>
  <script src="../../assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu() {
      profileMenu.classList.toggle("open-menu");
    }
  </script>
  <script>
    // JavaScript / jQuery
    // JavaScript / jQuery
    $(document).ready(function() {
      // Ao clicar em um link de produto
      $('.hero-image-container').click(function() {
        // Obtenha o ID do produto associado ao link clicado
        var idProduto = $(this).data('id');
        console.log(idProduto);
        // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
        $.ajax({
          type: 'GET',
          url: 'modal/getproduto.php', // Substitua pelo caminho correto
          data: {
            idProduto: idProduto
          },
          success: function(data) {
            // Preencha o conteúdo do modal com as informações do produto
            $('#modalEditarProduto .modal-content').html(data);
          },
          error: function() {
            alert('Ocorreu um erro ao carregar os dados do produto.');
          }
        });

        // Abra o modal correspondente
        $('#modalEditarProduto').fadeIn();
      });;

      // Feche o modal ao clicar fora dele ou no botão de fechar
      $('.modal').click(function(event) {
        if ($(event.target).hasClass('modal')) {
          $(this).fadeOut();
        }
      });
    });

    function likeColor(element) {
      var likeIcon = element.previousElementSibling;
      likeIcon.classList.add("red-like"); // Adiciona a classe CSS "red-like" ao ícone de like
    }


    $(document).ready(function() {
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            if (input.id === 'file-input') {
              $('#preview-image').attr('src', e.target.result).show();
              $('#preview-video').hide();
            } else if (input.id === 'video-input') {
              $('#preview-video').attr('src', e.target.result).show();
              $('#preview-image').hide();
            }
          };
          reader.readAsDataURL(input.files[0]);
        } else {
          var img = input.value;
          $('#preview-image').attr('src', '').hide();
          $('#preview-video').attr('src', '').hide();
        }
      }

      // Event listeners para os inputs de imagem e vídeo
      $('#file-input').on('change', function() {
        readURL(this);
      });

      $('#video-input').on('change', function() {
        readURL(this);
      });
    });
    document.querySelector('.collapse-chat').addEventListener('click', function() {
      this.classList.toggle('open');
    });





    window.addEventListener('scroll', function() {
      var navbar = document.getElementById('navbar');
      if (window.pageYOffset > 0) {
        navbar.classList.add('colored');
        navbar.classList.remove('transparent');
      } else {
        navbar.classList.remove('colored');
        navbar.classList.add('transparent');
      }
    });

    /* Set the width of the sidebar to 250px (show it) */
    function openNav() {
      document.getElementById("mySidepanel").style.width = "250px";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
    }


    function toggleNotifyMenu() {
      const notifyMenu = document.getElementById('notifyMenu')
      notifyMenu.classList.toggle("open-menu");
    }

    document.addEventListener('DOMContentLoaded', function() {
      var dropdownToggle = document.querySelector('.notify-dropdown-toggle');
      dropdownToggle.addEventListener('click', function(event) {
        event.stopPropagation();
        dropdownToggle.parentNode.classList.toggle('open');
      });
    });

    const notifyMenu = document.querySelector('.notify-menu');
    const notifications = notifyMenu.querySelectorAll('.notification');
    let notifyCounter = 8;

    function deleteNotification(event) {
      event.preventDefault();
      const notificationParent = event.currentTarget.parentNode;
      if (notificationParent) {
        notificationParent.remove();
        notifyCounter--;
        notifyMenu.dataset.notifyMenu = `Notification ${notifyCounter}`;
        updateEmptyBoxDisplay();
      }
    }

    notifications.forEach((notification) => {
      notification.addEventListener('click', deleteNotification);
    });

    const emptyBox = document.querySelector('.empty-box');

    function updateEmptyBoxDisplay() {
      if (notifyCounter === 0) {
        emptyBox.style.display = 'block';
      } else {
        emptyBox.style.display = 'none';
      }
    }

    updateEmptyBoxDisplay();
    // Carousel Script



    // Scroll Left button
    btnLeft.addEventListener("click", (e) => {
      let movieWidth = document.querySelector(".movie").getBoundingClientRect().width;
      let scrollDistance = movieWidth * 6; // Scroll the length of 6 movies. TODO: make work for mobile because (4 movies/page instead of 6)

      slider.scrollBy({
        top: 0,
        left: -scrollDistance,
        behavior: "smooth",
      });

      activeIndex = (activeIndex - 1 + movies.length) % movies.length; // Update activeIndex correctly
      console.log(activeIndex);
      updateIndicators(activeIndex);
    });

    // Scroll Right button
    btnRight.addEventListener("click", (e) => {
      let movieWidth = document.querySelector(".movie").getBoundingClientRect().width;
      let scrollDistance = movieWidth * 6; // Scroll the length of 6 movies. TODO: make work for mobile because (4 movies/page instead of 6)

      // if we're on the last page
      if (activeIndex === movies.length - 1) {
        // duplicate all the items in the slider (this is how we make a 'looping' slider)
        populateSlider();
      }

      slider.scrollBy({
        top: 0,
        left: +scrollDistance,
        behavior: "smooth",
      });

      activeIndex = (activeIndex + 1) % movies.length; // Update activeIndex correctly
      console.log(activeIndex);
      updateIndicators(activeIndex);
    });
  </script>
  <script>
    autosize(document.getElementById('myTextarea'));
  </script>
  <script>
    var limiteAtual = 3; // O limite inicial é de 3 linhas
    var alturaOriginal; // Variável para armazenar a altura original da div

    function alterarLimite(id) {
      var divTexto = document.getElementById('textoEx' + id);
      var botao = document.getElementById('btn-vm' + id);

      if (limiteAtual === 3) {
        // Se o limite atual for 3 linhas, aumente para mostrar todo o conteúdo
        limiteAtual = 0;
        alturaOriginal = divTexto.style.height; // Armazena a altura original
        divTexto.style.height = 'auto';
        botao.innerHTML = 'Ver Menos'; // Altera o texto do botão
      } else {
        // Se o limite atual for diferente de 3, volte ao limite de 3 linhas
        limiteAtual = 3;
        divTexto.style.height = alturaOriginal; // Restaura a altura original
        botao.innerHTML = 'Ver Mais'; // Altera o texto do botão de volta
      }
      return false;
    }
  </script>
  <script>
    // Função para adicionar a classe de fundo quando o scroll ocorre
    function adicionarFundoComScroll() {
      var container = document.getElementById('navbar');
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

      // Verifica se o scroll é maior que 100 pixels para adicionar a classe
      if (scrollTop > 100) {
        container.classList.add('bg-light-alt-2');
        container.classList.remove('bg-light-alt');
      } else {
        container.classList.add('bg-light-alt');
        container.classList.remove('bg-light-alt-2');
      }
    }

    // Adiciona o evento de scroll para chamar a função
    window.addEventListener('scroll', adicionarFundoComScroll);
    // Adiciona o evento de scroll para chamar a função
    window.addEventListener('scroll', adicionarFundoComScroll);

    function atualizarFeed() {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("divFeedUpdate").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "atualizarFeed.php", true);
      xmlhttp.send();
    }

    $(document).ready(function() {
      // Detecta o evento de rolagem
      $(window).scroll(function() {
        // Verifica se chegou ao final da página
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
          // Chama a função quando o usuário chegar ao final da página
          atualizarFeed();
        }
      });
    });
  </script>
</body>

</html>