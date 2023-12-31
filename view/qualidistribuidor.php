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

    <link rel="stylesheet" href="assets/css/qualificacao.css">
    <title>Distribuidor</title>
</head>

<body class="hero">


    <div class="container m-auto">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="mt-5">
                        <h1 class="color-branco titulologin" style="font-size: 40px;">Qualify your profile.</span></h1><br>
                        <p class="color-branco desclogin">This part is essential for the system to work, in this qualification process we can better understand what our system should show you, thus bringing a relevant profile to your needs.<br></p>
                        <p class="color-branco desclogin">This step ensures that the distributors we recommend are aligned with your business requirements. By providing specific details about your profile you enable our system to present you with the most relevant and specific options.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="cardcadastro">
                        <form action="../controller/distribuidorProfileController.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                            <?php
// Obter o ano atual
$currentYear = date('Y');

// Calcular os três últimos anos
$lastYear1 = $currentYear - 1;
$lastYear2 = $currentYear - 2;
$lastYear3 = $currentYear - 3;
?>
                                <input type="hidden" name="labelfob1" value="<?php echo $lastYear1; ?>">
                                <input type="hidden" name="labelfob2" value="<?php echo $lastYear2; ?>">
                                <input type="hidden" name="labelfob3" value="<?php echo $lastYear3; ?>">

                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        
                                        <input style="font-size: small;height: 4rem !important;" required type="date" id="yearInput" name="year" min="1900" max="2024" class="form-control inputstyle border-dark inputtamanho" >
                                        <label for="yearInput" style=" font-size: larger;">Founded in:</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="numEmpregados" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblNumEmpregados.php');
                                            $tblNumEmpregados = new NumEmpregados($dbh);
                                            $resultsNumEmpregados = $tblNumEmpregados->consulta("ORDER BY ValorInicial ASC");
                                            if ($resultsNumEmpregados != null) {
                                                foreach ($resultsNumEmpregados as $rowemply) {
                                            ?>
                                                    <option value="<?php echo $rowemply->idNumEmpregados; ?>"><?php echo $rowemply->DescNumEmpregados; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" style=" font-size: larger;">N° of employees:</label>
                                    </div>
                                </div>

                              
                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="numSellers1" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblNumEmpregados.php');
                                            $tblNumEmpregados = new NumEmpregados($dbh);
                                            $resultsNumEmpregados = $tblNumEmpregados->consulta("ORDER BY ValorInicial ASC");
                                            if ($resultsNumEmpregados != null) {
                                                foreach ($resultsNumEmpregados as $rowemply) {
                                            ?>
                                                    <option value="<?php echo $rowemply->idNumEmpregados; ?>"><?php echo $rowemply->DescNumEmpregados; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" style=" font-size: larger;">Total Sales Rep:</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating">

                                        <select style="font-size: small;height: 4rem !important;" required name="nivelOperacao" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblNivelOperacao.php');
                                            $tblNivelOperacao = new NivelOperacao($dbh);
                                            $resultstblNivelOperacao = $tblNivelOperacao->consulta("");
                                            if ($resultstblNivelOperacao != null) {
                                                foreach ($resultstblNivelOperacao as $rowoperation) {
                                            ?>
                                                    <option value="<?php echo $rowoperation->idNivelOperacao; ?>"><?php echo $rowoperation->DescNivelOperacao; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" style=" font-size: larger;">Operation Level:</label>
                                    </div>

                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <br>
                                        <h3 class="color-branco labelcadastro">Turn Over in the Last Three Years</h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">

                                        <select style="font-size: small;height: 4rem !important;" required name="ano1" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano3" style=" font-size: larger;">N° of sellers:</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="ano2" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano2" style=" font-size: larger;">N° of sellers:</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="ano3" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano1" style=" font-size: larger;">N° of sellers:</label>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <br>
                                        <h3 class="color-branco labelcadastro">Total Imports/Purchases</h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="ano11" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano33" style=" font-size: larger;">N° of sellers:</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="ano22" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano22" style=" font-size: larger;">N° of sellers:</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4rem !important;" required name="ano33" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano11" style=" font-size: larger;">N° of sellers:</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="text-align: center;">
                                        <button style="width: 118px;font-size: small;" type="submit" class="btn btn-primary login-btn inputtamanho" value="NETX" name="savedistribuidor">NEXT</button>
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
        const anoAtual = new Date().getFullYear();

        const labelAno1 = document.getElementById('ano1');
        labelAno1.textContent = anoAtual - 1;

        const labelAno2 = document.getElementById('ano2');
        labelAno2.textContent = anoAtual - 2;

        const labelAno3 = document.getElementById('ano3');
        labelAno3.textContent = anoAtual - 3;

        const labelAno11 = document.getElementById('ano11');
        labelAno11.textContent = anoAtual - 1;

        const labelAno22 = document.getElementById('ano22');
        labelAno22.textContent = anoAtual - 2;

        const labelAno33 = document.getElementById('ano33');
        labelAno33.textContent = anoAtual - 3;
    </script>
</body>

</html>