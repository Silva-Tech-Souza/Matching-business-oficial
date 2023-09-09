<?php
session_start();
error_reporting(0);
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
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
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

  


   
  </style>
</head>

<body class="funcolinhas">

  <?php include_once("widget/navbar.php"); ?>
  <br><br><br><br><br>

  <div class="main-wrapper">
    <div class="sidebar" id="sidebar" style=" max-width: 300px;background: #002d4b;">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
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
      </div>
    </div>
    <div class="page-wrapper" style="margin-top: 0px;padding-top: 5px;">
      <div class="content container-fluid">
        <div class="row">
          <div class=" col-xl-12">

          </div>
        
        </div>
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