<?php
include('../model/classes/conexao.php');

date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header("Location: login.php");
}
$iduser = $_SESSION["id"];
include('../model/classes/tblUserClients.php');
include('../model/classes/tblFeeds.php');
include('../model/classes/tblCurtidas.php');
include('../model/classes/tbPostComent.php');
include('../model/classes/tblEmpresas.php');
include('../model/classes/tblOperations.php');
include('../model/classes/tblBusiness.php');
include('../model/classes/tblProducts.php');
include('../model/classes/tblProductPictures.php');
$qtdcolab = 0;
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
    }
}
$adm = "";
if ($_GET["idtax"] != null) {
    $taxidempresa = $_GET["idtax"];
}
$empresaDados = new Empresas($dbh);
$empresaDados->setTaxid($taxidempresa);
$results = $empresaDados->consulta("WHERE taxid = :taxid");
if ($results != null) {
    foreach ($results as $row) {
        $idempresa = $row->id;
        $nomeempresa = $row->nome;
        $fotoempresa = $row->fotoperfil;
        $bannerempresa = $row->fotobanner;
        $descempresa = $row->descricao;
        $paisempresa = $row->pais;
        $paisempresa2 = $row->pais;
        $redesocial = $row->redesocial;
        $colab1 = $row->colab1;
        $colab2 = $row->colab2;
        $colab3 = $row->colab3;
        $colab4 = $row->colab4;
        $colab5 = $row->colab5;
        $site = $row->site;
    }
}

