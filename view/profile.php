<?php

include_once('../model/classes/conexao.php');

//include_once('../model/ErrorLog.php');
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 5;


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
  }
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
         
    </style>
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
        <div id="profile-column" class="shadow col-12 col-md-12 col-lg-3 justify-content-start overflow-auto scrollable-column fixed-on-desktop" >
          <div class="card rounded-4 shadow">
            <div class="card-body p-0 m-0">
              <div class="col-12 mh-25">
                <img class="mh-25 rounded-top-3" src="<?php if ($imgcapa != "Avatar.png" && $imgcapa != "" && $imgcapa != null) {
                                                        echo "" . $imgcapa;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>" alt="Descrição da Imagem" style="max-height: 100px; width: 100%;" style="box-shadow: 0px -17px 10px -10px rgb(0 0 0 / 52%);">
              </div>
              <div class="row p-0 ml-0">
                <div class="col-5 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                  <img src=" <?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                echo "" . $imgperfil;
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

                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope "></i>&nbsp;&nbsp;<?php echo $email; ?></h4>

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
              <div class="row mb-2" style="padding: 9px;margin: auto;">
                <a href="#" class="btn btn-outline-primary ms-1" style="width: 100px;" data-toggle="modal" data-target="#add_perfil"><i class="bi bi-pen icon-btn-card"></i>&nbsp;Edit</a>
                <a href="empresa.php" class="btn btn-outline-primary ms-1" style="width: 100px;" ><i class="bi bi-pen icon-btn-card"></i>&nbsp;Company Profile</a>
              </div>
            </div>
          </div>
          <div class="card rounded-4 shadow mt-2 margemdesck" >
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
        <div class="col-3 "></div>
        <!-- direita -->
        <div class="col-lg-9 col-12 justify-content-center">
          <div class="col-md-12  justify-content-center">
            <?php if ($corebusiness == "3" || $corebusiness == "4") {
              echo "<div class='row col-12'> ";
            } ?>
            <?php if ($corebusiness == "3" || $corebusiness == "4") {
              echo "<div class='col-12 col-md-12 col-lg-6'> ";
            } ?>
            <?php if ($corebusiness != "3" || $corebusiness != "4") {
              echo "<div class='row col-12'><div class='col-12 col-md-12 col-lg-6'>";
            } ?>
                
            <div class="col-12 mt-4">
              <div class="row">
        
                <div class="col-6">
                  <div class="card card-body shadow">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-preto"><a href="listcompani.php?text=mysp" class="nav-link">My saved search</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0"><b><?php include_once('../model/classes/tblSearch.php');
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
                  <div class="card card-body shadow">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-preto"><a href="#" data-toggle="modal" data-target="#exampleModalconect" class="nav-link">Want to Connect</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0"><b><?php include_once('../model/classes/tblConect.php');

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
                  <div class="card card-body shadow">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-preto"><a href="#" data-toggle="modal" data-target="#modalNetwork" class="nav-link color-preto">My Network</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0"><b><?php


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
                  <div class="card card-body shadow">
                    <div class="row" style="font-size: larger;">
                      <div class="col-8 d-flex justify-content-start">
                        <p class="d-inline m-0 color-preto"><a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">Views</a></p>
                      </div>
                      <div class="col-4 d-flex justify-content-end align-middle">
                        <p class="d-inline m-0"><b><?php


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
            <div class="col-12 col-md-12 col-lg-6 mt-4">
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
              <div class="col-12 col-md-12 col-lg-6  mt-4">
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
                        <p class="mb-0  color-branco">Number of Sellers:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $numVendedoresr ; ?></b></p>
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
                        <p class="mb-0  color-branco">Fob <?php echo $Fob3; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"><b> <?php echo $Vol3; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Fob <?php echo $Fob2; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $Vol2; ?></b></p>
                      </div>
                      <hr>
                      <div class="col-7 d-flex justify-content-start">
                        <p class="mb-0  color-branco">Fob <?php echo $Fob1; ?>:</p>

                      </div>
                      <div class="col-5 d-flex justify-content-end align-middle">
                        <p class="mb-0  color-branco"> <b><?php echo $Vol1; ?></b></p>
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
            <div class="col-md-12">
              <?php if ($corebusiness != "3" && $corebusiness != "4") {
              ?>
                <div class="row">
                  <div class="col-12 mt-4">
                    <div class="card card-body shadow">
                      <div class="row">
                        <div class="col-9">
                          <h2 class="text-muted valoresinsi"><b>Products</b></h2>
                        </div>
                        <div class="col-3">
                    <p class="text-muted mb-0"><a href="#" class="btn btn-outline-primary ms-1 m-1" data-toggle="modal" data-target="#add_produto"><i class="bi bi-plus-circle-fill" style="font-size: 14px;"></i>+ Add</a></p>
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
                              <div class="mb-4 " style="width: auto;">
                                <div class="card-container">
                                <a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                                    <img class="hero-image produto-img" src="<?php

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
                                  <div class="col-12 mt-0 ">
                                    <h1 class="mb-0"><a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto" data-id="<?php echo $rowProdutos->idProduct; ?>" ><?php echo $rowProdutos->ProductName; ?></a></h1>
                                    <p class="cortardescricao color-cinza-b produto-desc-text texto-desc"><a data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto" data-id="<?php echo $rowProdutos->idProduct; ?>" ><?php echo $rowProdutos->ProdcuctDescription; ?></a></p>
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
                                        } ?>" alt="user" class="nav-profile-img  " onerror="this.onerror=null; this.src='/assets/img/Avatar.png'">

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


  <?php include_once("widget/editdist.php"); ?>
  <?php include_once("widget/editarperfil.php"); ?>
  <?php include_once("widget/produto.php"); ?>
  <?php include_once("widget/enviaremail.php"); ?>
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
    $(document).ready(function() {
      function readURL(input) {
        if (input.files && input.files[0]) {
          console.log("teste");
          var reader = new FileReader();
          reader.onload = function(e) {
            if (input.id === 'user-image') {
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
      $('#user-image').on('change', function() {
        readURL(this);
      });

      $('#video-input').on('change', function() {
        readURL(this);
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