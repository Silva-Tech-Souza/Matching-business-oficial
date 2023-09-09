<?php
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Sao_Paulo');


$iduser = $_SESSION["id"];
?>


<div class="notify-menu" id="notifUpdate">
    <div class="empty-box" style="display: none;">
        <img src="../../assets/img/empty.svg">
        <span>There's nothing here for now. </span>
    </div>
    <?php
    include_once('../model/classes/tblSearchProfile_Results.php');
    $searchProfileResults = new SearchProfile_Results();
    $searchProfileResults->setidClienteEncontrado($iduser);
    $resultsSearchProfile = $searchProfileResults->consulta("WHERE idClienteEncontrado = :idClienteEncontrado ORDER BY datahora DESC");

    if ($resultsSearchProfile != null) {
        foreach ($resultsSearchProfile as $rownotif) {
            $idCliente = $rownotif->idUsuario;
            $estadoNotif = $rownotif->estadoNotif;

            include_once('../model/classes/tblUserClients.php');
            $userClients = new UserClients();
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
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #7dbaf0;'>liked</p><p class='d-inline' style='color: #f2f2f2;'> your post !</p><br>";
            } else if ($idTipoNotif == 2) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #7dbaf0;'>viewed </p><p class='d-inline' style='color: #f2f2f2;'>  your profile!</p><br>";
            } else if ($idTipoNotif == 4) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #7dbaf0;'>invited  </p><p class='d-inline' style='color: #f2f2f2;'>  you to be part of his network!</p><br>";
            } else  if ($idTipoNotif == 6) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #7dbaf0;'>accepted </p><p class='d-inline' style='color: #f2f2f2;'> your connection!</p><br>";
            } else if ($idTipoNotif == 7) {
                $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #7dbaf0;'>commented  </p><p class='d-inline' style='color: #f2f2f2;'>  on your post!</p><br>";
            }
            $postDateTime = new DateTime($rownotif->datahora);

            // Obtenha o objeto DateTime da data e hora atual
            $currentTime = new DateTime();

            // Calcula a diferença entre a data e hora atual e a da postagem
            $timeDiff = $postDateTime->diff($currentTime);

            // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
            if ($timeDiff->y > 0) {
                $timeAgoN = $timeDiff->y . " ano(s) atrás";
            } elseif ($timeDiff->m > 0) {
                $timeAgoN = $timeDiff->m . " mês(es) atrás";
            } elseif ($timeDiff->d > 0) {
                $timeAgoN = $timeDiff->d . " dia(s) atrás";
            } elseif ($timeDiff->h > 0) {
                $timeAgoN = $timeDiff->h . " hora(s) atrás";
            } elseif ($timeDiff->i > 0) {
                $timeAgoN = $timeDiff->i . " minuto(s) atrás";
            } else {
                $timeAgoN = "Alguns segundos atrás";
            }

            if ($estadoNotif == 2) {
            } else if ($estadoNotif == 1) {
            } else {
            }

            //                    $searchProfileResults = new SearchProfile_Results();
            //                    $searchProfileResults->setid($rownotif->id);

            //                    $searchProfileResults->atualizar('estadoNotif = 1 WHERE id = :id');


    ?>
           
           <form action="../controller/notificacaoController.php" method="POST">
                            <input type="hidden" id="id" name="id"value="<?php echo $rownotif->id;?>">
                            <input type="hidden" id="url" name="url" value="<?php echo $rownotif->url;?>">
                        <a class="notification notif-zoom" >
                            
                            <div class="row justify-content-center">
                                        <div class="col-2 justify-content-center">
                                            <img src="
                                            <?php
                                            if ($imgpostuser != "Avatar.png" && $imgpostuser != "") {
                                                echo "../" . $imgpostuser;
                                            } else {
                                                echo "../assets/img/Avatar.png";
                                            }
                                            ?>
                                            " alt="user" class="nav-profile-img" onclick="toggleMenu()">
                                                        </div>
                                                        <div class="col-8 justify-itens-center">
                                                            <span>
                                            <?php echo  $textNotif; ?> 
                                            </span><span id="notify-time" style="color: grey !important;">
                                            <?php echo $timeAgoN; ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <button style="color: black !important;" class="delete-btn" type="submit">
                                                                <i class="fa-solid fa-trash icon-notif-zoom"></i></button>
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr style="background-color: #ffffff66;">';

                        </a>
                    </form>

          

    <?php }
    } ?>
</div>