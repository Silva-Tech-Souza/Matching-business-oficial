<?php

//error_reporting(0);
include('../model/classes/conexao.php');
include("../model/classes/tblEmpresas.php");
include('../model/classes/tblUserClients.php');
include('../model/classes/tblOperations.php');
include('../model/classes/tblBusiness.php');
include('../model/classes/tblViews.php');
include('../model/classes/tblConect.php');
include('../model/classes/tblSearch.php');
include('../model/classes/tblProducts.php');
include('../model/classes/tblProductPictures.php');
include('../model/classes/tblFeeds.php');
include('../model/classes/tblCurtidas.php');
include('../model/classes/tbPostComent.php');
include('../model/classes/tblCountry.php');
include('../model/classes/tblContract.php');

date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 8;

//$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
//$query = $dbh->prepare($sql);
//$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
//$query->execute();
//$results = $query->fetchAll(PDO::FETCH_OBJ);


$userClients = new UserClients($dbh);

$userClients->setidClient($iduser);

$results = $userClients->consulta("WHERE idClient = :idClient");

if ($results != null) {
    foreach ($results as $row) {
        $username = $row->FirstName . " " . $row->LastName;
        $jobtitle = $row->JobTitle;
        $idcountry = $row->idCountry;
        $idoperation = $row->IdOperation;
        $corebusiness = $row->CoreBusinessId;
        $companyname = $row->CompanyName;
        $imgperfil = $row->PersonalUserPicturePath;
        $imgcapa = $row->LogoPicturePath;
         $taxidempresa =  $row->taxid;
    }
}

if($corebusiness == "" || $corebusiness == null || $corebusiness == 0){
    header("Location: qualificacao.php");
}

//$sqlCountry = "SELECT * from tblcountry WHERE idCountry = :idCountry";
//$queryCountry = $dbh->prepare($sqlCountry);
//$queryCountry->bindParam(':idCountry', $idcountry, PDO::PARAM_INT);
//$queryCountry->execute();
//$resultsCountry = $queryCountry->fetchAll(PDO::FETCH_OBJ);


$country = new Country($dbh);

$country->setidCountry($idcountry);

$resultsCountry = $country->consulta("WHERE idCountry = :idCountry ");

if ($resultsCountry != null) {
    foreach ($resultsCountry as $rowCountry) {
        $pais = $rowCountry->NmCountry;
    }
}



$adm = false;
$qtdcolab = 0;
$empresaDados = new Empresas($dbh);
$empresaDados->setTaxid($taxidempresa);
$resultss = $empresaDados->consulta("WHERE taxid = :taxid");
if ($resultss != null) {
  foreach ($resultss as $row) {
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
  $adm = false;
} else {
  $adm = true;
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

$userClients2colabteste = new UserClients($dbh);
$userClients2colabteste->setidClient($colab1);
$results2colabteste = $userClients2colabteste->consulta("WHERE idClient = :idClient");
if ($results2colabteste != null) {
    foreach ($results2colabteste as $row) {
    $imgcapa = $row->LogoPicturePath;
   
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Matching Business</title>
    <link rel="stylesheet" href="assets/css/geral.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
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
    <link rel="stylesheet" href="assets/css/cssprodutos.css">
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



            var xmlhttp5 = new XMLHttpRequest();
            xmlhttp5.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sponsored-container").innerHTML = this.responseText;
                    $(document).ready(function() {
                        var $sponsoredItems = $('.sponsored-item');
                        var currentIndex = 0;
                        var numItems = $sponsoredItems.length;
                        var showInterval = 20000; // Tempo (em milissegundos) entre cada troca

                        function showNextGroup() {
                            $sponsoredItems.hide(); // Oculta todas as empresas
                            var endIndex = currentIndex + 3;
                            if (endIndex >= numItems) {
                                endIndex = numItems;
                            }
                            $sponsoredItems.slice(currentIndex, endIndex).fadeIn(1000);
                            currentIndex = endIndex % numItems; // Atualiza o índice atual
                        }

                        showNextGroup(); // Exibe o primeiro grupo

                        setInterval(showNextGroup, showInterval); // Altere o intervalo (em milissegundos) conforme desejado
                    });
                }
            }
            xmlhttp5.open("GET", "widget/propagandas.php", true);
            xmlhttp5.send();



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
            $('#file-inputs').on('change', function() {
                readURL(this);
            });
            $('#video-input').on('change', function() {
                readURL(this);
            });

        });
    </script>
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

        @media (prefers-reduced-motion: reduce) {
            .progress-bar-animated {
                animation: 1s linear infinite progress-bar-stripes !important;
            }
        }

        .progress {
            display: none;
        }

        .expandeds1{
            display: none;
            width: 0;
            left: -50px;
        }
        .dropdown-toggle::after {
            content: "" !important;
            display: none !important;
            margin-left: 0 !important;
        }
        ::-webkit-scrollbar-thumb {
    background: transparent !important;
}

