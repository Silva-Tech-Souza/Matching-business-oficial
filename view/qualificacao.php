<?php

include_once('../model/classes/conexao.php');
include_once('../model/ErrorLog.php');
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
<style>
    select{
        font-size: small !important;
    }
</style>
    <link rel="stylesheet" href="assets/css/qualificacao.css">
    <title>Qualification</title>
</head>

<body class="hero">
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

    <div class="container m-auto">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="mt-5">
                    <h1 class="color-branco titulologin" style="font-size: 40px;">Qualify your profile.</span></h1><br>
                    <p class="color-branco desclogin">This part is essential for the system to work, in this qualification process we can better understand what our system should show you, thus bringing a relevant profile to your needs.</p>
                <p class="color-branco desclogin">
        <b>Main Business Type</b><br>
        <span style=" font-size: medium;  color: #c4c4c4;">Defines the core nature of your business, allowing us to customize the user experience according to the specific needs of manufacturers.<br></span>
        <b>Business Sector</b><br>
        <span style=" font-size: medium;  color: #c4c4c4;">Determines the sector in which your company operates, to provide relevant information for companies in the diagnostic, IVD (In Vitro Diagnostics), or imaging field.<br></span>
        <b>Business Category</b><br>
        <span style=" font-size: medium;  color: #c4c4c4;"> Further refines your company's profile, enabling the delivery of specific information and resources related to quality and safety.<br></span>
                </p>    
                </div>
                </div>
                <div class="col-lg-5 col-12" style=" padding: 36px;">
                    <div class="cardcadastro" style="    justify-content: center !important;
    justify-items: center;
    align-items: center;
    text-align: center;
    display: -webkit-inline-box;">
                        <form action="../controller/qualificacaoController.php" method="POST" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group" style="text-align: start;">
                                        <label class="color-branco labelcadastro" style="text-align: start !important;">What type of main business do you have?</label>
                                        <select onchange="showbusines(this.value)" class="form-control inputtamanho selectsize" name="coreBusiness">
                                            <option value="0">Select</option>
                                            <?php
                                            include_once('../model/classes/tblOperations.php');

                                            $tblOperations = new Operations($dbh);

                                            $resultstblOperations = $tblOperations->consulta("WHERE `FlagOperation` != '0'");

                                            if ($tblOperations != null) {
                                                if (is_array($resultstblOperations) || is_object($resultstblOperations)) {
                                                    foreach ($resultstblOperations as $row) { ?>
                                                        <option value="<?php echo $row->idOperation; ?>"><?php echo $row->NmOperation; ?></option>
                                            <?php     }
                                                }
                                            }
                                            ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="text-align: start;">
                                        <div class="col" id="refHint"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="text-align: start;">
                                        <div class="col" id="refHint2"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="text-align: center;">
                                       <br><br> <input style="width: 118px;font-size: small;"  type="submit" class="btn btn-primary login-btn inputtamanho" value="Next" name="create">
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