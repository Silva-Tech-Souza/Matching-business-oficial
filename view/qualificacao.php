<?php
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Sao_Paulo');

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
    <title>Qualification</title>
</head>

<body>
    <script>
        function showbusines(str) {

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
    <div class="qualification-page dark-bg">
        <div class="qualification-page-container">
            <div class="qualification-intro main-bg" style="
    height: 100% !important;
">
            </div>

            <div class="qualification-form-section">
                <div class="text">

                    <h3 style="color:#0057e4;"> We're really excited to know more about your business!</h3><br>

                </div>
                <form method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <fieldset>
                            <div class="first-selector">
                                <label>What kind of business you have?</label>
                                <select onchange="showbusines(this.value)" name="business">
                                    <option value="0">Select</option>
                                    <?php
                                    include_once('../model/classes/tblOperations.php');

                                    $tblOperations = new Operations();
                  
                                    $resultstblOperations = $tblOperations->consulta("ORDER BY NmOperation ASC");
                  
                                    if ($tblOperations != null) {
                                      if (is_array($resultstblOperations) || is_object($resultstblOperations)){
                                        foreach ($resultstblOperations as $row) { ?>
                                            <option value="<?php echo $row->idOperation; ?>"><?php echo $row->NmOperation; ?></option>
                                    <?php     }
                                    }}
                                    ?>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset>


                            <div class="second-selector">
                                <div class="col" id="refHint"></div>
                                <div class="col" id="refHint2"></div>

                            </div>
                        </fieldset>





                        <input value="Next" name="create" type="submit" class="login-btn">
                </form>
            </div>
        </div>
    </div>
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
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 All Rights Reserved:
            <span class="text-white">LABD - Latin America Business Development</span>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end of it -->

    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    <script>

    </script>
</body>

</html>