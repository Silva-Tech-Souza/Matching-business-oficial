<?php
include_once('../model/classes/conexao.php');

date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
  header("Location: login.php");
}

$txaid = openssl_decrypt($_GET["dixat"], openssl_get_cipher_methods()[2] ,"matchingBussinessMelhorSistema");
date_default_timezone_set('America/Sao_Paulo'); 
include_once('../model/classes/tblEmpresas.php');
$NOMEEMRPESA = "";
$empresas = new Empresas($dbh);

$empresas->setTaxid($txaid);

$resultsempresas = $empresas->consulta("WHERE taxid = :taxid");
if ($resultsempresas != null && is_array($resultsempresas)) {  
  foreach ($resultsempresas as $rowempresa) {
    $NOMEEMRPESA = $rowempresa->nome;
  }
}

$qtdcolab = $_GET["qtdcolab"];
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

<body class="hero">
  <div class="container m-auto">
    <div class="col-12">
      <div class="row">
        <div class="col-lg-7 col-12">
          <div class="mt-5">
            <h1 class="color-branco titulologin" style="font-size: 40px;">Welcome to <span style="color:#0057e4;">Matching Business Online.</span></h1>
            <p class="color-branco desclogin d-none d-md-block"><br>Dear user,<br><br>

              It is with great pleasure that we welcome you to <?php echo $NOMEEMRPESA; ?>! We are delighted to have you as part of our team and confident that together we will achieve great accomplishments. <br><br>

              To get started, we kindly request you to complete your registration in the Matching Business Official system. This will help us ensure that you have access to all the necessary tools and resources to perform your duties to the best of your ability<br><br>
            </p>
          </div>
        </div>

        <div class="col-lg-5 col-12 ">
          <div class="cardcadastro mt-5">
            <form action="../controller/signUpCoolabController.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro h2" for="company-name">Company</label>
                    <hr class="color-branco">
                    <input type="hidden" class="form-control inputtamanho" value="<?PHP echo $qtdcolab; ?>" name="qtdcolab" >
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="company-name">Company name </label>
                    <input type="hidden" class="form-control inputtamanho" value="<?PHP echo $NOMEEMRPESA; ?>" name="nomeEmpresa" id="nomeEmpresa" placeholder="ex: Devloper" required><br><br>
                    <input type="text" disabled name="nomeEmpresa" value="<?PHP echo $NOMEEMRPESA; ?>" class="form-control inputtamanho" id="nomeEmpresa" placeholder="ex: Devloper" required><br>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="taxid">TAX ID </label>
                    <input type="hidden" class="form-control inputtamanho" value="<?PHP if (isset($_GET["taxid"])) {
                                                                                    echo $_GET["taxid"];
                                                                                  } ?>" name="taxid" id="taxid" placeholder="ex: Devloper" required><br><br>
                    <input type="text" disabled class="form-control inputtamanho" value="<?PHP if (isset($_GET["taxid"])) {
                                                                                            echo $_GET["taxid"];
                                                                                          } ?>" name="taxid" id="taxid" placeholder="ex: Devloper" required><br><br>
                  </div>
                </div>
              </div>
          </div>
          <div class="cardcadastro mt-2">
            <form action="../controller/signUpCoolabController.php" method="POST" enctype="multipart/form-data">
              <div class="row">


                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro h2" for="company-name">User</label>
                    <hr class="color-branco">
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="job-tittle">Job tittle</label>
                    <input type="text" class="form-control inputtamanho" name="cargo" id="cargo" placeholder="ex: Devloper" required><br>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="first-name">Name</label>
                    <input class="inputauto form-control inputtamanho" type="text" name="nome" id="nome" placeholder="type here..." required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="last-name">LastName</label>
                    <input class="inputauto form-control inputtamanho" type="text" name="sobrenome" id="sobrenome" placeholder="type here..." required><br>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="email-address">Email address</label>
                    <input type="hidden" class=" form-control inputtamanho inputtamanho" value="<?PHP if (isset($_GET["email"])) {
                                                                                                  echo $_GET["email"];
                                                                                                } ?>" name="email" id="email" placeholder="ex: email@email.com" required><br>
                    <input type="text" disabled class=" form-control inputtamanho inputtamanho" value="<?PHP if (isset($_GET["email"])) {
                                                                                                          echo $_GET["email"];
                                                                                                        } ?>" name="email" id="email" placeholder="ex: email@email.com" required><br>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="phone">Phone Number </label>
                    <input class="inputauto form-control inputtamanho" type="tel" name="whatsapp" maxlength="20" value="" id="whatsapp" placeholder="Country code - Region code - Number" required><br>
                  </div>
                </div>



                <div class="col-sm-12">
                  <div class="form-group" style="text-align: start;">
                    <label class="color-branco labelcadastro" for="country-select" class="form-label">Country</label>
                    <select class="inputtamanho form-select selectfontsize" id="country-select" name="country" required>
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


                <div class="col-sm-12 mt-2">
                  <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary login-btn inputtamanho" value="cadastro" name="signupsubmitcoolab">Signup</button>
                  </div>
                </div>


                
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
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