.finaldapagina{
       position: absolute;
        font-size: larger;
    bottom: 0;
    width: -webkit-fill-available;
    z-index: 10000000000000000000000;
    
    padding: 10px;
}


        @media (max-width: 992px) {
            .idtamanhocelular {
                display: none !important;
            }
        }
    </style>
</head>

<body class="funcolinhas">



    <!-- Header -->
    <?php include_once("widget/navbar.php"); ?>
    <div class="sidebar expandeds1 " id="sidebar" style="background: #002d4b;">
        <div class="sidebar-inner slimscroll ">
            <div id="sidebar-menu" class="sidebar-menu">
                <div class="card rounded-4 shadow  treeviewmin panddingardtreeview" style="min-height: 100% !important;height: 100% !important;max-height: 100%  !important; margin-top: 0;">
                    <div class="card-body p-0 m-0">

                        <div class="row p-2 ml-0">
                            <ul id="tree2">
                                <?php

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

    <!-- -----------------------------------Navbar Close-------------------------------- -->

    <div class="telacheia">
        <div class="col-md-12 p-2 m-0">
            <div class="row telacheia margemmnavbar">

                <!-- Esquerda -->
                <div class="col-3 idtamanhocelular d-none d-md-block d-lg-block justify-content-start position-fixed overflow-auto scrollable-column" style="
    height: 100%;
">
                    <div class="card rounded-4 shadow">
                        <div class="card-body p-0 m-0">
                             <div class="col-12 mh-25" >
