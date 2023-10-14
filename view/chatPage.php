<?php
session_start();

include_once('../model/ErrorLog.php');

date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}
$iduser = $_SESSION["id"];

$_SESSION["n"] = 5;
if (isset($_GET["idClientConversa"])) {

  $idClientConversa = $_GET["idClientConversa"];
} else {
  $idClientConversa = 17;
}


include_once('../model/classes/tblUserClients.php');

$userClients = new UserClients();

$userClients->setidClient($iduser);

$results = $userClients->consulta("WHERE idClient = :idClient");

if ($results != null) {
  foreach ($results as $row) {
    $username = $row->FirstName . " " . $row->LastName;
    $jobtitle = $row->JobTitle;
    $idcountry = $row->idCountry;
    $idoperation = $row->IdOperation;
    $corebusiness = $row->CoreBusinessId;
    $companyname = $row->CompanyName;
    $imgperfil = $row->PersonalUserPicturePath;
    $imgcapa = $row->LogoPicturePath;
  }
}

include_once('../model/classes/tblOperations.php');
$operations = new Operations();

$operations->setidOperation($idoperation);
$resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");


if ($resultsoperation != null) {
  foreach ($resultsoperation as $rowoperation) {
    $_SESSION["tipoflag"] =  $rowbusiness->FlagOperation;
    $NmOperation = $rowbusiness->NmOperation;
  }
}