$userClients2 = new UserClients($dbh);
$userClients2->setidClient($colab1);
$results2 = $userClients2->consulta("WHERE idClient = :idClient");
if ($results2 != null) {
    foreach ($results2 as $row) {
        $emailcolab1 = $row->email;
        $numberfonecolab1  = $row->WhatsAppNumber;
        $idoperationcolab1 = $row->IdOperation;
        $corebusinesscolab1 = $row->CoreBusinessId;
        $satBusinessIdcolab1 =  $row->SatBusinessId;
        $imgperfilcolab1 = $row->PersonalUserPicturePath;
        $imgcapacolab1 = $row->LogoPicturePath;
        $descricaocolab1 =  $row->descricao;
    }
}
if ($iduser !=  $colab1) {
    $adm = "false";
} else {
    $adm = "true";
}
if ($colab1 != 0) {
    $qtdcolab++;
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
include_once('../model/classes/tblCountry.php');
$country = new Country($dbh);
$country->setidCountry($idcountry);
$resultsCountry = $country->consulta("WHERE idCountry = :idCountry");
if ($resultsCountry != null) {
    foreach ($resultsCountry as $rowCountry) {
        $pais =  $rowCountry->NmCountry;
    }
}


$country = new Country($dbh);
$country->setidCountry($paisempresa);
$resultsCountry = $country->consulta("WHERE idCountry = :idCountry");
if ($resultsCountry != null) {
    foreach ($resultsCountry as $rowCountry) {
        $paisempresa =  $rowCountry->NmCountry;
    }
}

$operations = new Operations($dbh);
$operations->setidOperation($corebusinesscolab1);
$resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
if ($resultsoperation != null) {
    foreach ($resultsoperation as $rowoperation) {
        $NmBusiness =  $rowoperation->NmOperation;
    }
}


$business = new Business($dbh);
$business->setidBusiness($satBusinessIdcolab1);
$resultsbusiness = $business->consulta("WHERE idBusiness = :idBusiness");
if ($resultsbusiness != null) {
    foreach ($resultsbusiness as $rowbusiness) {
        $NmBusinesscor =  $rowbusiness->NmBusiness;
    }
}


$NmBusinessCategory = "";
if ($idoperation != 0) {
    include_once('../model/classes/tblBusinessCategory.php');
    $BusinessCategory = new BusinessCategory($dbh);
    $BusinessCategory->setidBusinessCategory($idoperationcolab1);
    $resultsBusinessCategory = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");
    if ($resultsBusinessCategory != null) {
        foreach ($resultsBusinessCategory as $rowbusinesscateg) {
            $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
            $idbusinesscateg = $rowbusinesscateg->idBusiness;
        }
    }
} else {

    $NmBusinessCategory = "";
    $idbusinesscateg = null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empreas</title>

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
    </style>
</head>

<body class="funcolinhas">
    <!-- Header -->
    <?php include_once("widget/navbar.php"); ?>
    <!-- Body -->

    <div class="telacheia">
        <div class="col-md-12 p-2 m-0">
            <div class="row telacheia margemmnavbar">

                <!-- Esquerda -->
                <div id="profile-column" class="shadow col-12 col-md-12 col-lg-3 justify-content-start overflow-auto scrollable-column fixed-on-desktop">
                    <div class="card rounded-4 shadow">
                        <div class="card-body p-0 m-0">
                            <div class="col-12 mh-25" style="    max-height: 100px;
    width: 100%;
    background-image: url(<?php if ($imgcapacolab1 != "Avatar.png" && $imgcapacolab1 != "" && $imgcapacolab1 != null) {
                                echo "" . $imgcapacolab1;
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
                                    <img src=" <?php if ($imgperfilcolab1 != "Avatar.png" && $imgperfilcolab1 != "") {
                                                    echo "" . $imgperfilcolab1;
                                                } else {
                                                    echo "assets/img/Avatar.png";
                                                } ?>" alt="user" class="border-2 mini-profile-img " style="object-fit: cover; box-shadow: 0px -3px 11px #0000005e;">
                                </div>
                                <div class="col-5 p-0 m-0">
                                    <h3 class="fonte-titulo"><?php echo $nomeempresa; ?><br></h3><br>

                                </div>
                                <br>
                            </div>
                            <div class="col-12 m-0 p-0">
                                <hr class="m-0">
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-12 m-0 p-0">

                                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope "></i>&nbsp;&nbsp;<?php echo $email; ?></h4>

                                </div>
                                <div class="col-12 m-0 p-0">

                                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-phone-square "></i>&nbsp;&nbsp;<?php echo $numberfone; ?></h4>

                                </div>
                                <div class="col-12 m-0 p-0">

                                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-globe "></i>&nbsp;&nbsp;<?php echo $paisempresa; ?></h4>

                                </div>
                                <div class="col-12 m-0 p-0">

                                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-desktop"></i>&nbsp;&nbsp;<?php echo $site; ?></h4>

                                </div>
                                <div class="col-12 m-0 p-0">

                                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-linkedin-square"></i>&nbsp;&nbsp;<?php echo $redesocial; ?></h4>

                                </div>
                                <div class="col-12 m-0 p-0">

                                    <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-building "></i>&nbsp;&nbsp;<?php echo $NmBusiness; ?></h4>

                                </div>
                                <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") {
                                ?>
                                    <div class="col-12 m-0 p-0">

                                        <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-briefcase"></i>&nbsp;&nbsp;<?php echo $NmBusinesscor; ?></h4>

                                    </div>
                                    <div class="col-12 m-0 p-0">

                                        <h4 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-briefcase "></i>&nbsp;&nbsp;<?php echo $NmBusinessCategory; ?></h4>

                                    </div>
                                <?php } ?>
                            </div>


                            <div class="row mb-2" style="padding: 9px;margin: auto;">
                                <?php if ($adm == "true") { ?>
                                    <a href="#" class="btn btn-outline-primary ms-1" style="width: 100px;" data-toggle="modal" data-target="#add_perfil"><i class="bi bi-pen icon-btn-card"></i>&nbsp;Edit</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-4 shadow mt-2 margemdesck">
                        <div class="card-body p-0 m-0" style="overflow-y: auto !important; max-height: 312px !important; overflow-x: hidden !important; min-height: 312px !important;">
                            <div class="row ">
                                <div class="col-12 ">

                                    <p class="fonte-titulo" style="padding: 7px; font-size: 17px;">Description</p>

                                </div>
                                <div class="col-12 ">

                                    <p class="fonte-principal" style="padding: 7px; font-size: 14px;" id="descricao"><?php echo $descempresa; ?></p>


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
                    <div class="col-12  p-3 ">
                        <div class="card card-body shadow bcolor-azul-escuro">
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
                                                <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" disabled type="submit" name="post" value=" Delet">
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
                                                <input class="insertpost btn btn-warning pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="+ Edit">
                                                <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" disabled type="submit" name="post" value=" Delet">
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
                                                <input class="insertpost btn btn-warning pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="+ Edit">
                                                <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" disabled type="submit" name="post" value=" Delet">
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
                                                <input class="insertpost btn btn-warning pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="+ Edit">
                                                <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" disabled type="submit" name="post" value=" Delet">
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
                                                <input class="insertpost btn btn-warning pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="+ Edit">
                                                <input class="insertpost btn btn-danger pl-4 pr-4 no-border p-3 post-btn-confirm" disabled type="submit" name="post" value=" Delet">
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

                        <?php if ($corebusinesscolab1 != "3" && $corebusinesscolab1 != "4") {
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
                                            $products->setidClient($colab1);
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
                        <?php }   ?>
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


            </div>
            <?php include_once("widget/editarperfilempresa.php"); ?>
            <?php include_once("widget/enviaremail.php"); ?>
        </div>


        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Select2 JS -->
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
        </script>
</body>

</html>