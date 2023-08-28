<?php 
session_start();
if (isset($_COOKIE["remember_me"])) {

  header("Location: ../controller/loginController.php");

}
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matching Business</title>
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

    <link rel="apple-touch-icon" sizes="152x152" href="<assets/img/Linkedin Company Logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/Linkedin Company Logo.png">
    <link rel="apple-touch-icon" sizes="167x167" href="assets/img/Linkedin Company Logo.png">
    <link href="assets/img/Linkedin Company Logo.png" sizes="2048x2732" rel="apple-touch-startup-image" />      
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/Linkedin Company Logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
</head>

<body>
    
  
  
    <div id="login" class="login-page section dark-bg">

        <div class="login-page-container">
            <div> 
            <h2>Enter with your <span style="color:#0057e4;">credentials.</span></h2>
            <img src="assets/img/undraw_fingerprint_re_uf3f.svg" alt="login image">
            </div>
            <!-- Login box -->
            <form action="../controller/loginController.php" id="login-form-two" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <label for="user">Username </label><br><br>
                    <input type="email"  id="email" name="user" required placeholder="ex: user@user"><br><br>
                    <label for="password">Password </label><br><br>
                    <input type="password" id="password"    name="password" required placeholder="type your password"><br><br>
                    <label for="remember" id="keep-credentials">Remember me</label>
                    <input type="checkbox" id="keep-credentials-input" name="remember_me"><br><br>
                    <p class="errologintxt"><?php echo $_SESSION['loginerro'];?></p>
                    <button type="submit" class="login-btn">Login</button><br><br>
                    <div class="social-media-icons">
                      <a href="#" class="btn btn-outline-light btn-floating m-1" id="meuBotaoDeDownload" role="button"
                      ><i class="fa fa-android"></i></a>
                    <a href="#" onclick="alert('Para adicionar este aplicativo à tela inicial, acesse o botão de compartilhar e selecione Adicionar à tela inicial')" class="btn btn-outline-light btn-floating m-1"  role="button"
                    ><i class="fa-brands fa-apple"></i></a>
                  </div>
                </fieldset>
                <br>
                <div class="cancel-login">
                    <span>Or</span><br>
                    <a href="#" data-toggle="modal" data-target="#aviso" class="btn btn-primary create-btn-modal ">
                      Create an account
                    </a>
                </div>
            </form>

            <!-- End of it -->
         
        </div>
    </div>
    <!-- rights section footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/latambd" target="_blank" role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.linkedin.com/company/labd-latin-america-business-development/" role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>
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
    <?php include_once("widget/cadastrarpop.php"); ?>

<script src="assets/js/script.js"></script>
<script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script src="assets/js/select2.min.js"></script>
  <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
<script>
let deferredPrompt;
    window.addEventListener('beforeinstallprompt', (event) => {
  // Prevenir o comportamento padrão do navegador
  event.preventDefault();
  // Armazenar o evento para uso posterior
  deferredPrompt = event;
  
  // Exibir o botão de download ou realizar outra ação
  showDownloadButton();
});
const downloadButton = document.querySelector('#meuBotaoDeDownload');
downloadButton.addEventListener('click', () => {
  // Verificar se há uma solicitação de instalação disponível
  if (deferredPrompt) {
    // Mostrar o prompt de instalação
    deferredPrompt.prompt();
    
    // Capturar o resultado da solicitação de instalação
    deferredPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('Usuário aceitou a instalação do PWA');
      } else {
        console.log('Usuário recusou a instalação do PWA');
      }
      
      // Limpar a referência da solicitação de instalação
      deferredPrompt = null;
    });
  }
});
</script>
</body>

</html>
