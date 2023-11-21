<?php
include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tblFeeds.php');
include_once('../../model/classes/tblUserClients.php');

error_reporting(0);

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


   

    $feeds = new Feeds($dbh);
    if ($_GET["novos"] != 1) {
        $n =  $_SESSION["n"] = ($_SESSION["n"] + 8);
    } else {
        $n  = 8;
    }
    $resultsfeed = $feeds->consulta("ORDER BY Published_at DESC LIMIT $n");

    $x = 0;
    
    if ($resultsfeed != null) {
        foreach ($resultsfeed as $rowfeed) {

            if($x >= 2){

                $x = 0;

                include_once('../../model/classes/conexao.php');
                include_once("../../model/classes/tblEmpresas.php");

                $empresas = new Empresas($dbh);
                $resultsempresas = $empresas->consulta("LIMIT 1");
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
                                <img src="<?php if($rowempresas->fotoperfil != ""){echo $rowempresas->fotoperfil;}else{echo "assets/img/logo.png";}?>" alt="user" class="nav-profile-img  " onerror="this.onerror=null; this.src='/assets/img/Avatar.png'" style="min-height: 35px;">

                            </div>
                            <div class="col-8 p-2 color-preto" style="padding-left: 26px !important;">
                                <a href="empresa.php?idtax=<?php echo  $rowempresas->taxid;?>" class="color-preto text-decoration-none">
                                    <h3 class="fonte-titulo text-decoration-none">
                                        <?php
                                        echo $rowempresas-> nome;
                                        ?>
                                    </h3>
                                     <h5>Sponsored</h5>
                                </a>

                            </div>
                            <div class="col-2 d-flex text-right color-preto justify-content-end">

                                                     

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
                                                    ?>

                    </div>

                    <div class="row col-12 align-content-center justify-content-center">
                        <?php if ($imgpostempresa != "Avatar.png" && $imgpostempresa != "" && file_exists("" . $imgpostempresa)) { ?>
                            <img class="img-feed-styleset" src="<?php echo $imgpostempresa; ?>" alt="" width="100%">
                        <?php }?>
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

            include_once("../../model/classes/tblUserClients.php");

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
                        <div class="row">
                            <div class="col-1">
                                <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "" ) {
                                                echo "" . $imgpostuser;
                                            } else {
                                                echo "assets/img/Avatar.png";
                                            } ?>" alt="user" class="nav-profile-img  " style="min-height: 35px;border: 1px solid #00000042;object-fit: cover;"  onerror="this.onerror=null; this.src='assets/img/Avatar.png'">

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

                        include_once('../../model/classes/tblCurtidas.php');

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
                                    include_once('../../model/classes/tbPostComent.php');
                                    $tbPostComentcont2 = new PostComent($dbh);
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
                                                                                    } ?>" alt="user" class="nav-profile-img" style="min-height: 35px;border: 1px solid #00000042;object-fit: cover;">
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
