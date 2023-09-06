<?php
session_start();
//error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 5;

include_once('../model/classes/tblUserClients.php');

$userClients = new UserClients();

$userClients->setidClient($iduser);

$results = $userClients->consulta("WHERE idClient = :idClient");

if ($results != null) {
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

include('../model/classes/tblCountry.php');

$country = new Country();

$country->setidCountry($idcountry);

$resultsCountry = $country->consulta("WHERE idCountry = :idCountry");

if ($resultsCountry != null) {
  foreach ($resultsCountry as $rowCountry) {
    $pais =  $rowCountry->NmCountry;
  }
}
include_once('../model/classes/tblOperations.php');
$operations = new Operations();
$operations->setidOperation($corebusiness);
$resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
if ($resultsoperation != null) {
  foreach ($resultsoperation as $rowoperation) {
    $NmBusiness =  $rowoperation->NmOperation;
  }
}


include_once('../model/classes/tblBusiness.php');
$business = new Business();
$business->setidBusiness($satBusinessId);
$resultsbusiness = $business->consulta("WHERE idBusiness = :idBusiness");
if ($resultsbusiness != null) {
  foreach ($resultsbusiness as $rowbusiness) {
    $NmBusinesscor =  $rowbusiness->NmBusiness;
  }
}


$NmBusinessCategory = "";
include_once('../model/classes/tblBusinessCategory.php');
$BusinessCategory = new BusinessCategory();
$BusinessCategory->setidBusinessCategory($idoperation);
$resultsBusinessCategory = $BusinessCategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

if ($resultsBusinessCategory != null) {
  foreach ($resultsBusinessCategory as $rowbusinesscateg) {
    $NmBusinessCategory =  $rowbusinesscateg->NmBusinessCategory;
    $idbusinesscateg = $rowbusinesscateg->idBusiness;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>

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
  <link rel="stylesheet" href="assets/css/geral.css">
  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body class="funcolinhas">
  <script>
    function showbusines(str) {
      document.getElementById("refHint2").innerHTML = "";
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
      xmlhttp.open("GET", "widget/qualibuisines.php?q=" + str, true);
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
        }
      }
      xmlhttp.open("GET", "widget/qualibuisines2.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>

  <!-- Header -->
  <?php include_once("widget/navbar.php"); ?><br><br><br><br><br>
  <!-- Body -->
  <div class="col-12">
    <div class="row">
      <!-- Card Perfil -->
      <div class="col-4 p-3">
        <div class="col-12">
          <div class="card card-body p-0">
            <div class="col-12">
              <img src="assets/img/wp.jpeg" alt="" style="width: 100%; height: 120px;">
              <img src="<?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                          echo $imgperfil;
                        } else {
                          echo "assets/img/Avatar.png";
                        } ?>" alt="avatar" class="rounded-circle img-fluid img-profile-card position-absolute" style="top: 40px; left: 20px;">
            </div>
            <div class="col-12 d-flex justify-content-end">
              <h5 class="my-3 txtnomeperfil" style="padding-right: 10px;"><?php echo $username; ?> </h5>

            </div>
            <div class="col-12 d-flex justify-content-end mb-4">

              <p class="text-muted mb-1 txttipoperfil" style="padding-right: 10px;"> <?php echo $jobtitle . " at " . $companyname; ?></p>
            </div>
          </div>
        </div>
        <div class="col-12 mt-4">
          <div class="row">
            <div class="col-6">
              <div class="card card-body ">
                <div class="row">
                  <div class="col-8 d-flex justify-content-start">
                    <p class="text-muted d-inline m-0"><a href="#">My saved search</a></p>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-middle">
                    <p class="text-muted d-inline m-0"><b>0</b></p>
                  </div>


                </div>



              </div>
            </div>
            <div class="col-6">
              <div class="card card-body ">
                <div class="row">
                  <div class="col-8 d-flex justify-content-start">
                    <p class="text-muted d-inline m-0"><a href="#" data-toggle="modal" data-target="#exampleModalconect" class="nav-link">Want to Connect</a></p>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-middle">
                    <p class="text-muted d-inline m-0"><b><?php include_once('../model/classes/tblConect.php');

                                                          $conect = new Conect();

                                                          $conect->setidUserReceb($iduser);

                                                          $resultConect = $conect->consulta("WHERE idUserReceb = :idUserReceb AND status = '0'");

                                                          $numView = 0;

                                                          if ($resultConect != null) {
                                                            foreach ($resultConect as $resultConectUnid) {
                                                              $numView += 1;
                                                            }
                                                          }

                                                          echo $numView; ?></b></p>
                  </div>


                </div>



              </div>
            </div>
          </div>

        </div>

        <div class="col-12 mt-4">
          <div class="row">
            <div class="col-6">
              <div class="card card-body ">
                <div class="row">
                  <div class="col-8 d-flex justify-content-start">
                    <p class="text-muted d-inline m-0"><a href="#">My Network</a></p>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-middle">
                    <p class="text-muted d-inline m-0"><b><?php


                                                          include_once('../model/classes/tblConect.php');

                                                          $conect = new Conect();

                                                          $conect->setidUserReceb($iduser);

                                                          $resultConect = $conect->consulta("WHERE idUserReceb = :idUserReceb AND status = '1'");

                                                          $numView = 0;

                                                          if ($resultConect != null) {
                                                            foreach ($resultConect as $resultConectUnid) {
                                                              $numView += 1;
                                                            }
                                                          }

                                                          echo $numView;
                                                          ?></b></p>
                  </div>


                </div>



              </div>
            </div>
            <div class="col-6">
              <div class="card card-body ">
                <div class="row">
                  <div class="col-8 d-flex justify-content-start">
                    <p class="text-muted d-inline m-0"><a href="#" data-toggle="modal" data-target="#exampleModalconect" class="nav-link">Views</a></p>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-middle">
                    <p class="text-muted d-inline m-0"><b><?php


                                                          include_once('../model/classes/tblViews.php');

                                                          $views = new Views();

                                                          $views->setidView($iduser);

                                                          $resultviews = $views->consulta(" WHERE idView = :idView ");

                                                          $numView = 0;

                                                          if ($resultviews != null) {
                                                            foreach ($resultviews as $resultviewsUnid) {
                                                              $numView += 1;
                                                            }
                                                          }

                                                          echo $numView;

                                                          ?></b></p>
                  </div>


                </div>



              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-4 p-3">
        <div class="card card-body ">
          <div class="col-12">
            <div class="row">
              <div class="col-7 d-flex justify-content-start">
                <p class="mb-0"><b>Core Business:</b></p>

              </div>
              <div class="col-5 d-flex justify-content-end align-middle">
                <p class="mb-0"> <?php echo $NmBusiness; ?></p>
              </div>
              <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") {
              ?>
                <hr>
                <div class="col-7 d-flex justify-content-start">
                  <p class="mb-0"><b>Business:</b></p>

                </div>
                <div class="col-5 d-flex justify-content-end align-middle">
                  <p class="mb-0"> <?php echo $NmBusinesscor; ?></p>
                </div>
                <hr>
                <div class="col-7 d-flex justify-content-start">
                  <p class="mb-0"><b>Business Category:</b></p>

                </div>
                <div class="col-5 d-flex justify-content-end align-middle">
                  <p class="mb-0"> <?php echo $NmBusinessCategory; ?></p>
                </div>
              <?php }  ?>
            </div>
          </div>
        </div>
        <div class="card card-body mt-3 h-75">
          <div class="col-12">
            <p class="mb-0" style="font-size:medium;"><b>Description</b></p>
          </div>
          <div class="col-12">
            <p class="text-muted"><?php echo $descricao; ?></p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <?php include_once("widget/editarperfil.php"); ?>





  <script src="../../assets/js/jquery.slimscroll.min.js"></script>
  <script src="../../assets/js/select2.min.js"></script>
  <script src="../../assets/plugins/summernote/dist/summernote-bs4.min.js"></script>

  <script src="../../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script src="../../assets/js/select2.min.js"></script>
  <script src="../../assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu() {
      profileMenu.classList.toggle("open-menu");
    }
  </script>
  <script>
    $(document).ready(function() {
      // Activate the tab when the link is clicked
      $('a[data-toggle="tab"]').on('click', function(e) {
        e.preventDefault();
        $('#mynetwork').show();
        $('#mynetwork').removeClass('hidden');
        $('#mynetwork').removeClass('fade');
        $(this).tab('show');

      });


      $('#closeMyNetwork').on('click', function(e) {
        e.preventDefault();

        $('#mynetwork').removeClass('show').addClass('fade');
        $('#mynetwork').hide();
      });
    });
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
</body>

</html>