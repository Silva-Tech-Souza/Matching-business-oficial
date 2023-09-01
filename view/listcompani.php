<?php
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
include('../../conexao/conexao.php');

if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: index.php");
}

$iduser = $_SESSION["id"];
$_SESSION["n"] = 5;
$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
$query = $dbh->prepare($sql);
$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
  foreach ($results as $row) {
    $username =  $row->FirstName . " " . $row->LastName;
    $FirstName = $row->FirstName;
    $LastName = $row->LastName;
    $jobtitle = $row->JobTitle;
    $idcountry = $row->idCountry;
    $idoperation = $row->IdOperation;
    $corebusiness = $row->CoreBusinessId;
    $satBusinessId =  $row->SatBusinessId;
    $companyname = $row->CompanyName;
    $imgperfil = $row->PersonalUserPicturePath;
    $imgcapa = $row->LogoPicturePath;
    $descricao =  $row->descricao;
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


  <link rel="stylesheet" href="../../assets/css/bootstrap/back.css">

  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/font-awesome.min.css">


  <link rel="stylesheet" href="../../assets/css/feed.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/style.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/line-awesome.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="../../assets/css/profile.css">
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/superhero/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../assets/css/jquery.dropdown.css">
  <script src="../../assets/js/jquery.dropdown.js"></script>
  <script type="text/javascript" src="../../assets/js/mock.js"></script>
  <title>Searches Profile</title>
  <style>
    .sidebar-inner.slimscroll {
      max-width: 300px;
      /* Largura máxima da div para mostrar a barra de rolagem */
      overflow-x: auto;
      /* Permite rolagem horizontal quando o conteúdo excede a largura máxima */
    }

    .sidebar-menu ul {
      padding: 0;
      margin: 0;
      list-style: none;
    }

    .sidebar .sidebar-menu>ul>li>a span {
      font-size: small;
      white-space: revert;
      /* Força a quebra de linha dentro dos elementos <li> */
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    #prevBtn {
      background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }

    .step.active {
      opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
  </style>
</head>

<body class="funcolinhas">
<script>
        function showbusines(str) {

            if (str == "") {
                document.getElementById("refHint").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("refHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "modal/seach1.php?q=" + str, true);
            xmlhttp.send();
        }

        function showbusines2(str) {

            if (str == "") {
                document.getElementById("refHint2").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("refHint2").innerHTML = this.responseText;
                    applyCustomStyles(); 
                }
            }
            xmlhttp.open("GET", "modal/seach2.php?q=" + str, true);
            xmlhttp.send();
        }
        function applyCustomStyles() {
  var selectElement = document.getElementById("mul-2");
  selectElement.style.width = '200px'; // Or any other desired width
}
    </script>
  <nav id="navbar" class="bg-light-alt container-fluid position-fixed" style="z-index: 9999999; padding-top: 10px;">
    <div class="card d-flex justify-content-center shadow-none" style="background-color: #00000000; border: 1px; margin-bottom: 0px !important;">
      <div class=" row d-flex justify-content-center">
        <div class="col-3 d-flex justify-content-center">
          <div class="d-flex align-items-center" style="margin: 0px;">
            <a href="home/index.php" class="logo"><img src="<?php echo "../../assets/img/logo.png"; ?>" alt="logo"></a>
            <span class="mobile-only" style="color: #fff; font-size:large;">Matching <span style="color: #0098e4;">Business</span>
              Online</span>
          </div>
        </div>
        <div class="col-6" style="padding: 0px !important">
          <div class="d-flex card card-body" style="margin-bottom: 0px !important; border-radius:20px; max-height: 42px;">
            <div class="">

              <i class="fas fa-search"></i>
              <input style="width: auto; height: auto;" type="text" id="search-input" list="search-list" placeholder="What are you looking for?" onfocus="showSearchIdeas()" onblur="hideSearchIdeas()">

              <datalist id="search-list">
                <?php
                $sqlOperation = "SELECT * from tblOperations WHERE FlagOperation != '0' LIMIT 8";
                $queryOperation = $dbh->prepare($sqlOperation);
                $queryOperation->execute();
                $resultsOperation = $queryOperation->fetchAll(PDO::FETCH_OBJ);
                if ($queryOperation->rowCount() > 0) {
                  foreach ($resultsOperation as $rowOperation) { ?>
                    <option value="<?php echo $rowOperation->NmOperation; ?>">
                  <?php }
                } ?>
              </datalist>
            </div>
          </div>
        </div>

        <div class="col-3" style="padding: 0px !important">
          <div class="d-flex align-items-center">

            <div class="navbarcenter ">
              <ul>
                <li><a href="chatPage.php"><i class="bi bi-chat-dots-fill" style="font-size: 14px;"></i><span style="font-size: 14px;">&nbsp;Messaging</span></a></li>
                <li><a href="#" onclick="toggleNotifyMenu()"><i class="bi bi-bell-fill"></i><span style="font-size: 14px;">&nbsp;Notifications</span><?php
                                                                                                                                                      $sqlNotifbolinha = "SELECT * from tblsearchprofile_results WHERE idClienteEncontrado = :idClienteEncontrado ORDER BY datahora DESC";
                                                                                                                                                      $queryNotifbolinha = $dbh->prepare($sqlNotifbolinha);
                                                                                                                                                      $queryNotifbolinha->bindParam(':idClienteEncontrado', $iduser, PDO::PARAM_INT);
                                                                                                                                                      $queryNotifbolinha->execute();
                                                                                                                                                      $queryNotifbolinha->fetchAll(PDO::FETCH_OBJ);
                                                                                                                                                      if ($queryNotifbolinha->rowCount() != 0) {
                                                                                                                                                      ?>
                      <span class="badge rounded-pill badge-notification bg-danger">

                        <?php echo $queryNotifbolinha->rowCount();  ?>
                      </span>
                    <?php   } ?></a></li>
                <li><img src=" <?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                  echo  $imgperfil;
                                } else {
                                  echo "../../assets/img/Avatar.png";
                                } ?>" alt="user" class="nav-profile-img" onclick="toggleMenu();"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Notify Menu -->
    <div class="profile-menu-wrap empty-menu" id="notifyMenu" style="border-top-left-radius: 0px;">
      <div class="notify-menu">
        <div class="empty-box" style="display: none;">
          <img src="../../assets/img/empty.svg">
          <span>There's nothing here for now. </span>
        </div>
        <?php
        $sqlNotif = "SELECT * from tblsearchprofile_results WHERE idClienteEncontrado = :idClienteEncontrado ORDER BY datahora DESC";
        $queryNotif = $dbh->prepare($sqlNotif);
        $queryNotif->bindParam(':idClienteEncontrado', $iduser, PDO::PARAM_INT);
        $queryNotif->execute();
        $resultsNotif = $queryNotif->fetchAll(PDO::FETCH_OBJ);
        if ($queryNotif->rowCount() > 0) {
          foreach ($resultsNotif as $rownotif) {
            $idCliente = $rownotif->idUsuario;
            $sqlusernotif = "SELECT * from tblUserClients WHERE idClient = :idClient";
            $queryusernotif = $dbh->prepare($sqlusernotif);
            $queryusernotif->bindParam(':idClient', $idCliente, PDO::PARAM_INT);
            $queryusernotif->execute();
            $resultsusernotif = $queryusernotif->fetchAll(PDO::FETCH_OBJ);
            if ($queryusernotif->rowCount() > 0) {
              foreach ($resultsusernotif as $rowusernotif) {
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
        ?>
            <a href="#" class="notification">
              <div class="row justify-content-center">
                <div class="col-2 justify-content-center">
                  <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "") {
                              echo  $imgpostuser;
                            } else {
                              echo  "../../assets/img/Avatar.png";
                            } ?>" alt="user" class="nav-profile-img">
                </div>
                <div class="col-8 justify-itens-center">
                  <span><?php echo  $textNotif; ?> </span><span id="notify-time" style="color: grey !important;">
                    <?php echo $timeAgoN; ?>
                  </span>
                </div>
                <div class="col-2 d-flex justify-content-center">
                  <button style="color: black !important;" class="delete-btn" onclick="deleteNotification(event)">
                    <i class="fa-solid fa-trash" style="color: #cb1a1a;"></i></button>
                </div>
              </div>
            </a>
            <hr style="background-color: #ffffff66;">
        <?php }
        } ?>
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


        <a href="searchPage.php  " class="profile-menu-link expand-zoom-menu">
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

        <a href="../../backend/logout.php" class="profile-menu-link expand-zoom-menu-logout ">
          <i class="bi bi-box-arrow-left fa-2x" style="color: #ff6363;"></i>
          <p style="margin-bottom: 0px !important; text-decoration: none; color: #ff6363;">&nbsp;&nbsp;&nbsp;&nbsp;Logout</p>
          <i class="bi bi-caret-right-fill" style="color: #ff6363;"></i>
        </a>
      </div>
    </div>

  </nav>
  <br><br><br><br><br>
  <div class="main-wrapper">
    <div class="sidebar" id="sidebar" style=" background: #002d4b;">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <?php
            $sqlmenush = "SELECT * from tblBusiness";
            $querymenush = $dbh->prepare($sqlmenush);
            $querymenush->execute();
            $resultmenush = $querymenush->fetchAll(PDO::FETCH_OBJ);
            if ($querymenush->rowCount() > 0) {
              foreach ($resultmenush as $rowusmenush) {
                $teste = str_replace('/', '/ ', $rowusmenush->NmBusiness);
            ?>
                <li>
                  <a style="font-size: small;" href=""><?php
                                                        $sql = "SELECT * from tblUserClients WHERE SatBusinessId = :SatBusinessId";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':SatBusinessId', $rowusmenush->idBusiness, PDO::PARAM_INT);
                                                        $query->execute();
                                                        echo       $query->rowCount()   ?> <span> <?php echo $teste; ?></span> </a>
                </li>
                <hr>
            <?php }
            } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="page-wrapper" style="
    margin-top: 0px;

    padding-top: 5px;
">
      <div class="content container-fluid">
        <div class="row">
          <div class=" col-xl-9">

          </div>
          <div class="col-xl-3" style=" padding: 0;">
            <div class="card cardbg mb-4 shadow">
              <div class="card-body">
                <h1 class="modal-title txtnomeperfil">Create Search Profile:</h1>
                <form id="regForm" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab" style="margin-top: 21px;">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class="txtinput" style="font-size: small;">Operation:</label>
                          <select class="form-control bordainput" onchange="showbusines(this.value)" name="corbusiness">

                            <?php
                            $sql = "SELECT * from tblOperations ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                              foreach ($results as $row) { ?>
                                <option <?php if ($row->NmOperation ==  $NmBusiness) {
                                          echo "selected";
                                        } ?> value="<?php echo $row->idOperation; ?>"><?php echo $row->NmOperation; ?></option>
                            <?php     }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12" id="refHint"></div>
                    <div class="col-sm-12" id="refHint2"></div>
                      
                    
                    <div class="tab" style="margin-top: 21px;">
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label class="txtinput" style="font-size: small;">Country:</label>
                          <div class="dropdown-mul-2" style="max-width: 261px;    min-width: 230px;">
                            <select name="" class="form-control bordainput select" id="mul-2" multiple >
                              <?php
                              $sqlpaises = "SELECT * FROM tblCountry";
                              $querypaises = $dbh->prepare($sqlpaises);
                              $querypaises->execute();
                              $resulpaises = $querypaises->fetchAll(PDO::FETCH_OBJ);
                              if ($querypaises->rowCount() > 0) {
                                foreach ($resulpaises as $rowpaises) { ?>
                                  <option <?php if($rowpaises->idCountry==384){echo "selected";} ?> value="<?php echo $rowpaises->idCountry; ?>"><?php echo $rowpaises->NmCountry; ?></option>
                              <?php  }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    
                    <div class="tab" style="margin-top: 21px;">
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label class="txtinput" style="font-size: small;">Search ID:</label>
                          <input type="text" name="idseach"  class="form-control bordainput" id="idseach"  required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary " class="btn btn-primary  submit-btn" style="border: 0px !important;
    font-size: small;
    min-width: auto;padding: 4px 14px;
">Previous</button>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" style="
    text-align: end;
">
                        <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary  submit-btn" style="border: 0px !important;
    font-size: small;
    min-width: auto;padding: 4px 14px;
">Next</button>
                      </div>



                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div class="col-sm-12">
                      <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>




  <!-- Select2 JS -->
  <script>
    var Random = Mock.Random;

    $('.dropdown-mul-2').dropdown({

      searchable: false
    });

  
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
  <script>
    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu() {
      profileMenu.classList.toggle("open-menu");
    }
  </script>

  <script>
    // JavaScript / jQuery
    // JavaScript / jQuery
    $(document).ready(function() {
      // Ao clicar em um link de produto
      $('.hero-image-container').click(function() {
        // Obtenha o ID do produto associado ao link clicado
        var idProduto = $(this).data('id');
        console.log(idProduto);
        // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
        $.ajax({
          type: 'GET',
          url: 'modal/getproduto.php', // Substitua pelo caminho correto
          data: {
            idProduto: idProduto
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

    function likeColor(element) {
      var likeIcon = element.previousElementSibling;
      likeIcon.classList.add("red-like"); // Adiciona a classe CSS "red-like" ao ícone de like
    }


    $(document).ready(function() {
      function readURL(input) {
        if (input.files && input.files[0]) {
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
    document.querySelector('.collapse-chat').addEventListener('click', function() {
      this.classList.toggle('open');
    });





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

    /* Set the width of the sidebar to 250px (show it) */
    function openNav() {
      document.getElementById("mySidepanel").style.width = "250px";
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
    }


    function toggleNotifyMenu() {
      const notifyMenu = document.getElementById('notifyMenu')
      notifyMenu.classList.toggle("open-menu");
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
    // Adiciona o evento de scroll para chamar a função
    window.addEventListener('scroll', adicionarFundoComScroll);

    function atualizarFeed() {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("divFeedUpdate").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "atualizarFeed.php", true);
      xmlhttp.send();
    }

    $(document).ready(function() {
      // Detecta o evento de rolagem
      $(window).scroll(function() {
        // Verifica se chegou ao final da página
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
          // Chama a função quando o usuário chegar ao final da página
          atualizarFeed();
        }
      });
    });
  </script>
  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>
  <script>
    var Random = Mock.Random;
    var json1 = Mock.mock({
      "data|10-50": [{
        name: function() {
          return Random.name(true)
        },
        "id|+1": 1,
        "disabled|1-2": true,
        groupName: 'Group Name',
        "groupId|1-4": 1,
        "selected": false
      }]
    });

    $('.dropdown-mul-1').dropdown({
      data: json1.data,
      limitCount: 40,
      multipleMode: 'label',
      choice: function() {
        // console.log(arguments,this);
      }
    });

    var json2 = Mock.mock({
      "data|10000-10000": [{
        name: function() {
          return Random.name(true)
        },
        "id|+1": 1,
        "disabled": false,
        groupName: 'Group Name',
        "groupId|1-4": 1,
        "selected": false
      }]
    });

    $('.dropdown-mul-2').dropdown({
      limitCount: 5,
      searchable: false
    });

    $('.dropdown-sin-1').dropdown({
      readOnly: true,
      input: '<input type="text" maxLength="20" placeholder="Search">'
    });

    $('.dropdown-sin-2').dropdown({
      data: json2.data,
      input: '<input type="text" maxLength="20" placeholder="Search">'
    });
  </script>
</body>

</html>