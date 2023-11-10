<?php

include_once('../model/classes/conexao.php');

//include_once('../model/ErrorLog.php');
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 5;

include_once('../model/classes/tblEmpresas.php');
include_once('../model/classes/tblUserClients.php');
include_once('../model/classes/tblFeeds.php');
include_once('../model/classes/tblCurtidas.php');
include_once('../model/classes/tbPostComent.php');
$userClients = new UserClients($dbh);

$userClients->setidClient($iduser);

$results = $userClients->consulta("WHERE idClient = :idClient");

if ($results != null) {
  foreach ($results as $row) {
    $username =  $row->FirstName . " " . $row->LastName;
    $FirstName = $row->FirstName;
    $LastName = $row->LastName;
    $jobtitle = $row->JobTitle;
    $email = $row->email;
    $numberfone  = $row->WhatsAppNumber;
    $idcountry = $row->idCountry;
    $idoperation = $row->IdOperation;
    $corebusiness = $row->CoreBusinessId;
    $satBusinessId =  $row->SatBusinessId;
    $companyname = $row->CompanyName;
    $imgperfil = $row->PersonalUserPicturePath;
    $imgcapa = $row->LogoPicturePath;
    $descricao =  $row->descricao;
    $taxidempresa =  $row->taxid;
    $AnoFundacao = $row->AnoFundacao;
    $numEmpregadosid = $row->NumEmpregados;
    $numVendedores = $row->NumVendedores;
    $numNivelOperacao = $row->NivelOperacao;
    $DetalheRegiao = $row->DetalheRegiao;
    $Fob3 = $row->Fob_3Y;
    $nVol3 = $row->Vol_3Y;
    $Fob2 = $row->Fob_2Y;
    $nVol2 = $row->Vol_2Y;
    $Fob1 = $row->Fob_1Y;
    $nVol1 = $row->Vol_1Y;


    $FobImports_3Y = $row->FobImports_3Y;
    $VolImports_3Y = $row->VolImports_3Y;
    $FobImports_2Y = $row->FobImports_2Y;
    $VolImports_2Y = $row->VolImports_2Y;
    $FobImports_1Y = $row->FobImports_1Y;
    $VolImports_1Y = $row->VolImports_1Y;
  }
}

if ($corebusiness == "" || $corebusiness == null || $corebusiness == 0) {
  header("Location: qualificacao.php");
}

include('../model/classes/tblCountry.php');

$country = new Country($dbh);

$country->setidCountry($idcountry);

$resultsCountry = $country->consulta("WHERE idCountry = :idCountry");

if ($resultsCountry != null) {
  foreach ($resultsCountry as $rowCountry) {
    $pais =  $rowCountry->NmCountry;
  }
}
include_once('../model/classes/tblOperations.php');
$operations = new Operations($dbh);
$operations->setidOperation($corebusiness);
$resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
if ($resultsoperation != null) {
  foreach ($resultsoperation as $rowoperation) {
    $NmBusiness =  $rowoperation->NmOperation;
  }
}


include_once('../model/classes/tblBusiness.php');
$business = new Business($dbh);
$business->setidBusiness($satBusinessId);
$resultsbusiness = $business->consulta("WHERE idBusiness = :idBusiness");
if ($resultsbusiness != null) {
  foreach ($resultsbusiness as $rowbusiness) {
    $NmBusinesscor =  $rowbusiness->NmBusiness;
  }
}


$NmBusinessCategory = "";
if ($idoperation != null) {
  include_once('../model/classes/tblBusinessCategory.php');
  $BusinessCategory = new BusinessCategory($dbh);
  $BusinessCategory->setidBusinessCategory($idoperation);
  $resultsBusinessCategory = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

  if ($resultsBusinessCategory != null) {
    foreach ($resultsBusinessCategory as $rowbusinesscateg) {
      $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
      $idbusinesscateg = $rowbusinesscateg->idBusiness;
    }
  }
} else {

  $idoperation = 0;
}
$adm = "";
$qtdcolab = 0;
$empresaDados = new Empresas($dbh);
$empresaDados->setTaxid($taxidempresa);
$results = $empresaDados->consulta("WHERE taxid = :taxid");
if ($results != null) {
  foreach ($results as $row) {
    $idempresa = $row->id;
    $nomeempresa = $row->nome;
    $colab1 = $row->colab1;
    $colab2 = $row->colab2;
    $colab3 = $row->colab3;
    $colab4 = $row->colab4;
    $colab5 = $row->colab5;
  }
}

