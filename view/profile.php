<?php
session_start();
//error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 5;

include_once('../model/classes/tblUserClients.php');

$userClients = new UserClients();

$userClients->setidClient($iduser);

$results = $userClients->consulta("WHERE idClient = :idClient");

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

include('../model/classes/tblCountry.php');

$country = new Country();

$country->setidCountry($idcountry);

$resultsCountry = $country->consulta("WHERE idCountry = :idCountry");

if ($resultsCountry != null) {
  foreach ($resultsCountry as $rowCountry) {
    $pais =  $rowCountry->NmCountry;
  }
}
include_once('../model/classes/tblOperations.php');
$operations = new Operations();
$operations->setidOperation($corebusiness);
$resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
if ($resultsoperation != null) {
  foreach ($resultsoperation as $rowoperation) {
    $NmBusiness =  $rowoperation->NmOperation;
  }
}


include_once('../model/classes/tblBusiness.php');
$business = new Business();
$business->setidBusiness($satBusinessId);
$resultsbusiness = $business->consulta("WHERE idBusiness = :idBusiness");
if ($resultsbusiness != null) {
  foreach ($resultsbusiness as $rowbusiness) {
    $NmBusinesscor =  $rowbusiness->NmBusiness;
  }
}


$NmBusinessCategory="";
include_once('../model/classes/tblBusinessCategory.php');
$BusinessCategory = new BusinessCategory();
$BusinessCategory->setidBusinessCategory($idoperation);
$resultsBusinessCategory = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

