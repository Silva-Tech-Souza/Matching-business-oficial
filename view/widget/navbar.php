<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
?>
<div class="header">
    
    <nav id="navbar" class="bg-light-alt container-fluid position-fixed" style="z-index: 9999999; padding-top: 10px;">

    <script>
    function toggleMenuNetwork() {
        const networkMenu = document.getElementById('networkMenu');
        const notifyMenu = document.getElementById('notifyMenu');
        const profileMenu = document.getElementById('profileMenu');

        console.log('Entrou aqui');
        
        // Feche os outros menus
        notifyMenu.classList.remove("open-menu");
        profileMenu.classList.remove("open-menu");

        // Abra o menu de rede
        networkMenu.classList.toggle("open-menu");
    }

    function toggleNotifyMenu() {
        const networkMenu = document.getElementById('networkMenu');
        const notifyMenu = document.getElementById('notifyMenu');
        const profileMenu = document.getElementById('profileMenu');

        // Feche os outros menus
        networkMenu.classList.remove("open-menu");
        profileMenu.classList.remove("open-menu");

        // Abra o menu de notificação
        notifyMenu.classList.toggle("open-menu");
    }

    function toggleMenu() {
        const networkMenu = document.getElementById('networkMenu');
        const notifyMenu = document.getElementById('notifyMenu');
        const profileMenu = document.getElementById('profileMenu');

        // Feche os outros menus
        networkMenu.classList.remove("open-menu");
        notifyMenu.classList.remove("open-menu");

        // Abra o menu de perfil
        profileMenu.classList.toggle("open-menu");
    }