if ($iduser !=  $colab1) {
  $adm = "false";
} else {
  $adm = "true";
}
if ($colab2 != 0) {
  $qtdcolab++;
}
if ($colab3 != 0) {
  $qtdcolab++;
}
if ($colab4 != 0) {
  $qtdcolab++;
}
if ($colab5 != 0) {
  $qtdcolab++;
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
  <link rel="stylesheet" href="assets/css/navbar.css">

  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" href="assets/css/feed.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
  <link rel="stylesheet" href="assets/css/cssprodutos.css">


  <style>
    #refHint label {
      color: black !important;
      font-size: 15px;
    }

    #refHint select {
      height: 30px !important;
      font-size: 17px !important;
    }

    #refHint2 label {
      color: black !important;
      font-size: 15px;
    }

    #refHint2 select {
      height: 30px !important;
      font-size: 17px !important;
    }

    .dropdown-toggle::after {
      content: "" !important;
      display: none !important;
      margin-left: 0 !important;
    }

    .avatar-upload {
      position: relative;
      max-width: 172px;

    }

    .avatar-upload-banner {
      position: relative;
      max-width: -webkit-fill-available;

    }

    .avatar-upload .avatar-edit {
      position: absolute;
      right: 0px;
      z-index: 1;
      top: 10px;
    }

    .avatar-upload-banner .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }

    .avatar-upload .avatar-edit input {
      display: none;
    }

    .avatar-upload-banner .avatar-edit input {
      display: none;
    }

    .avatar-upload .avatar-edit label {
      display: inline-block;
      width: 26px;
      height: 26px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid #999999;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all .2s ease-in-out;
    }

    .avatar-upload-banner .avatar-edit label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid #999999;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all .2s ease-in-out;
    }

    .avatar-upload .avatar-edit label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }

    .avatar-upload-banner .avatar-edit label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit label:after {
      content: "\f040";
      font-family: 'FontAwesome';
      color: #757575;
      position: absolute;
      top: 6px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }

    .avatar-upload-banner .avatar-edit label:after {
      content: "\f040";
      font-family: 'FontAwesome';
      color: #757575;
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }

    .avatar-upload .avatar-preview {
      width: 110px;
      height: 110px;
      position: relative;
      border-radius: 100%;
      border: 3px solid #eaeaea;
      box-shadow: 0px 1px 4px 0px rgb(0 0 0 / 98%);
    }

    .avatar-upload-banner .avatar-preview {
      width: -webkit-fill-available;
      height: 150px;
      position: relative;
      border-radius: 6px;
      border: 3px solid #eaeaea;
      box-shadow: 0px 1px 4px 0px rgb(0 0 0 / 98%);
    }

    .avatar-upload .avatar-preview>div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .avatar-upload-banner .avatar-preview>div {
      width: 100%;
      height: 100%;
      border-radius: 6px;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    @media (prefers-reduced-motion: reduce) {
      .progress-bar-animated {
        animation: 1s linear infinite progress-bar-stripes !important;
      }
    }

    .progress {
      display: none;
    }


    .note-toolbar {
      font-size: x-large !important;
    }
    .note-btn{
      font-size: small  !important;
    }
    .note-editable{
      font-size: larger !important;
    }
    
    .dropdown-toggle::after {
            content: "" !important;
            display: none !important;
            margin-left: 0 !important;
        }
  </style>
  <!-- Summernote CSS -->
  <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css">
</head>

<body class="funcolinhas">
    
  

  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
    
 

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

    function redirectToAnotherPage() {
      var form = document.getElementById('formularionome');
      var textValue = form.querySelector('[name="text"]').value;

      // Redireciona para listcompani.php com o parâmetro GET "text"
      window.location.href = 'listcompani.php?text=' + encodeURIComponent(textValue);
    }
  </script>
  


  <!-- Header -->
  <?php include_once("widget/navbar.php"); ?>
  <!-- Body -->

  <div class="telacheia">
    <div class="col-md-12 p-2 m-0">
      <div class="row telacheia margemmnavbar">

        <!-- Esquerda -->
        <div id="profile-column" class="shadow col-12 col-md-12 col-lg-3 mr-4 justify-content-start overflow-auto scrollable-column fixed-on-desktop" style="margin-right: 20px important;" >
          <div class="card rounded-4 shadow">
            <div class="card-body p-0 m-0">

              <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($imgcapa != "Avatar.png" && $imgcapa != "" && $imgcapa != null) {
                            echo "" . $imgcapa;
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

                  <img src=" <?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                echo "" . $imgperfil;
                              } else {
                                echo "assets/img/Avatar.png";
                              } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover; box-shadow: 0px -3px 11px #0000005e;" onclick="toggleMenu()">
                </div>
                <div class="col-6 p-0 m-0">
                  <h3 class="fonte-titulo"><?php if ($adm) {
                                              echo $companyname;
                                            } else {
                                              echo $username;
                                            } ?></h3>
                  <h6 class="fonte-principal" style="font-size: small;"><?php if ($adm) {
                                                                          echo $FirstName . " " . $LastName;
                                                                        } else {
                                                                          echo $jobtitle . ' at ' . $companyname;
                                                                        } ?></h6>
                </div>
              </div>
              <div class="col-12 m-0 p-0">
                <hr class="m-0">
              </div>
              <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0">

                  <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-globe "></i>&nbsp;&nbsp;<?php echo $pais; ?></h4>

                </div>
                <div class="col-3 m-0 p-0">

                </div>
              </div>
              <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0 mr-2">
                  <div class="col-12 m-0 p-0">

                    <h4 class="fonte-principal" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope "></i>&nbsp;&nbsp;<?php echo $email; ?></h4>

                  </div>
                </div>

              </div>
              <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0 mr-2">

                  <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-phone-square "></i>&nbsp;&nbsp;<?php echo $numberfone; ?></h4>
                </div>
                <div class="col-3 m-0 p-0">
                  <h5 class="fonte-principal text-left"></h5>
                </div>
              </div>
              <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0 mr-2">

                  <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-building "></i>&nbsp;&nbsp;<?php echo  $NmBusiness; ?></h4>
                </div>
                <div class="col-3 m-0 p-0">
                  <h5 class="fonte-principal text-left"></h5>
                </div>
              </div>
              <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") {
              ?>
                <div class="row m-0 p-0">
                  <div class="col-12 m-0 p-0 mr-2">

                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-briefcase "></i>&nbsp;&nbsp;<?php if (isset($NmBusinesscor)) {
                                                                                                                            echo  $NmBusinesscor;
                                                                                                                          } ?></h4>
                  </div>
                  <div class="col-3 m-0 p-0">
                    <h5 class="fonte-principal text-left"></h5>
                  </div>
                </div>
                <div class="row m-0 p-0">
                  <div class="col-12 m-0 p-0 mr-2">

                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-briefcase "></i>&nbsp;&nbsp;<?php echo  $NmBusinessCategory; ?></h4>
                  </div>
                  <div class="col-3 m-0 p-0">
                    <h5 class="fonte-principal text-left"></h5>
                  </div>
                </div>
              <?php } ?>
              <div class="row mb-2" style="padding: 9px;margin: auto;justify-content: space-between;">
                <a href="#" class="btn btn-outline-primary ms-1" style="width: 100px;     max-height: 35px !important;" data-toggle="modal" data-target="#add_perfil"><i class="bi bi-pen icon-btn-card"></i>&nbsp;Edit</a>
                <?php if (!$adm) { ?>

                  <a href="empresa.php" class="btn btn-outline-primary ms-1" style="width: 150px;     max-height: 35px !important;"><i class="bi bi-pen icon-btn-card"></i>&nbsp;Company Profile</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card rounded-4 shadow mt-2 margemdesck">
            <div class="card-body p-0 m-0" style="overflow-y: auto !important; max-height: -webkit-fill-available; height: fit-content; overflow-x: hidden !important; min-height: -webkit-fill-available;">
              <div class="row ">
                <div class="col-12 ">

                  <p class="fonte-titulo" style="padding: 7px; font-size: 17px;">Description</p>

                </div>
                <div class="col-12 " style="width: -webkit-fill-available; padding-left: 10px; padding-right: 10px; font-size: small;">

                  <p class="fonte-principal" style="font-size: 14px;" id="descricao"><?php echo $descricao; ?></p>


                </div>
                <div class="col-3 m-0 p-0">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 "></div>
        <!-- direita -->
        <div class="col-lg-9 col-12 justify-content-center">
          <div class="col-md-12  justify-content-center">
            <?php if ($corebusiness == "3" || $corebusiness == "4") {
              echo "<div class='row col-12'> ";
            } ?>
            <?php if ($corebusiness == "3" || $corebusiness == "4") {
              echo "<div class='col-12 col-md-12 col-lg-12'> ";
            } ?>
            <?php if ($corebusiness != "3" || $corebusiness != "4") {
              echo "<div class='row col-12'><div class='col-12 col-md-12 col-lg-12'>";
            } ?>

            <div class="col-12 mt-4">
              <div class="row">

                <div class="col-6">
                  <div class="card card-body shadow bcolor-azul-escuro">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-branco"><a href="listcompani.php?text=mysp" class="nav-link">My saved search</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0 color-branco"><b><?php include_once('../model/classes/tblSearch.php');
                                                    $Search = new Search($dbh);
                                                    $Search->setidClient($iduser);
                                                    $resultSearch = $Search->consulta("WHERE idClient = :idClient");
                                                    $numSearch = 0;
                                                    if ($resultSearch != null) {
                                                      foreach ($resultSearch as $resultConectUnidSearch) {
                                                        $numSearch += 1;
                                                      }
                                                    }
                                                    echo $numSearch;
                                                    ?></b></p>
                      </div>


                    </div>



                  </div>
                </div>
                <div class="col-6">
                  <div class="card card-body shadow bcolor-azul-escuro">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-branco"><a href="#" data-toggle="modal" data-target="#exampleModalconect" class="nav-link">Want to Connect</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0 color-branco"><b><?php include_once('../model/classes/tblConect.php');

                                                    $conect = new Conect($dbh);

                                                    $conect->setidUserReceb($iduser);

                                                    $resultConect = $conect->consulta("WHERE idUserReceb = :idUserReceb AND status = '0'");

                                                    $numView = 0;

                                                    if ($resultConect != null) {
                                                      foreach ($resultConect as $resultConectUnid) {
                                                        $numView += 1;
                                                      }
                                                    }

                                                    echo $numView; ?></b></p>
                      </div>


                    </div>



                  </div>
                </div>
              </div>

            </div>
            <div class="col-12  mt-4">
              <div class="row" style="font-size: larger;">
                <div class="col-6">
                  <div class="card card-body shadow bcolor-azul-escuro">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-branco"><a href="#" data-toggle="modal" data-target="#modalNetwork" class="nav-link">My Network</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0 color-branco"><b><?php


                                                    include_once('../model/classes/tblConect.php');

                                                    $conect = new Conect($dbh);

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



                  </div>
                </div>
                <div class="col-6">
                  <div class="card card-body shadow bcolor-azul-escuro">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-branco"><a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">Views</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0 color-branco"><b><?php


                                                    include_once('../model/classes/tblViews.php');

                                                    $views = new Views($dbh);

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
                </div>
              </div>

            </div>
            <?php if ($corebusiness != "3" || $corebusiness != "4") {
              echo "</div>";
            } ?>
            <div class="col-12 col-md-12 col-lg-6 mt-4" style="display: none;">
              <div class="card card-body shadow">
                <div class="row" style="font-size: larger;">
                  <div class="col-12 d-flex justify-content-start">
                    <h3 class="d-inline m-0 color-preto">Discover the premium plan</h3>

                  </div>
                  <div class="col-12 d-flex justify-content-start mt-3">
                    <p>With the premium plan you have several new features and improvements to those you already have.</p>
                  </div>
                  <div class="col-12 d-flex justify-content-start mt-3">
                    <a href="#" class=" ms-1" style="width: 100px;text-decoration: underline;color: black;">Premium Plan</a>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($corebusiness != "3" || $corebusiness != "4") {
              echo "</div>";
            } ?>

            <?php if ($corebusiness == "3" || $corebusiness == "4") {
              echo "</div> ";
            } ?>
            <?php if ($corebusiness == "3" || $corebusiness == "4") { ?>
              <div class="col-12 col-md-12 col-lg-12 mt-4">
                <div class="card card-body shadow bcolor-azul-escuro">
                  <div class="col-12">
                    <div class="row" style="font-size: larger;">
                      <?php

                      include_once('../model/classes/tblNumEmpregados.php');
                      $nEmpre = new NumEmpregados($dbh);
                      $nEmpre->setidNumEmpregados($numEmpregadosid);
                      $resultsnEmpre = $nEmpre->consulta("WHERE idNumEmpregados = :idNumEmpregados");
                      if ($resultsnEmpre != null) {
                        foreach ($resultsnEmpre as $rowEm) {
                          $numEmpregados = $rowEm->DescNumEmpregados;
                        }
                      }

                      include_once('../model/classes/tblNumEmpregados.php');
                      $nEmpresales = new NumEmpregados($dbh);
                      $nEmpresales->setidNumEmpregados($numVendedores);
                      $resultsnEmpresales = $nEmpresales->consulta("WHERE idNumEmpregados = :idNumEmpregados");
                      if ($resultsnEmpresales != null) {
                        foreach ($resultsnEmpresales as $rowEmsales) {
                          $numVendedoresr = $rowEmsales->DescNumEmpregados;
                        }
                      }

                      include_once('../model/classes/tblNivelOperacao.php');
                      $nOperacao = new NivelOperacao($dbh);
                      $nOperacao->setidNivelOperacao($numNivelOperacao);
                      $resultsnOperacao = $nOperacao->consulta("WHERE idNivelOperacao = :idNivelOperacao");
                      if ($resultsnOperacao != null) {
                        foreach ($resultsnOperacao as $rowEm) {
                          $NivelOperacao = $rowEm->DescNivelOperacao;
                        }
                      }



                      include_once('../model/classes/tblRangeValues.php');



                      $tblRangeValues = new RangeValues($dbh);
                      $tblRangeValues->setidlRangeValue($VolImports_3Y);
                      $resultstblRangeValues = $tblRangeValues->consulta("WHERE idlRangeValue = :idlRangeValue");
                      if ($resultstblRangeValues != null) {
                        foreach ($resultstblRangeValues as $rowsallers) {
                          $VolImports_3Y = $rowsallers->DescricaoRangeValue;
                        }
                      }


                      $tblRangeValues = new RangeValues($dbh);
                      $tblRangeValues->setidlRangeValue($VolImports_2Y);
                      $resultstblRangeValues = $tblRangeValues->consulta("WHERE idlRangeValue = :idlRangeValue");
                      if ($resultstblRangeValues != null) {
                        foreach ($resultstblRangeValues as $rowsallers) {
                          $VolImports_2Y = $rowsallers->DescricaoRangeValue;
                        }
                      }

                      $tblRangeValues = new RangeValues($dbh);
                      $tblRangeValues->setidlRangeValue($VolImports_1Y);
                      $resultstblRangeValues = $tblRangeValues->consulta("WHERE idlRangeValue = :idlRangeValue");
                      if ($resultstblRangeValues != null) {
                        foreach ($resultstblRangeValues as $rowsallers) {
                          $VolImports_1Y = $rowsallers->DescricaoRangeValue;
                        }
                      }



                      $tblRangeValues = new RangeValues($dbh);
                      $tblRangeValues->setidlRangeValue($nVol3);
                      $resultstblRangeValues = $tblRangeValues->consulta("WHERE idlRangeValue = :idlRangeValue");
                      if ($resultstblRangeValues != null) {
                        foreach ($resultstblRangeValues as $rowsallers) {
                          $Vol3 = $rowsallers->DescricaoRangeValue;
                        }
                      }

                      $tblRangeValues = new RangeValues($dbh);
                      $tblRangeValues->setidlRangeValue($nVol2);
                      $resultstblRangeValues = $tblRangeValues->consulta("WHERE idlRangeValue = :idlRangeValue");
                      if ($resultstblRangeValues != null) {
                        foreach ($resultstblRangeValues as $rowsallers) {
                          $Vol2 = $rowsallers->DescricaoRangeValue;
                        }
                      }

                      $tblRangeValues = new RangeValues($dbh);
                      $tblRangeValues->setidlRangeValue($nVol1);
                      $resultstblRangeValues = $tblRangeValues->consulta("WHERE idlRangeValue = :idlRangeValue");
                      if ($resultstblRangeValues != null) {
                        foreach ($resultstblRangeValues as $rowsallers) {
                          $Vol1 = $rowsallers->DescricaoRangeValue;
                        }
                      }






                      ?>
                      <h2 class="color-branco">Distributor Information</h2>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Founded in:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $AnoFundacao; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Number of Employees:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $numEmpregados; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Total Sales Rep:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $numVendedoresr; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Operation Level:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $NivelOperacao; ?></b></p>
                      </div>
                      <hr>

                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Turn Over in <?php echo $Fob3; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"><b> <?php echo $Vol3; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Turn Over in <?php echo $Fob2; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $Vol2; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Turn Over in <?php echo $Fob1; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $Vol1; ?></b></p>
                      </div>
                      <hr>




                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Total Imports/Purchases <?php echo $Fob3; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"><b> <?php echo $VolImports_3Y; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Total Imports/Purchases <?php echo $Fob2; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $VolImports_2Y ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Total Imports/Purchases <?php echo $Fob1; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $VolImports_1Y; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-12 d-flex justify-content-end align-middle">

                        <a href="#" style="width: 100px;" class="btn btn-outline-primary ms-1 color-branco editdistribtn" data-toggle="modal" data-target="#edit_dist"><i class="bi bi-pen icon-btn-card "></i>&nbsp;Edit</a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php if ($corebusiness == "3" || $corebusiness == "4") {
              echo "</div>";
            } ?>

            <div class="row col-12 col-md-12 col-lg-12 mt-4 p-2">
              <div class="card card-body shadow bcolor-azul-escuro">
                <div class="row">
                  <h2 class="color-branco">Collaborators </h2>
                </div>
                <hr>
                <div class="row">
                  <?php
                  $userClientscolab1 = new UserClients($dbh);
                  $userClientscolab1->setidClient($colab1);
                  $resultscolab1 = $userClientscolab1->consulta("WHERE idClient = :idClient");
                  if ($resultscolab1 != null) {
                    foreach ($resultscolab1 as $rowcolab1) {
                  ?>
                      <div class="col-2 d-flex justify-content-start">
                        <img src="<?php if ($rowcolab1->PersonalUserPicturePath != "Avatar.png" && $rowcolab1->PersonalUserPicturePath != "" && $rowcolab1->PersonalUserPicturePath != null) {
                                    echo $rowcolab1->PersonalUserPicturePath;
                                  } else {
                                    echo "";
                                  } ?>" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                      </div>
                      <div class="col-6 justify-content-start align-items-start">
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><b><?php echo $rowcolab1->FirstName . " " . $rowcolab1->LastName; ?></b></p>
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><?php echo $rowcolab1->email; ?></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                        <?php if ($adm == "true") { ?>
                          <input class="insertpost btn btn-warning pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="+ Edit">
                        <?php } ?>
                      </div>
                  <?php }
                  } ?>
                </div>
                <hr>
                <div class="row">
                  <?php
                  $userClientscolab2 = new UserClients($dbh);
                  $userClientscolab2->setidClient($colab2);
                  $resultscolab2 = $userClientscolab2->consulta("WHERE idClient = :idClient");
                  if ($resultscolab2 != null) {
                    foreach ($resultscolab2 as $rowcolab2) {
                  ?>
                      <div class="col-2 d-flex justify-content-start">
                        <img src="<?php if ($rowcolab2->PersonalUserPicturePath != "Avatar.png" && $rowcolab2->PersonalUserPicturePath != "" && $rowcolab2->PersonalUserPicturePath != null) {
                                    echo $rowcolab2->PersonalUserPicturePath;
                                  } else {
                                    echo "";
                                  } ?>" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                      </div>
                      <div class="col-6 justify-content-start align-items-start">
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><b><?php echo $rowcolab2->FirstName . " " . $rowcolab2->LastName; ?></b></p>
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><?php echo $rowcolab2->email; ?></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                        <?php if ($adm == "true") { ?>

                          <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value=" Delet">
                        <?php } ?>
                      </div>
                    <?php }
                  } else { ?>
                    <div class="col-2 d-flex justify-content-start">
                      <img src="assets/img/Avatar.png" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                    </div>
                    <div class="col-6 d-flex justify-content-start d-flex align-items-center">
                      <p class="mb-0 text-center align-middle color-branco" style="font-size:larger"><b>Collaborator 2</b></p>

                    </div>
                    <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                      <?php if ($adm == "true") { ?>
                        <a class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm" data-toggle="modal" data-target="#emailcolab">
                          + Add"
                        </a>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
                <hr>
                <div class="row">
                  <?php
                  $userClientscolab3 = new UserClients($dbh);
                  $userClientscolab3->setidClient($colab3);
                  $resultscolab3 = $userClientscolab3->consulta("WHERE idClient = :idClient");
                  if ($resultscolab3 != null) {
                    foreach ($resultscolab3 as $rowcolab3) {
                  ?>
                      <div class="col-2 d-flex justify-content-start">
                        <img src="<?php if ($rowcolab3->PersonalUserPicturePath != "Avatar.png" && $rowcolab3->PersonalUserPicturePath != "" && $rowcolab3->PersonalUserPicturePath != null) {
                                    echo $rowcolab3->PersonalUserPicturePath;
                                  } else {
                                    echo "";
                                  } ?>" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                      </div>
                      <div class="col-6 justify-content-start align-items-start">
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><b><?php echo $rowcolab3->FirstName . " " . $rowcolab3->LastName; ?></b></p>
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><?php echo $rowcolab3->email; ?></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                        <?php if ($adm == "true") { ?>

                          <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value=" Delet">
                        <?php } ?>
                      </div>
                    <?php }
                  } else { ?>
                    <div class="col-2 d-flex justify-content-start">
                      <img src="assets/img/Avatar.png" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                    </div>
                    <div class="col-6 d-flex justify-content-start d-flex align-items-center">
                      <p class="mb-0 text-center align-middle color-branco" style="font-size:larger"><b>Collaborator 3</b></p>

                    </div>
                    <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                      <?php if ($adm == "true") { ?>
                        <a class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm" data-toggle="modal" data-target="#emailcolab">
                          + Add"
                        </a>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
                <hr>
                <div class="row">
                  <?php
                  $userClientscolab4 = new UserClients($dbh);
                  $userClientscolab4->setidClient($colab4);
                  $resultscolab4 = $userClientscolab4->consulta("WHERE idClient = :idClient");
                  if ($resultscolab4 != null) {
                    foreach ($resultscolab4 as $rowcolab4) {
                  ?>
                      <div class="col-2 d-flex justify-content-start">
                        <img src="<?php if ($rowcolab4->PersonalUserPicturePath != "Avatar.png" && $rowcolab4->PersonalUserPicturePath != "" && $rowcolab4->PersonalUserPicturePath != null) {
                                    echo $rowcolab4->PersonalUserPicturePath;
                                  } else {
                                    echo "";
                                  } ?>" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                      </div>
                      <div class="col-6 justify-content-start align-items-start">
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><b><?php echo $rowcolab4->FirstName . " " . $rowcolab4->LastName; ?></b></p>
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><?php echo $rowcolab4->email; ?></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                        <?php if ($adm == "true") { ?>

                          <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value=" Delet">
                        <?php } ?>
                      </div>
                    <?php }
                  } else { ?>
                    <div class="col-2 d-flex justify-content-start">
                      <img src="assets/img/Avatar.png" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                    </div>
                    <div class="col-6 d-flex justify-content-start d-flex align-items-center">
                      <p class="mb-0 text-center align-middle color-branco" style="font-size:larger"><b>Collaborator 4</b></p>

                    </div>
                    <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                      <?php if ($adm == "true") { ?>
                        <a class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm" data-toggle="modal" data-target="#emailcolab">
                          + Add"
                        </a>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
                <hr>
                <div class="row">
                  <?php
                  $userClientscolab5 = new UserClients($dbh);
                  $userClientscolab5->setidClient($colab4);
                  $resultscolab5 = $userClientscolab5->consulta("WHERE idClient = :idClient");
                  if ($resultscolab5 != null) {
                    foreach ($resultscolab5 as $rowcolab5) {
                  ?>
                      <div class="col-2 d-flex justify-content-start">
                        <img src="<?php if ($rowcolab5->PersonalUserPicturePath != "Avatar.png" && $rowcolab5->PersonalUserPicturePath != "" && $rowcolab5->PersonalUserPicturePath != null) {
                                    echo $rowcolab5->PersonalUserPicturePath;
                                  } else {
                                    echo "";
                                  } ?>" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                      </div>
                      <div class="col-6 justify-content-start align-items-start">
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><b><?php echo $rowcolab5->FirstName . " " . $rowcolab5->LastName; ?></b></p>
                        <p class="mb-0  align-middle color-branco" style="font-size:larger"><?php echo $rowcolab5->email; ?></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                        <?php if ($adm == "true") { ?>

                          <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value=" Delet">
                        <?php } ?>
                      </div>
                    <?php }
                  } else { ?>
                    <div class="col-2 d-flex justify-content-start">
                      <img src="assets/img/Avatar.png" alt="user" class="nav-profile-img" onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

                    </div>
                    <div class="col-6 d-flex justify-content-start d-flex align-items-center">
                      <p class="mb-0 text-center align-middle color-branco" style="font-size:larger"><b>Collaborator 5</b></p>

                    </div>
                    <div class="col-4 d-flex justify-content-end d-flex align-items-center">
                      <?php if ($adm == "true") { ?>
                        <a class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm" data-toggle="modal" data-target="#emailcolab">
                          + Add"
                        </a><?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <div class="col-md-12">
                <?php if ($corebusiness != "3" && $corebusiness != "4") {
                ?>
                  <?php if($adm){?>
                  <div class="row">
                    <div class="col-12 mt-4">
                      <div class="card card-body shadow">
                        <div class="row">
                          <div class="col-1 align-middle">
                            <h2 class="text-muted valoresinsi" style="font-size: 16px;"><b>Products</b></h2>
                          </div>
                          <div class="col-1">
                            <?php if($adm){?>
                            <p class="text-muted mb-0"><a href="#" class="btn btn-outline-primary ms-1 m-1" data-toggle="modal" data-target="#add_produto"><i class="bi bi-plus-circle-fill" style="font-size: 14px;"></i>+ Add</a></p>
                            <?php }?>
                          </div>
                        </div>
                        <div class="row rowProduct overflow-auto">
                          <?php
                          include_once('../model/classes/tblProducts.php');
                          $products = new Products($dbh);
                          $products->setidClient($iduser);
                          $resultsProdutos = $products->consulta("WHERE idClient = :idClient  ORDER BY idProduct ASC ");
                          if ($resultsProdutos != null) {
                            if (is_array($resultsProdutos) || is_object($resultsProdutos)) {
                              foreach ($resultsProdutos as $rowProdutos) {
                          ?>

                                <div class="card-container bcolor-azul-escuro rounded-4" style="width: -webkit-fill-available; height: 274px; margin-right: 10px !important;;">
                                  <div class="col-12" style="display: flex; flex-direction: column; min-height: 140px; max-height: 140px; padding: 4px; width: -webkit-fill-available;">
                                    <a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                                      <img class="hero-image produtos-img rounded-4" style=" user-drag: none;object-fit: cover;" src="<?php
                                                                                                                                      include_once('../model/classes/tblProductPictures.php');
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
                                        <a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="">
                                          <h5 class="mb-0 fonte-titulo" style="white-space: pre-line; color: #fff;text-transform: uppercase; font-weight: 800 !important;"><?php echo $rowProdutos->ProductName; ?></h5>
                                        </a>
                                      </div>
                                      <div class="col-12 mt-2">
                                        <a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="" style="color: #ffffff !important;">
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
                  <?php }?>
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
                  $feeds->setidClient($iduser);
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
                              <div class="col-2 d-flex text-right color-preto justify-content-end">

                                <?php echo $timeAgo; ?>

                              </div>
                             
                                <div class="col-1 d-flex text-right color-preto justify-content-end">

                                  <div class="dropdown">
                                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: 0px; color: black; font-size: medium;">
                                     <i class="fas fa-ellipsis-v"></i>
                                      </a>
                                    
                                      <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../controller/homeController.php?deletar=true&idfeed=<?php echo $rowfeed->IdFeed;?>&idcliente=<?php echo $rowfeed->IdClient;?>"><i class="fas fa-trash-alt " style="margin-right: 5px;"></i>Delete</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit " style="margin-right: 5px;"></i>Eedit</a></li>
                                        
                                      </ul>
                                    </div>

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
                            $curtidas->setidusuario($iduser);

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
                                                                                                                ?>" class="btnCommnet btn like-comment-btn pl-4 pr-4 no-border p-3 hero-image-container2"><span class="btn-comment-post">
                                  <?php

                                  $tbPostComentcont2 = new PostComent($dbh);
                                  $tbPostComentcont2->setidpost($rowfeed->IdFeed);
                                  echo  $tbPostComentcont2->quantidade(" WHERE idpost = :idpost");
                                  ?> &nbsp;&nbsp; <i class="fa fa-comment">
                                    Comments</i>
                                </span></a>




                            </div>
                          </div>
                          <hr class="color-preto">
                          <div class="row" style="padding: inherit;">
                            <?php

                            $viewcomentarios = new PostComent($dbh);
                            $viewcomentarios->setidpost($rowfeed->IdFeed);
                            $resultstbPostComentview =  $viewcomentarios->consulta(" WHERE idpost = :idpost ORDER BY datahora DESC LIMIT 1");
                            if ($resultstbPostComentview != null) {

                              foreach ($resultstbPostComentview as $rowviewcomentarios) {

                                $userClientscomentarios = new UserClients($dbh);

                                $userClientscomentarios->setidClient($rowviewcomentarios->iduser);

                                $resultsclientescometarios = $userClientscomentarios->consulta("WHERE idClient = :idClient");

                                if ($resultsclientescometarios != null) {
                                  foreach ($resultsclientescometarios as $rowucometarios) { ?>
                                    <div class="col-1 d-flex flex-column justify-content-center align-items-center" style="height: auto;">
                                      <img src="<?php if ($rowucometarios->PersonalUserPicturePath != "Avatar.png" && $rowucometarios->PersonalUserPicturePath != "") {
                                                  echo "" . $rowucometarios->PersonalUserPicturePath;
                                                } else {
                                                  echo "assets/img/Avatar.png";
                                                } ?>" alt="user" class="nav-profile-img" style="width: 26px;">
                                    </div>
                                    <div class="col-11">
                                      <div class="col-10 d-flex flex-column justify-content-start align-items-start color-preto" style="height: auto;">
                                        <h4 style="font-size: larger;"> <?php echo $rowucometarios->FirstName . " " . $rowucometarios->LastName; ?></h4>
                                      </div>
                                      <div class="col-12 color-preto texto-duas-linhas" style="overflow-wrap: break-word;font-size: larger; ">
                                        <?php echo $rowviewcomentarios->texto; ?>
                                      </div>
                                    </div>

                            <?php   }
                                }
                              }
                            }
                            ?>
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
    <div class="modal custom-modal fade" id="exampleModalconect" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Want to Connect</h5>
            <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro " data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
              <span aria-hidden="false" class="color-branco">x</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="m-0 overflow-auto p-1 ul-view">
              <?php
              include_once('../model/classes/tblConect.php');
              $connect = new Conect($dbh);
              $connect->setidUserReceb($iduser);
              $resultsconect = $connect->consulta("WHERE idUserReceb = :idUserReceb AND status = '0'  ORDER BY datapedido DESC");



              if ($resultsconect != null) {
                foreach ($resultsconect as $rowviews) {

              ?>
                  <?php
                  include_once('../model/classes/tblUserClients.php');
                  $userClients = new UserClients($dbh);
                  $userClients->setidClient($rowviews->idUserPed);
                  $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");

                  if ($resultsUserClients != null) {
                    foreach ($resultsUserClients as $rowcliente) {

                      include_once('../model/classes/tblOperations.php');
                      $operations = new Operations($dbh);
                      $operations->setidOperation($rowcliente->CoreBusinessId);
                      $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' AND idOperation = :idOperation");

                      if ($resultsOperation != null) {
                        foreach ($resultsOperation as $rowOperation) { ?>

                          <li class="recommended-user icone-net" style="margin-bottom: 20px;">
                            <form method="POST" enctype="multipart/form-data" action="../controller/profileController.php" class="w-100 h-100 d-flex">
                              <input class="form-control bordainput" value="<?php echo $rowviews->id; ?>" autocomplete="off" name="idconectar" type="hidden">
                              <input class="form-control bordainput" value="<?php echo $rowviews->idUserPed; ?>" autocomplete="off" name="idperfilpedido" type="hidden">
                              <div class="col-2 justify-content-center m-0 p-0 d-flex justify-content-end align-middle">
                                <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                  <img src="<?php if ($rowOperation->PersonalUserPicturePath != "Avatar.png" && $rowOperation->PersonalUserPicturePath != "" && file_exists("" . $rowOperation->PersonalUserPicturePath)) {
                                              echo "" . $rowOperation->PersonalUserPicturePath;
                                            } else {
                                              echo "assets/img/Avatar.png";
                                            } ?>" alt="user" alt="An unknown user." onerror="this.onerror=null; this.src='assets/img/Avatar.png'"></a>
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

    <div class="modal custom-modal fade" id="modalNetwork" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Network</h5>
            <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro " data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
              <span aria-hidden="false" class="color-branco">x</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="m-0 overflow-auto p-1 ul-view">
              <?php
              include_once('../model/classes/tblConect.php');
              $connect = new Conect($dbh);
              $connect->setidUserReceb($iduser);
              $resultsconect = $connect->consulta("WHERE idUserReceb = :idUserReceb AND status = '1'  ORDER BY datapedido DESC");



              if ($resultsconect != null) {
                foreach ($resultsconect as $rowviews) {

              ?>
                  <?php
                  include_once('../model/classes/tblUserClients.php');
                  $userClients = new UserClients($dbh);
                  $userClients->setidClient($rowviews->idUserPed);
                  $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");

                  if ($resultsUserClients != null) {
                    foreach ($resultsUserClients as $rowcliente) {

                      include_once('../model/classes/tblOperations.php');
                      $operations = new Operations($dbh);
                      $operations->setidOperation($rowcliente->CoreBusinessId);
                      $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' AND idOperation = :idOperation");

                      if ($resultsOperation != null) {
                        foreach ($resultsOperation as $rowOperation) { ?>

                          <li class="recommended-user icone-net" style="margin-bottom: 20px;">
                            <form method="POST" enctype="multipart/form-data" class="w-100 h-100 d-flex">
                              <input class="form-control bordainput" value="<?php echo $rowviews->id; ?>" autocomplete="off" name="idconectar" type="hidden">
                              <input class="form-control bordainput" value="<?php echo $rowviews->idUserPed; ?>" autocomplete="off" name="idperfilpedido" type="hidden">
                              <div class="col-2 justify-content-center m-0 p-0 d-flex justify-content-end align-middle">
                                <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                  <img src="<?php if ($rowcliente->PersonalUserPicturePath != "Avatar.png" && $rowcliente->PersonalUserPicturePath != "" && file_exists("" . $rowcliente->PersonalUserPicturePath)) {
                                              echo "" . $rowcliente->PersonalUserPicturePath;
                                            } else {
                                              echo "assets/img/Avatar.png";
                                            } ?>" alt="user" alt="An unknown user." onerror="this.onerror=null; this.src='assets/img/Avatar.png'"></a>
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
          <div class="modal-footer">


          </div>
        </div>
      </div>
    </div>

    <div class="modal custom-modal fade" id="exampleModal" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="max-height: 400px !important;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Views</h5>
            <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro " data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
              <span aria-hidden="false" class="color-branco">x</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="m-0 overflow-y p-1 ul-view">
              <?php

              include_once('../model/classes/tblViews.php');

              $views = new Views($dbh);
              $views->setidView($iduser);
              $resultsview = $views->consulta("WHERE idView = :idView ORDER BY datacriacao DESC");

              if ($resultsview != null) {
                foreach ($resultsview as $rowviews) {

              ?>
                  <?php

                  include_once('../model/classes/tblConect.php');
                  $userClients = new UserClients($dbh);
                  $userClients->setidClient($rowviews->idUser);
                  $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");


                  if ($resultsUserClients != null) {
                    foreach ($resultsUserClients as $rowcliente) {

                      include_once('../model/classes/tblOperations.php');
                      $operations = new Operations($dbh);
                      $operations->setidOperation($rowcliente->CoreBusinessId);
                      $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' AND idOperation = :idOperation");


                      if ($resultsOperation != null) {
                        foreach ($resultsOperation as $rowOperation) {


                  ?>

                          <li class="recommended-user  mb-1" style="justify-content: normal !important;">

                            <div class="col-1 justify-content-center m-0 p-0">
                              <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                <img src="<?php if ($rowcliente->PersonalUserPicturePath != "Avatar.png" && $rowcliente->PersonalUserPicturePath != "" &&  $rowcliente->PersonalUserPicturePath != null) {
                                            echo "" . $rowcliente->PersonalUserPicturePath;
                                          } else {
                                            echo "assets/img/Avatar.png";
                                          } ?>" alt="user" alt="An unknown user." onerror="this.onerror=null;" class="nav-profile-img"></a>
                            </div>
                            <div class="col-8 p-0 justify-content-start align-items-center">
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
                            <div class="col-3 justify-content-center">
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




    <?php include_once("widget/editdist.php"); ?>
    <?php include_once("widget/editarperfil.php"); ?>
    <?php include_once("widget/produto.php"); ?>
    <?php include_once("widget/enviaremail.php"); ?>
    <!-- Summernote JS -->

    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/select2.min.js"></script>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    


    <script>
      function toggleDescription() {
        var descricaoElement = document.getElementById('descricao');
        var descricaoContainer = document.querySelector('.descricao-container');
        var button = document.querySelector('button');

        if (descricaoContainer.style.maxHeight) {
          descricaoContainer.style.maxHeight = null;
          button.textContent = 'Ver Mais';
        } else {
          descricaoContainer.style.maxHeight = descricaoElement.scrollHeight + 'px';
          button.textContent = 'Ver Menos';
        }
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
            url: 'widget/getproduto.php', // Substitua pelo caminho correto
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
      
      $(document).ready(function() {
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        function readURL2(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
              $('#imagePreview2').hide();
              $('#imagePreview2').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
        $("#user-image").change(function() {
          console.log("Uploading");
          readURL(this);
        });

        $("#banner-image").change(function() {
          console.log("Uploading");
          readURL2(this);
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
    </script>
    <script>
      $(document).ready(function() {
        function readURL(input) {
          if (input.files && input.files[0]) {
            console.log("teste");
            var reader = new FileReader();
            reader.onload = function(e) {
              if (input.id === 'banner-image') {
                $('#preview-image-banner').attr('src', e.target.result).show();
                $('#preview-video').hide();
              } else if (input.id === 'video-input') {
                $('#preview-video').attr('src', e.target.result).show();
                $('#preview-image').hide();
              }
            };
            reader.readAsDataURL(input.files[0]);
          } else {
            var img = input.value;
            $('#preview-image-banner').attr('src', '').hide();
            $('#preview-video').attr('src', '').hide();
          }
        }

        // Event listeners para os inputs de imagem e vídeo
        $('#banner-image').on('change', function() {
          readURL(this);
        });

        $('#video-input').on('change', function() {
          readURL(this);
        });
      });
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

        activeIndex = (activeIndex + 1) % movies.length; // Update activeI