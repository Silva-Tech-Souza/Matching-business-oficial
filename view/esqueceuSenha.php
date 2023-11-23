<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblContract.php');
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

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
<?php
    if(!isset($_GET['emailEnviado'])){
        ?>

    <div class="container m-auto">
        <div class="col-12">
        <div class="row">
            <form method="POST" action="../controller/esqueceuSenhaController.php" enctype="multipart/form-data" style="text-align: center;justify-content: center;align-items: center;">
            <h1 class="color-branco titulologin" style="font-size: 40px;">Kindly provide the email used for site login. Thank you. </h1>
            <fieldset>
                
                <div class="col-12" style="text-align: initial; font-size: large;">
                <label class="color-branco" for="password">Email: </label>
                <div class="input-group mb-2" id="input1">
                    <div class="password-container" style="width: -webkit-fill-available;"> 

                    <input class="inputlogin form-control" type="email" id="email" name="email" value="<?php if(isset($email)){ echo $email;} ?>" required placeholder="ex: user@user">
                    
                    </div>
                </div>
                </div>
                
                <button style="width: 118px;font-size: small;" value="sendEmail" name="sendEmail" type="submit" class="btn btn-primary login-btn inputtamanho">Send email</button>
            </fieldset>
            </form>
        </div>
        </div>
    </div>

<?php
    }else if($_GET['emailEnviado'] == 1){
?>

<div class="container m-auto">
        <div class="col-12">
        <div class="row">
            <h1 class="color-branco titulologin" style="font-size: 40px;">Email sent successfully!</h1>
            <fieldset>
                
                <div class="col-12" style="text-align: initial; font-size: large;">
                <label class="color-branco" for="password">Please check your email to proceed with the password change. Thank you! </label>
                
                </div>
                
            </fieldset>
        </div>
        </div>
    </div>

<?php
    }else{
?>

<div class="container m-auto">
        <div class="col-12">
        <div class="row">
            <h1 class="color-branco titulologin" style="font-size: 40px;">The email was not sent.</h1>
            <fieldset>
                
                <div class="col-12" style="text-align: initial; font-size: large;">
                <label class="color-branco" for="password">Please verify if your email is the same as the one used during registration or if it has been entered correctly. Thank you! </label>
                
                </div>
                
            </fieldset>
        </div>
        </div>
    </div>

<?php
    }
?>






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

</body>

</html>