</script>


        <div class="card d-flex pb-2 justify-content-center shadow-none d-none d-md-block" style="background-color: #00000000; border: 1px; margin-bottom: 0px !important;">

            <div class="row d-flex justify-content-center">
                <div class="col-1 d-flex justify-content-center">

                    <div class="d-flex align-items-center" style="margin: 0px;">
                        <a href="home.php" class="logo"><img src="assets/img/logo.png" alt="logo"></a>

                    </div>
                </div>
                <div class="col-5 p-0">
                    <div class="d-flex card card-body mb-0 rounded-5" style="max-height: 70px;min-height: 46px;padding: 16px;">
                        <div class="">
                            <form method="POST" enctype="multipart/form-data" onsubmit="redirectToAnotherPage(); return false;">
                                <i class="fas fa-search"></i>
                                <input style="width: 93%; height: 100%;" type="text" id="search-input" list="search-list" placeholder="What are you looking for?" onfocus="showSearchIdeas()" onblur="hideSearchIdeas()">
                                <datalist id="search-list">
                                    <?php

                                    include_once('../model/classes/tblOperations.php');
                                    $operations = new Operations();
                                    $resultsOperation = $operations->consulta("WHERE FlagOperation != '0'");
                                    if ($resultsOperation != null) {
                                        foreach ($resultsOperation as $rowOperation) { ?>
                                            <option value="<?php echo $rowOperation->NmOperation; ?>">
                                        <?php }
                                    } ?>
                                </datalist>
                            </form>
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
                                                $tblSearchProfile = new SearchProfile_Results();
                                                $tblSearchProfile->setidClienteEncontrado($iduser);
                                                $resultsSearchProfile = $tblSearchProfile->quantidade("WHERE idClienteEncontrado = :idClienteEncontrado AND estadoNotif = '0' ORDER BY datahora DESC");

                                                if ($resultsSearchProfile != "0") {



                                                    echo '<span class="badge rounded-pill badge-notification bg-danger">' . $resultsSearchProfile . '</span>';
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

        <div class="card d-flex justify-content-center shadow-none d-md-none pb-3 m-0" style="background-color: #00000000; border: 1px;">

            <div class="row d-flex justify-content-center  ">
                <div class="col-2 d-flex justify-content-center p-1">
                    <div class="d-flex align-items-center">
                        <a href="home.php" class="logo"><img src="assets/img/logo.png" alt="logo"></a>

                    </div>
                </div>
                <div class="col-8 p-0">
                    <div class="d-flex card card-body mb-0 rounded-5" style="max-height: 42px;">
                        <div class="">
                            <form method="POST" enctype="multipart/form-data" onsubmit="redirectToAnotherPage(); return false;">
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
                            </form>
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
                        <li><a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a></li>&nbsp;&nbsp;
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
                                            $tblSearchProfile = new SearchProfile_Results();
                                            $tblSearchProfile->setidClienteEncontrado($iduser);
                                            $resultsSearchProfile = $tblSearchProfile->quantidade("WHERE idClienteEncontrado = :idClienteEncontrado AND estadoNotif = '0' ORDER BY datahora DESC");

                                            if ($resultsSearchProfile != "0") {



                                                echo '<span class="badge rounded-pill badge-notification bg-danger">' . $resultsSearchProfile . '</span>';
                                            }
                                            ?></a>
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

                        $searchProfileResultsUpdate = new SearchProfile_Results();
                        $searchProfileResultsUpdate->setid($rownotif->id);
                        $resultsSearchProfileUpdate = $searchProfileResultsUpdate->atualizar("estadoNotif = '1' WHERE id = :id");


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
                            $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>liked</p><p class='d-inline' style='color: #f2f2f2;'> your post !</p><br>";
                        } else if ($idTipoNotif == 2) {
                            $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>viewed </p><p class='d-inline' style='color: #f2f2f2;'>  your profile!</p><br>";
                        } else if ($idTipoNotif == 4) {
                            $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>invited  </p><p class='d-inline' style='color: #f2f2f2;'>  you to be part of his network!</p><br>";
                        } else  if ($idTipoNotif == 6) {
                            $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>accepted </p><p class='d-inline' style='color: #f2f2f2;'> your connection!</p><br>";
                        } else if ($idTipoNotif == 7) {
                            $textNotif = "<p  class='d-inline' style='color: white; font-size: 11px;'>" . $usernamepost . " </p><p class='d-inline' style='color: #f2f2f2;'></p> <p class='d-inline' style='color: #62B7D8;'>commented  </p><p class='d-inline' style='color: #f2f2f2;'>  on your post!</p><br>";
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

                        //                    $searchProfileResults = new SearchProfile_Results();
                        //                    $searchProfileResults->setid($rownotif->id);

                        //                    $searchProfileResults->atualizar('estadoNotif = 1 WHERE id = :id');

                ?>

                        <form action="../controller/notificacaoController.php" method="POST" style="<?php
                                                                                                    if ($estadoNotif == 1) {
                                                                                                        echo " background-color: #FFFFFF48; border-radius: 10px;     margin-bottom: 3px;";
                                                                                                    }
                                                                                                    ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $rownotif->id; ?>">
                            <input type="hidden" id="url" name="url" value="<?php echo $rownotif->url; ?>">
                            <a class="notification notif-zoom" href="<?php echo $rownotif->url;?>">

                                <div class="row justify-content-start">
                                    <div class="col-2 ">
                                        <img src="<?php
                                                    if ($imgpostuser != "Avatar.png" && $imgpostuser != "") {
                                                        echo "" . $imgpostuser;
                                                    } else {
                                                        echo "assets/img/Avatar.png";
                                                    }
                                                    ?>
                                            " alt="user" class="nav-profile-img">
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
        </div>

        <!-- --------------------------------profile-network-down-menu---------------------------- -->
        <div class="network-menu-wrap" id="networkMenu" style="background-color: #002d4b !important; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;overflow-y: auto;">
            <div class="network-menu" style="background-color: #002d4b !important;">
                <div class="non-connections">
                    <div class="non-connections-container">
                        <br>
                        <p class="color-branco text-center text-recommend-conect">Recommended connections</p><br>
                        <ul>
                            <?php

                            include_once('../model/classes/tblUserClients.php');

                            $userClientsAtual = new UserClients();
                            $userClientsAtual->setidClient($_SESSION["id"]);
                            $resultsUsuarioAtual = $userClientsAtual->consulta("WHERE idClient = :idClient");

                            foreach($resultsUsuarioAtual as $resultsUsuarioAtualUnid){

                                $Flag = $resultsUsuarioAtualUnid->CoreBusinessId;

                            }

                            $userClients = new UserClients();

                            if($Flag == 2){
                                //Flag A

                                $resultsUserClients = $userClients->consulta("WHERE CoreBusinessId IN (3, 4,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23) ORDER BY tblUserClients.Pontos DESC LIMIT 30");


                            }else if( $Flag == 3 || $Flag == 4){
                                //Flag B

                                $resultsUserClients = $userClients->consulta("WHERE CoreBusinessId IN (2, 5) ORDER BY tblUserClients.Pontos DESC LIMIT 30");

                            }else if( $Flag == 5){
                                //Flag C

                                $resultsUserClients = $userClients->consulta("WHERE CoreBusinessId IN (3,4) ORDER BY tblUserClients.Pontos DESC LIMIT 30");

                            }else{
                                //Flag D

                                $resultsUserClients = $userClients->consulta("ORDER BY tblUserClients.Pontos DESC LIMIT 30");

                            }

                            
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
                                                        <img src="<?php if ($rowcliente->PersonalUserPicturePath != "Avatar.png" && $rowcliente->PersonalUserPicturePath != "") {
                                                                        echo $rowcliente->PersonalUserPicturePath;
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
                    <i class="fa fa-user fa-1x" style="color: white;"></i>
                    <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;My Profile</p>
                    <i class="bi bi-caret-right-fill" style="color: white;"></i>
                </a>


                <a href="searchPage.php" class="profile-menu-link expand-zoom-menu">
                    <i class="fa fa-search fa-1x" style="color: white;"></i>
                    <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;My Search</p>
                    <i class="bi bi-caret-right-fill" style="color: white;"></i>
                </a>

                <a href="#" class="profile-menu-link expand-zoom-menu">
                    <i class="fa fa-cog fa-1x" style="color: white;"></i>
                    <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;Settings & Privacy</p>
                    <i class="bi bi-caret-right-fill" style="color: white;"></i>
                </a>

                <a href="#" class="profile-menu-link expand-zoom-menu">
                    <i class="fa fa-certificate fa-1x" style="color: white;"></i>
                    <p style="color: #ffffff; margin-bottom: 0px !important; text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;Try Premium</p>
                    <i class="bi bi-caret-right-fill" style="color: white;"></i>
                </a>

                <a href="../controller/logout.php" class="profile-menu-link expand-zoom-menu-logout ">
                    <i class="fa fa-sign-out fa-1x" style="color: #ff6363;"></i>
                    <p style="margin-bottom: 0px !important; text-decoration: none; color: #ff6363;">&nbsp;&nbsp;&nbsp;&nbsp;Logout</p>
                    <i class="bi bi-caret-right-fill" style="color: #ff6363;"></i>
                </a>
            </div>



        </div>


    </nav>
</div>
<script>
    function redirectToAnotherPage() {
        var inputValue = document.getElementById("search-input").value;
        // Aqui você pode personalizar a URL de redirecionamento com base no valor do campo de entrada
        var redirectTo = "listcompani.php?text=" + inputValue;
        window.location.href = redirectTo;
    }

    document.addEventListener('DOMContentLoaded', function() {
    var mobileBtn = document.getElementById('mobile_btn');
    var sidebar = document.getElementById('sidebar');

    mobileBtn.addEventListener('click', function() {
        sidebar.classList.toggle('expanded'); // Toggle a classe 'expanded' no elemento sidebar
    });
});
</script>

