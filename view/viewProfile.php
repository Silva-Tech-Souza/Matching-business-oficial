<?php
include('../model/classes/conexao.php');
include('../model/ErrorLog.php');
include('../model/classes/tblUserClients.php');
include('../model/classes/tblCountry.php');
include('../model/classes/tblOperations.php');
include('../model/classes/tblBusiness.php');
include('../model/classes/tblBusinessCategory.php');
include('../model/classes/tblViews.php');
include('../model/classes/tblSearchProfile_Results.php');
include('../model/classes/tblConect.php');
include('../model/classes/tblProducts.php');
include('../model/classes/tblProductPictures.php');
include('../model/classes/tblFeeds.php');
include('../model/classes/tblCurtidas.php');
include('../model/classes/tbPostComent.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: index.php");
}

if($_GET["profile"] == null || !isset($_GET["profile"])){
  header("Location: ../view/login.php");
}
$iduser = $_SESSION["id"];
$idusers = $_GET["profile"];

$geral = $_SESSION["id"];




$UserClient = new UserClients($dbh);
$UserClient->setidClient($idusers);
$resultsgeral = $UserClient->consulta("WHERE idClient = :idClient");

if ($resultsgeral != null) {
  foreach ($resultsgeral as $rowgeral) {
    $imgperfilgeral = $rowgeral->PersonalUserPicturePath;
  }
}

$_SESSION["n"] = 5;


$UserClient = new UserClients($dbh);
$UserClient->setidClient($idusers);
$results = $UserClient->consulta("WHERE idClient = :idClient");

if ($results != null) {
  foreach ($results as $row) {
    $username =  $row->FirstName . " " . $row->LastName;
    $FirstName = $row->FirstName;
    $LastName = $row->LastName;
    $email = $row->email;
    $numberfone  = $row->WhatsAppNumber;
    $descricao  = $row->descricao;
    $jobtitle = $row->JobTitle;
    $idcountry = $row->idCountry;
    $idoperation = $row->IdOperation;
    $corebusiness = $row->CoreBusinessId;
    $satBusinessId =  $row->SatBusinessId;
    $companyname = $row->CompanyName;
    $imgperfils = $row->PersonalUserPicturePath;
    $imgcapas = $row->LogoPicturePath;
    $descricao =  $row->descricao;
  }
}

$UserClientreal = new UserClients($dbh);
$UserClientreal->setidClient($iduser);
$resultsreal = $UserClientreal->consulta("WHERE idClient = :idClient");
if ($resultsreal != null) {
  foreach ($resultsreal as $row) {
    $imgperfil = $row->PersonalUserPicturePath;
  }
}


$Country = new Country($dbh);
$Country->setidCountry($idcountry);
$resultsCountry = $Country->consulta("WHERE idCountry = :idCountry");

if ($resultsCountry != null) {
  foreach ($resultsCountry as $rowCountry) {
    $pais =  $rowCountry->NmCountry;
  }
}


$Operations = new Operations($dbh);
$Operations->setidOperation($corebusiness);
$resultsbusiness = $Operations->consulta("WHERE idOperation = :idOperation");

if ($resultsbusiness != null) {
  foreach ($resultsbusiness as $rowbusiness) {
    $NmBusiness =  $rowbusiness->NmOperation;
  }
}


if ($satBusinessId != null) {

  $Business = new Business($dbh);
  $Business->setidBusiness($satBusinessId);
  $resultsbusinesscor = $Business->consulta("WHERE `idBusiness` = :idBusiness");

  if ($resultsbusinesscor != null) {
    foreach ($resultsbusinesscor as $rowbusinesscor) {
      $NmBusinesscor =  $rowbusinesscor->NmBusiness;
    }
  }
}




$BusinessCategory = new BusinessCategory($dbh);
$BusinessCategory->setidBusinessCategory($idoperation);
$resultsbusinesscateg = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

if ($resultsbusinesscateg != null) {
  foreach ($resultsbusinesscateg as $rowbusinesscateg) {
    $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
    $idbusinesscateg = $rowbusinesscateg->idBusiness;
  }
}




$Views = new Views($dbh);
$Views->setidUser($geral);
$Views->setidView($idusers);
$resultView = $Views->consulta("WHERE idUser = :idUser AND idView = :idView AND  DATE(datacriacao) = CURDATE()");

