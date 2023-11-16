<?php
include_once('../../model/classes/conexao.php');

if(isset($_SESSION['error'])){
    error_reporting(0);
}
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Sao_Paulo');


$iduser = $_SESSION["id"];
?>


<div class="notify-menu" id="notifUpdate">
    <div class="empty-box" style="display: none;">
        <img src="assets/img/empty.svg">
        <span>There's nothing here for now. </span>
    </div>
    <?php


    include_once('../../model/classes/tblSearchProfile_Results.php');
    $searchProfileResults = new SearchProfile_Results($dbh);
    $searchProfileResults->setidClienteEncontrado($iduser);
    $resultsSearchProfile = $searchProfileResults->consulta("WHERE idClienteEncontrado = :idClienteEncontrado ORDER BY datahora DESC");
    $usernamepost ="";
    if ($resultsSearchProfile != null) {
        foreach ($resultsSearchProfile as $rownotif) {
            $idCliente = $rownotif->idUsuario;
            $estadoNotif = $rownotif->estadoNotif;


            include_once('../../model/classes/tblUserClients.php');
            $userClients = new UserClients($dbh);
            $userClients->setidClient($idCliente);
            $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");




            if ($resultsUserClients != null) {
                foreach ($resultsUserClients as $rowusernotif) {
                    $usernamepost = $rowusernotif->FirstName . " " . $rowusernotif->LastName;
                    $idpostoperation = $rowusernotif->IdOperation;
                    $imgpostuser = $rowusernotif->PersonalUserPicturePath;
                }
            }

            $idTipoNotif = $rownotif->idTipoNotif;
           
            if ($idTipoNotif == 5) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>liked</p><p class='d-inline' style='color: #f2f2f2;'> your post !</p><br>";
            } else if ($idTipoNotif == 2) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>viewed </p><p class='d-inline' style='color: #f2f2f2;'>  your profile!</p><br>";
            } else if ($idTipoNotif == 4) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>invited  </p><p class='d-inline' style='color: #f2f2f2;'>  you to be part of his network!</p><br>";
            } else  if ($idTipoNotif == 8) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>accepted </p><p class='d-inline' style='color: #f2f2f2;'> your connection!</p><br>";
            } else if ($idTipoNotif == 7) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>commented  </p><p class='d-inline' style='color: #f2f2f2;'>  on your post!</p><br>";
            } else if ($idTipoNotif == 6) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>was found in  </p><p class='d-inline' style='color: #f2f2f2;'>  your search profile!</p><br>";
            } else if ($idTipoNotif == 9) {
                            $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>sent a message   </p><p class='d-inline' style='color: #f2f2f2;'>  to your profile!</p><br>";
                        }
            $postDateTime = new DateTime($rownotif->datahora);

            // Obtenha o objeto DateTime da data e hora atual
            $currentTime = new DateTime();

            // Calcula a diferença entre a data e hora atual e a da postagem
            $timeDiff = $postDateTime->diff($currentTime);

            // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
            if ($timeDiff->y > 0) {
                $timeAgoN = $timeDiff->y . " year(s) ago";
            } elseif ($timeDiff->m > 0) {
                $timeAgoN = $timeDiff->m . " month(s) ago";
            } elseif ($timeDiff->d > 0) {
                $timeAgoN = $timeDiff->d . " day(s) ago";
            } elseif ($timeDiff->h > 0) {
                $timeAgoN = $timeDiff->h . " hour(s) ago";
            } elseif ($timeDiff->i > 0) {
                $timeAgoN = $timeDiff->i . " minute(s) ago";
            } else {
                $timeAgoN = " A few seconds ago";
            }

            if ($estadoNotif == 2) {
            } else if ($estadoNotif == 1) {
            } else {
            }


    ?>

            <form action="../../controller/notificacaoController.php" method="POST" style="<?php
                                                                                            if ($estadoNotif == 1) {
                                                                                                echo " background-color: #FFFFFF48; border-radius: 10px;margin-bottom: 3px; ";
                                                                                            }
                                                                                            ?>">
                <input type="hidden" id="id" name="id" value="<?php echo $rownotif->id; ?>">
                <input type="hidden" id="url" name="url" value="<?php echo $rownotif->url; ?>">
                <a class="notification notif-zoom" href="<?php echo $rownotif->url;?>">

                    <div class="row justify-content-start" href="<?php if($idTipoNotif != 6 && $idTipoNotif != 9){ echo $rownotif->url; }else if ($idTipoNotif == 9){echo $rownotif->url."?idperfilchat=$idCliente";}else{ echo 'viewProfile.php?profile=' .$rownotif->url; }?>">
                        <div class="col-2 ">
                            <img src="<?php
                                        if ($imgpostuser != "Avatar.png" && $imgpostuser != "") {
                                            echo "" . $imgpostuser;
                                        } else {
                                            echo "assets/img/Avatar.png";
                                        }
                                        ?>
                                            " alt="user" style="min-height: 35px; object-fit: cover;" class="nav-profile-img">
                        </div>
                        <div class="col-8 justify-itens-start" style="text-align: start; margin-left: 2px;">
                            <span>
                                <?php echo  $textNotif; ?><br>
                            </span><span id="notify-time" style="color: #DADADA !important;font-weight: 400;">
                                <?php echo $timeAgoN; ?>
                            </span>
                        </div>

                    </div>
                </a>
                <hr style="background-color: #ffffff66;">
            </form>



    <?php
        }
    } ?>

</div>