if ($resultsBusinessCategory != null) {
  foreach ($resultsBusinessCategory as $rowbusinesscateg) {
    $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
    $idbusinesscateg = $rowbusinesscateg->idBusiness;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>

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
  <link rel="stylesheet" href="assets/css/geral.css">
  <link rel="stylesheet" href="assets/css/profile.css">
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
      xmlhttp.open("GET", "widget/qualibuisines.php?q=" + str, true);
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
      xmlhttp.open("GET", "widget/qualibuisines2.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>

  <!-- Header -->
  <?php include_once("widget/navbar.php"); ?><br><br><br><br><br>
  <div class="col-md-12 d-flex justify-content-center margemcelulr">
    <div class="col-md-12">
      <div class="row">
        <div class="col-lg-4 scrollable-column">
          <div class="card mb-4 cardbg">
            <div class="card-body text-center  cardbg shadow">
              <img src="<?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                          echo $imgperfil;
                        } else {
                          echo "assets/img/Avatar.png";
                        } ?>" alt="avatar" class="rounded-circle img-fluid img-profile-card">
              <h5 class="my-3 txtnomeperfil"><?php echo $username; ?></h5>
              <p class="text-muted mb-1 txttipoperfil"> <?php echo $jobtitle . " at " . $companyname; ?></p>
              <p class="text-muted mb-4 txttipoperfil"><?php echo $pais; ?></p>
              <div class="d-flex justify-content-center mb-2">

                <a href="#" class="btn btn-outline-primary ms-1" data-toggle="modal" data-target="#add_perfil"><i class="bi bi-pen icon-btn-card"></i>&nbsp;Edit</a>
              </div>
            </div>
          </div>

          <div class="row m-0">
            <div class="card mb-4 cardcenter cardbg shadow">
              <div class="card-body ">
                <i class="bi bi-globe iconesize"></i>
                <p class="text-muted mb-4 txtinsite"><a href="#mynetwork" data-toggle="tab">My Network</a></p>
                <p class="text-muted txtinsite valoresinsi"><b><?php
                                                                //$sqlView = "SELECT * FROM tblconect WHERE idUserReceb = :idUserReceb AND status = '1'";
                                                                //$queryView = $dbh->prepare($sqlView);
                                                                //$queryView->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
                                                                //$queryView->execute();
                                                                //$queryView->fetchAll(PDO::FETCH_OBJ);

                                                                include_once('../model/classes/tblConect.php');

                                                                $conect = new Conect();

                                                                $conect->setidUserReceb($iduser);

                                                                $resultConect = $conect->consulta("WHERE idUserReceb = :idUserReceb AND status = '1'");

                                                                $numView = 0;

                                                                if ($resultConect != null) {
                                                                  foreach ($resultConect as $resultConectUnid) {
                                                                    $numView += 1;
                                                                  }
                                                                }

                                                                echo $numView;
                                                                ?></b></p>
              </div>
            </div>

            <div class="card mb-4 cardcenter cardbg shadow">
              <div class="card-body ">
                <i class="bi bi-clock-history iconesize"></i>
                <p class="text-muted mb-4 txtinsite"><a href="#" data-toggle="modal" data-target="#exampleModalconect" class="nav-link">Want to Connect</a></p>
                <p class="text-muted txtinsite valoresinsi"><b><?php
                                                                //$sqlView = "SELECT * FROM tblconect WHERE idUserReceb = :idUserReceb AND status = '0'";
                                                                //$queryView = $dbh->prepare($sqlView);
                                                                //$queryView->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
                                                                //$queryView->execute();
                                                                //$queryView->fetchAll(PDO::FETCH_OBJ);
                                                                //echo $queryView->rowCount();

                                                                include_once('../model/classes/tblConect.php');

                                                                $conect = new Conect();

                                                                $conect->setidUserReceb($iduser);

                                                                $resultConect = $conect->consulta("WHERE idUserReceb = :idUserReceb AND status = '0'");

                                                                $numView = 0;

                                                                if ($resultConect != null) {
                                                                  foreach ($resultConect as $resultConectUnid) {
                                                                    $numView += 1;
                                                                  }
                                                                }

                                                                echo $numView;

                                                                ?></b></p>
              </div>
            </div>

            <div class="card mb-4 cardcenter cardbg shadow">
              <div class="card-body ">
                <i class="bi bi-bookmark-check iconesize"></i>
                <p class="text-muted mb-4 txtinsite"><a href="#">My saved search</a></p>
                <p class="text-muted txtinsite valoresinsi"><b>0</b></p>
              </div>
            </div>

            <div class="card mb-4 cardcenter cardbg shadow">
              <div class="card-body ">
                <i class="bi bi-eye iconesize"></i>
                <p class="text-muted mb-4 txtinsite"><a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">Views</a></p>
                <p class="text-muted txtinsite valoresinsi"><b><?php
                                                                //$sqlView = "SELECT * FROM tblviews WHERE idView = :idView ";
                                                                //$queryView = $dbh->prepare($sqlView);
                                                                //$queryView->bindParam(':idView', $iduser, PDO::PARAM_INT);
                                                                //$queryView->execute();
                                                                //$queryView->fetchAll(PDO::FETCH_OBJ);
                                                                //echo $queryView->rowCount();

                                                                include_once('../model/classes/tblViews.php');

                                                                $views = new Views();

                                                                $views->setidView($iduser);

                                                                $resultviews = $views->consulta(" WHERE idView = :idView ");

                                                                $numView = 0;

                                                                if ($resultviews != null) {
                                                                  foreach ($resultviews as $resultviewsUnid) {
                                                                    $numView += 1;
                                                                  }
                                                                }

                                                                echo $numView;

                                                                ?></b></p>
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

          <div class="tab-content" id="networkview">
            <div id="mynetwork" class="tab-pane fade">
              <div class="card cardbg mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-1">
                      <p class="text-muted mb-0">
                        <button id="closeMyNetwork" class="btn btn-outline-primary ms-1">
                          <i class="bi bi-x-circle-fill icon-btn-card"></i>
                        </button>
                      </p>
                    </div>
                    <div class="col-sm-11">
                      <h2 class="text-muted valoresinsi"><b>My Network</b></h2>
                    </div>
                  </div>
                  <hr class="m-1">
                  <div class="col">
                    <ul>
                      <?php
                      $sqlconect = "SELECT * FROM tblconect WHERE idUserReceb = :idUserReceb AND status = '1'  ORDER BY datapedido DESC";
                      $queryconect = $dbh->prepare($sqlconect);
                      $queryconect->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
                      $queryconect->execute();
                      $resulconect = $queryconect->fetchAll(PDO::FETCH_OBJ);



                      if ($queryconect->rowCount() > 0) {
                        foreach ($resulconect as $rowviews) {

                      ?>
                          <?php
                          $sqlclientes = "SELECT * from tblUserClients WHERE idClient = :idClient";
                          $querycliente = $dbh->prepare($sqlclientes);
                          $querycliente->bindParam(':idClient', $rowviews->idUserPed, PDO::PARAM_INT);
                          $querycliente->execute();
                          $resultscliente = $querycliente->fetchAll(PDO::FETCH_OBJ);
                          if ($querycliente->rowCount() > 0) {
                            foreach ($resultscliente as $rowcliente) {
                              $sqlOperation = "SELECT * from tblOperations WHERE FlagOperation != '0' AND idOperation = :idOperation";
                              $queryOperation = $dbh->prepare($sqlOperation);
                              $queryOperation->bindParam(':idOperation', $rowcliente->CoreBusinessId, PDO::PARAM_INT);
                              $queryOperation->execute();
                              $resultsOperation = $queryOperation->fetchAll(PDO::FETCH_OBJ);
                              if ($queryOperation->rowCount() > 0) {
                                foreach ($resultsOperation as $rowOperation) { ?>

                                  <li class="recommended-user mb-2">
                                    <form method="POST" enctype="multipart/form-data" class="w-100 h-100 d-flex">
                                      <input class="form-control bordainput" value="<?php echo $rowviews->id; ?>" autocomplete="off" name="idconectar" type="hidden">
                                      <input class="form-control bordainput" value="<?php echo $rowviews->idUserPed; ?>" autocomplete="off" name="idperfilpedido" type="hidden">
                                      <div class="col-2 justify-content-center m-0 p-0 text-align-center">
                                        <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                          <img class="h-50 w-50 p-1" src="<?php if ($rowOperation->PersonalUserPicturePath != "Avatar.png" && $rowOperation->PersonalUserPicturePath != "") {
                                                                            echo "../" . $rowOperation->PersonalUserPicturePath;
                                                                          } else {
                                                                            echo "../../assets/img/Avatar.png";
                                                                          } ?>" alt="user" alt="An unknown user."></a>
                                      </div>
                                      <div class="col-5 p-0">
                                        <p class="mb-0 network-username-text"><b><a class="color-preto" href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>"><?php echo $rowcliente->FirstName; ?></b> </a></p>
                                        <p class="network-operation-text"><a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>"><?php echo $rowOperation->NmOperation; ?></a></p>
                                        <p class="network-timeago-text"><?php
                                                                        $postDateTime = new DateTime($rowviews->datapedido);

                                                                        // Obtenha o objeto DateTime da data e hora atual
                                                                        $currentTime = new DateTime();

                                                                        // Calcula a diferença entre a data e hora atual e a da postagem
                                                                        $timeDiff = $postDateTime->diff($currentTime);

                                                                        // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
                                                                        if ($timeDiff->y > 0) {
                                                                          $timeAgo = $timeDiff->y . " ano(s) atrás";
                                                                        } elseif ($timeDiff->m > 0) {
                                                                          $timeAgo = $timeDiff->m . " mês(es) atrás";
                                                                        } elseif ($timeDiff->d > 0) {
                                                                          $timeAgo = $timeDiff->d . " dia(s) atrás";
                                                                        } elseif ($timeDiff->h > 0) {
                                                                          $timeAgo = $timeDiff->h . " hora(s) atrás";
                                                                        } elseif ($timeDiff->i > 0) {
                                                                          $timeAgo = $timeDiff->i . " minuto(s) atrás";
                                                                        } else {
                                                                          $timeAgo = "Alguns segundos atrás";
                                                                        }

                                                                        echo $timeAgo; ?></p>
                                      </div>
                                      <div class="col-2 justify-content-center">
                                        <button type="submit" name="desconectar" value="desconectar" class="btn btn-outline-danger ms-1 m-1"><i class="bi bi-person-x-fill icon-btn-card"></i>&nbsp;Disconnect</button>

                                      </div>
                                      <div class="col-2 justify-content-center">
                                        <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>" class="btn btn-outline-primary ms-1 m-1"><i class="bi bi-eye-fill icon-btn-card"></i>&nbsp;View</a>
                                      </div>
                                    </form>
                                  </li>
                                  <hr>
                          <?php }
                              }
                            }
                          } ?>
                      <?php }
                      } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card cardbg mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-11">
                  <h2 class="text-muted valoresinsi"><b>Products</b></h2>
                </div>
                <div class="col-sm-1">
                  <p class="text-muted mb-0"><a href="#" class="btn btn-outline-primary ms-1 m-1" data-toggle="modal" data-target="#add_produto"><i class="bi bi-plus-circle-fill" style="font-size: 14px;"></i></a></p>
                </div>
              </div>
              <hr class="m-1">
              <div class="row rowProduct overflow-auto">
                <?php
                  include_once('../model/classes/tblProducts.php');
                  $products = new Products();
                  $products->setidClient($iduser);
                  $resultsProdutos = $products->consulta("WHERE idClient = :idClient  ORDER BY idProduct ASC ");
                  if ($resultsProdutos != null) {
                      if (is_array($resultsProdutos) || is_object($resultsProdutos)) {
                          foreach ($resultsProdutos as $rowProdutos) {
                ?>
                    <div class="mb-4 ml-1">
                      <div class="card-container">
                        <a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                          <img class="hero-image produto-img" src="<?php
                                                                    $sqlProdutos = "SELECT * from tblProductPictures WHERE idProduct = :idProduct ";
                                                                    $queryProdutos1 = $dbh->prepare($sqlProdutos);
                                                                    $queryProdutos1->bindParam(':idProduct', $rowProdutos->idProduct, PDO::PARAM_INT);
                                                                    $queryProdutos1->execute();
                                                                    $resultsProdutos1 = $queryProdutos1->fetchAll(PDO::FETCH_OBJ);
                                                                    if ($queryProdutos1->rowCount() > 0) {
                                                                      foreach ($resultsProdutos1 as $rowProdutos1) {
                                                                        echo "../../" . $rowProdutos1->tblProductPicturePath;
                                                                      }
                                                                    } else {
                                                                      echo "https://images.unsplash.com/photo-1507608158173-1dcec673a2e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80";
                                                                    }
                                                                    ?>" alt="Spinning glass cube" />
                        </a>
                        <main class="main-content mt-0 w-100">
                          <h1 class="mb-0"><a class="cortardescricao color-branco desc-perfil-text" href="#"><?php echo $rowProdutos->ProductName; ?></a></h1>
                          <p class="cortardescricao color-cinza-b produto-desc-text"><?php echo $rowProdutos->ProdcuctDescription; ?></p>
                        </main>
                      </div>
                    </div>

                <?php } }
                } ?>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>


  <div id="modalEditarProduto" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-body">
          <h1 id="modalProductName" class="mb-0"></h1>
          <p id="modalProductDescription" class="color-cinza-b produto-desc-text"></p>
        </div>

      </div>
    </div>
  </div>

  <div class="modal custom-modal fade" id="exampleModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Views</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="m-0 overflow-y p-1 ul-view">
            <?php
            $sqlViews = "SELECT * FROM tblviews WHERE idView = :idView ORDER BY datacriacao DESC";
            $queryViews = $dbh->prepare($sqlViews);
            $queryViews->bindParam(':idView', $iduser, PDO::PARAM_INT);
            $queryViews->execute();
            $resultviews = $queryViews->fetchAll(PDO::FETCH_OBJ);

            if ($queryViews->rowCount() > 0) {
              foreach ($resultviews as $rowviews) {

            ?>
                <?php
                $sqlclientes = "SELECT * from tblUserClients WHERE idClient = :idClient";
                $querycliente = $dbh->prepare($sqlclientes);
                $querycliente->bindParam(':idClient', $rowviews->idUser, PDO::PARAM_INT);
                $querycliente->execute();
                $resultscliente = $querycliente->fetchAll(PDO::FETCH_OBJ);
                if ($querycliente->rowCount() > 0) {
                  foreach ($resultscliente as $rowcliente) {
                    $sqlOperation = "SELECT * from tblOperations WHERE FlagOperation != '0' AND idOperation = :idOperation";
                    $queryOperation = $dbh->prepare($sqlOperation);
                    $queryOperation->bindParam(':idOperation', $rowcliente->CoreBusinessId, PDO::PARAM_INT);
                    $queryOperation->execute();
                    $resultsOperation = $queryOperation->fetchAll(PDO::FETCH_OBJ);
                    if ($queryOperation->rowCount() > 0) {
                      foreach ($resultsOperation as $rowOperation) {


                ?>

                        <li class="recommended-user icone-net mb-1">

                          <div class="col-2 justify-content-center m-0 p-0">
                            <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                              <img src="<?php if ($rowOperation->PersonalUserPicturePath != "Avatar.png" && $rowOperation->PersonalUserPicturePath != "") {
                                          echo "../" . $rowOperation->PersonalUserPicturePath;
                                        } else {
                                          echo "../../assets/img/Avatar.png";
                                        } ?>" alt="user" alt="An unknown user."></a>
                          </div>
                          <div class="col-7 p-0">
                            <p class="network-username-text"><a class="color-preto" href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>"><b><?php echo $rowcliente->FirstName; ?><b> </a></p>
                            <p class="network-operation-text"><a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>"><?php echo $rowOperation->NmOperation; ?></a></p>
                            <p class="network-timeago-text"><?php
                                                            $postDateTime = new DateTime($rowviews->datacriacao);

                                                            // Obtenha o objeto DateTime da data e hora atual
                                                            $currentTime = new DateTime();

                                                            // Calcula a diferença entre a data e hora atual e a da postagem
                                                            $timeDiff = $postDateTime->diff($currentTime);

                                                            // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
                                                            if ($timeDiff->y > 0) {
                                                              $timeAgo = $timeDiff->y . " ano(s) atrás";
                                                            } elseif ($timeDiff->m > 0) {
                                                              $timeAgo = $timeDiff->m . " mês(es) atrás";
                                                            } elseif ($timeDiff->d > 0) {
                                                              $timeAgo = $timeDiff->d . " dia(s) atrás";
                                                            } elseif ($timeDiff->h > 0) {
                                                              $timeAgo = $timeDiff->h . " hora(s) atrás";
                                                            } elseif ($timeDiff->i > 0) {
                                                              $timeAgo = $timeDiff->i . " minuto(s) atrás";
                                                            } else {
                                                              $timeAgo = "Alguns segundos atrás";
                                                            }

                                                            echo $timeAgo; ?></p>
                          </div>
                          <div class="col-2 justify-content-center">
                            <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                              <i class="bi bi-eye-fill fa-2x icon-network" style="color: #0000007d !important;"></i>
                            </a>
                          </div>

                        </li>
                        <hr>
                <?php }
                    }
                  }
                } ?>
            <?php }
            } ?>
          </ul>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>


  <div class="modal custom-modal fade" id="exampleModalconect" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Want to Connect</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="m-0 overflow-auto p-1 ul-view">
            <?php
            $sqlconect = "SELECT * FROM tblconect WHERE idUserReceb = :idUserReceb AND status = '0'  ORDER BY datapedido DESC";
            $queryconect = $dbh->prepare($sqlconect);
            $queryconect->bindParam(':idUserReceb', $iduser, PDO::PARAM_INT);
            $queryconect->execute();
            $resulconect = $queryconect->fetchAll(PDO::FETCH_OBJ);

            if ($queryconect->rowCount() > 0) {
              foreach ($resulconect as $rowviews) {

            ?>
                <?php
                $sqlclientes = "SELECT * from tblUserClients WHERE idClient = :idClient";
                $querycliente = $dbh->prepare($sqlclientes);
                $querycliente->bindParam(':idClient', $rowviews->idUserPed, PDO::PARAM_INT);
                $querycliente->execute();
                $resultscliente = $querycliente->fetchAll(PDO::FETCH_OBJ);
                if ($querycliente->rowCount() > 0) {
                  foreach ($resultscliente as $rowcliente) {
                    $sqlOperation = "SELECT * from tblOperations WHERE FlagOperation != '0' AND idOperation = :idOperation";
                    $queryOperation = $dbh->prepare($sqlOperation);
                    $queryOperation->bindParam(':idOperation', $rowcliente->CoreBusinessId, PDO::PARAM_INT);
                    $queryOperation->execute();
                    $resultsOperation = $queryOperation->fetchAll(PDO::FETCH_OBJ);
                    if ($queryOperation->rowCount() > 0) {
                      foreach ($resultsOperation as $rowOperation) { ?>

                        <li class="recommended-user icone-net" style="margin-bottom: 20px;">
                          <form method="POST" enctype="multipart/form-data" class="w-100 h-100 d-flex">
                            <input class="form-control bordainput" value="<?php echo $rowviews->id; ?>" autocomplete="off" name="idconectar" type="hidden">
                            <input class="form-control bordainput" value="<?php echo $rowviews->idUserPed; ?>" autocomplete="off" name="idperfilpedido" type="hidden">
                            <div class="col-2 justify-content-center m-0 p-0">
                              <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                <img src="<?php if ($rowOperation->PersonalUserPicturePath != "Avatar.png" && $rowOperation->PersonalUserPicturePath != "") {
                                            echo "../" . $rowOperation->PersonalUserPicturePath;
                                          } else {
                                            echo "../../assets/img/Avatar.png";
                                          } ?>" alt="user" alt="An unknown user."></a>
                            </div>
                            <div class="col-7 p-0">
                              <p class="mb-0 network-username-text"><b><a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>"><?php echo $rowcliente->FirstName; ?><b> </a></p>
                              <p class="network-operation-text"><a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>"><?php echo $rowOperation->NmOperation; ?></a></p>
                              <p class="network-timeago-text"><?php
                                                              $postDateTime = new DateTime($rowviews->datapedido);

                                                              // Obtenha o objeto DateTime da data e hora atual
                                                              $currentTime = new DateTime();

                                                              // Calcula a diferença entre a data e hora atual e a da postagem
                                                              $timeDiff = $postDateTime->diff($currentTime);

                                                              // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
                                                              if ($timeDiff->y > 0) {
                                                                $timeAgo = $timeDiff->y . " ano(s) atrás";
                                                              } elseif ($timeDiff->m > 0) {
                                                                $timeAgo = $timeDiff->m . " mês(es) atrás";
                                                              } elseif ($timeDiff->d > 0) {
                                                                $timeAgo = $timeDiff->d . " dia(s) atrás";
                                                              } elseif ($timeDiff->h > 0) {
                                                                $timeAgo = $timeDiff->h . " hora(s) atrás";
                                                              } elseif ($timeDiff->i > 0) {
                                                                $timeAgo = $timeDiff->i . " minuto(s) atrás";
                                                              } else {
                                                                $timeAgo = "Alguns segundos atrás";
                                                              }

                                                              echo $timeAgo; ?></p>
                            </div>
                            <div class="col-2 justify-content-center">
                              <button type="submit" name="conectar" value="conectar" class="btn btn-outline-primary ms-1 m-1"><i class="bi bi-person-check-fill icon-btn-card"></i>&nbsp;Connect</button>
                            </div>
                          </form>
                        </li>
                        <hr>
                <?php }
                    }
                  }
                } ?>
            <?php }
            } ?>
          </ul>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <?php include_once("widget/editarperfil.php"); ?>

  <?php include_once("widget/produto.php"); ?>




  <script src="../../assets/js/jquery.slimscroll.min.js"></script>
  <script src="../../assets/js/select2.min.js"></script>
  <script src="../../assets/plugins/summernote/dist/summernote-bs4.min.js"></script>

  <script src="../../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script src="../../assets/js/select2.min.js"></script>
  <script src="../../assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu() {
      profileMenu.classList.toggle("open-menu");
    }
  </script>
  <script>
    $(document).ready(function() {
      // Activate the tab when the link is clicked
      $('a[data-toggle="tab"]').on('click', function(e) {
        e.preventDefault();
        $('#mynetwork').show();
        $('#mynetwork').removeClass('hidden');
        $('#mynetwork').removeClass('fade');
        $(this).tab('show');

      });


      $('#closeMyNetwork').on('click', function(e) {
        e.preventDefault();

        $('#mynetwork').removeClass('show').addClass('fade');
        $('#mynetwork').hide();
      });
    });
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