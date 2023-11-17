<?php

include('../model/classes/conexao.php');
include('../model/classes/tblUserClients.php');
include('../model/classes/tblSearchResults.php');
include('../model/classes/tblOperations.php');
include('../model/classes/tblSearchBusiness.php');
include('../model/classes/tblBusiness.php'); 
include('../model/classes/tblSearchCategory.php');
include('../model/classes/tblCountry.php');

date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}
$iduser = $_SESSION["id"];
if (isset($_GET["busines"])) {
  $busines = $_GET["busines"];
} else {
  $busines = null;
}
if (isset($_GET["operation"])) {
  $operation = $_GET["operation"];
} else {
  $operation = null;
}
if (isset($_GET["text"])) {
  $text = $_GET["text"];
} else {
  $text = null;
}

$_SESSION["n"] = 5;



$userClients = new UserClients($dbh);

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
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <link rel="stylesheet" href="assets/css/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl/owl.theme.default.min.css">
  <title>Searches Profile</title>
  <style>
    /*-----------------
	9. Sidebar
-----------------------*/

    .sidebar {
      background-color: #34444c;
      border-right: 1px solid transparent;
      bottom: 0;
      left: 0;
      margin-top: 0;
      position: fixed;
      top: 60px;
      transition: all 0.2s ease-in-out 0s;
      width: 290px;
      z-index: 1001;
    }

    .sidebar-inner {
      height: 100%;
      transition: all 0.2s ease-in-out 0s;
    }

    .sidebar-menu {
      padding: 10px 0;
    }

    .sidebar-menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      position: relative;
    }

    .sidebar-menu li a:hover {
      color: #fff;
    }

    .sidebar-menu li.active a {
      color: #fff;
      background-color: rgba(0, 0, 0, 0.2);
    }

    .menu-title {
      color: #ebecf1;
      display: flex;
      opacity: 1;
      padding: 5px 15px;
      white-space: nowrap;
    }


    .mobile-user-menu {
      color: #fff;
      display: none;
      float: right;

      height: 60px;
      line-height: 60px;
      padding: 0 20px;
      position: absolute;
      right: 0;
      text-align: right;
      top: 0;
      width: 60px;
      z-index: 10;
    }

    .mobile-user-menu>a {
      color: #fff;
      padding: 0;
    }

    .mobile-user-menu a:hover {
      color: #fff;
    }

    .profile-rightbar {
      display: none !important;
      color: #782580;

      margin-left: 15px;
    }

    .mobile_btn {
      display: none;
      float: left;
    }


    .sidebar-menu .menu-arrow {
      -webkit-transition: -webkit-transform 0.15s;
      -o-transition: -o-transform 0.15s;
      transition: transform .15s;
      position: absolute;
      right: 15px;
      display: inline-block;

      text-rendering: auto;
      line-height: 40px;
      font-size: 18px;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
      -o-transform: translate(0, 0);
      transform: translate(0, 0);
      line-height: 18px;
      top: 11px;

    }

    .sidebar-menu .menu-arrow:before {
      content: "\f105";
    }

    .sidebar-menu li a.subdrop .menu-arrow {
      -ms-transform: rotate(90deg);
      -webkit-transform: rotate(90deg);
      -o-transform: rotate(90deg);
      transform: rotate(90deg);
    }

    .noti-dot:before {
      content: '';
      width: 5px;
      height: 5px;
      border: 5px solid #782580;
      -webkit-border-radius: 30px;
      -moz-border-radius: 30px;
      border-radius: 30px;
      background-color: #782580;
      z-index: 10;
      position: absolute;
      right: 37px;
      top: 15px;
    }

    .noti-dot:after {
      content: '';
      border: 4px solid #782580;
      background: transparent;
      -webkit-border-radius: 60px;
      -moz-border-radius: 60px;
      border-radius: 60px;
      height: 24px;
      width: 24px;
      -webkit-animation: pulse 3s ease-out;
      -moz-animation: pulse 3s ease-out;
      animation: pulse 3s ease-out;
      -webkit-animation-iteration-count: infinite;
      -moz-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
      position: absolute;
      top: 8px;
      right: 30px;
      z-index: 1;
      opacity: 0;
    }

    .sidebar-menu ul ul a .menu-arrow {
      top: 6px;
    }

    .sidebar-menu a {

      transition: unset;
      -moz-transition: unset;
      -o-transition: unset;
      -ms-transition: unset;
      -webkit-transition: unset;
    }

    .page-wrapper {
      left: 0;

      margin-left: 290px;
      padding-top: 60px;
      position: relative;
      transition: all 0.2s ease-in-out;
    }

    .page-wrapper>.content {
      padding: 30px;
    }

    .page-header {
      margin-bottom: 1.875rem;
    }

    .page-header .breadcrumb {
      background-color: transparent;
      color: #6c757d;
      font-size: 1rem;
      font-weight: 500;
      margin-bottom: 0;
      padding: 0;
    }

    .page-header .breadcrumb a {
      color: #333;
    }

    .txthtitulo {
      padding-left: 25px;
    }

    .owl-carousel.owl-drag .owl-item {
      width: 266.12px !important;
    }

    .owl-carousel .owl-stage {
      width: max-content;
      display: flex;
    }

    @media only screen and (max-width: 767.98px) {
      .expanded {
        width: 0 !important;
        /* Defina a largura expandida da sidebar */
        display: none;
        transition: width 0.3s;
      }
    }

    @media only screen and (max-width: 767.98px) {


      .sidebar {
        background-color: #34444c;
        border-right: 1px solid transparent;
        bottom: 0;
        left: 0;
        margin-top: 0;
        position: fixed;
        top: 115px;
        transition: all 0.2s ease-in-out 0s;
        width: 290px;
        z-index: 1001;
      }

      .logo img {
        height: 4.5rem;
        width: 4.5rem;
        border-radius: 1rem;
        margin-right: 1rem;
        display: block;
      }

      .page-wrapper {
        margin-left: 0 !important;
        height: 100%;
        padding-top: 125px;
      }

      .page-wrapper>.content {
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 10px;
        height: -webkit-fill-available;
      }

      .celularcard {
        min-width: 263px !important;
      }

      .owl-item {
        min-width: 370px !important;
      }

      .owl-carousel.owl-drag .owl-item {

        margin-left: 0 !important;
      }

      .owl-carousel.owl-drag .owl-item {
        width: 132.12px !important;
      }

      .owl-stage {
        width: 1926px;
        display: flex;

      }

      .owl-carousel .owl-item {

        min-width: -1% !important;
      }

      .owl-item {
        min-width: 119px !important;
        max-width: 117px !important;
        margin-right: 155px !important;
      }
    }

    .cortardescricao {
      display: -webkit-box;
      max-height: 2.4em !important;
      min-height: 2.4em !important;
      /* Duas linhas com margem para a linha de corte */
      line-height: 1.2em !important;
      /* Altura da linha do texto */
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      /* Adiciona o "..." no final do texto cortado */
      -webkit-line-clamp: 2 !important;
      /* Suporte a navegadores WebKit, como o Chrome */
      -webkit-box-orient: vertical !important;
      text-align: left !important;
    }

    .pdescricaosp {
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      font-size: small;
      -webkit-line-clamp: 7 !important;
      -webkit-box-orient: vertical !important;
      line-height: 1.2em !important;
      display: -webkit-box;
      max-height: 8.4em !important;
      min-height: 8.4em !important;
    }
  </style>
