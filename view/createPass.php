<?php
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION['sessao'] > 0) {
  header('location: profile.php');
}
$email = "";
$codigoVerifEmail = $_GET['codigoCadastroIncompleto'];
$decodificado = urldecode(str_replace("274bussiness5", "", str_replace("4matching7", "", $codigoVerifEmail)));

if ($codigoVerifEmail != "" && $codigoVerifEmail != '0') {
  $email = trim($decodificado);
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

  <link rel="stylesheet" href="assets/css/qualificacao.css">
</head>

<body class="dark-bg">
  <div class="main">
    <div class="main-container">
      <form method="POST" action="../controller/createPassController.php" enctype="multipart/form-data">
        <h3 style="padding: 2rem;">Create your password: </h3>
        <fieldset>
          <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" required>
          <label for="password">Password </label><br><br>
          <input maxlength="20" minlength="6" type="password" name="password" id="password" required placeholder="type here..."><br><br>
          <label for="password-confirm">Confirm password </label><br><br>
          <input maxlength="20" minlength="6" type="password" name="password-confirm" id="password-confirm" required placeholder="repeat the password typed above"><br><br>
          <p class="errologintxt"><?php echo $errosenha; ?></p>
          <div class="policy-agree" style="display: flex; width: 100%;margin-bottom: 1rem; font-size: 1.5rem; text-align: center; align-items: center; justify-content: center;">
            <span>Checking this check box, you're accepting our <a href="#" id="openModalLink" data-toggle="modal" data-target="#exampleModalLong">privacy policy and terms</a> <input type="checkbox" style="width: 1.5rem; height: 1.5rem;"></span>
          </div>
          <button value="Create" name="create" type="submit" class="login-btn">Create</button>
        </fieldset>
      </form>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="color: black;">
          <h5 class="modal-title" id="exampleModalLongTitle">Our Policy and Terms</h5>
          </button>
        </div>
        <div class="modal-body" style="color: black;">
          <?php
          //$sqlcontrato = "SELECT * from tblContract WHERE IdContractType = 1 AND ContractFlagAtive = 1 ORDER BY idContract DESC LIMIT 1";
          //$querycontrato = $dbh->prepare($sqlcontrato);
          //$querycontrato->execute();
          //$resultscontrato = $querycontrato->fetchAll(PDO::FETCH_OBJ);

          include_once('../model/classes/tblConect.php');

          $conect = new Conect();

          $resultscontrato = $conect->consulta("WHERE IdContractType = 1 AND ContractFlagAtive = 1 ORDER BY idContract DESC LIMIT 1 ");

          if ($resultscontrato != null) {
            foreach ($resultscontrato as $rowcontrato) {
              echo $rowcontrato->ContractText;
            }
          }
          ?>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary closes" data-dismiss="modal" aria-label="Close">Agree</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validarSenha() {
      var senhaInput = document.getElementById('password');
      var senhaConfirmadaInput = document.getElementById('password-confirm');

      var senha = senhaInput.value;
      var senhaConfirmada = senhaConfirmadaInput.value;

      if (senha !== senhaConfirmada) {
        alert("Passwords don't match.");
        return false;
      }

      var regexMaiuscula = /[A-Z]/;
      var regexEspecial = /[$&+,:;=?@#|'<>.^*()%!-]/;
      var regexNumero = /[0-9]/;

      if (
        senha.length < 6 ||
        !regexMaiuscula.test(senha) ||
        !regexEspecial.test(senha) ||
        !regexNumero.test(senha)
      ) {
        alert("Password does not meet requirements. The password must be at least 6 characters long, contain at least one uppercase character, one special character and one number.");
        return false;
      }

      return true;
    }

    $(document).ready(function() {
      $('#openModalLink').click(function() {
        $('#exampleModalLong').modal('show');
      });
    });

    // Aguarde o carregamento do documento
    document.addEventListener("DOMContentLoaded", function() {
      var closeButton = document.querySelector(".closes");
      closeButton.addEventListener("click", function() {
        // Ocultar o modal
        var modal = document.getElementById("exampleModalLong");
        modal.style.display = "none";

        var backdrop = document.querySelector(".modal-backdrop");
        backdrop.parentNode.removeChild(backdrop);
      });

    });
  </script>

</body>

</html>