if ($resultView == null) {


  $Views = new Views($dbh);
  $Views->setidUser($geral);
  $Views->setidView($idusers);
  $Views->setdatacriacao(date("Y/m/d"));

  $Views->cadastrar();




  $searchprofile_results = new SearchProfile_Results($dbh);

  $searchprofile_results->setidUsuario($geral);
  $searchprofile_results->setidClienteEncontrado($idusers);
  $searchprofile_results->setpostId("#");
  $searchprofile_results->seturl("viewProfile.php?profile=" . $geral);
  $searchprofile_results->setidTipoNotif("2");
  $searchprofile_results->setestadoNotif("0");
  $searchprofile_results->cadastrar();
}




$connecttem = new Conect($dbh);

$connecttem->setidUserPed($idusers);
$connecttem->setidUserReceb($geral);

$respoconect = $connecttem->consulta("WHERE idUserPed = :idUserPed AND idUserReceb = :idUserReceb");

if ($respoconect != null) {
  foreach ($respoconect as $rowconnect) {
    $temconexao = $rowconnect->status;
    $idconect = $rowconnect->id;
  }
} else {
  $temconexao = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Perfil</title>
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
  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
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


    .expanded {
      width: 0 !important;
      /* Defina a largura expandida da sidebar */
      display: none;
      transition: width 0.3s;
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
    }
  </style>
  
 
</head>

<body class="funcolinhas">
  <script>
    function showCurtida(iddiv) {
      if (iddiv == "") {
        document.getElementById("div-" + iddiv).innerHTML = "";
        return;
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("div-" + iddiv).innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "widget/atualizarcurtida.php?id=" + iddiv, true);
      xmlhttp.send();
    }

    function showDCurtida(iddiv) {
      if (iddiv == "") {
        document.getElementById("div-" + iddiv).innerHTML = "";
        return;
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("div-" + iddiv).innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "widget/atualizardescurtida.php?id=" + iddiv, true);
      xmlhttp.send();
    }
  </script>
  <script>
    setInterval(function() {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("notifUpdate").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "widget/atualizarNotif.php", true);
      xmlhttp.send();
    }, 5000);
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var rowProduct = document.querySelector(".rowProduct");
      var rowProductInner = rowProduct.innerHTML;
      var scrollPosition = 0;
      var isMouseOver = false;
      var startX, startScrollPosition;

      // Clone o conteúdo da lista para criar o loop contínuo
      rowProduct.innerHTML += rowProductInner;

      function autoScroll() {
        if (!isMouseOver) {
          scrollPosition += 4;
          if (scrollPosition >= rowProduct.scrollWidth / 2) {
            scrollPosition = 0;
          }
          rowProduct.scrollLeft = scrollPosition;
        }
      }

      function handleMouseDown(event) {
        isMouseOver = true;
        startX = event.clientX;
        startScrollPosition = rowProduct.scrollLeft;
      }

      function handleMouseMove(event) {
        if (isMouseOver) {
          var deltaX = startX - event.clientX;
          rowProduct.scrollLeft = startScrollPosition + deltaX;
        }
      }

      function handleMouseUp() {
        isMouseOver = false;
      }

      rowProduct.addEventListener("mousedown", handleMouseDown);
      rowProduct.addEventListener("mousemove", handleMouseMove);
      rowProduct.addEventListener("mouseup", handleMouseUp);
      rowProduct.addEventListener("mouseleave", handleMouseUp);

      setInterval(autoScroll, 50);
    });
  </script>
  <script>
    $(document).ready(function() {
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            if (input.files[0].type.startsWith('image')) {
              $('#preview-image').attr('src', e.target.result).show();
              $('#preview-video').hide();
            } else if (input.files[0].type.startsWith('video')) {
              $('#preview-video').attr('src', e.target.result).show();
              $('#preview-image').hide();
            }
          };
          reader.readAsDataURL(input.files[0]);
        } else {
          $('#preview-image').attr('src', '').hide();
          $('#preview-video').attr('src', '').hide();
        }
      }

      $('#file-input').on('change', function() {
        readURL(this);
      });
      $('#video-input').on('change', function() {
        readURL(this);
      });

    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      if (window.innerWidth >= 992) { // Adiciona a classe apenas para telas maiores ou iguais a 992 pixels (tamanhos de tela de PC)
        var profileColumn = document.getElementById("profile-column");
        profileColumn.classList.add("position-fixed");
      } else {
        var profileColumn = document.getElementById("profile-column");
        profileColumn.classList.remove("position-fixed");
      }


    });
  </script>
  <?php include_once("widget/navbar.php"); ?>
  <div class="sidebar expanded " id="sidebar" style="background: #002d4b;">
    <div class="sidebar-inner slimscroll ">
      <div id="sidebar-menu" class="sidebar-menu">
        <div class="card rounded-4 shadow  treeviewmin panddingardtreeview" style="min-height: 100% !important;height: 100% !important;max-height: 100%  !important; margin-top: 0;">
          <div class="card-body p-0 m-0">

            <div class="row p-2 ml-0">
              <ul id="tree2">
                <?php
                include_once('../model/classes/tblOperations.php');
                $operations1 = new Operations($dbh);
                $resultsOperation1 = $operations1->consulta("WHERE FlagOperation != '0'");
                if ($resultsOperation1 != null) {
                  foreach ($resultsOperation1 as $rowOperation) {
                ?>
                    <li>

                      <a href="listcompani.php?operation=<?php echo $rowOperation->idOperation; ?>"><?php if ($rowOperation->FlagOperation != "D") {
                                                                                                      echo "<i class='fa-solid fa-add indicator ' ></i>";
                                                                                                    } ?>
                        <?php echo trim($rowOperation->NmOperation); ?>
                      </a>
                      <div style="text-align: end; width: 24px;float: right;position: initial;">
                        <?php $numerouser22 = new UserClients($dbh);
                        $numerouser22->setCoreBusinessId($rowOperation->idOperation);
                        echo $numerouser22->quantidade(" WHERE CoreBusinessId = :CoreBusinessId"); ?>
                      </div>
                      <?php if ($rowOperation->FlagOperation != "D") { ?>
                        <ul>
                          <?php
                          $business1 = new Business($dbh);
                          $resultsbusiness1 = $business1->consulta("WHERE FlagOperation = '0' ORDER BY NmBusiness ASC");
                          if ($resultsbusiness1 != null) {
                            foreach ($resultsbusiness1 as $rowbusiness) {
                          ?>
                              <li><a class="sizewidgh" href="listcompani.php?busines=<?php echo $rowbusiness->idBusiness; ?>&operation=<?php echo $rowOperation->idOperation; ?>"><?php
                                                                                                                                                                                  echo trim($rowbusiness->NmBusiness); ?> <div style="text-align: end; width: 24px;float: right;position: initial;">
                                    <?php $numerouser3 = new UserClients($dbh);
                                    $numerouser3->setCoreBusinessId($rowOperation->idOperation);
                                    $numerouser3->setSatBusinessId($rowbusiness->idBusiness);
                                    echo $numerouser3->quantidade(" WHERE CoreBusinessId = :CoreBusinessId AND SatBusinessId = :SatBusinessId"); ?>
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

  <div class="telacheia">
    <div class="col-md-12 p-2 m-0">
      <div class="row telacheia margemmnavbar">

        <!-- Esquerda -->
        <div id="profile-column" class="shadow col-12 col-md-12 col-lg-3 justify-content-start overflow-auto scrollable-column fixed-on-desktop">
          <div class="card rounded-4 shadow">
            <div class="card-body p-0 m-0">
                 <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($imgcapas != "Avatar.png" && $imgcapas != "" && $imgcapas != null) {
                                                        echo "" . $imgcapas;
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
             
              <div class="row p-0 ml-0">
                <div class="col-5 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                  <img src=" <?php if ($imgperfils != "Avatar.png" && $imgperfils != "") {
                                echo "" . $imgperfils;
                              } else {
                                echo "assets/img/Avatar.png";
                              } ?>" alt="user" class="border-2 mini-profile-img " onclick="toggleMenu()">
                </div>
                <div class="col-5 p-0 m-0">
                  <h3 class="fonte-titulo"><?php echo $username; ?></h3>
                  <h6 class="fonte-principal"><?php echo $jobtitle . ' at ' . $companyname ?></h6>
                </div>
              </div>
              <div class="col-12 m-0 p-0">
                <hr class="m-0">
              </div>
              <div class="row mt-3 pr-2">
                <div class="col-9 m-0 p-0">

                  <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-globe "></i>&nbsp;&nbsp;<?php echo $pais; ?></h5>

                </div>
                <div class="col-3 m-0 p-0">

                </div>
              </div>
              <div class="row pr-2">
                <div class="col-9 m-0 p-0 mr-2">
                  <div class="col-12 m-0 p-0">

                    <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope "></i>&nbsp;&nbsp;<?php echo $email; ?></h5>

                  </div>
                </div>

              </div>
              <div class="row pr-2  mb-2">
                <div class="col-9 m-0 p-0 mr-2">

                  <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-phone-square "></i>&nbsp;&nbsp;<?php echo $numberfone; ?></h5>
                </div>
                <div class="col-3 m-0 p-0">
                  <h5 class="fonte-principal text-left"></h5>
                </div>
              </div>
              <div class="row pr-2  mb-2">
                <div class="col-9 m-0 p-0 mr-2">

                  <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-building "></i>&nbsp;&nbsp;<?php echo  $NmBusiness; ?></h5>
                </div>
                <div class="col-3 m-0 p-0">
                  <h5 class="fonte-principal text-left"></h5>
                </div>
              </div>
              <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") {
              ?>
                <div class="row pr-2  mb-2">
                  <div class="col-9 m-0 p-0 mr-2">

                    <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-briefcase "></i>&nbsp;&nbsp;<?php if (isset($NmBusinesscor)) {
                                                                                                                            echo  $NmBusinesscor;
                                                                                                                          } ?></h5>
                  </div>
                  <div class="col-3 m-0 p-0">
                    <h5 class="fonte-principal text-left"></h5>
                  </div>
                </div>
                <div class="row pr-2  mb-2">
                  <div class="col-9 m-0 p-0 mr-2">

                    <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-briefcase "></i>&nbsp;&nbsp;<?php echo  $NmBusinessCategory; ?></h5>
                  </div>
                  <div class="col-3 m-0 p-0">
                    <h5 class="fonte-principal text-left"></h5>
                  </div>
                </div>
              <?php } ?>
              <div class="row pr-2  mb-2">
                  <?php if($idusers != $geral){?>
                <form method="POST" action="../controller/viewProfileController.php" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $idusers; ?>" name="iduser">
                  <input type="hidden" value="<?php echo $geral; ?>" name="geral">
                  <input type="hidden" value="<?php echo $idconect; ?>" name="idconectar">
                  <div class="col-12 m-0 p-0 mr-2">

                    <?php if ($temconexao == "1" && $temconexao != "") { ?>
                      <button type="submit" name="desconectar" value="desconectar" class="btn btn-outline-danger ms-1 m-1"><i class="bi bi-person-x-fill icon-btn-card"></i>&nbsp;Disconnect</button>
                    <?php   } else 
                  if ($temconexao == "0" && $temconexao != "") { ?>
                      <button type="submit" name="aceitar" value="aceitar" class="btn btn-outline-warning ms-1 m-1"><i class="bi bi-person-x-fill icon-btn-card"></i>&nbsp;Accept connection</button>
                    <?php   } else if ($temconexao == "" || $temconexao == "#" || $temconexao == null) { ?>
                      <button type="submit" name="conectar" value="conectar" class="btn btn-outline-primary ms-1 m-1"><i class="bi bi-person-plus-fill icon-btn-card"></i>&nbsp;Connect</button>
                    <?php   } ?>
                    <?php if ($temconexao == "1" && $temconexao != "") { ?>
                      <a href="chatPage.php?idClientConversa=<?php echo $idusers; ?>" class="btn btn-outline-primary ms-1 m-1"><i class="bi bi-chat-dots-fill icon-btn-card"></i>&nbsp;Message</a>
                    <?php } ?>

                  </div>
                </form>
                <?php }?>
              </div>
            </div>
          </div>
         <div class="card rounded-4 shadow mt-2 margemdesck">
            <div class="card-body p-0 m-0" style="overflow-y: auto !important;
    max-height: 312px !important;
    overflow-x: hidden !important;
    min-height: 312px !important;">
              <div class="row ">
                <div class="col-12 ">

                  <p class="fonte-titulo" style="padding: 7px; font-size: 17px;">Description</p>

                </div>
                <div class="col-12 ">

                  <p class="fonte-principal" style="padding: 7px; font-size: 14px;" id="descricao"><?php echo $descricao; ?></p>


                </div>
                <div class="col-3 m-0 p-0">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-3"></div>

        <!-- Meio -->
        <div class="col-lg-9 col-12 justify-content-center">
          <div class="col-md-12  justify-content-center">
            <div class="col-md-12">
              <?php if ($corebusiness != "3" && $corebusiness != "4") {
              ?>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-body shadow">
                      <div class="row">
                        <div class="col-sm-12">
                          <h2 class="text-muted valoresinsi"><b>Products</b></h2>
                        </div>

                      </div>
                      <div class="row rowProduct overflow-auto">
                        <?php
                        $products = new Products($dbh);
                        $products->setidClient($idusers);
                        $resultsProdutos = $products->consulta("WHERE idClient = :idClient  ORDER BY idProduct ASC ");
                        if ($resultsProdutos != null) {
                          if (is_array($resultsProdutos) || is_object($resultsProdutos)) {
                            foreach ($resultsProdutos as $rowProdutos) {
                        ?>
                        
                            <div class="card-container bcolor-azul-escuro rounded-4" style="width: -webkit-fill-available; height: 274px; margin-left: 10px !important;">
                                <div class="col-12" style="display: flex; flex-direction: column; min-height: 140px; max-height: 140px; padding: 4px; width: -webkit-fill-available;">
                                    <a data-toggle="modal" data-target="#modalViewProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                                        <img class="hero-image produtos-img rounded-4" style=" user-drag: none;" src="<?php

                                                                              $productsPicture = new ProductPictures($dbh);
                                                                              $productsPicture->setidProduct($rowProdutos->idProduct);

                                                                              $resultsProductsPicture = $productsPicture->consulta("WHERE idProduct = :idProduct");


                                                                              if ($resultsProductsPicture != null) {
                                                                                foreach ($resultsProductsPicture as $rowProdutos1) {
                                                                                  echo $rowProdutos1->tblProductPicturePath;
                                                                                  break;
                                                                                }
                                                                              } else {
                                                                                echo "https://images.unsplash.com/photo-1507608158173-1dcec673a2e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80";
                                                                              }
                                                                              ?>" alt="Spinning glass cube" />
                                  </a>
                                   <div class="col-12" style="padding: 6px;">
                                    <div class="col-12">
                                        <a data-toggle="modal" data-target="#modalViewProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="">
                                            <h5 class="mb-0 fonte-titulo" style="white-space: pre-line; color: #fff;text-transform: uppercase; font-weight: 800 !important;"><?php echo $rowProdutos->ProductName; ?></h5>
                                        </a>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <a data-toggle="modal" data-target="#modalViewProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="" style="color: #ffffff !important;">
                                            <p class="color-cinza-b fonte-principal" style="color: #fff !important; max-height: 7em; overflow: hidden;">
                                                <?php echo $rowProdutos->ProdcuctDescription; ?>
                                            </p>
                                        </a>
                                        </div>

                                </div>
                                </div>
                              </div>

                        <?php }
                          }
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } else {  ?>

              <?php } ?>
            </div>
            <div class="col-md-12">



              <div id="divFeedUpdate">
                <?php

                //$sqlFeed = "SELECT * from tblFeeds ORDER BY Published_at DESC LIMIT 5";
                //$queryfeed = $dbh->prepare($sqlFeed);
                //$queryfeed->execute();
                //$resultsfeed = $queryfeed->fetchAll(PDO::FETCH_OBJ);


                $feeds = new Feeds($dbh);
                $feeds->setidClient($idusers);
                $resultsfeed = $feeds->consulta("WHERE idClient = :idClient ORDER BY Published_at DESC LIMIT 8");

                if ($resultsfeed != null) {
                  foreach ($resultsfeed as $rowfeed) {
                    // Obtenha a data e hora da postagem no formato DATETIME do banco de dados
                    $postDateTime = new DateTime($rowfeed->Published_at);

                    // Obtenha o objeto DateTime da data e hora atual
                    $currentTime = new DateTime();

                    // Calcula a diferença entre a data e hora atual e a da postagem
                    $timeDiff = $postDateTime->diff($currentTime);

                    // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
                    if ($timeDiff->y > 0) {
                      $timeAgo = $timeDiff->y . " year(s) ago";
                    } elseif ($timeDiff->m > 0) {
                      $timeAgo = $timeDiff->m . " month(s) ago";
                    } elseif ($timeDiff->d > 0) {
                      $timeAgo = $timeDiff->d . " day(s) ago";
                    } elseif ($timeDiff->h > 0) {
                      $timeAgo = $timeDiff->h . " hour(s) ago";
                    } elseif ($timeDiff->i > 0) {
                      $timeAgo = $timeDiff->i . " minute(s) ago";
                    } else {
                      $timeAgo = "A few seconds ago";
                    }
                    //$sqluserpost = "SELECT * from tblUserClients WHERE idClient = :idClient";
                    //$queryuserpost = $dbh->prepare($sqluserpost);
                    //$queryuserpost->bindParam(':idClient', $rowfeed->IdClient, PDO::PARAM_INT);
                    //$queryuserpost->execute();
                    //$resultsuserpost = $queryuserpost->fetchAll(PDO::FETCH_OBJ);

                    

                    $userClients = new UserClients($dbh);

                    $userClients->setidClient($rowfeed->IdClient);

                    $resultsuserpost = $userClients->consulta("WHERE idClient = :idClient");

                    if ($resultsuserpost != null) {
                      foreach ($resultsuserpost as $rowuserpost) {
                        $usernamepost = $rowuserpost->FirstName . " " . $rowuserpost->LastName;
                        $idpostoperation = $rowuserpost->CoreBusinessId;
                        $imgpostuser = $rowuserpost->PersonalUserPicturePath;
                      }
                    }
                ?>
                    <div class="card shadow p-0 bcolor rounded-4 mt-4 mb-4">
                      <div class="card-body shadow d-flex flex-column rounded-4 color-cinza">

                        <div class=" row align-content-center">
                          <div class="row">
                            <div class="col-1">
                              <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "" && file_exists("" . $imgpostuser)) {
                                          echo "" . $imgpostuser;
                                        } else {
                                          echo "assets/img/Avatar.png";
                                        } ?>" alt="user" class="nav-profile-img  " style="min-height: 35px;" onerror="this.onerror=null; this.src='/assets/img/Avatar.png'">

                            </div>
                            <div class="col-8 p-2 color-preto" style="padding-left: 26px !important;">
                              <a href="viewProfile.php?profile=<?php echo $rowfeed->IdClient; ?>" class="color-preto text-decoration-none">
                                <h3 class="fonte-titulo text-decoration-none">
                                  <?php
                                  echo $usernamepost;
                                  ?>
                                </h3>
                              </a>
                              <?php

                              //$sqlOperationpost = "SELECT * from tblOperations WHERE FlagOperation != '0' AND idOperation = :idOperation";
                              //$queryOperationpost = $dbh->prepare($sqlOperationpost);
                              //$queryOperationpost->bindParam(':idOperation', $idpostoperation, PDO::PARAM_INT);
                              //$queryOperationpost->execute();
                              //$resultsOperationpost = $queryOperationpost->fetchAll(PDO::FETCH_OBJ);


                              $operations = new Operations($dbh);

                              $operations->setidOperation($idpostoperation);
                              $operations->setFlagOperation('0');

                              $resultsOperationpost = $operations->consulta("WHERE FlagOperation != :FlagOperation AND idOperation = :idOperation");

                              if ($resultsOperationpost != null) {
                                foreach ($resultsOperationpost as $rowOperationpost) {
                                  echo $rowOperationpost->NmOperation;
                                }
                              }
                              ?><br>

                            </div>
                            <div class="col-3 d-flex text-right color-preto justify-content-end">

                              <?php echo $timeAgo; ?>

                            </div>
                          </div>



                        </div>
                        <div class="col-12" style="padding: inherit;">

                          <?php
                          $numeroCaracteres = strlen($rowfeed->Text);
                          if ($numeroCaracteres > 200) {
                                                        echo "
                                                        <div id='textoEx" . $rowfeed->IdFeed . "' style='height: 8em; overflow: hidden;'>
                                                            <h3 class='fonte-principal color-preto'>
                                                                <br>
                                                                " . $rowfeed->Text . "
                                                            </h3>
                                                        </div>";
                                                        echo "<a href='javascript:void(0)' id='btn-vm" . $rowfeed->IdFeed . "' onClick='alterarLimite(" . $rowfeed->IdFeed . ")'>Ver mais</a>";
                                                    } else {
                                                        echo "
                                                        <div id='textoEx" . $rowfeed->IdFeed . "'>
                                                            <h3 class='fonte-principal color-preto'>
                                                                <br>
                                                                " . $rowfeed->Text . "
                                                            </h3>
                                                        </div>";
                                                    }
                          ?>
                          <br>



                        </div>

                        <div class="row col-12 align-content-center justify-content-center">
                          <?php if ($rowfeed->Image != "") { ?>
                            <img class="img-feed-styleset" src="<?php echo $rowfeed->Image; ?>" alt="" width="100%">
                          <?php } else if ($rowfeed->Video != "") { ?>
                            <video class="img-feed-styleset" src="<?php echo $rowfeed->Video; ?>" controls alt="" width="50%"></video>
                          <?php } ?>
                        </div>
                        <br>

                        <hr class="color-preto">

                        <div class="row">

                          <?php
                          //$sqlOperationpost = "SELECT * from tbcurtidas WHERE idpost = :idpost";
                          //$queryOperationpost = $dbh->prepare($sqlOperationpost);
                          //$queryOperationpost->bindParam(':idpost', $rowfeed->IdFeed, PDO::PARAM_INT);
                          //$queryOperationpost->execute();
                          //$resultsOperationpost = $queryOperationpost->fetchAll(PDO::FETCH_OBJ);


                          $curtidas = new Curtidas($dbh);

                          $curtidas->setidpost($rowfeed->IdFeed);

                          $resultsOperationpost = $curtidas->consulta("WHERE idpost = :idpost");

                          $numeroCurtidas = 0;
                          if ($resultsOperationpost != null) {
                            foreach ($resultsOperationpost as $rowOperationpost) {
                              $numeroCurtidas += 1;
                            }
                          }
                          ?>
                          <?php
                          //$sqlOperationpost = "SELECT * from tbcurtidas WHERE idpost = :idpost AND idusuario = :idusuario";
                          //$queryOperationpost = $dbh->prepare($sqlOperationpost);
                          //$queryOperationpost->bindParam(':idpost', $rowfeed->IdFeed, PDO::PARAM_INT);
                          //$queryOperationpost->bindParam(':idusuario', $iduser, PDO::PARAM_INT);
                          //$queryOperationpost->execute();
                          //$resultsOperationpost = $queryOperationpost->fetchAll(PDO::FETCH_OBJ);


                          $curtidas = new Curtidas($dbh);

                          $curtidas->setidpost($rowfeed->IdFeed);
                          $curtidas->setidusuario($idusers);

                          $resultsOperationpost = $curtidas->consulta("WHERE idpost = :idpost AND idusuario = :idusuario");

                          if ($resultsOperationpost != null) {




                            echo "<div class='col-6 fonte-principal'  id='div-" . $rowfeed->IdFeed . "'>

                                                           
                                                                <input hidden type='text' name='idpost' value='" . $rowfeed->IdFeed . "'>
    
    
                                                                <button class='btn like-comment-btn pl-4 pr-4 no-border p-3' onClick='showDCurtida(" . $rowfeed->IdFeed . ")'>
                                                                    <span class='' style='font-size: 13px;'>
                                                                        " . $numeroCurtidas . " &nbsp;&nbsp;<i class='fa-solid fa-thumbs-up'> Like</i>
                                                                    </span>
                                                                </button>
                                                            
    
                                                        </div>";
                          } else {

                            echo "<div class='col-6 fonte-principal' id='div-" . $rowfeed->IdFeed . "'>

                                                       
                                                            <input hidden type='text' name='idpost' value='" . $rowfeed->IdFeed . "'>


                                                            <button class='btn like-comment-btn pl-4 pr-4 no-border p-3' onClick='showCurtida(" . $rowfeed->IdFeed . ");'>
                                                                <span class='' style='font-size: 13px;'>
                                                                    " . $numeroCurtidas . " &nbsp;&nbsp;<i class='fa-solid fa-thumbs-up'> Like</i>
                                                                </span>
                                                            </button>
                                                       

                                                    </div>";
                          }
                          ?>



                          <div class="col-6 d-flex justify-content-end">
                            <a id="btnCommnet" data-toggle="modal" data-target="#modalEditarProduto" data-id="<?php echo $rowfeed->IdFeed;
                                                                                                              ?>" class="btn like-comment-btn pl-4 pr-4 no-border p-3 hero-image-container2"><span class="btn-comment-post">
                                <?php


                                $tbPostComentcont2 = new PostComent($dbh);
                                $tbPostComentcont2->setidpost($rowfeed->IdFeed);
                                echo  $tbPostComentcont2->quantidade(" WHERE idpost = :idpost");
                                ?> &nbsp;&nbsp; <i class="fa fa-comment">
                                  Comments</i>
                              </span></a>




                          </div>
                        </div>
                      </div>
                    </div>
                <?php $numeroCurtidas = 0;
                  }
                } ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div id="modalViewProduto" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-body">
          <h1 id="modalProductName" class="mb-0"></h1>
          <p id="modalProductDescription" class="color-cinza-b produto-desc-text"></p>
        </div>

      </div>
    </div>
  </div>

  <div id="modalEditarProduto" class="modal custom-modal fade show comment-modal-primary" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-body comment-modal-primary">
          <h1 id="modalProductName mb-0"></h1>
          <p id="modalProductDescription color-cinza-b"></p>
        </div>

      </div>
    </div>
  </div>

  <script>
  
  function initSlider() {
            var slider1 = document.getElementsByClassName("sliderBlock_items");
            var slides1 = document.getElementsByClassName("sliderBlockitemsitemPhoto");
            var next1 = document.getElementsByClassName("sliderBlockcontrolsarrowForward")[0];
            var previous1 = document.getElementsByClassName("sliderBlockcontrolsarrowBackward")[0];
            var items1 = document.getElementsByClassName("sliderBlock_positionControls")[0];
            var currentSlideItem1 = document.getElementsByClassName("sliderBlock_positionControls__paginatorItem");
            var currentSlide1 = 0;
            var slideInterval1 = setInterval(nextSlide, 5000); /// Delay time of slides
            function nextSlide() {
                goToSlide(currentSlide1 + 1);
            }

            function previousSlide() {
                goToSlide(currentSlide1 - 1);
            }

            function goToSlide(n) {
                slides1[currentSlide1].className = 'sliderBlockitemsitemPhoto';
                items1.children[currentSlide1].className = 'sliderBlock_positionControls__paginatorItem';
                currentSlide1 = (n + slides1.length) % slides1.length;
                slides1[currentSlide1].className = 'sliderBlockitemsitemPhoto sliderBlock_items__showing';
                items1.children[currentSlide1].className = 'sliderBlock_positionControls__paginatorItem sliderBlock_positionControls__active';
            }
            next1.onclick = function() {
                nextSlide();
            };
            previous1.onclick = function() {
                previousSlide();
            };

            function goToSlideAfterPushTheMiniBlock() {
                for (var i = 0; i < currentSlideItem1.length; i++) {
                    currentSlideItem1[i].onclick = function(i) {
                        var index1 = Array.prototype.indexOf.call(currentSlideItem1, this);
                        goToSlide(index1);
                    }
                }
            }
            goToSlideAfterPushTheMiniBlock();
            var buttonFullSpecification1 = document.getElementsByClassName("block_specification")[0];
            var buttonSpecification1 = document.getElementsByClassName("block_specification__specificationShow")[0];
            var buttonInformation1 = document.getElementsByClassName("block_specification__informationShow")[0];
            var blockCharacteristiic1 = document.querySelector(".block_descriptionCharacteristic");
            var activeCharacteristic1 = document.querySelector(".block_descriptionCharacteristic__active");

            buttonFullSpecification1.onclick = function() {
                console.log("OK");
                buttonSpecification1.classList.toggle("hide");
                buttonInformation1.classList.toggle("hide");
                blockCharacteristiic1.classList.toggle("block_descriptionCharacteristic__active");
            };
            var up1 = document.getElementsByClassName('block_quantity__up')[0],
                down1 = document.getElementsByClassName('block_quantity__down')[0],
                input1 = document.getElementsByClassName('block_quantity__number')[0];

            function getValue() {
                return parseInt(input1.value);
            }
            up1.onclick = function(event) {
                input1.value = getValue() + 1;
            };
            down1.onclick = function(event) {
                if (input1.value <= 1) {
                    return 1;
                } else {
                    input1.value = getValue() - 1;
                }
            }

        }
        
     function redirectToAnotherPage() {
            var form = document.getElementById('formularionome');
            var textValue = form.querySelector('[name="text"]').value;

            // Redireciona para listcompani.php com o parâmetro GET "text"
            window.location.href = 'listcompani.php?text=' + encodeURIComponent(textValue);
        }
    $(document).ready(function() {
      // Ao clicar em um link de produto
      $('.hero-image-container').click(function() {
        // Obtenha o ID do produto associado ao link clicado
        var idProduto = $(this).data('id');
        console.log(idProduto);
        // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
        $.ajax({
          type: 'GET',
          url: 'widget/viewProduto.php', // Substitua pelo caminho correto
          data: {
            idProduto: idProduto
          },
          success: function(data) {
            // Preencha o conteúdo do modal com as informações do produto
            $('#modalViewProduto .modal-content').html(data);
          },
          error: function() {
            alert('Ocorreu um erro ao carregar os dados do produto.');
          }
        });

        // Abra o modal correspondente
        $('#modalViewProduto').fadeIn();
      });;

      // Feche o modal ao clicar fora dele ou no botão de fechar
      $('.modal').click(function(event) {
        if ($(event.target).hasClass('modal')) {
          $(this).fadeOut();
        }
      });
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
          url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
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
     function updateNotificationCount() {
            var xmlhttpnf = new XMLHttpRequest();
            xmlhttpnf.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    var badgeElement = document.getElementById('notificationCount');
                    var responseHtml = this.responseText.trim(); // Remove espaços em branco extras

                    if (responseHtml != "" || responseHtml != undefined) {
                        console.log("response");
                        badgeElement.innerHTML = responseHtml; // Insere o HTML retornado pelo PHP
                        responseHtml = '';
                    } else {
                        console.log("response NULL");
                        badgeElement.innerHTML = ''; // Limpa o conteúdo do elemento
                    }
                } else {
                    var badgeElement = document.getElementById('notificationCount');
                    badgeElement.innerHTML = '';
                    responseHtml = '';
                }
            };
            xmlhttpnf.open("GET", "widget/atualizar_notificacoes.php", true);
            xmlhttpnf.send();
        }
        updateNotificationCount()
        setInterval(updateNotificationCount, 6000);
  </script>
</body>

</html>