</head>

<body class="funcolinhas">

  <div class="main-wrapper">
    <?php include_once("widget/navbar.php"); ?>
    <div class="sidebar expandeds1" id="sidebar" style="background: #002d4b;">
      <div class="sidebar-inner slimscroll ">
        <div id="sidebar-menu" class="sidebar-menu">
          <div class="card rounded-4 shadow  treeviewmin panddingardtreeview" style="min-height: 100% !important;height: 100% !important;max-height: 100%  !important; margin-top: 0;">
            <div class="card-body p-0 m-0">

              <div class="row p-2 ml-0">
                <ul id="tree1">
                  <?php
                  $operations = new Operations($dbh);
                  $resultsOperation = $operations->consulta("WHERE FlagOperation != '0'");
                  if ($resultsOperation != null) {
                    foreach ($resultsOperation as $rowOperation) {
                  ?>
                      <li>

                        <a href="listcompani.php?operation=<?php echo $rowOperation->idOperation; ?>"><?php if ($rowOperation->FlagOperation != "D") {
                                                                                                        echo "<i class='fa-solid fa-add indicator ' ></i>";
                                                                                                      } ?>
                          <?php echo trim($rowOperation->NmOperation); ?>
                        </a>
                        <div style="text-align: end; width: 24px;float: right;position: initial;">
                          <?php $numerouser1 = new UserClients($dbh);
                          $numerouser1->setCoreBusinessId($rowOperation->idOperation);
                          echo $numerouser1->quantidade(" WHERE CoreBusinessId = :CoreBusinessId"); ?>
                        </div>
                        <?php if ($rowOperation->FlagOperation != "D") { ?>
                          <ul>
                            <?php
                            $business = new Business($dbh);
                            $resultsbusiness = $business->consulta("WHERE FlagOperation = '0' ORDER BY NmBusiness ASC");
                            if ($business != null) {
                              foreach ($resultsbusiness as $rowbusiness) {
                            ?>
                                <li><a class="sizewidgh" href="listcompani.php?busines=<?php echo $rowbusiness->idBusiness; ?>&operation=<?php echo $rowOperation->idOperation; ?>"><?php
                                                                                                                                                                                    echo trim($rowbusiness->NmBusiness); ?> <div style="text-align: end; width: 24px;float: right;position: initial;">
                                      <?php $numerouser2 = new UserClients($dbh);
                                      $numerouser2->setCoreBusinessId($rowOperation->idOperation);
                                      $numerouser2->setSatBusinessId($rowbusiness->idBusiness);
                                      echo $numerouser2->quantidade(" WHERE CoreBusinessId = :CoreBusinessId AND SatBusinessId = :SatBusinessId"); ?>
                                    </div></a>


                                </li>
                            <?php }
                            } ?>
                          </ul>
                        <?php } ?>
                      </li>

                      <hr>
                  <?php }
                  } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
      <div class="content container-fluid" style="margin-left: 0;
    margin-right: 0;
    padding-left: 0;
    padding-right: 0;">
        <div class="row">
          <div class=" col-xl-12">

            <section>
              <?php if ($operation != null && $busines == null && $text == null) {
                $numerousercont = new UserClients($dbh);
                $numerousercont->setCoreBusinessId($operation);
                $contoperationnotresults = $numerousercont->quantidade(" WHERE CoreBusinessId = :CoreBusinessId");
                if ($contoperationnotresults == 0) {
                  echo "<h4>no results found</h4>";
                } else {


              ?>

                  <div class="carousel-filmes">
                    <h2 id="filme" class="titulo2 txthtitulo"><?php


                                                              $operationsnome = new Operations($dbh);
                                                              $operationsnome->setidOperation($operation);
                                                              $resultsOperationome = $operationsnome->consulta("WHERE  idOperation = :idOperation");
                                                              if ($resultsOperationome != null) {
                                                                foreach ($resultsOperationome as $rowOperationome) {
                                                                  echo $rowOperationome->NmOperation;
                                                                }
                                                              }
                                                              ?> - <?php
                                                                    if (isset($contoperationnotresults)) {
                                                                      echo  $contoperationnotresults;
                                                                    } ?>


                    </h2><br>

                    <div class=" owl-carousel owl-thema ">
                      <?php

                      $Operationselect = new UserClients($dbh);
                      $Operationselect->setCoreBusinessId($operation);
                      $resultsOperationselect = $Operationselect->consulta(" WHERE CoreBusinessId = :CoreBusinessId");
                      if ($resultsOperationselect != null) {
                        foreach ($resultsOperationselect as $rowOperationselect) {  ?>
                          <div class="item celularcard">
                            <div class="card rounded-4 shadow celularcard">
                              <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                 <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                <div class="row p-0 ml-0 m-0">
                                  <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                    <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                  echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                } else {
                                                  echo "assets/img/Avatar.png";
                                                } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                  </div>
                                  <div class="col-6">
                                    <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                  </div>
                                </div>
                                <div class="col-12 m-0 p-0">
                                  <hr class="m-0">
                                </div>
                                <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                  <div class="col-9 m-0 p-0" style="width: auto;">
                                    <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                    <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php 

                                                                                                                                                                        $country = new Country($dbh);

                                                                                                                                                                        $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                        $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                        if ($resultsCountry != null) {
                                                                                                                                                                          foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                            echo $rowCountry->NmCountry;
                                                                                                                                                                          }
                                                                                                                                                                        }

                                                                                                                                                                        ?> </h5>
                                  </div>

                                </div>

                                <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                  <p class="pdescricaosp"><?php

                                                          echo $rowOperationselect->descricao;
                                                          ?></p>
                                </div>
                                <div class="col-12 p-2 d-flex justify-content-end">
                                  <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                </div>
                              </div>
                            </div>
                          </div>
                      <?php }
                      } ?>
                    </div>
                  </div>

                <?php }
              }
              if ($operation != null && $busines != null && $text == null) { ?>

                <div class="carousel-filmes">
                  <h2 id="filme" class="titulo2 txthtitulo"><?php
                                                            $operationsnome = new Operations($dbh);
                                                            $operationsnome->setidOperation($operation);
                                                            $resultsOperationome = $operationsnome->consulta("WHERE  idOperation = :idOperation");
                                                            if ($resultsOperationome != null) {
                                                              foreach ($resultsOperationome as $rowOperationome) {
                                                                echo $rowOperationome->NmOperation;
                                                              }
                                                            }
                                                            ?> - <?php $numerousercont = new UserClients($dbh);
                                                                  $numerousercont->setCoreBusinessId($operation);
                                                                  echo $numerousercont->quantidade(" WHERE CoreBusinessId = :CoreBusinessId"); ?></h2><br>
                  <div class=" owl-carousel owl-thema ">
                    <?php

                    $Operationselect = new UserClients($dbh);
                    $Operationselect->setCoreBusinessId($operation);
                    $resultsOperationselect = $Operationselect->consulta(" WHERE CoreBusinessId = :CoreBusinessId");
                    if ($resultsOperationselect != null) {
                      foreach ($resultsOperationselect as $rowOperationselect) {  ?>
                        <div class="item celularcard">
                          <div class="card rounded-4 shadow celularcard">
                            <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                
                             <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                              <div class="row p-0 ml-0 m-0">
                                <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                  <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                echo "" . $rowOperationselect->PersonalUserPicturePath;
                                              } else {
                                                echo "assets/img/Avatar.png";
                                              } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;"  >
                                </div>
                                <div class="col-6">
                                  <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                </div>
                              </div>
                              <div class="col-12 m-0 p-0">
                                <hr class="m-0">
                              </div>
                              <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                <div class="col-9 m-0 p-0" style="width: auto;">
                                  <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                  <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php 

                                                                                                                                                                      $country = new Country($dbh);

                                                                                                                                                                      $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                      $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                      if ($resultsCountry != null) {
                                                                                                                                                                        foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                          echo $rowCountry->NmCountry;
                                                                                                                                                                        }
                                                                                                                                                                      }

                                                                                                                                                                      ?> </h5>
                                </div>

                              </div>

                              <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                <p class="pdescricaosp"><?php

                                                        echo $rowOperationselect->descricao;
                                                        ?></p>
                              </div>
                              <div class="col-12 p-2 d-flex justify-content-end">
                                <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php }
                    } ?>
                  </div>
                </div> <br><br><br>

                <?php
                include_once('../model/classes/tblBusinessCategory.php');
                $tblBusinessCategory = new BusinessCategory($dbh);
                $tblBusinessCategory->setidBusiness($busines);
                $resultstblBusinessCategory = $tblBusinessCategory->consulta(" WHERE idBusiness = :idBusiness");
                if ($tblBusinessCategory != null) {

                  foreach ($resultstblBusinessCategory as $rowBusiness) {
                    $numerousercont = new UserClients($dbh);
                    $numerousercont->setCoreBusinessId($operation);
                    $numerousercont->setIdOperation($rowBusiness->idBusinessCategory);
                    $contcategativos =      $numerousercont->quantidade(" WHERE IdOperation = :IdOperation AND CoreBusinessId = :CoreBusinessId");
                    if ($contcategativos > 0) {


                ?>
                      <div class="carousel-filmes">
                        <h2 id="filme" class="titulo2 txthtitulo"><?php

                                                                  echo  $rowBusiness->NmBusinessCategory;

                                                                  ?> - <?php $numerousercont2 = new UserClients($dbh);
                                                                        $numerousercont2->setCoreBusinessId($operation);
                                                                        $numerousercont2->setIdOperation($rowBusiness->idBusinessCategory);
                                                                        echo $numerousercont2->quantidade(" WHERE IdOperation = :IdOperation AND CoreBusinessId = :CoreBusinessId"); ?></h2><br>
                        <div class=" owl-carousel owl-thema ">
                          <?php

                          $Operationselect3 = new UserClients($dbh);
                          $Operationselect3->setCoreBusinessId($operation);
                          $Operationselect3->setSatBusinessId($busines);
                          $Operationselect3->setIdOperation($rowBusiness->idBusinessCategory);
                          $resultsOperationselect3 = $Operationselect3->consulta(" WHERE CoreBusinessId = :CoreBusinessId AND SatBusinessId = :SatBusinessId AND IdOperation = :IdOperation");
                          if ($resultsOperationselect3 != null) {
                            foreach ($resultsOperationselect3 as $rowOperationselect) {  ?>
                              <div class="item celularcard">
                                <div class="card rounded-4 shadow celularcard">
                                  <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                        <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                    
                                    <div class="row p-0 ml-0 m-0">
                                      <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                        <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                      echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                    } else {
                                                      echo "assets/img/Avatar.png";
                                                    } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                      </div>
                                      <div class="col-6">
                                        <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                      </div>
                                    </div>
                                    <div class="col-12 m-0 p-0">
                                      <hr class="m-0">
                                    </div>
                                    <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                      <div class="col-9 m-0 p-0" style="width: auto;">
                                        <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                        <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php 

                                                                                                                                                                            $country = new Country($dbh);

                                                                                                                                                                            $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                            $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                            if ($resultsCountry != null) {
                                                                                                                                                                              foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                                echo $rowCountry->NmCountry;
                                                                                                                                                                              }
                                                                                                                                                                            }

                                                                                                                                                                            ?> </h5>
                                      </div>

                                    </div>

                                    <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                      <p class="pdescricaosp"><?php

                                                              echo $rowOperationselect->descricao;
                                                              ?></p>
                                    </div>
                                    <div class="col-12 p-2 d-flex justify-content-end">
                                      <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          <?php }
                          } ?>
                        </div>
                      </div><br>



                  <?php  }
                  }
                }
              }
              if ($operation == null && $busines == null && $text != null) {

                if ($text == "mysp" || $text == "Seach Profile" || $text == "seach" || $text == "Seaches Profile" || $text == "seach profile" || $text == "seaches profile" || $text == "my seaches" || $text == "meu seaches" || $text == "seaches") { ?>
                  <div class="carousel-filmes">
                    <div class="row">
                      <div class="col-8 d-flex align-middle">
                        <h1 id="filme" class="titulo2 txthtitulo">Results of SEARCH PROFILES</h1>
                      </div>

                    </div>
                    <br>


                    <?php
                    include_once('../model/classes/tblSearch.php');
                    $Searchcard = new Search($dbh);
                    $Searchcard->setidClient($iduser);
                    $resultSearchcard = $Searchcard->consulta("WHERE idClient = :idClient");
                    if ($resultSearchcard != null) {
                      foreach ($resultSearchcard as $resultConectUnidSearch) { ?>
                        <div class="carousel-filmes">
                          <h2 id="filme" class="titulo2 txthtitulo"><?php echo  $resultConectUnidSearch->Nome; ?> </h2><br>
                          <div class="card col-12" style="height: fit-content;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; width: -webkit-fill-available;box-shadow: 1px -1px 7px 0px #4343433d;">
                            <div class="row" style="padding: 4px;">
                              <div style="font-size: small;"><?php 
                                    $operations = new Operations($dbh);
                                    $operations->setidOperation($resultConectUnidSearch->coreBussinessID);
                                    $resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
                                    if ($resultsoperation != null) {
                                      foreach ($resultsoperation as $rowoperation) {
                                        echo "<b>Core Business: </b>" . $rowoperation->NmOperation;
                                      }
                                    } ?></div>

                              <div style="font-size: small;"><?php 
                                    $tblSearchBusiness = new SearchBusiness($dbh);
                                    $tblSearchBusiness->setidSearch($resultConectUnidSearch->idSearch);
                                    $resultstblSearchBusiness = $tblSearchBusiness->consulta("WHERE idSearch = :idSearch");
                                    $resultstblqtdnum = $tblSearchBusiness->quantidade("WHERE idSearch = :idSearch");
                                    if ($resultstblqtdnum->rowCount() == 10) {
                                      echo "<b>Business: </b> Todos";
                                    } else if ($resultstblqtdnum->rowCount() > 0 && $resultstblqtdnum->rowCount() < 10) {
                                      if ($resultstblSearchBusiness != null) {
                                        $namesbs = array();
                                        foreach ($resultstblSearchBusiness as $rowSearchBusiness) {

                                          $business = new Business($dbh);
                                          $business->setidBusiness($rowSearchBusiness->idBusiness);
                                          $resultsbusiness = $business->consulta("WHERE idBusiness = :idBusiness");
                                          if ($resultsbusiness != null) {
                                            foreach ($resultsbusiness as $rowbusiness) {
                                              $namesbs[] = $rowbusiness->NmBusiness;
                                            }
                                            if (!empty($namesbs)) {
                                              echo "<b>Business: </b>" . implode(", ", $namesbs);
                                            }
                                          }
                                        }
                                      }
                                    }
                                    ?></div>
                              <div style="font-size: small;"><?php
                                    $tblSearchCategory = new SearchCategory($dbh);
                                    $tblSearchCategory->setidSearch($resultConectUnidSearch->idSearch);
                                    $resultstbltblSearchCategory = $tblSearchCategory->consulta("WHERE idSearch = :idSearch");
                                    $resultstblqtdnumcaeg = $tblSearchCategory->quantidade("WHERE idSearch = :idSearch");
                                    if ($resultstbltblSearchCategory != null) {
                                        if($resultstblqtdnumcaeg->rowCount() >5 && $resultstblqtdnumcaeg->rowCount() < 378){
                                              echo  "<b>Business Category: </b>".$resultstblqtdnumcaeg->rowCount();
                                        }else if($resultstblqtdnumcaeg->rowCount() >= 378){
                                             echo  "<b>Business Category: Todos</b>";
                                        }else{
                                             $namesbscateg3 = array();
                                          
                                            
                                             foreach ($resultstbltblSearchCategory as $rowSearchBusinesscateg2) {
                                                 include_once('../model/classes/tblBusinessCategory.php');
                                                $BusinessCategory1 = new BusinessCategory($dbh);
                                                $BusinessCategory1->setidBusinessCategory($rowSearchBusinesscateg2->idCategory);
                                                $resultsBusinessCategory1 = $BusinessCategory1->consulta("WHERE idBusinessCategory = :idBusinessCategory");
                                                 if ($resultsBusinessCategory1 != null) {
                                                    
                                                     foreach ($resultsBusinessCategory1 as $rowbusinesscateg3) {
    
                                                    $namesbscateg3[] = $rowbusinesscateg3->NmBusinessCategory;
                                                  }
                                                 }
                                                 
                                             }
                                              if (!empty($namesbscateg3)) {
                                                    echo "<b>Business Category: </b>" . implode(", ", $namesbscateg3);
                                                  }
                                        }
                                      
                                    }
                                    
                                   /* if ($resultstbltblSearchCategory != null) {}
                                   
                                      if ($resultstblqtdnumcaeg->rowCount() > 5 && $resultstblqtdnumcaeg->rowCount() < 378) {
                                        echo "<b>Business Category: </b>" . $resultstblqtdnumcaeg->rowCount();
                                      }else  if ($resultstblqtdnumcaeg->rowCount() >=378) {
                                           echo "<b>Business Category: Todos</b>";
                                      } else if ($resultstbltblSearchCategory->rowCount() > 0 && $resultstbltblSearchCategory->rowCount() < 10) {
                                        if ($resultstbltblSearchCategory != null) {
                                          $namesbscateg = array();
                                          foreach ($resultstbltblSearchCategory as $rowSearchBusinesscateg) {
                                            include_once('../model/classes/tblBusinessCategory.php');
                                            $BusinessCategory = new BusinessCategory($dbh);
                                            $BusinessCategory->setidBusinessCategory($rowSearchBusinesscateg->idCategory);
                                            $resultsBusinessCategory = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

                                            if ($resultsBusinessCategory != null) {
                                              foreach ($resultsBusinessCategory as $rowbusinesscateg) {

                                                $namesbscateg[] = $rowbusinesscateg->NmBusinessCategory;
                                              }
                                              if (!empty($namesbscateg)) {
                                                echo "<b>Business Category: </b>" . implode(", ", $namesbscateg);
                                              }
                                            }
                                          }
                                        }
                                      }
                                    }*/
                                    ?></div>
                                      <div class="row mb-2" style="padding: 9px;margin: auto;justify-content: space-between;">
                <a href="widget/deletarseach.php?idseach=<?php echo $resultConectUnidSearch->idSearch;?>" class="btn btn-outline-danger ms-1" style="width: 100px;max-height: 35px !important;" ><i class="fas fa-trash-alt " style="margin-right: 5px;"></i>&nbsp;Delete</a>
              
              </div>
                            </div>
                          </div>
                          <div class=" owl-carousel owl-thema ">
                            <?php
                            $idSearchtbl = $resultConectUnidSearch->idSearch;
                            $tblSearchResults2 = new SearchResults($dbh);
                            $tblSearchResults2->setidSearch($idSearchtbl);
                            $tblSearchResults2->setidClientPesquisador($iduser);
                            $tblSearchResultsresults = $tblSearchResults2->consulta("WHERE idSearch = :idSearch AND idClientPesquisador = :idClientPesquisador");
                            if ($tblSearchResultsresults != null) {
                              foreach ($tblSearchResultsresults as $rowsechcliente) {

                            ?>

                                <?php

                                $Operationselect3 = new UserClients($dbh);
                                $Operationselect3->setidClient($rowsechcliente->idClientResultado);
                                $resultsOperationselect3 = $Operationselect3->consulta(" WHERE idClient = :idClient");
                                if ($resultsOperationselect3 != null) {
                                  foreach ($resultsOperationselect3 as $rowOperationselect) {  ?>
                                    <div class="item celularcard">
                                      <div class="card rounded-4 shadow celularcard">
                                        <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                          
                                           <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                          <div class="row p-0 ml-0 m-0">
                                            <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                              <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                            echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                          } else {
                                                            echo "assets/img/Avatar.png";
                                                          } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                            </div>
                                            <div class="col-6">
                                              <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                            </div>
                                          </div>
                                          <div class="col-12 m-0 p-0">
                                            <hr class="m-0">
                                          </div>
                                          <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                            <div class="col-9 m-0 p-0" style="width: auto;">
                                              <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                              <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php 

                                                                                                                                                                                  $country = new Country($dbh);

                                                                                                                                                                                  $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                                  $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                                  if ($resultsCountry != null) {
                                                                                                                                                                                    foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                                      echo $rowCountry->NmCountry;
                                                                                                                                                                                    }
                                                                                                                                                                                  }

                                                                                                                                                                                  ?> </h5>
                                            </div>

                                          </div>

                                          <div class="row mt-3 pr-2" style="
padding-left: 6PX;
padding-right: 6px;
">
                                            <p class="pdescricaosp"><?php

                                                                    echo $rowOperationselect->descricao;
                                                                    ?></p>
                                          </div>
                                          <div class="col-12 p-2 d-flex justify-content-end">
                                            <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <?php }
                                } ?>
                            <?php    }
                            }

                            ?>
                          </div>
                        </div><br>

                      <?php      }
                    }
                  } else {


                    $operationsnomelike = new Operations($dbh);

                    $resultsOperationomelike = $operationsnomelike->consulta("WHERE NmOperation LIKE '%" . $text . "%'");
                    if ($resultsOperationomelike != null) {
                      foreach ($resultsOperationomelike as $rowOperationomelike) { ?>
                        <div class="carousel-filmes">
                          <h2 id="filme" class="titulo2 txthtitulo"><?php


                                                                    echo $rowOperationomelike->NmOperation;

                                                                    ?> - <?php
                                                                          if (isset($contoperationnotresults)) {
                                                                            echo  $contoperationnotresults;
                                                                          } ?>


                          </h2><br>

                          <div class=" owl-carousel owl-thema ">
                            <?php

                            $Operationselect = new UserClients($dbh);
                            $Operationselect->setCoreBusinessId($rowOperationomelike->idOperation);
                            $resultsOperationselect = $Operationselect->consulta(" WHERE CoreBusinessId = :CoreBusinessId");
                            if ($resultsOperationselect != null) {
                              foreach ($resultsOperationselect as $rowOperationselect) {  ?>
                                <div class="item celularcard">
                                  <div class="card rounded-4 shadow celularcard">
                                    <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                       <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                      <div class="row p-0 ml-0 m-0">
                                        <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                          <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                        echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                      } else {
                                                        echo "assets/img/Avatar.png";
                                                      } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                        </div>
                                        <div class="col-6">
                                          <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                        </div>
                                      </div>
                                      <div class="col-12 m-0 p-0">
                                        <hr class="m-0">
                                      </div>
                                      <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                        <div class="col-9 m-0 p-0" style="width: auto;">
                                          <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                          <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php

                                                                                                                                                                              $country = new Country($dbh);

                                                                                                                                                                              $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                              $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                              if ($resultsCountry != null) {
                                                                                                                                                                                foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                                  echo $rowCountry->NmCountry;
                                                                                                                                                                                }
                                                                                                                                                                              }

                                                                                                                                                                              ?> </h5>
                                        </div>

                                      </div>

                                      <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                        <p class="pdescricaosp"><?php

                                                                echo $rowOperationselect->descricao;
                                                                ?></p>
                                      </div>
                                      <div class="col-12 p-2 d-flex justify-content-end">
                                        <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php }
                            } ?>
                          </div>
                        </div>

                      <?php  }
                    }

                    include_once('../model/classes/tblBusiness.php');
                    $Businesslike = new Business($dbh);
                    $resultsBusinesslike = $Businesslike->consulta("WHERE NmBusiness LIKE '%" . $text . "%'");
                    if ($resultsBusinesslike != null) {
                      foreach ($resultsBusinesslike as $rowBusinesslike) { ?>
                        <div class="carousel-filmes">
                          <h2 id="filme" class="titulo2 txthtitulo"><?php


                                                                    echo $rowBusinesslike->NmBusiness;

                                                                    ?> - <?php
                                                                          if (isset($contoperationnotresults)) {
                                                                            echo  $contoperationnotresults;
                                                                          } ?>


                          </h2><br>

                          <div class=" owl-carousel owl-thema ">
                            <?php

                            $Operationselect1 = new UserClients($dbh);
                            $Operationselect1->setSatBusinessId($rowBusinesslike->idBusiness);
                            $resultsOperationselect1 = $Operationselect1->consulta(" WHERE SatBusinessId = :SatBusinessId");
                            if ($resultsOperationselect1 != null) {
                              foreach ($resultsOperationselect1 as $rowOperationselect) {  ?>
                                <div class="item celularcard">
                                  <div class="card rounded-4 shadow celularcard">
                                    <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                       <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                      <div class="row p-0 ml-0 m-0">
                                        <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                          <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                        echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                      } else {
                                                        echo "assets/img/Avatar.png";
                                                      } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;"  >
                                        </div>
                                        <div class="col-6">
                                          <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                        </div>
                                      </div>
                                      <div class="col-12 m-0 p-0">
                                        <hr class="m-0">
                                      </div>
                                      <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                        <div class="col-9 m-0 p-0" style="width: auto;">
                                          <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                          <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php include_once('../model/classes/tblCountry.php');

                                                                                                                                                                              $country = new Country($dbh);

                                                                                                                                                                              $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                              $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                              if ($resultsCountry != null) {
                                                                                                                                                                                foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                                  echo $rowCountry->NmCountry;
                                                                                                                                                                                }
                                                                                                                                                                              }

                                                                                                                                                                              ?> </h5>
                                        </div>

                                      </div>

                                      <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                        <p class="pdescricaosp"><?php

                                                                echo $rowOperationselect->descricao;
                                                                ?></p>
                                      </div>
                                      <div class="col-12 p-2 d-flex justify-content-end">
                                        <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php }
                            } ?>
                          </div>
                        </div>
                      <?php    }
                    }
                    include_once('../model/classes/tblBusinessCategory.php');
                    $tblBusinessCategorylike = new BusinessCategory($dbh);
                    $resultstblBusinessCategorylike = $tblBusinessCategorylike->consulta(" WHERE NmBusinessCategory LIKE '%" . $text . "%'");
                    if ($resultstblBusinessCategorylike != null) {
                      foreach ($resultstblBusinessCategorylike as $rowBusinessCategorylike) { ?>
                        <div class="carousel-filmes">
                          <h2 id="filme" class="titulo2 txthtitulo"><?php


                                                                    echo $rowBusinessCategorylike->NmBusinessCategory;

                                                                    ?> - <?php
                                                                          if (isset($contoperationnotresults)) {
                                                                            echo  $contoperationnotresults;
                                                                          } ?>


                          </h2><br>

                          <div class=" owl-carousel owl-thema ">
                            <?php

                            $Operationselect2 = new UserClients($dbh);
                            $Operationselect2->setIdOperation($rowBusinessCategorylike->idBusinessCategory);
                            $resultsOperationselect2 = $Operationselect2->consulta(" WHERE IdOperation = :IdOperation");
                            if ($resultsOperationselect2 != null) {
                              foreach ($resultsOperationselect2 as $rowOperationselect) {  ?>
                                <div class="item celularcard">
                                  <div class="card rounded-4 shadow celularcard">
                                    <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                      <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                      <div class="row p-0 ml-0 m-0">
                                        <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                          <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                        echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                      } else {
                                                        echo "assets/img/Avatar.png";
                                                      } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                        </div>
                                        <div class="col-6">
                                          <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                        </div>
                                      </div>
                                      <div class="col-12 m-0 p-0">
                                        <hr class="m-0">
                                      </div>
                                      <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                        <div class="col-9 m-0 p-0" style="width: auto;">
                                          <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                          <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php include_once('../model/classes/tblCountry.php');

                                                                                                                                                                              $country = new Country($dbh);

                                                                                                                                                                              $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                              $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                              if ($resultsCountry != null) {
                                                                                                                                                                                foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                                  echo $rowCountry->NmCountry;
                                                                                                                                                                                }
                                                                                                                                                                              }

                                                                                                                                                                              ?> </h5>
                                        </div>

                                      </div>

                                      <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                        <p class="pdescricaosp"><?php

                                                                echo $rowOperationselect->descricao;
                                                                ?></p>
                                      </div>
                                      <div class="col-12 p-2 d-flex justify-content-end">
                                        <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php }
                            } ?>
                          </div>
                        </div>
                      <?php     }
                    }

                    $Operationselectlike = new UserClients($dbh);
                    $resultsOperationselectlike = $Operationselectlike->consulta(" WHERE FirstName LIKE '%" . $text . "%' OR LastName LIKE '%" . $text . "%' OR FirstName LIKE '%" . $text . "%' OR JobTitle LIKE'%" . $text . "%'  OR CompanyName LIKE'%" . $text . "%'");
                    if ($resultsOperationselectlike != null) { ?>
                      <div class="carousel-filmes">
                        <h2 id="filme" class="titulo2 txthtitulo"><?php echo $text; ?> - <?php if (isset($contoperationnotresults)) {
                                                                                            echo  $contoperationnotresults;
                                                                                          } ?>
                        </h2><br>
                        <div class=" owl-carousel owl-thema ">
                          <?php foreach ($resultsOperationselectlike as $rowOperationselect) { ?>
                            <div class="item celularcard">
                              <div class="card rounded-4 shadow celularcard">
                                <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                   <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                    
                                  <div class="row p-0 ml-0 m-0">
                                    <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                      <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                    echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                  } else {
                                                    echo "assets/img/Avatar.png";
                                                  } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                    </div>
                                    <div class="col-6">
                                      <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                    </div>
                                  </div>
                                  <div class="col-12 m-0 p-0">
                                    <hr class="m-0">
                                  </div>
                                  <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                    <div class="col-9 m-0 p-0" style="width: auto;">
                                      <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                      <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php 


                                                                                                                                                                          $country = new Country($dbh);

                                                                                                                                                                          $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                          $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                          if ($resultsCountry != null) {
                                                                                                                                                                            foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                              echo $rowCountry->NmCountry;
                                                                                                                                                                            }
                                                                                                                                                                          }

                                                                                                                                                                          ?> </h5>
                                    </div>

                                  </div>

                                  <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                    <p class="pdescricaosp"><?php

                                                            echo $rowOperationselect->descricao;
                                                            ?></p>
                                  </div>
                                  <div class="col-12 p-2 d-flex justify-content-end">
                                    <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                        </div>

                      </div>
                    <?php } ?>

                    <?php
                    $countrylike = new Country($dbh);
                    $resultsCountrylike = $countrylike->consulta("WHERE NmCountry LIKE '%" . $text . "%' ");
                    if ($resultsCountrylike != null) {

                      foreach ($resultsCountrylike as $rowCountrylike) {
                        $paisclientepais = new UserClients($dbh);
                        $paisclientepais->setidCountry($rowCountrylike->idCountry);
                        $resultspaisclientepais1 = $paisclientepais->consulta(" WHERE idCountry = :idCountry");
                        if ($resultspaisclientepais1 != null) { ?>
                          <div class="carousel-filmes">
                            <h2 id="filme" class="titulo2 txthtitulo"><?php echo $text; ?> -
                            </h2><br>
                            <div class=" owl-carousel owl-thema ">
                              <?php foreach ($resultspaisclientepais1 as $rowOperationselect) {  ?>
                                <div class="item celularcard">
                                  <div class="card rounded-4 shadow celularcard">
                                    <div class="card-body p-0 m-0" style="min-height: 300px !IMPORTANT;">
                                       <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($rowOperationselect->LogoPicturePath != "Avatar.png" && $rowOperationselect->LogoPicturePath != "" && $rowOperationselect->LogoPicturePath != null) {
                                                        echo "" . $rowOperationselect->LogoPicturePath;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);
    min-height: 100px;
    border-top-left-radius: var(--bs-border-radius-lg)!important;
    border-top-right-radius: var(--bs-border-radius-lg)!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
               
              </div>
                                      <div class="row p-0 ml-0 m-0">
                                        <div class="col-6 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                          <img src=" <?php if ($rowOperationselect->PersonalUserPicturePath != "Avatar.png" && $rowOperationselect->PersonalUserPicturePath != "") {
                                                        echo "" . $rowOperationselect->PersonalUserPicturePath;
                                                      } else {
                                                        echo "assets/img/Avatar.png";
                                                      } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover;box-shadow: 0px -3px 11px #0000005e;" >
                                        </div>
                                        <div class="col-6">
                                          <h4 class="fonte-titulo cortardescricao mr-1"><?php echo  $rowOperationselect->FirstName . " " . $rowOperationselect->LastName; ?></h4>

                                        </div>
                                      </div>
                                      <div class="col-12 m-0 p-0">
                                        <hr class="m-0">
                                      </div>
                                      <div class="row mt-3 pr-2" style="padding: 5px !important; margin: 0px !important; width: -webkit-fill-available;">
                                        <div class="col-9 m-0 p-0" style="width: auto;">
                                          <h5 class="fonte-principal "><i class="fa-solid fa-building icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php echo  $rowOperationselect->JobTitle . ' at ' . $rowOperationselect->CompanyName ?></h5>
                                          <h5 class="fonte-principal"><i class="fa-solid fa-globe icon-notif-zoom mini-profile-icon" style="font-size: 12px;"></i>&nbsp;&nbsp;<?php 

                                                                                                                                                                              $country = new Country($dbh);

                                                                                                                                                                              $country->setidCountry($rowOperationselect->idCountry);

                                                                                                                                                                              $resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

                                                                                                                                                                              if ($resultsCountry != null) {
                                                                                                                                                                                foreach ($resultsCountry as $rowCountry) {
                                                                                                                                                                                  echo $rowCountry->NmCountry;
                                                                                                                                                                                }
                                                                                                                                                                              }

                                                                                                                                                                              ?> </h5>
                                        </div>

                                      </div>

                                      <div class="row mt-3 pr-2" style="
    padding-left: 6PX;
    padding-right: 6px;
">
                                        <p class="pdescricaosp"><?php

                                                                echo $rowOperationselect->descricao;
                                                                ?></p>
                                      </div>
                                      <div class="col-12 p-2 d-flex justify-content-end">
                                        <a href="viewProfile.php?profile=<?php echo $rowOperationselect->idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                          <?php }
                            }
                          } ?>
                            </div>

                          </div>
                      <?php }
                  } ?>

                    <?php
                  } ?>



            </section>
          </div>

        </div>
      </div>
    </div>
  </div>





  <script src="assets/js/owl/owl.carousel.min.js"></script>
  <script src="assets/js/owl/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  <script>
    var $wrapper = $('.main-wrapper');
    $('body').append('<div class="sidebar-overlay"></div>');
    $('#mobile_btn').on('click', function() {
      if ($('#sidebar').hasClass('expandeds1')) {
        closeNav();
      } else {
        openNav();
      }

    });
    $.fn.extend({
      treed: function(o) {

        var openedClass = 'glyphicon-minus-sign';
        var closedClass = 'glyphicon-plus-sign';


        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function() {
          var branch = $(this); //li with children ul

          branch.addClass('branch');
          branch.on('click', function(e) {
            if (this == e.target) {

              $(this).children().children().toggle();
            }
          })
          branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function() {
          $(this).on('click', function() {
            $(this).closest('li').click();
          });
        });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function() {
          $(this).on('click', function(e) {
            $(this).closest('li').click();
            e.preventDefault();
          });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function() {
          $(this).on('click', function(e) {
            $(this).closest('li').click();
            e.preventDefault();
          });
        });
      }
    });

    //Initialization of treeviews

    $('#tree1').treed();



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
    $(document).ready(function() {
      // Ao clicar em um link de produto
      $('.hero-image-container2').click(function() {
        // Obtenha o ID do produto associado ao link clicado
        var idFeed = $(this).data('id');
        console.log(idFeed);
        // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
        $.ajax({
          type: 'GET',
          url: 'visualizarComent.php', // Substitua pelo caminho correto
          data: {
            idFeed: idFeed
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

    document.querySelector('.collapse-chat').addEventListener('click', function() {
      this.classList.toggle('open');
    });



    document.getElementById('comentbtn').addEventListener('click', function(e) {
      e.preventDefault(); // Impede o comportamento padrão do link
      var viewsElement = document.getElementById('modalEditarProduto');
      if (viewsElement.classList.contains('d-none')) {
        viewsElement.classList.remove('d-none');
        viewsElement.classList.add('show');
      } else {
        viewsElement.classList.add('d-none');
      }
    });

    function likeColor(element) {
      var likeIcon = element.previousElementSibling;
      likeIcon.classList.add("red-like"); // Adiciona a classe CSS "red-like" ao ícone de like
    }


    $(document).ready(function() {
      function readURL(input) {
        if (input.files && input.files[0]) {
          console.log("teste");
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



    function redirectToAnotherPage() {
      var form = document.getElementById('formularionome');
      var textValue = form.querySelector('[name="text"]').value;

      // Redireciona para listcompani.php com o parâmetro GET "text"
      window.location.href = 'listcompani.php?text=' + encodeURIComponent(textValue);
    }


    /* Set the width of the sidebar to 250px (show it) */
    function openNav() {
      document.getElementById("sidebar").classList.add("expandeds1");
      document.getElementById("sidebar").style.width = "250px";
      document.getElementById("sidebar").style.display = "flex";
      document.getElementById("sidebar").style.left = "0px";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
      document.getElementById("sidebar").classList.remove("expandeds1");
      document.getElementById("sidebar").style.width = "0";
      document.getElementById("sidebar").style.display = "none";
      document.getElementById("sidebar").style.left = "-50px";
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


    populateSlider();
    populateSlider();

    // delete the initial movie in the html
    const initialMovie = document.getElementById("movie0");
    initialMovie.remove();

    // Update the indicators that show which page we're currently on
    function updateIndicators(index) {
      indicators.forEach((indicator) => {
        indicator.classList.remove("active");
      });
      let newActiveIndicator = indicators[index];
      newActiveIndicator.classList.add("active");
    }

    // Scroll Left button
    btnLeft.addEventListener("click", (e) => {
      let movieWidth = document.querySelector(".movie").getBoundingClientRect().width;
      let scrollDistance = movieWidth * 1; // 

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

    /*function atualizarFeed() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divFeedUpdate").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "atualizarFeed.php", true);
        xmlhttp.send();
    }*/

    $(document).ready(function() {
      // Detecta o evento de rolagem
      $(window).scroll(function() {
        // Verifica se chegou ao final da página
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
          // Chama a função quando o usuário chegar ao final da página
          // atualizarFeed();
        }
      });
    });
  </script>
</body>

</html>