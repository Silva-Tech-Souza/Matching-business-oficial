<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once('../model/ErrorLog.php');
date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header("Location: index.php");
}

$iduser = $_SESSION["id"];

$idpost = $_GET["post"];
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
//$query->bindParam(':idClient', $iduser1, PDO::PARAM_INT);
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
$UserClient->setidClient($geral);
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

$UserClientreal = new UserClients();
$UserClientreal->setidClient($iduser);
$resultsreal = $UserClientreal->consulta("WHERE idClient = :idClient");
if ($resultsreal != null) {
    foreach ($resultsreal as $row) {
        $imgperfil = $row->PersonalUserPicturePath;
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

if ($satBusinessId != null) {
    include_once('../model/classes/tblBusiness.php');

    $Business = new Business();
    $Business->setidBusiness($satBusinessId);
    $resultsbusinesscor = $Business->consulta("WHERE `idBusiness` = :idBusiness");

    if ($resultsbusinesscor != null) {
        foreach ($resultsbusinesscor as $rowbusinesscor) {
            $NmBusinesscor =  $rowbusinesscor->NmBusiness;
        }
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

include_once('../model/classes/tblConect.php');

$connecttem = new Conect();

$connecttem->setidUserPed($geral);
$connecttem->setidUserReceb($geral);

$respoconect = $connecttem->consulta("WHERE idUserPed = :idUserPed AND idUserReceb = :idUserReceb");

if ($respoconect != null) {
    foreach ($respoconect as $rowconnect) {
        $temconexao = $rowconnect->status;
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
    <div class="col-12">
        <?php include_once("widget/navbar.php"); ?>
    </div>
    <br><br><br><br><br><br>
    <div class="row d-flex align-content-center align-items-center justify-content-center">
        <div class="col-9">
            <?php

            //$sqlFeed = "SELECT * from tblFeeds ORDER BY Published_at DESC LIMIT 5";
            //$queryfeed = $dbh->prepare($sqlFeed);
            //$queryfeed->execute();
            //$resultsfeed = $queryfeed->fetchAll(PDO::FETCH_OBJ);

            include_once('../model/classes/tblFeeds.php');

            $feeds = new Feeds();
            $feeds->setidIdFeed($idpost);
            $resultsfeed = $feeds->consulta("WHERE IdFeed = :IdFeed ORDER BY Published_at DESC LIMIT 8");

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
                    <div class="card shadow p-0 bcolor rounded-4 mb-4">
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
                                            include_once('../model/classes/tbPostComent.php');
                                            $tbPostComentcont2 = new PostComent();
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


</body>

<script>
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

</html>