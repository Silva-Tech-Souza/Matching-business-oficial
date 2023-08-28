<?php
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION['sessao'] > 0) {
  header('location:profile.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/geral.css">
    <link rel="stylesheet" href="assets/css/login.css">
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
     <title>Matching Business</title>
  <style>
    .modal-body {
      display: flex;
      flex-direction: column;
      height: 20rem;
      align-items: center;
      justify-content: center;
      padding: 2rem;

    }

    .modal-body h3 {
      font-weight: bold;
    }

    .modal-header {
      color: white;
      background-color: black;
    }

    @media (max-width: 720px) {


      .modal-body {
        display: flex;
        flex-direction: column;
        height: 15rem;
        align-items: center;
        justify-content: center;

      }

      .modal-header {
        color: white;
        background-color: black;
      }
    }
  </style>
</head>

<body class=" dark-bg">

  <div class="signup-page section container">

    <div class="signup-page-container">
      <div class="globe-container">
        <h2>You are one step away from <br> <span style="color:#0057e4;">connecting</span> with the world!</h2>
        <div class="globe">
          <img src="assets/img/undraw_sign_up_n6im.svg">
        </div>
      </div>
      <div class="signup-form">
        <form method="POST" enctype="multipart/form-data">
          <fieldset class="alinhartxtinicio">
            <label for="company-name">Company name </label><br><br>
            <input type="text" name="nomeEmpresa" id="nomeEmpresa" placeholder="ex: Devloper" required><br>
            <label for="taxid">TAX ID </label><br><br>
            <input type="text" name="taxid" id="taxid" placeholder="ex: Devloper"><br>
            <label for="job-tittle">Job tittle</label><br><br>
            <input type="text" name="cargo" id="cargo" placeholder="ex: Devloper" required><br>
            <div style="display: flex; gap: 10px;">
              <div style="display: flex; flex-direction: column; width: 50%;">
                <label for="first-name">Name</label>
                <input class="inputauto" type="text" name="nome" id="nome" placeholder="type here..." required>
              </div>
              <div style="display: flex; flex-direction: column; width: 50%;">
                <label for="last-name">LastName</label>
                <input class="inputauto" type="text" name="sobrenome" id="sobrenome" placeholder="type here..." required>
              </div>
            </div>
            <label for="email-address">Email address</label><br><br>
            <input type="email" name="email" id="email" placeholder="ex: email@email.com" required><br>


            <div style="gap: 10px;">

              <label for="phone">Phone Number </label><br><br>
              <input class="inputauto" type="tel" name="whatsapp" maxlength="20" value="" id="whatsapp" placeholder="Country code - Region code - Number" required><br><br>
              <div>
                <label for="country-select" class="form-label">Country</label>
                <select class="form-select selectfontsize" id="country-select" name="country">
                  <option value="">Select a country</option>
                  <?php
                  include_once('../model/classes/tblCountry.php');

                  $tblCountry = new Country();

                  $resultstblCountry = $tblCountry->consulta("ORDER BY NmCountry ASC");

                  if ($tblCountry != null) {
                    if (is_array($resultstblCountry) || is_object($resultstblCountry)){
                    foreach ($resultstblCountry as $rowpaises) { ?>
                      <option value="<?php echo $rowpaises->idCountry; ?>"><?php echo $rowpaises->NmCountry; ?></option>
                  <?php  }
                  } }
                  ?>
                </select>
              </div>
            </div><br>
            <p class="errologintxt"><?php echo $_SESSION['signuperro']; ?></p>
            <div class="alinharbtningupcenter"><input type="submit" value="Nex" class="login-btn" name="signupsubmit"></div>
            <a href="index.php" style="display: flex; flex-direction: column; text-align: center; margin-top: 1rem; margin-left: 1rem; 
                            font-size: 1.5rem; text-decoration: none; ">(Go back to homepage instead)</a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

  <!-- rights section footer -->
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/latambd" target="_blank" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.linkedin.com/company/labd-latin-america-business-development/" role="button"><i class="fab fa-linkedin-in"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 All Rights Reserved:
      <span class="text-white">LABD - Latin America Business Development</span>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- end of it -->

  <!-- My scripts -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Cabeçalho do modal -->
        <div class="modal-header">
          <h4 class="modal-title">Please check your email</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Corpo do modal -->
        <div class="modal-body">
          <h3>We just sent a confirmation email to your inbox. Please, check it to continue your account creation.</h3>
        </div>
        <!-- Rodapé do modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger closes" data-dismiss="modal" aria-label="Close">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>
    // Aguarde o carregamento do documento
    document.addEventListener("DOMContentLoaded", function() {
      // Verifique se o parâmetro showModal está presente na URL
      var urlParams = new URLSearchParams(window.location.search);
      var showModal = urlParams.get("showModal");

      // Se o parâmetro showModal for verdadeiro, exiba o modal
      if (showModal) {
        $('#myModal').modal('show');
        showModal = false;
        var newUrl = window.location.pathname + window.location.search;
        // Substituir a URL atual sem o parâmetro showModal
        var newUrl = window.location.pathname;
        history.replaceState(null, "", newUrl);
      }

      // Selecione o botão de fechar o modal
      var closeButton = document.querySelector(".close");
      var closeButton2 = document.querySelector(".closes");
      // Adicione um ouvinte de evento para o evento de clique no botão de fechar
      closeButton.addEventListener("click", function() {
        // Ocultar o modal
        var modal = document.getElementById("myModal");
        modal.style.display = "none";

        var backdrop = document.querySelector(".modal-backdrop");
        backdrop.parentNode.removeChild(backdrop);
      });

      closeButton2.addEventListener("click", function() {
        // Ocultar o modal
        var modal = document.getElementById("myModal");
        modal.style.display = "none";

        var backdrop = document.querySelector(".modal-backdrop");
        backdrop.parentNode.removeChild(backdrop);
      });
    });
  </script>
</body>

</html>