<?php

header("Access-Control-Allow-Origin: *");
?>


<nav id="navbar" class="bg-light-alt container-fluid position-fixed" style="z-index: 9999999; padding-top: 10px;">

<script>

function toggleNotifyMenu() {
    const notifyMenu = document.getElementById('notifyMenu');
    notifyMenu.classList.toggle("open-menu");
}

function toggleMenu() {
    profileMenu.classList.toggle("open-menu");
}

function clicarNotif(){



}

</script>

    <div class="card d-flex pb-2 justify-content-center shadow-none d-none d-xl-block" style="background-color: #00000000; border: 1px; margin-bottom: 0px !important;">

        <div class="row d-flex justify-content-center">
            <div class="col-1 d-flex justify-content-center">
                <div class="d-flex align-items-center" style="margin: 0px;">
                    <a href="home.php" class="logo"><img src="assets/img/logo.png" alt="logo"></a>

                </div>
            </div>
            <div class="col-5 p-0">
                <div class="d-flex card card-body mb-0 rounded-5" style="max-height: 70px;min-height: 46px;padding: 16px;">
                    <div class="">

                        <i class="fas fa-search"></i>
                        <input style="width: 93%; height: 100%;" type="text" id="search-input" list="search-list" placeholder="What are you looking for?" onfocus="showSearchIdeas()" onblur="hideSearchIdeas()">

                        <datalist id="search-list">
                            <?php



                            include_once('../model/classes/tblOperations.php');

                            $operations = new Operations();
                            $resultsOperation = $operations->consulta("WHERE FlagOperation != '0'");


                            if ($resultsOperation != null) {

                                foreach ($resultsOperation as $rowOperation) {

                            ?>
                                    <option value="<?php echo $rowOperation->NmOperation; ?>">
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
            </div>

            <div class="col-6 d-flex justify-content-center p-0">
                <div class="d-flex align-items-center">

                    <div class="navbarcenter ">
                        <ul style="align-items: center;">
                            <li><a href="#"><i class="fa-solid fa-crown icon-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Premium&nbsp;Plan</span></a></li>
                            <li><a href="searchPage.php"><i class="fa-solid fa-address-card icon-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Search&nbsp;Profile</span></a></li>
                            <li><a href="#" onclick="toggleMenuNetwork();"><i class="fa-solid fa-globe icon-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Network</span></a></li>
                            <li><a href="chatPage.php"><i class="fa-solid fa-comment icon-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Messaging</span></a></li>
                            <li><a href="#" onclick="toggleNotifyMenu()"><i class="fa-solid fa-bell icon-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Notifications&nbsp;
                                    </span> <?php


                                            include_once('../model/classes/tblSearchProfile_Results.php');
                                            $operations = new SearchProfile_Results();
                                            $operations->setidClienteEncontrado($iduser);
                                            $resultsSearchProfile = $operations->consulta("WHERE idClienteEncontrado = :idClienteEncontrado ORDER BY datahora DESC");

                                            if ($resultsSearchProfile != null) {
                                                $count = 0;
                                                foreach ($resultsSearchProfile as $results) {
                                                    if($results->estadoNotif == 0){
                                                        $count = $count + 1;
                                                    }
                                                }
                                        

                                            if($count != 0){
                                                echo '<span class="badge rounded-pill badge-notification bg-danger">'. $count.'</span>';  
                                            } 
                                        } 
                                            
                                            ?></a>
                            </li>
                            <li><img src=" <?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                                echo "" . $imgperfil;
                                            } else {
                                                echo "assets/img/Avatar.png";
                                            } ?>" alt="user" class="nav-profile-img" onclick="toggleMenu();"></li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="card d-flex justify-content-center shadow-none d-sm-none pb-3 m-0" style="background-color: #00000000; border: 1px;">

        <div class="row d-flex justify-content-center  ">
            <div class="col-2 d-flex justify-content-center p-1">
                <div class="d-flex align-items-center">
                    <a href="#" class="logo"><img src="assets/img/logo.png" alt="logo"></a>

                </div>
            </div>
            <div class="col-8 p-0">
                <div class="d-flex card card-body mb-0 rounded-5" style="max-height: 42px;">
                    <div class="">

                        <i class="fas fa-search"></i>
                        <input style="width: 90%; height: 100%;" type="text" id="search-input" list="search-list" placeholder="What are you looking for?" onfocus="showSearchIdeas()" onblur="hideSearchIdeas()">

                        <datalist id="search-list">
                            <?php
                            include_once('../model/classes/tblOperations.php');

                            $operations = new Operations();
                            $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' LIMIT 8");


                            if ($resultsOperation != null) {

                                foreach ($resultsOperation as $rowOperation) {
                            ?>
                                    <option value="<?php echo $rowOperation->NmOperation; ?>">
                                <?php }
                            } ?>
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="col-2 p-0 justify-content-center align-items-center d-flex">
                <img src=" <?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                echo "" . $imgperfil;
                            } else {
                                echo "assets/img/Avatar.png";
                            } ?>" alt="user" class="nav-profile-img" onclick="toggleMenu();">
            </div>

            <div class="col-9 mt-4 p-0 justify-content-start">


                <div class="navbarcenter ">
                    <ul class="p-0">
                        <li><a href="#"><i class="fa-solid fa-crown icon-small-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Premium&nbsp;Plan</span></a></li>&nbsp;&nbsp;
                        <li><a href="searchPage.php"><i class="fa-solid  fa-address-card icon-small-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Search&nbsp;Profile</span></a></li>&nbsp;&nbsp;
                        <li><a href="#" onclick="toggleMenuNetwork();"><i class="fa-solid fa-globe icon-small-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Network</span></a></li>&nbsp;&nbsp;


                    </ul>
                </div>

            </div>
            <div class="col-2 mt-4 p-0 d-flex justify-content-start">


                <div class="navbarcenter ">
                    <ul class="p-0">
                        <li><a href="chatPage.php"><i class="fa-solid fa-comment icon-small-screen-navbar"></i><span style="font-size: 12px;">&nbsp;Messaging</span></a></li>
                        <li><a href="#" onclick="toggleNotifyMenu()"><i class="fa-solid fa-bell icon-small-screen-navbar"></i><span style="font-size: 20px;">&nbsp;Notifications&nbsp;&nbsp;&nbsp;
                                </span> <?php
                                        include_once('../model/classes/tblSearchProfile_Results.php');
                                        $operations = new SearchProfile_Results();
                                        $operations->setidClienteEncontrado($iduser);
                                        $resultsSearchProfile = $operations->consulta("WHERE idClienteEncontrado = :idClienteEncontrado ORDER BY datahora DESC");

                                        if ($resultsSearchProfile != null) {
                                            $count = 0;
                                            foreach ($resultsSearchProfile as $results) {
                                                if($results->estadoNotif == 0){
                                                    $count = $count + 1;
                                                }
                                        }
                                        if($count != 0){
                                            echo '<span class="badge rounded-pill badge-notification bg-danger">'. $count.'</span>';  
                                        } 
                                    } ?></a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;

                    </ul>
                </div>

            </div>



        </div>
    </div>

    <!-- Notify Menu -->
    <div class="profile-menu-wrap empty-menu" id="notifyMenu" style="border-top-left-radius: 0px;">
        <div class="notify-menu" id="notifUpdate">
            <div class="empty-box" style="display: none;">
                <img src="assets/img/empty.svg">
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

                    if($estadoNotif == 2){



                    }else if($estadoNotif == 1){



                    }else{



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

                    

            <?php
                }
            } ?>
            
        </div>
    </div>

    <!-- --------------------------------profile-network-down-menu---------------------------- -->
    <div class="network-menu-wrap" id="networkMenu" style="background-color: #002d4b !important; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
        <div class="network-menu" style="background-color: #002d4b !important;">
            <div class="non-connections">
                <div class="non-connections-container">
                    <br>
                    <p class="color-branco text-center text-recommend-conect">Recommended connections</p><br>
                    <ul>
                        <?php


                        include_once('../model/classes/tblUserClients.php');
                        $userClients = new UserClients();

                        $resultsUserClients = $userClients->consulta("LIMIT 30");


                        if ($resultsUserClients != null) {
                            foreach ($resultsUserClients as $rowcliente) {




                                include_once('../model/classes/tblOperations.php');

                                $operations = new Operations();
                                $operations->setidOperation($rowcliente->CoreBusinessId);
                                $resultsOperation = $operations->consulta("WHERE FlagOperation != '0' AND idOperation = :idOperation");



                                if ($resultsOperation != null) {
                                    foreach ($resultsOperation as $rowOperation) {

                        ?>


                                        <li class="recommended-user icone-net mb-2">

                                            <div class="col-2 justify-content-center m-0 p-0">
                                                <a href="viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                                    <img src="<?php if ($rowOperation->PersonalUserPicturePath != "Avatar.png" && $rowOperation->PersonalUserPicturePath != "") {
                                                                    echo $rowOperation->PersonalUserPicturePath;
                                                                } else {
                                                                    echo "assets/img/Avatar.png";
                                                                } ?>" alt="user" alt="An unknown user."></a>
                                            </div>
                                            <div class="col-8 ">
                                                <p class="text-name-network"><?php echo $rowcliente->FirstName; ?></p>
                                                <p class="text-operation-network"><?php echo $rowOperation->NmOperation; ?></p>

                                            </div>
                                            <div class="col-2 justify-content-center">
                                                <a href="../viewProfile.php?profile=<?php echo $rowcliente->idClient; ?>">
                                                    <i class="bi bi-eye-fill fa-2x icon-network"></i>
                                                </a>
                                            </div>

                                        </li>


                        <?php

                                    }
                                }
                            }
                        }
                        ?>

                    </ul>
                    <br><br><br><br><br><br>
                </div>
            </div>

        </div>
    </div>




    <!-- --------------------------------profile-drop-down-menu---------------------------- -->
    <div class="profile-menu-wrap" id="profileMenu" style="background-color: #002d4b !important; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
        <div class="profile-menu" style="background-color: #002d4b !important;">

            <a href="profile.php" class="profile-menu-link expand-zoom-menu">
                <i class="bi bi-person-lines-fill fa-2x" style="color: white;"></i>
                <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;My Profile</p>
                <i class="bi bi-caret-right-fill" style="color: white;"></i>
            </a>


            <a href="searchPage.php" class="profile-menu-link expand-zoom-menu">
                <i class="bi bi bi-search fa-2x" style="color: white;"></i>
                <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;My Search</p>
                <i class="bi bi-caret-right-fill" style="color: white;"></i>
            </a>

            <a href="#" class="profile-menu-link expand-zoom-menu">
                <i class="bi bi bi-gear-fill fa-2x" style="color: white;"></i>
                <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;Settings & Privacy</p>
                <i class="bi bi-caret-right-fill" style="color: white;"></i>
            </a>

            <a href="#" class="profile-menu-link expand-zoom-menu">
                <i class="bi bi-gem fa-2x" style="color: white;"></i>
                <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;Try Premium</p>
                <i class="bi bi-caret-right-fill" style="color: white;"></i>
            </a>

            <a href="../model/logout.php" class="profile-menu-link expand-zoom-menu-logout ">
                <i class="bi bi-box-arrow-left fa-2x" style="color: #ff6363;"></i>
                <p style="margin-bottom: 0px !important; text-decoration: none; color: #ff6363;">&nbsp;&nbsp;&nbsp;&nbsp;Logout</p>
                <i class="bi bi-caret-right-fill" style="color: #ff6363;"></i>
            </a>
        </div>






</nav>