<img src="<?php if ($imgcapa != "Avatar.png" && $imgcapa != "" && $imgcapa != null) {
                            echo "" . $imgcapa . "?" . uniqid(); 
                          } else {
                            echo "https://images2.alphacoders.com/131/1317606.jpeg";
                          } ?>" style="
                           width: -webkit-fill-available;
    height: -webkit-fill-available;
    min-height: 126px;
    max-height: 139px;     border-radius: 7px;">
               
              </div>
                            <div class="row p-0 ml-0">
                                <div class="col-5 d-flex justify-content-start p-0 m-0 " style="height: 0px;">
                                    <img src=" <?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                                    echo "" . $imgperfil;
                                                } else {
                                                    echo "assets/img/Avatar.png";
                                                } ?>" alt="user" class="border-2 mini-profile-img "style="object-fit: cover; box-shadow: 0px -3px 11px #0000005e;" >
                                </div>
                                <div class="col-7 p-0 m-0">
                                    <h3 class="fonte-titulo"><?php echo $companyname; ?></h3>
                                    <h6 class="fonte-principal" style="font-size: small;"><?php echo $username ?></h6>
                                </div>
                            </div>
                            <div class="col-12 m-0 p-0">
                                <hr class="m-0">
                            </div>
                            <div class="row mt-3 pr-2">
                                <div class="col-9 m-0 p-0">
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="minimenuoption">
                                        <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-eye icon-notif-zoom mini-profile-icon"></i>&nbsp;&nbsp;Views</h5>
                                    </a>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <h5 class="fonte-principal text-left"><?php

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
                                                                            ?></h5>
                                </div>
                            </div>
                            <div class="row pr-2">
                                <div class="col-9 m-0 p-0 mr-2">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalconect" class="minimenuoption">
                                        <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-users icon-notif-zoom mini-profile-icon"></i>&nbsp;&nbsp;Want to Connect</h5>
                                    </a>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <h5 class="fonte-principal text-left"><?php
                                                                            $conect = new Conect($dbh);
                                                                            $conect->setidUserReceb($iduser);
                                                                            $resultConect = $conect->consulta("WHERE idUserReceb = :idUserReceb AND status = '0'");
                                                                            $numView = 0;
                                                                            if ($resultConect != null) {
                                                                                foreach ($resultConect as $resultConectUnid) {
                                                                                    $numView += 1;
                                                                                }
                                                                            }
                                                                            echo $numView;
                                                                            ?></h5>
                                </div>
                            </div>
                            <div class="row pr-2  mb-2">
                                <div class="col-9 m-0 p-0 mr-2">

                                    <a href="listcompani.php?text=mysp" class="minimenuoption">
                                        <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-address-card icon-notif-zoom mini-profile-icon"></i>&nbsp;&nbsp;Searches Profiles</h5>
                                    </a>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <h5 class="fonte-principal text-left"><?php
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
                                                                            ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-4 shadow  treeviewmin panddingardtreeview" style="margin-bottom: 100px !important; height: 100%;max-height: -webkit-fill-available;">
                        <div class="card-body p-0">
                            <div class="col-12 mh-25">
                                <h3 class="color-branco">Matching Business Online <div style="text-align: end; width: 24px;float: right;position: initial;    color: #62b1ff;"><?php $numerouser2 = new UserClients($dbh);
                                                                                                                                                                                echo $numerouser2->quantidade(""); ?></div>
                                </h3>
                                <hr>
                            </div>
                            <div class="row p-2 ml-0">
                                <ul id="tree1">
                                    <?php


                                    $operations = new Operations($dbh);
                                    $resultsOperation = $operations->consulta("WHERE FlagOperation != '0'");
                                    if ($resultsOperation != null) {
                                        foreach ($resultsOperation as $rowOperation) {
                                    ?>
                                            <li class="row" style="padding: 0 !important;
    justify-content: space-between;
    flex-wrap: nowrap;
    flex: 1;
    display: flow;">

                                                <a  style="width: fit-content !important;" href="listcompani.php?operation=<?php echo $rowOperation->idOperation; ?>"><?php if ($rowOperation->FlagOperation != "D") {
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
                                                                <li><a class="sizewidgh" style="width: fit-content !important;" href="listcompani.php?busines=<?php echo $rowbusiness->idBusiness; ?>&operation=<?php echo $rowOperation->idOperation; ?>"><?php
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

                <div class="col-3"></div>

                <!-- Meio -->
                <div class="col-lg-6 col-12 justify-content-center">
                    <div class="col-md-12  justify-content-center">
                        <div class="col-md-12">
                            <div class="card shadow rounded-4 ">
                                <div class="card-body shadow d-flex flex-column rounded-4 ">
                                    <form action="../controller/homeController.php" method="POST" enctype="multipart/form-data" id="meuFormulario">
                                        <div class="col-md-12">
                                            <textarea name="txtpos" class="form-control input-new-post" rows="1" placeholder="Write a post..." id="myTextarea" maxlength="500"></textarea>
                                        </div>
                                        <br>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <img id="preview-image" src="" alt="" class="d-flex post-imgvideo-style">

                                            <!-- Botão "X" para remover a imagem -->
                                            <button type="button" id="remove-image-button" class="btn btn-danger btn-sm bcolor-azul-escuro" style="display: none;">X</button>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <video id="preview-video" src="" class="post-imgvideo-style" controls></video>
                                            <!-- Botão "X" para remover a imagem -->
                                            <button type="button" id="remove-video-button" class="btn btn-danger btn-sm bcolor-azul-escuro" style="display: none;">X</button>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row justify-content-end mt-auto">
                                                <label class="insertpost btn btn-second mr-2 btn-lg d-block d-md-none" for="file-input">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                    </svg></label>
                                                </label>
                                                <input id="file-input" accept="image/*" capture="camera" type="file" name="postphotocamera" class="d-none">

                                                <label class="insertpost btn btn-second mr-2 btn-lg" for="file-inputs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                                    </svg></label>
                                                </label>
                                                <input id="file-inputs" accept="image/*" type="file" name="postphoto" class="d-none">

                                                <label class="insertpost btn btn-second mr-2 btn-lg" for="video-input">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z" />
                                                    </svg>
                                                </label>
                                                <input id="video-input" accept="video/*" type="file" name="postvideo" class="d-none">
                                                <!-- Botão "X" para remover o vídeo -->


                                                <input class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="Post" id="submit-button">
                                                </input>
                                            </div>
                                            <div class="progress progress-striped active mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 88%"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow rounded-4 card-post-style  mt-4 produtos-feed-scrollbar produtoscard">
                                <h3 class="texto-titulo" style="margin: inherit;"> &nbsp;&nbsp;Featured Products</h3>
                                 <div class="rowProduct overflow-auto produtos-feed-scrollbar row-produto-card-pro" style="margin-bottom: 17px;padding: 10px;" id="produtos-feed">
                                    <?php

                                    $productss = new Products($dbh);

                                    if ($corebusiness == 2) {
                                        //Flag A

                                        $resultsProdutoss = $productss->consulta(" WHERE Category IN (3, 4,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23) ORDER BY idProduct ASC");

                                    } else if ($corebusiness == 3 || $corebusiness == 4) {
                                        //Flag B

                                        $resultsProdutoss = $productss->consulta(" WHERE Category IN (2, 5) ORDER BY idProduct ASC");

                                    } else if ($corebusiness == 5) {
                                        //Flag C
        
                                        $resultsProdutoss = $productss->consulta(" WHERE Category IN (3,4) ORDER BY idProduct ASC");

                                    } else {
                                        //Flag D
        
                                        $resultsProdutoss = $productss->consulta(" ORDER BY idProduct ASC");
                                        
                                    }

                                    
                                    if ($resultsProdutoss != null) {

                                        foreach ($resultsProdutoss as $rowProdutos) { ?>
                                            <div class="card-produto-uni">
                                                <div class="card-container bcolor-azul-escuro rounded-4 uniprodutocard" style="width: -webkit-fill-available;">
                                                    <div class="col-12 imagemproduto" style="display: flex; flex-direction: column; min-height: 140px; max-height: 140px; padding: 4px; width: -webkit-fill-available;">
                                                        <a data-toggle="modal" data-target="#modalViewProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                                                            <img class="hero-image produtos-img rounded-4 imgprodutotamanho" style=" user-drag: none;object-fit: cover;" src="<?php

                                                                                                                                            $productsPictures = new ProductPictures($dbh);
                                                                                                                                            $productsPictures->setidProduct($rowProdutos->idProduct);
                                                                                                                                            $resultsProdutos1 = $productsPictures->consulta("WHERE idProduct = :idProduct");
                                                                                                                                            if ($resultsProdutos1 != null) {
                                                                                                                                                foreach ($resultsProdutos1 as $rowProdutosu) {
                                                                                                                                                    echo $rowProdutosu->tblProductPicturePath;
                                                                                                                                                    break;
                                                                                                                                                }
                                                                                                                                            } else {
                                                                                                                                                echo "assets/img/Avatar.png";
                                                                                                                                            }
                                                                                                                                            ?>" alt="Spinning glass cube">
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mt-2 txtprodutos" style="padding: 6px;">
                                                        <div class="col-12">
                                                            <a data-toggle="modal" data-target="#modalViewProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                                                                <h5 class="tituloproduto mb-0" style="white-space: pre-line; color: #fff;text-transform: uppercase;"><?php echo $rowProdutos->ProductName; ?></h5>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <a data-toggle="modal" data-target="#modalViewProduto" data-toggle="modal" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container" style="color: ##fff !important;">
                                                                <p class=" cortardescricao color-cinza-b desc-produto fonte-principal" style="color: ##fff !important;"><?php echo $rowProdutos->ProdcuctDescription; ?></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>

                            <div id="divFeedUpdate">
                                <?php

                                $feeds = new Feeds($dbh);
                                $resultsfeed = $feeds->consulta("ORDER BY Published_at DESC LIMIT 8");

                                $x = 0;

                                if ($resultsfeed != null) {
                                    foreach ($resultsfeed as $rowfeed) {

                                            if($x >= 2){

                                                $x = 0;


                                                $empresas = new Empresas($dbh);
                                                $resultsempresas = $empresas->consulta("");
                                                if ($resultsempresas != null) {

                                                    $numEmpresa = count($resultsempresas);

                                                    $numEmpresaSelecionada = random_int(0, $numEmpresa-1);

                                                    $rowempresas = $resultsempresas[$numEmpresaSelecionada];
                                                    $imgpostempresa = $rowempresas->fotoperfil;
                                                ?>

                                                <div class="card shadow p-0 bcolor rounded-4 mt-4 mb-4">
                                                <div class="card-body shadow d-flex flex-column rounded-4 color-cinza" style="background-color: #d3d3d3;">

                                                    <div class=" row align-content-center">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <img src="<?php if($rowempresas->fotoperfil != ""){echo $rowempresas->fotoperfil;}else{echo "assets/img/logo.png";}?>" alt="user" class="nav-profile-img  " onerror="this.onerror=null; this.src='/assets/img/Avatar.png'">

                                                            </div>
                                                            <div class="col-8 p-2 color-preto" style="padding-left: 26px !important;">
                                                                <a href="empresa.php?idtax=<?php echo  $rowempresas->taxid;?>" class="color-preto text-decoration-none">
                                                                    <h3 class="fonte-titulo text-decoration-none">
                                                                        <?php
                                                                        echo $rowempresas->nome;
                                                                        ?>
                                                                    </h3>
                                                                    <h5>Sponsored</h5>
                                                                </a>
    
                                                            </div>
                                                            <div class="col-3 d-flex text-right color-preto justify-content-end">

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="col-12" style="padding: inherit;">
  <?php
                                                     $numeroCaracteres2 = strlen($rowempresas->descricao);
                                                    if ($numeroCaracteres2 > 200) {
                                                        echo "
                                                        <div id='textoEx" .$rowempresas->id .$rowfeed->IdFeed. "' style='height: 8em; overflow: hidden;'>
                                                            <p class='fonte-principal color-preto' style='font-size: larger; color: #1d1d1d;'>
                                                                <br>
                                                                " . $rowempresas->descricao . "
                                                            </p>
                                                        </div>";
                                                        echo "<a href='javascript:void(0)' id='btn-vm" . $rowempresas->id.$rowfeed->IdFeed . "' onClick='alterarLimite(" . $rowempresas->id.$rowfeed->IdFeed . ")' style='color: #0308b0;font-size: larger;'>Ver mais</a>";
                                                    } else {
                                                        echo "
                                                        <div id='textoEx" . $rowempresas->id .$rowfeed->IdFeed. "'>
                                                            <p class='fonte-principal color-preto' style='font-size: larger; color: #1d1d1d;'>
                                                                <br>
                                                                " . $rowempresas->descricao . "
                                                            </p>
                                                        </div>";
                                                    }
                                                    ?>
                                                    <br>
                                                

                                                    </div>

                                                    <div class="row col-12 align-content-center justify-content-center">
                                                       <!-- <?php if ($imgpostempresa != "Avatar.png" && $imgpostempresa != "" && file_exists("" . $imgpostempresa)) { ?>
                                                            <img class="img-feed-styleset" src="<?php echo $imgpostempresa; ?>" alt="" width="100%">
                                                        <?php }?> -->
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <?php 
                                                
                                            } 

                                            }else{

                                                $x = $x +1;

                                            }

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
                                                    $jobtitlepost = $rowuserpost->JobTitle;
                                                    $companynamepost = $rowuserpost->CompanyName;
                                                }
                                            }
                                    ?>
                                        <div class="card shadow p-0 bcolor rounded-4 mt-4 mb-4">
                                            <div class="card-body shadow d-flex flex-column rounded-4 color-cinza">

                                                <div class=" row align-content-center">
                                                    
                                                        <div class="col-1">
                                                            <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "" && file_exists("" . $imgpostuser)) {
                                                                            echo "" . $imgpostuser;
                                                                        } else {
                                                                            echo "assets/img/Avatar.png";
                                                                        } ?>" alt="user" class="nav-profile-img" style="min-height: 35px;border: 1px solid #00000042;object-fit: cover;" onerror="this.onerror=null; this.src='/assets/img/Avatar.png'">

                                                        </div>
                                                        <div class="col-8 p-2 color-preto" style="padding-left: 20px  !important;">
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
                                                                    echo $rowOperationpost->NmOperation . " / ". $jobtitlepost . ' at ' . $companynamepost ;
                                                                }
                                                            }
                                                            ?><br>

                                                        </div>
                                                        <div class="col-2 d-flex text-right color-preto justify-content-end">

                                                            <?php echo $timeAgo; ?>

                                                        </div>
                                                        <?php if($rowfeed->IdClient ==  $iduser){ ?>
                                                         <div class="col-1 d-flex text-right color-preto justify-content-end">

                                                        <div class="dropdown">
                                                              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent;
    border: 0px;
    color: black;
    font-size: medium;">
                                                             <i class="fas fa-ellipsis-v"></i>
                                                              </a>
                                                            
                                                              <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="../controller/homeController.php?deletar=true&idfeed=<?php echo $rowfeed->IdFeed;?>&idcliente=<?php echo $rowfeed->IdClient;?>"><i class="fas fa-trash-alt " style="margin-right: 5px;"></i>Delete</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="fas fa-edit " style="margin-right: 5px;"></i>Eedit</a></li>
                                                                
                                                              </ul>
                                                        </div>

                                                        </div>
                                                        <?php } ?>
                                                    


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
                                                                                    } ?>" alt="user" class="nav-profile-img" style="min-height: 35px;border: 1px solid #00000042;object-fit: cover;" style="min-height: 21px; width: 33px;">
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

                <!-- Direita -->
                <div class="col-3">
                    <div class="col-3 idtamanhocelular d-none d-md-block d-lg-block justify-content-end position-fixed" style="height: -webkit-fill-available;">

                        <div class="col-12  d-none d-md-block" style="height: -webkit-fill-available;">
                            <h2>Sponsored</h2>
                            <div class="col-12" id="sponsored-container">

                            </div>
                           <div class="finaldapagina" style="    color: black;">
                                <div class="row" style=" text-align: center;">
                                <div class="col-sm-12, p_results">
                                     <a href="#" id="openModalLink" data-toggle="modal" data-target="#exampleModalLong" style="
                                    font-size: small; color: black !important;
                                    "> Privacy Policy </a>|
                                        <a href="#" id="openModalLink" data-toggle="modal" data-target="#exampleModalLong4"   style="
                                    font-size: small;color: black !important;
                                    "> User Agreement </a>|
                                        <a href="#" id="openModalLink" data-toggle="modal" data-target="#exampleModalLong2"  style="
                                    font-size: small;color: black !important;
                                    "> Cookie Policy </a>|
                                        <a href="#" id="openModalLink" data-toggle="modal" data-target="#exampleModalLong3"style="
                                    font-size: small;color: black !important;  
                                    "> Copyright Policy</a>
                                </div>

                            </div>
                            <div class="text-center span-3 bottom-bar-style">
                                © 2023 All Rights Reserved:
                                <span class="">LABD - Latin America Business Development</span>
                            </div>
                            </div>
                            
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="container">
        <!-- -------------------left-sidebar------------------------ -->
        <div class="left-sidebar">

            <div class="sidebar-activity " id="sidebarActivity">
                <h3>What are you looking for?</h3>
                <?php
                //$sqlOperation = "SELECT * from tblOperations WHERE FlagOperation != '0' limit 10";
                //$queryOperation = $dbh->prepare($sqlOperation);
                //$queryOperation->execute();
                //$resultsOperation = $queryOperation->fetchAll(PDO::FETCH_OBJ);



                $operations = new Operations($dbh);

                $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' limit 10");


                if ($resultsOperation != null) {
                    foreach ($resultsOperation as $rowOperation) { ?>
                        <a href="chatPage.php"><img src="/assets/img/group.png" alt="">
                            <?php echo $rowOperation->NmOperation; ?>
                        </a>
                <?php }
                }

                ?>

                <div class="discover-more-link">
                    <a href="#">Discover more</a>
                </div>
            </div>


        </div>



        <!-- ------------------------main-content------------------------>
        <div class="modal custom-modal fade" id="exampleModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="max-height: 400px !important;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Views</h5>
                        <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                            <span aria-hidden="false" class="color-branco">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="m-0 overflow-y p-1 ul-view">
                            <?php



                            $views = new Views($dbh);
                            $views->setidView($iduser);
                            $resultsview = $views->consulta("WHERE idView = :idView ORDER BY datacriacao DESC");

                            if ($resultsview != null) {
                                foreach ($resultsview as $rowviews) {

                            ?>
                                    <?php


                                    $userClients = new UserClients($dbh);
                                    $userClients->setidClient($rowviews->idUser);
                                    $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");


                                    if ($resultsUserClients != null) {
                                        foreach ($resultsUserClients as $rowcliente) {


                                            $operations = new Operations($dbh);
                                            $operations->setidOperation($rowcliente->CoreBusinessId);
                                            $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' AND idOperation = :idOperation");


                                            if ($resultsOperation != null) {
                                                foreach ($resultsOperation as $rowOperation) {


                                    ?>

                                                    <li class="recommended-user  mb-1" style="justify-content: normal !important;">

                                                        <div class="col-1 justify-content-center m-0 p-0">
                                                            <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                                                <img src="<?php if ($rowcliente->PersonalUserPicturePath != "Avatar.png" && $rowcliente->PersonalUserPicturePath != "" && file_exists("" . $rowcliente->PersonalUserPicturePath)) {
                                                                                echo "" . $rowcliente->PersonalUserPicturePath;
                                                                            } else {
                                                                                echo "assets/img/Avatar.png";
                                                                            } ?>" alt="user" alt="An unknown user." style="object-fit: cover; min-height: 35px;
    min-width: 35px;
    max-width: 35px;
    max-height: 35px;
    width: 35px;
    height: 35px;" onerror="this.onerror=null; this.src='assets/img/Avatar.png'" class="nav-profile-img"></a>
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






    </div>
    <!-- footer -->
    <div class="modal custom-modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="color: black;">
          <h5 class="modal-title privacetexttitle" id="exampleModalLongTitle">Privacy Police</h5>
          <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                            <span aria-hidden="false" data-dismiss="modal" class="color-branco">x</span>
                        </button>
        </div>
        <div class="modal-body privacetext" style="color: black;line-height: 20px;font-weight: 500;text-align: justify;">
          <?php



          $conect = new Contract($dbh);

          $resultscontrato = $conect->consulta("WHERE idContract = 6 ");

          if ($resultscontrato != null) {
            foreach ($resultscontrato as $rowcontrato) {
              echo $rowcontrato->ContractText;
            }
          }
          ?>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary closes privacetextbtn" data-dismiss="modal" aria-label="Close">Accept</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal custom-modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="color: black;">
          <h5 class="modal-title privacetexttitle" id="exampleModalLongTitle">Cookie Policy</h5>
          <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                            <span aria-hidden="false" data-dismiss="modal" class="color-branco">x</span>
                        </button>
        </div>
        <div class="modal-body privacetext" style="color: black;line-height: 20px;font-weight: 500;text-align: justify;">
          <?php



          $conect = new Contract($dbh);

          $resultscontrato = $conect->consulta("WHERE idContract = 8 ");

          if ($resultscontrato != null) {
            foreach ($resultscontrato as $rowcontrato) {
              echo $rowcontrato->ContractText;
            }
          }
          ?>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary closes privacetextbtn" data-dismiss="modal" aria-label="Close">Accept</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal custom-modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="color: black;">
          <h5 class="modal-title privacetexttitle" id="exampleModalLongTitle">Copyright Policy</h5>
          <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                            <span aria-hidden="false" data-dismiss="modal" class="color-branco">x</span>
                        </button>
        </div>
        <div class="modal-body privacetext" style="color: black;line-height: 20px;font-weight: 500;text-align: justify;">
          <?php



          $conect = new Contract($dbh);

          $resultscontrato = $conect->consulta("WHERE idContract = 7 ");

          if ($resultscontrato != null) {
            foreach ($resultscontrato as $rowcontrato) {
              echo $rowcontrato->ContractText;
            }
          }
          ?>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary closes privacetextbtn" data-dismiss="modal" aria-label="Close">Accept</button>
        </div>
      </div>
    </div>
  </div>
    <div class="modal custom-modal fade" id="exampleModalconect" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Want to Connect</h5>
                    <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                        <span aria-hidden="false" class="color-branco">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="m-0 overflow-auto p-1 ul-view">
                        <?php

                        $connect = new Conect($dbh);
                        $connect->setidUserReceb($iduser);
                        $resultsconect = $connect->consulta("WHERE idUserReceb = :idUserReceb AND status = '0'  ORDER BY datapedido DESC");



                        if ($resultsconect != null) {
                            foreach ($resultsconect as $rowviews) {

                        ?>
                                <?php

                                $userClients = new UserClients($dbh);
                                $userClients->setidClient($rowviews->idUserPed);
                                $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");

                                if ($resultsUserClients != null) {
                                    foreach ($resultsUserClients as $rowcliente) {


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
                                                                <img src="<?php if ($rowcliente->PersonalUserPicturePath != "Avatar.png" && $rowcliente->PersonalUserPicturePath != "" && file_exists("" . $rowcliente->PersonalUserPicturePath)) {
                                                                                echo "" . $rowcliente->PersonalUserPicturePath;
                                                                            } else {
                                                                                echo "assets/img/Avatar.png";
                                                                            } ?>" alt="user" alt="An unknown user." style="object-fit: cover; min-height: 35px;
    min-width: 35px;
    max-width: 35px;
    max-height: 35px;
    width: 35px;
    height: 35px;" onerror="this.onerror=null; this.src='assets/img/Avatar.png'"></a>
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
  <div class="modal custom-modal fade" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="color: black;">
          <h5 class="modal-title privacetexttitle" id="exampleModalLongTitle">User Agreement</h5>
          <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                            <span aria-hidden="false" data-dismiss="modal" class="color-branco">x</span>
                        </button>
        </div>
        <div class="modal-body privacetext" style="color: black;line-height: 20px;font-weight: 500;text-align: justify;">
          <?php



          $conect = new Contract($dbh);

          $resultscontrato = $conect->consulta("WHERE idContract = 15 ");

          if ($resultscontrato != null) {
            foreach ($resultscontrato as $rowcontrato) {
              echo $rowcontrato->ContractText;
            }
          }
          ?>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary closes privacetextbtn" data-dismiss="modal" aria-label="Close">Accept</button>
        </div>
      </div>
    </div>
  </div>
    <div id="modalEditarProduto" class="modal custom-modal fade show comment-modal-primary" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #f0f0f0 !important;">

                <div class="modal-body comment-modal-primary">
                    <h1 id="modalProductName mb-0"></h1>
                    <p id="modalProductDescription color-cinza-b"></p>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script>
        var $wrapper = $('.main-wrapper');
        $('body').append('<div class="sidebar-overlay"></div>');
        $('#mobile_btn').on('click', function() {
            if ($('#sidebar').hasClass('expandeds1')) {
                openNav();
            } else {
                closeNav();
               
            }

        });

        

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
                        console.log("Teste produto sent");
                        initSlider();
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

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("#meuFormulario");
            const textarea = document.querySelector("#myTextarea");
            const imageInput = document.querySelector("#file-input");
            //const imageInputs = document.querySelector("#file-input");
            const videoInput = document.querySelector("#video-input");
            const submitButton = document.querySelector("#submit-button");
            const previewImage = document.querySelector("#preview-image");
            const previewVideo = document.querySelector("#preview-video");
            const removeImageButton = document.querySelector("#remove-image-button");
            const removeVideoButton = document.querySelector("#remove-video-button");

            // Função para mostrar ou ocultar o botão "X" da imagem
            function toggleRemoveImage() {
                if (imageInput.files.length > 0) {
                    removeImageButton.style.display = "block"; // Mostrar o botão "X"
                } else {
                    removeImageButton.style.display = "none"; // Ocultar o botão "X"
                }
            }

            // Função para mostrar ou ocultar o botão "X" do vídeo
            function toggleRemoveVideo() {
                if (videoInput.files.length > 0) {
                    removeVideoButton.style.display = "block"; // Mostrar o botão "X"
                } else {
                    removeVideoButton.style.display = "none"; // Ocultar o botão "X"
                }
            }

            // Adicione ouvintes de eventos para atualizar a exibição dos botões "X"
            imageInput.addEventListener("change", toggleRemoveImage);
            videoInput.addEventListener("change", toggleRemoveVideo);

            // Adicione ouvintes de eventos para remover a imagem ou o vídeo quando o botão "X" é clicado
            removeImageButton.addEventListener("click", function() {
                imageInput.value = ""; // Limpar o campo do arquivo de imagem
                previewImage.src = ""; // Limpar a visualização da imagem
                toggleRemoveImage(); // Ocultar o botão "X"
            });

            removeVideoButton.addEventListener("click", function() {
                videoInput.value = ""; // Limpar o campo do arquivo de vídeo
                previewVideo.src = ""; // Limpar a visualização do vídeo
                toggleRemoveVideo(); // Ocultar o botão "X"
            });

            // Adicione um ouvinte de evento para validar antes de enviar o formulário
            submitButton.addEventListener("click", function(event) {
                if (textarea.value.trim() === "" && imageInput.files.length === 0 && videoInput.files.length === 0 && imageInputs.files.length === 0) {
                    event.preventDefault();
                    alert("Por favor, adicione texto, imagem ou vídeo antes de postar.");
                }
            });
        });
    </script>
    <script>
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

        $('#tree2').treed();

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








        function openNav() {
            document.getElementById("sidebar").classList.remove("expandeds1");
      document.getElementById("sidebar").style.width = "250px";
      document.getElementById("sidebar").style.display = "flex";
      document.getElementById("sidebar").style.left = "0px";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
        document.getElementById("sidebar").classList.add("expandeds1");
      
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
        var loading = false;
        var loading2 = false;

        function atualizarFeed() {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("divFeedUpdate").innerHTML = this.responseText;
                    loading = false;
                    $(document).ready(function() {
                        // Ao clicar em um link de produto
                        $('.btnCommnet').click(function() {
                            // Obtenha o ID do produto associado ao link clicado
                            var idFeedsc = $(this).data('id');
                            console.log("clique");
                            console.log(idFeedsc);
                            // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
                            $.ajax({
                                type: 'GET',
                                url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
                                data: {
                                    idFeed: idFeedsc
                                },
                                success: function(data) {
                                    // Preencha o conteúdo do modal com as informações do produto
                                    console.log("Success");
                                    $('#modalEditarProduto .modal-content').html(data);
                                },
                                error: function() {
                                    alert('Ocorreu um erro ao carregar os dados do produto.');
                                }
                            });

                            // Abra o modal correspondente
                            $('#modalEditarProduto').fadeIn();
                        });

                        // Feche o modal ao clicar fora dele ou no botão de fechar
                        $('.modal').click(function(event) {
                            if ($(event.target).hasClass('modal')) {
                                $(this).fadeOut();
                            }
                        });
                    });
                }
            }
            xmlhttp.open("GET", "widget/atualizarFeed.php", true);
            xmlhttp.send();
        }

        $(document).ready(function() {
            // Detecta o evento de rolagem
            $(window).scroll(function() {
                // Verifica se chegou ao final da página
                if (!loading && $(window).scrollTop() + $(window).height() >= $(document).height() - 150) {
                    loading = true; // Marca que uma requisição está em andamento
                    // Chama a função quando o usuário chegar ao final da página
                    atualizarFeed();
                }
                if (!loading2 && $(window).scrollTop() <= 0) {
                    verificarNovosPosts();
                }
            });



        });


        function verificarNovosPosts() {
            if (!loading2) {
                loading2 = true; // Marca que uma requisição está em andamento

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("divFeedUpdate").innerHTML = this.responseText;
                        loading2 = false; // Marca que a requisição foi concluída
                        console.log("================================");
                        $(document).ready(function() {
                            // Ao clicar em um link de produto
                            $('.btnCommnet').click(function() {
                                // Obtenha o ID do produto associado ao link clicado
                                var idFeedsc = $(this).data('id');
                                console.log("clique");
                                console.log(idFeedsc);
                                // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
                                $.ajax({
                                    type: 'GET',
                                    url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
                                    data: {
                                        idFeed: idFeedsc
                                    },
                                    success: function(data) {
                                        // Preencha o conteúdo do modal com as informações do produto
                                        console.log("Success");
                                        $('#modalEditarProduto .modal-content').html(data);
                                    },
                                    error: function() {
                                        alert('Ocorreu um erro ao carregar os dados do produto.');
                                    }
                                });

                                // Abra o modal correspondente
                                $('#modalEditarProduto').fadeIn();
                            });

                            // Feche o modal ao clicar fora dele ou no botão de fechar
                            $('.modal').click(function(event) {
                                if ($(event.target).hasClass('modal')) {
                                    $(this).fadeOut();
                                }
                            });
                        });
                    }
                }
                xmlhttp.open("GET", "widget/atualizarFeednovo.php", true);
                xmlhttp.send();
            }
        }

        document.getElementById('submit-button').addEventListener('click', function() {
            // 
            var progressBar = document.querySelector('.progress');
            progressBar.style.display = 'flex';
            setTimeout(function() {
                e.preventDefault();
                document.getElementById('meuFormulario').submit();
            }, 3000); //
        });


        $(document).ready(function() {
            // Ao clicar em um link de produto
            $('.btnCommnet').click(function() {
                // Obtenha o ID do produto associado ao link clicado
                var idFeedsc = $(this).data('id');
                console.log("clique");
                console.log(idFeedsc);
                // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
                $.ajax({
                    type: 'GET',
                    url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
                    data: {
                        idFeed: idFeedsc
                    },
                    success: function(data) {
                        // Preencha o conteúdo do modal com as informações do produto
                        console.log("Success");
                        $('#modalEditarProduto .modal-content').html(data);
                    },
                    error: function() {
                        alert('Ocorreu um erro ao carregar os dados do produto.');
                    }
                });

                // Abra o modal correspondente
                $('#modalEditarProduto').fadeIn();
            });

            // Feche o modal ao clicar fora dele ou no botão de fechar
            $('.modal').click(function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(this).fadeOut();
                }
            });
        });

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

        };
    </script>
    
    <script>
        // JavaScript para clonar e adicionar cards novamente
        const produtosFeed = document.getElementById('produtos-feed');
        const cardProdutoUni = document.querySelectorAll('.card-produto-uni');

        const cloneCards = () => {
            const cardsClone = Array.from(cardProdutoUni).map((card) => card.cloneNode(true));
            cardsClone.forEach((card) => produtosFeed.appendChild(card));
        };

        cloneCards();
    </script>

</body>
</html>