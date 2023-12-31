<?php
error_reporting(0);
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}else{
  if ($_SESSION["id"] > 0 &&  $_SESSION["id"] != "") {
    header("Location: home.php");
  }
}
include_once('../model/classes/conexao.php');
date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/geral.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/signup.css">
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

</head>



<body class="hero">
  <div class="container m-auto">
    <br>
    <div class="col-12">
      <div class="row">
        <div class="col-lg-7 col-12 ">
          <div class="mt-5">
            <h1 class="color-branco titulologin mt-5" style="font-size: 40px;">Welcome to <span style="color:#0057e4;">Matching Business Online.</span></h1>
            <p class="color-branco desclogin mt-5" style="padding-right: 40px;">Dear user,<br>

              Your account is linked to a Legal Entity (PJ). Each PJ account can have up to 5 users. This restriction aims to ensure security and proper control of the company's activities. <br>

              The difference between verified and unverified accounts is simple: verified accounts submit the required documentation to prove their legitimacy, gaining benefits such as increased trust, access to advanced features, and priority support. Unverified accounts have some limitations and may not have full access to all features. <br><br>

              To make the most of our platform, we recommend verifying your PJ account and enjoying all available benefits.<br>

              If you have any questions, our support team is ready to assist.<br>

              Best regards.</p>
          </div>
        </div>
        
        <div class="col-lg-5 col-12 ml-5">
          <div class="cardcadastro">
            <form action="../controller/signupController.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro h2" for="company-name">Company</label><hr class="color-branco">
                  </div>
                </div>
                
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="company-name">Company name </label>
                    <input type="text" name="nomeEmpresa"  maxlength="110" class="form-control inputtamanho fonteinput" id="nomeEmpresa" placeholder="ex: Matching Business Online" required><br>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="taxid">TAX ID </label>
                    <input type="text"  maxlength="80" class="form-control inputtamanho fonteinput" name="taxid" id="taxid" placeholder="ex: 0000.000.00/000" required><br><br>
                  </div>
                </div>
</div></div>
<div class="cardcadastro mt-2">
<div class="row">
               

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro h2" for="company-name">User</label><hr class="color-branco">
                  </div>
                </div>
                
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="job-tittle">Job tittle</label>
                    <input type="text"  maxlength="80" class="form-control inputtamanho fonteinput" name="cargo" id="cargo" placeholder="ex: CEO" required><br>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="first-name">Name</label>
                    <input  maxlength="40" class="inputauto form-control inputtamanho fonteinput" type="text" name="nome" id="nome" placeholder="type here..." required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="last-name">Last Name</label>
                    <input   maxlength="40" class="inputauto form-control inputtamanho fonteinput" type="text" name="sobrenome" id="sobrenome" placeholder="type here..." required><br>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="email-address">Email address</label>
                    <input type="email"  maxlength="120" class=" form-control inputtamanho inputtamanho fonteinput" name="email" id="email" placeholder="ex: email@email.com" required><br>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="phone">Phone Number </label>
                    <input maxlength="25" class="inputauto form-control inputtamanho fonteinput" type="tel" name="whatsapp" maxlength="20" value="" id="whatsapp" placeholder="Country code - Region code - Number" required><br>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="country-select" class="form-label">Country</label>
                    <select class="inputtamanho form-select selectfontsize fonteinput" id="country-select" name="country" required>
                      <option value="">Select a country</option>
                      <?php
                      include_once('../model/classes/tblCountry.php');

                      $tblCountry = new Country($dbh);

                      $resultstblCountry = $tblCountry->consulta("ORDER BY NmCountry ASC");

                      if ($tblCountry != null) {
                        if (is_array($resultstblCountry) || is_object($resultstblCountry)) {
                          foreach ($resultstblCountry as $rowpaises) { ?>
                            <option value="<?php echo $rowpaises->idCountry; ?>"><?php echo $rowpaises->NmCountry; ?></option>
                      <?php  }
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                     
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: center;">
                  <br>
                <p class="border-rounded txterrologin errologintxt "><?php echo $_SESSION['signuperro']; ?></p>
                    <button type="submit" class="btn btn-primary login-btn inputtamanho btnsignsize" value="cadastro" name="signupsubmit">Signup</button>
                  </div>
                </div>


                <a href="login.php" style="display: flex; flex-direction: column; text-align: center; margin-top: 1rem; margin-left: 1rem; 
                            font-size: 1.5rem; text-decoration: none; ">(Go back to homepage instead)</a>
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
    <br>
  </div>

  <!-- rights section footer -->
  <footer class="bg-dark text-center text-white loginfooter">

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
          <a type="button" class="btn btn-success closes" data-dismiss="modal" aria-label="Close" href="login.php">OK</a>
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