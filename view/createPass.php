<?php
include('../model/classes/conexao.php');
include('../model/classes/tblContract.php');
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

if(isset($_GET['erro'])){

  $errosenha = $_GET['erro'];

  echo '<script>window.alert('.$errosenha.');</script>';

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
  <link rel="stylesheet" href="assets/css/createpass.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/qualificacao.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<style>
    .input-low{
        text-transform: none !important;
    }
</style>

</head>



<body class="hero">
  <div class="container m-auto">
    <div class="col-12">
      <div class="row">
        <form method="POST" action="../controller/createPassController.php" onsubmit="return validarSenha(this);" enctype="multipart/form-data" style="text-align: center;justify-content: center;align-items: center;">
          <h1 class="color-branco titulologin" style="font-size: 40px;">Create your password: </h1>
          <fieldset>
          <?php if(isset($_GET["alteracao"])){
              ?>
                <input type="hidden" name="alteracao" id="alteracao" value="<?php echo $_GET["alteracao"]?>" required>;
              <?php
              }
              ?>
            <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" required>
            <div class="col-12" style="text-align: initial; font-size: large;">
              <label class="color-branco" for="password">Password </label>
              <div class="input-group mb-2" id="input1">
                <div class="password-container" style="width: -webkit-fill-available;">
                  <input autocomplete="off" class="form-control inputtamanho fonteinputpass input-low" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="20" minlength="6" type="password" name="password" required placeholder="type here...">
                  <div class="input-group-text" id="togglePassword">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12" style="text-align: initial; font-size: large;">
              <label class="color-branco" for="password-confirm">Confirm password </label>
              <div class="input-group mb-2">
                <div class="password-container" style="width: -webkit-fill-available;"> 
                  <input autocomplete="off" class="form-control inputtamanho fonteinputpass input-low" id="psw2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="20" minlength="6" type="password" name="password-confirm" required placeholder="repeat the password typed above" >
                  <div class="input-group-text" id="togglePassword2">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12" style="text-align: initial; font-size: large;">
              <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                <p id="confirm" class="invalid"><b>Confirm password</b></p>
              </div>
            </div>
            <p class="errologintxt"><?php echo $errosenha; ?></p><br>
            <div class="policy-agree" style="display: flex; width: 100%;margin-bottom: 1rem; font-size: 1.5rem; text-align: center; align-items: center; justify-content: center;">
              <span class="color-branco">Checking this check box, you're accepting our <a href="#" id="openModalLink" data-toggle="modal" data-target="#exampleModalLong">privacy policy and terms</a> <input type="checkbox" required style="width: 1.5rem; height: 1.5rem;"></span>
            </div>
            <button style="width: 118px;font-size: small;" value="Create" name="create" type="submit" class="btn btn-primary login-btn inputtamanho">Create</button>
          </fieldset>
        </form>
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="color: black;">
          <h5 class="modal-title privacetexttitle" id="exampleModalLongTitle">Our Policy and Terms</h5>
          <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
                            <span aria-hidden="false" data-dismiss="modal" class="color-branco">x</span>
                        </button>
        </div>
        <div class="modal-body privacetext" style="color: black;">
          <?php



          $conect = new Contract($dbh);

          $resultscontrato = $conect->consulta("WHERE IdContractType = 1 AND ContractFlagAtive = 1 ORDER BY idContract DESC LIMIT 1 ");

          if ($resultscontrato != null) {
            foreach ($resultscontrato as $rowcontrato) {
              echo $rowcontrato->ContractText;
            }
          }
          ?>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary closes privacetextbtn" data-dismiss="modal" aria-label="Close">Agree</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


  <script>
    var myInputconfirm = document.getElementById("psw2");
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var confirm = document.getElementById("confirm");
    // When the user clicks on the password field, show the message box

    const togglePasswordButton = document.getElementById('togglePassword');
    const togglePasswordButton2 = document.getElementById('togglePassword2');
    togglePasswordButton.addEventListener('click', function() {
      const type = myInput.getAttribute('type') === 'password' ? 'text' : 'password';
      myInput.setAttribute('type', type);
    });
    togglePasswordButton2.addEventListener('click', function() {
      const type = myInputconfirm.getAttribute('type') === 'password' ? 'text' : 'password';
      myInputconfirm.setAttribute('type', type);
    });
    myInputconfirm.onkeyup = function() {
      // Validate length
      if (myInput.value == myInputconfirm.value) {
        confirm.classList.remove("invalid");
        confirm.classList.add("valid");
      } else {
        confirm.classList.remove("valid");
        confirm.classList.add("invalid");
      }
    }
    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }



      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }

      // Validate length
      if (myInput.value == myInputconfirm.value) {
        confirm.classList.remove("invalid");
        confirm.classList.add("valid");
      } else {
        confirm.classList.remove("valid");
        confirm.classList.add("invalid");
      }
    }
  </script>
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

    $(document).ready(function() {
      $('#showPassword').on('click', function() {
        console.log("teste");
        var passwordField = $('#passwords');
        var passwordFieldType = passwordField.attr('type');
        if (passwordFieldType == 'passwords') {
          passwordField.attr('type', 'text');
          $(this).val('Hide');
        } else {
          passwordField.attr('type', 'passwords');
          $(this).val('Show');
        }
      });
    });


  </script>
 <script>
        document.querySelector('.close').addEventListener('click', function() {
            document.querySelector('.modal-backdrop').classList.remove('show');
            document.querySelector('.modal').style.display = 'none';
        });
    </script>
</body>

</html>