?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/geral.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>

  <title>Messaging</title>
  <link rel="stylesheet" href="assets/css/feed.css">
  <link rel="stylesheet" href="assets/css/chatPage.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body class="funcolinhas">

  <?php include_once("widget/navbar.php"); ?>

  <!-- char-area -->
  <section class="message-area">
    <div class="container telatodacahat margemmnavbar">
      <div class="row" style=" width: -webkit-fill-available; height: -webkit-fill-available;">
        <div class="col-12" style="width: inherit;">
          <div class="chat-area">
            <!-- chatlist -->
            <div class="chatlist col-lg-3">
              <div class="modal-dialog-scrollable" style="min-height: -webkit-fill-available;">
                <div class="modal-content">
                  <div class="chat-header">
                    <div class="msg-search">
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" aria-label="search">

                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Chat</button>
                      </li>
                    </ul>
                  </div>

                  <div class="modal-body">
                    <!-- chat-list -->
                    <div class="chat-lists">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                          <!-- chat-list -->
                          <div class="chat-list"><?php
                                                  include_once('../model/classes/tblConect.php');
                                                  $conects = new Conect();
                                                  $conects->setidUserPed($iduser);
                                                  $conects->setidUserReceb($iduser);
                                                  $resultsConect = $conects->consulta("WHERE (idUserPed = :idUserPed) AND status = '1' OR (idUserReceb = :idUserReceb) AND status = '1' ");
                                                  if ($resultsConect != null) {
                                                    foreach ($resultsConect as $row) {
                                                      if ($row->idUserPed != $iduser) {
                                                        $idconectado = $row->idUserPed;
                                                      } else {
                                                        $idconectado = $row->idUserReceb;
                                                      }
                                                      include_once('../model/classes/tblUserClients.php');
                                                      $userClients = new UserClients();
                                                      $userClients->setidClient($idconectado);
                                                      $resultsUserClients = $userClients->consulta("WHERE idClient = :idClient");
                                                      if ($resultsUserClients != null) {
                                                        foreach ($resultsUserClients as $rowCon) {
                                                            
                                                             $imgchatuserS = $rowCon->PersonalUserPicturePath;
                                                  ?>
                                    <a href="#" class="d-flex align-items-center" onclick="atualizarMensagens(<?php echo $idconectado; ?>)">
                                      <div class="flex-shrink-0">
                                        <img class="imgavatar" src="<?php if ($imgchatuserS != "Avatar.png" && $imgchatuserS != "" && file_exists("" . $imgchatuserS)) {
                                                                            echo "" . $imgchatuserS;
                                                                        } else {
                                                                            echo "assets/img/Avatar.png";
                                                                        } ?>" alt="user img">
                                        <span class="active"></span>
                                      </div>
                                      <div class="flex-grow-1 ms-3">
                                        <h3><?php echo $rowCon->FirstName . " " . $rowCon->LastName; ?></h3>
                                        <p><?php
                                                          include_once('../model/classes/tblOperations.php');

                                                          $Operations = new Operations();
                                                          $Operations->setidOperation($rowCon->CoreBusinessId);
                                                          $resultsbusiness = $Operations->consulta("WHERE idOperation = :idOperation");

                                                          if ($resultsbusiness != null) {
                                                            foreach ($resultsbusiness as $rowbusiness) {
                                                              echo  $NmBusiness =  $rowbusiness->NmOperation;
                                                            }
                                                          }

                                            ?></p>
                                      </div>
                                    </a>
                            <?php }
                                                      }
                                                    }
                                                  } ?>
                          </div>
                          <!-- chat-list -->
                        </div>

                      </div>

                    </div>
                    <!-- chat-list -->
                  </div>
                </div>
              </div>
            </div>
            <!-- chatlist -->



            <!-- chatbox -->
            <div class="chatbox">
              <div class="modal-dialog-scrollable" style="min-height: -webkit-fill-available;">
                <div class="modal-content modal-content-display">
                  <div class="msg-head henderchat " id="henderchat">
                   
                  </div>


                  <div class="modal-body modal-body-height">
                    <div class="msg-body tamanhochatlist" style="padding: 11px;overflow-y: auto;">
                      <ul id="messageList">

                      </ul>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 send-box" style=" bottom: 0; right: 0;background: #fff;">
                      <form id="sendMessageForm">
                        <input required type="text" class="form-control" aria-label="message…" placeholder="Write message…" id="txtarea" name="Texto">
                        <input type="hidden" value="<?php echo $iduser; ?>" name="iduser">
                        <input type="hidden" value="<?php echo $idClientConversa; ?>" name="idClientConversa">

                        <input type="hidden" value="cadastrar" name="acao">
                        <button type="submit" value="Send"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- chatbox -->


        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- char-area -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script src="assets/js/select2.min.js"></script>
  <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function atualizarMensagens(idconectado) {
      var iduser = <?php echo $iduser; ?>;
      idConversaAtiva = idconectado;
      if (idconectado == null || idconectado == "") {
        var idClientConversa = <?php echo $idClientConversa; ?>;
      } else {
        var idClientConversa = idconectado;

      }
      $.ajax({
        url: 'widget/atualizarnamechat.php',
        type: 'POST',
        dataType: 'json',
        data: {
          idClientConversa: idClientConversa
        },
        success: function(data) {
         
          var henderchat = $('#henderchat');
          henderchat.empty();
          console.log(data);
          if (data.messages) {
            console.log("teste");
            data.messages.forEach(function(message) {
            henderchat.append(
              '<div class="row">' +
              '<div class="col-8">' +
              '<div class="d-flex align-items-center">' +
              '<span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>' +
              '<div class="flex-shrink-0">' +
              '<img class="imgavatar" src="'+message.img+'" alt="user img">' +
              '</div>' +
              '<div class="flex-grow-1 ms-3">' +
              '<h3>'+message.name+'</h3>' +
              '<p>'+message.core+'</p>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="col-4">' +
              '<ul class="moreoption">' +
              '<li class="navbar nav-item dropdown">' +
              '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>' +
              '<ul class="dropdown-menu">' +
              '<li><a class="dropdown-item" href="viewProfile.php?profile=' + idClientConversa + '">View Profile</a></li>' +
              '</ul>' +
              '</li>' +
              '</ul>' +
              '</div>' +
              '</div>');
            });
          }
        }
      });

      $.ajax({
        url: 'widget/atualizarMensagens.php',
        type: 'POST',
        dataType: 'json',
        data: {
          iduser: iduser,
          idClientConversa: idClientConversa
        },
        success: function(data) {
          var txtarea = document.getElementById('txtarea');

          var msgContainer = $('#messageList');
      
          msgContainer.empty(); // Limpa a lista de mensagens
        
          if (data.messages) {
            
            data.messages.forEach(function(message) {
              var messageClass = message.type === 'repaly' ? 'repaly' : 'sender';
              msgContainer.append('<li class="' + messageClass + '"><p>' + message.text + '</p><span class="time">' + message.date + '</span></li>');
              txtarea.value = "";
              scrollToBottom();
            });
          }
        }
      });
    }

    function scrollToBottom() {
      var msgBody = document.querySelector('.msg-body');
      msgBody.scrollTop = msgBody.scrollHeight;
    }
    document.addEventListener('DOMContentLoaded', function() {
      scrollToBottom();
    });
    $(document).ready(function() {


      $('#sendMessageForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        if (idConversaAtiva != null || idConversaAtiva != "") {
          formData.append('idClientConversa', idConversaAtiva);
        }
        $.ajax({
          url: '../controller/chatPageController.php',
          type: 'POST',
          dataType: 'json',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            if (data.success) {
              if (idConversaAtiva != null || idConversaAtiva != "") {
                atualizarMensagens(idConversaAtiva); // Atualiza as mensagens
              } else {
                atualizarMensagens();
              }
              scrollToBottom();

            } else {
              alert('Erro ao enviar mensagem. Por favor, tente novamente.');
            }
          }
        });
      });

      atualizarMensagens(); // Chama a função ao carregar a página
    });
  </script>

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
    jQuery(document).ready(function() {

      $(".chat-list a").click(function() {
        $(".chatbox").addClass('showbox');
        return false;
      });

      $(".chat-icon").click(function() {
        $(".chatbox").removeClass('showbox');
      });


    });
  </script>

</body>

</html>
