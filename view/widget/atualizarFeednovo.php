<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['error'])) {
    error_reporting(0);
}
date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");
$iduser = $_SESSION["id"];


?>


    <?php
    if ($_GET["novos"] != 1) {
        $n = $_SESSION["n"];
    } else {
        $n  = 8;
    }


    include_once('../../model/classes/tblFeeds.php');

    $feeds = new Feeds();
    if ($_GET["novos"] != 1) {
        $n =  $_SESSION["n"] ;
    } else {
        $n  = 8;
    }
    $resultsfeed = $feeds->consulta("ORDER BY Published_at DESC LIMIT $n");

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

            include_once("../../model/classes/tblUserClients.php");

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
                            <div class="col-1">
                                <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "" ) {
                                                echo "" . $imgpostuser;
                                            } else {
                                                echo "assets/img/Avatar.png";
                                            } ?>" alt="user" class="nav-profile-img  " onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

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

                                include_once("../../model/classes/tblOperations.php");

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

                        include_once('../../model/classes/tblCurtidas.php');

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

                        include_once('../../model/classes/tblCurtidas.php');

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
                                                                                                                ?>" class="btnCommnet  btn like-comment-btn pl-4 pr-4 no-border p-3 hero-image-container2"><span class="  btn-comment-post">
                                    <?php
                                    include_once('../../model/classes/tbPostComent.php');
                                    $tbPostComentcont2 = new PostComent();
                                    $tbPostComentcont2->setidpost($rowfeed->IdFeed);
                                    echo  $tbPostComentcont2->quantidade(" WHERE idpost = :idpost");
                                    ?> &nbsp;&nbsp; <i class="fa fa-comment">
                                        Comments</i>
                                </span></a>
                        </div>
                    </div>
                    <hr class="color-preto">
                                                <div class="row">
                                                    <?php

                                                    $viewcomentarios = new PostComent();
                                                    $viewcomentarios->setidpost($rowfeed->IdFeed);
                                                    $resultstbPostComentview =  $viewcomentarios->consulta(" WHERE idpost = :idpost ORDER BY datahora DESC LIMIT 1");
                                                    if ($resultstbPostComentview != null) {

                                                        foreach ($resultstbPostComentview as $rowviewcomentarios) {
                                                            include_once('../model/classes/tblUserClients.php');
                                                            $userClientscomentarios = new UserClients();

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
                                                                            <h4><?php echo $rowucometarios->FirstName . " " . $rowucometarios->LastName; ?></h4>
                                                                        </div>
                                                                        <div class="col-12 color-preto texto-duas-linhas" style="overflow-wrap: break-word;font-size: small; ">
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
 <script>
$(document).ready(function(){
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
    </script>