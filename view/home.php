<?php
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 5;

//$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
//$query = $dbh->prepare($sql);
//$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
//$query->execute();
//$results = $query->fetchAll(PDO::FETCH_OBJ);

include_once('../model/classes/tblUserClients.php');

$userClients = new UserClients();

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
    }
}

//$sqlCountry = "SELECT * from tblcountry WHERE idCountry = :idCountry";
//$queryCountry = $dbh->prepare($sqlCountry);
//$queryCountry->bindParam(':idCountry', $idcountry, PDO::PARAM_INT);
//$queryCountry->execute();
//$resultsCountry = $queryCountry->fetchAll(PDO::FETCH_OBJ);

include('../model/classes/tblCountry.php');

$country = new Country();

$country->setidCountry($idcountry);

$resultsCountry = $country->consulta("WHERE idCountry = :idCountry");

if ($resultsCountry != null) {
    foreach ($resultsCountry as $rowCountry) {
        $pais = $rowCountry->NmCountry;
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
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
            xmlhttp.open("GET", "atualizarcurtida.php?id=" + iddiv, true);
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
            xmlhttp.open("GET", "atualizardescurtida.php?id=" + iddiv, true);
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


</head>

<body class="funcolinhas">



    <!-- Header -->
    <?php include_once("widget/navbar.php"); ?>


    <!-- -----------------------------------Navbar Close-------------------------------- -->

    <div class="telacheia">
        <div class="col-md-12 p-2 m-0">
            <div class="row telacheia margemmnavbar">

                <!-- Esquerda -->
                <div class="col-3 d-none d-md-block justify-content-start ">
                    <div class="card rounded-4 shadow">
                        <div class="card-body p-0 m-0">
                            <div class="col-12 mh-25">
                                <img class="mh-25 rounded-top-3" src="https://images2.alphacoders.com/131/1317606.jpeg" alt="Descrição da Imagem" style="max-height: 100px; width: 100%;">
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
                            <div class="row mt-3 pr-2">
                                <div class="col-9 m-0 p-0">

                                    <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-eye icon-notif-zoom mini-profile-icon"></i>&nbsp;&nbsp;Views</h5>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <h5 class="fonte-principal text-left">0</h5>
                                </div>
                            </div>
                            <div class="row pr-2">
                                <div class="col-9 m-0 p-0 mr-2">

                                    <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-users icon-notif-zoom mini-profile-icon"></i>&nbsp;&nbsp;Want to Connect</h5>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <h5 class="fonte-principal text-left">0</h5>
                                </div>
                            </div>
                            <div class="row pr-2  mb-2">
                                <div class="col-9 m-0 p-0 mr-2">

                                    <h5 class="fonte-principal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-address-card icon-notif-zoom mini-profile-icon"></i>&nbsp;&nbsp;Searches Profiles</h5>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <h5 class="fonte-principal text-left">0</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-4 shadow  treeviewmin panddingardtreeview">
                        <div class="card-body p-0 m-0">
                            <div class="col-12 mh-25">
                                <h2>Matching Business Online</h2>
                                <hr>
                            </div>
                            <div class="row p-2 ml-0">
                                <ul id="tree1">
                                    <?php
                                    include_once('../model/classes/tblOperations.php');

                                    $operations = new Operations();
                                    $resultsOperation = $operations->consulta("WHERE FlagOperation != '0'");
                                    if ($resultsOperation != null) {
                                        foreach ($resultsOperation as $rowOperation) {
                                    ?>
                                            <li><a href="searchPage.php?operation=<?php echo $rowOperation->idOperation; ?>"><?php
                                                                                                                                if ($rowOperation->FlagOperation != "D") {
                                                                                                                                    echo "<i class='fa-solid fa-add indicator ' ></i>";
                                                                                                                                } ?>
                                                    <?php echo trim($rowOperation->NmOperation);  ?></a>
                                                <?php if ($rowOperation->FlagOperation != "D") { ?>
                                                    <ul>
                                                        <?php
                                                        include_once('../model/classes/tblBusiness.php');
                                                        $business = new Business();
                                                        $resultsbusiness = $business->consulta("WHERE FlagOperation = '0' ORDER BY NmBusiness ASC");
                                                        if ($business != null) {
                                                            foreach ($resultsbusiness as $rowbusiness) {
                                                        ?>
                                                                <li><a class="sizewidgh" href="searchPage.php?busines=<?php echo $rowbusiness->idBusiness; ?>"><?php echo "<i class='fa-solid fa-add indicator ' ></i>";
                                                                                                                                                                echo trim($rowbusiness->NmBusiness); ?>
                                                                        <ul>
                                                                            <?php
                                                                            include_once('../model/classes/tblBusinessCategory.php');
                                                                            $BusinessCategory = new BusinessCategory();
                                                                            $resultsBusinessCategory = $BusinessCategory->consulta("WHERE idBusiness = $rowbusiness->idBusiness ORDER BY NmBusinessCategory ASC");
                                                                            if ($BusinessCategory != null) {
                                                                                foreach ($resultsBusinessCategory as $rowresultsBusinessCategory) {
                                                                            ?><li><a class="sizewidghsub" href="searchPage.php?categoria=<?php echo $rowresultsBusinessCategory->idBusinessCategory; ?>"><?php echo trim($rowresultsBusinessCategory->NmBusinessCategory); ?></a>

                                                                                    </li><?php
                                                                                        }
                                                                                    }
                                                                                            ?>


                                                                        </ul>
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

                <!-- Meio -->
                <div class="col-lg-6 col-12 justify-content-center">
                    <div class="col-md-12  justify-content-center">
                        <div class="col-md-12">
                            <div class="card shadow rounded-4 ">
                                <div class="card-body shadow d-flex flex-column rounded-4 ">
                                    <form action="../controller/homeController.php" method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">

                                            <textarea style="overflow: hidden;overflow-wrap: break-word;resize: none;font-size: initial;height: 36.6px;" name="txtpos" class="form-control " rows="1" placeholder="Write a post..." id="myTextarea" maxlength="500"></textarea>
                                        </div>
                                        <br>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <img id="preview-image" src="" alt="" class="d-flex post-imgvideo-style">
                                            <video id="preview-video" src="" class="post-imgvideo-style" controls></video>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="row justify-content-end mt-auto">

                                                <label class=" insertpost btn btn-second mr-2 btn-lg" for="file-input"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                                    </svg></label>
                                                <input id="file-input" accept="image/*" type="file" name="postphoto" class="d-none">

                                                <label class="insertpost btn btn-second mr-2 btn-lg" for="video-input"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z" />
                                                    </svg></label>
                                                <input id="video-input" accept="video/*" type="file" name="postvideo" class="d-none">



                                                <input class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm" type="submit" name="post" value="Post">

                                                </input>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow rounded-4 card-post-style  mt-4 produtos-feed-scrollbar">
                                <h3 class="texto-titulo">&nbsp;&nbsp;Produtos em Destaque</h3>
                                <div class="rowProduct overflow-auto produtos-feed-scrollbar row-produto-card-pro">
                                    <?php
                                    //$sqlProdutos = "SELECT * from tblProducts ORDER BY idProduct ASC ";
                                    //$queryProdutos = $dbh->prepare($sqlProdutos);
                                    //$queryProdutos->execute();
                                    //$resultsProdutos = $queryProdutos->fetchAll(PDO::FETCH_OBJ);

                                    include_once('../model/classes/tblProducts.php');

                                    $products = new Products();

                                    $resultsProdutos = $products->consulta("ORDER BY idProduct ASC");

                                    if ($resultsProdutos != null) {
                                        if (is_array($resultsProdutos) || is_object($resultsProdutos)) {
                                            foreach ($resultsProdutos as $rowProdutos) {
                                    ?>
                                                <div class="card-produto-uni">
                                                    <div class="card-container bcolor-azul-escuro rounded-4">
                                                        <div class="col-12">
                                                            <a href="../viewProfile.php?profile=<?php echo $rowProdutos->idClient; ?>" data-toggle="modal" data-target="#modalEditarProduto" data-toggle="modal" data-target="#add_produto" data-id="<?php echo $rowProdutos->idProduct; ?>" class="hero-image-container">
                                                                <img class="hero-image produtos-img rounded-4" style=" user-drag: none;" src="<?php
                                                                                                                                                //$sqlProdutos = "SELECT * from tblProductPictures WHERE idProduct = :idProduct ";
                                                                                                                                                //$queryProdutos1 = $dbh->prepare($sqlProdutos);
                                                                                                                                                //$queryProdutos1->bindParam(':idProduct', $rowProdutos->idProduct, PDO::PARAM_INT);
                                                                                                                                                //$queryProdutos1->execute();
                                                                                                                                                //$resultsProdutos1 = $queryProdutos1->fetchAll(PDO::FETCH_OBJ);

                                                                                                                                                include_once('../model/classes/tblProductPictures.php');

                                                                                                                                                $productsPictures = new ProductPictures();

                                                                                                                                                $productsPictures->setidProduct($rowProdutos->idProduct);

                                                                                                                                                $resultsProdutos1 = $productsPictures->consulta("WHERE idProduct = :idProduct");

                                                                                                                                                /*if ($resultsProdutos1 != null) {
                                                                                                            foreach ($resultsProdutos1 as $rowProdutos1) {
                                                                                                                echo "../../../" . $rowProdutos1->tblProductPicturePath;
                                                                                                            }
                                                                                                        } else {*/
                                                                                                                                                echo "https://images.unsplash.com/photo-1507608158173-1dcec673a2e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80";
                                                                                                                                                /*}*/
                                                                                                                                                ?>" alt="Spinning glass cube" />
                                                            </a>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="mb-0"><a class="text-decoration-none color-branco" href="#">&nbsp;&nbsp;<?php echo $rowProdutos->ProductName; ?></a></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="cortardescricao color-cinza-b desc-produto fonte-principal">&nbsp;&nbsp;<?php echo $rowProdutos->ProdcuctDescription; ?></p>
                                                        </div>



                                                    </div>
                                                </div>

                                    <?php }
                                        }
                                    } ?>
                                </div>
                            </div>

                            <div id="divFeedUpdate">
                                <?php

                                //$sqlFeed = "SELECT * from tblFeeds ORDER BY Published_at DESC LIMIT 5";
                                //$queryfeed = $dbh->prepare($sqlFeed);
                                //$queryfeed->execute();
                                //$resultsfeed = $queryfeed->fetchAll(PDO::FETCH_OBJ);

                                include_once('../model/classes/tblFeeds.php');

                                $feeds = new Feeds();

                                $resultsfeed = $feeds->consulta("ORDER BY Published_at DESC LIMIT 8");

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

                                        //$sqluserpost = "SELECT * from tblUserClients WHERE idClient = :idClient";
                                        //$queryuserpost = $dbh->prepare($sqluserpost);
                                        //$queryuserpost->bindParam(':idClient', $rowfeed->IdClient, PDO::PARAM_INT);
                                        //$queryuserpost->execute();
                                        //$resultsuserpost = $queryuserpost->fetchAll(PDO::FETCH_OBJ);

                                        include_once("../model/classes/tblUserClients.php");

                                        $userClients = new UserClients();

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
                                                        <div class="col-2">
                                                            <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "" && file_exists("" . $imgpostuser)) {
                                                                            echo "" . $imgpostuser;
                                                                        } else {
                                                                            echo "/assets/img/Avatar.png";
                                                                        } ?>" alt="user" class="nav-profile-img  " onerror="this.onerror=null; this.src='/assets/img/Avatar.png'">

                                                        </div>
                                                        <div class="col-7 p-2 color-preto">
                                                            <a href="../viewProfile.php?profile=<?php echo $rowfeed->IdClient; ?>" class="color-preto text-decoration-none">
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

                                                            include_once("../model/classes/tblOperations.php");

                                                            $operations = new Operations();

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
                                                        <div id='textoEx" . $rowfeed->IdFeed . "' style='height: 4em; overflow: hidden;'>
                                                            <h3 class='fonte-principal color-preto'>
                                                                <br>
                                                                " . $rowfeed->Text . "
                                                            </h3>
                                                        </div>";
                                                    }
                                                    ?>
                                                    <br>



                                                </div>

                                                <div class="row col-12 align-content-center">
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

                                                    include_once('../model/classes/tblCurtidas.php');

                                                    $curtidas = new Curtidas();

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

                                                    include_once('../model/classes/tblCurtidas.php');

                                                    $curtidas = new Curtidas();

                                                    $curtidas->setidpost($rowfeed->IdFeed);
                                                    $curtidas->setidusuario($iduser);

                                                    $resultsOperationpost = $curtidas->consulta("WHERE idpost = :idpost AND idusuario = :idusuario");

                                                    if ($resultsOperationpost != null) {




                                                        echo "<div class='col-6 fonte-principal'  id='div-" . $rowfeed->IdFeed . "'>

                                                           
                                                                <input hidden type='text' name='idpost' value='" . $rowfeed->IdFeed . "'>
    
    
                                                                <button class='btn btn-four pl-4 pr-4 no-border p-3' onClick='showDCurtida(" . $rowfeed->IdFeed . ")'>
                                                                    <span class='' style='font-size: 13px;'>
                                                                        " . $numeroCurtidas . " &nbsp;&nbsp;<i class='fa-solid fa-thumbs-up'> Like</i>
                                                                    </span>
                                                                </button>
                                                            
    
                                                        </div>";
                                                    } else {

                                                        echo "<div class='col-6 fonte-principal' id='div-" . $rowfeed->IdFeed . "'>

                                                       
                                                            <input hidden type='text' name='idpost' value='" . $rowfeed->IdFeed . "'>


                                                            <button class='btn btn-third pl-4 pr-4 no-border p-3' onClick='showCurtida(" . $rowfeed->IdFeed . ");'>
                                                                <span class='' style='font-size: 13px;'>
                                                                    " . $numeroCurtidas . " &nbsp;&nbsp;<i class='fa-solid fa-thumbs-up'> Like</i>
                                                                </span>
                                                            </button>
                                                       

                                                    </div>";
                                                    }
                                                    ?>



                                                    <div class="col-6 d-flex justify-content-end">
                                                        <a id="btnCommnet" data-toggle="modal" data-target="#modalEditarProduto" data-id="<?php echo $rowfeed->IdFeed;
                                                                                                                                            ?>" class="btn btn-third pl-4 pr-4 no-border p-3 hero-image-container2"><span class="btn-comment-post">
                                                                0 &nbsp;&nbsp; <i class="bi bi-chat-square-text">
                                                                    Comentarios</i>
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

                <!-- Direita -->
                <div class="col-3 justify-content-end">
                    <h2>Sponsored</h2>

                    <div class="row" style=" text-align: center;">
                        <div class="col-sm-12, p_results">
                            <a href="#" style="
    font-size: small;
"> Privacy Policy </a>|
                            <a href="" style="
    font-size: small;
"> User Agreement </a>|
                            <a href="" style="
    font-size: small;
"> Cookie Policy </a>|
                            <a href="" style="
    font-size: small;
"> Copyright Policy</a>
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

                include_once("../model/classes/tblOperations.php");

                $operations = new Operations();

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





        <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>

        <!-- ------------------center-sidebar------------------------- -->


        <!-- Network chat test -->





    </div>
    <!-- footer -->
    <div class="footer bg-dark text-center text-white">
        <!-- Copyright -->
        <a href="#"> Privacy Policy </a>|
        <a href=""> User Agreement </a>|
        <a href=""> Cookie Policy </a>|
        <a href=""> Copyright Policy</a>


        <div class="copyright-msg">
            <img src="images/logo.png" alt="">
            <p>LABD &#169; 2023. All right reserved</p>
        </div>
        <div class="text-center span-3 bottom-bar-style">
            © 2023 All Rights Reserved:
            <span class="text-white">LABD - Latin America Business Development</span>
        </div>

        <!-- Copyright -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
        let profileMenu = document.getElementById("profileMenu");


        function toggleMenu() {
            profileMenu.classList.toggle("open-menu");
        }

        let networkMenu = document.getElementById("networkMenu");

        function toggleMenuNetwork() {
            profileMenu.classList.toggle("open-menu");
        }

        function toggleNotifyMenu() {
            const notifyMenu = document.getElementById('notifyMenu')
            notifyMenu.classList.toggle("open-menu");
        }

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