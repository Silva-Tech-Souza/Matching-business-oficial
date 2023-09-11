<?php 
session_start();
if ($_POST["savedistribuidor"] != "") {

    $id =  $_SESSION["id"];
    $numEmpregados = $_POST["numEmpregados"];
    $rangeValues = $_POST["rangeValues"];
    $year = $_POST["year"];
    $nivelOperacao = $_POST["nivelOperacao"];
    $ano1 = $_POST["ano1"];
    $ano2 = $_POST["ano2"];
    $ano3 = $_POST["ano3"];

    include_once('../model/classes/tblDistributorProfile.php');
    $distributorProfile = new DistributorProfile();
    $distributorProfile->setidClient($id);
    $distributorProfile->setNumEmpregados($numEmpregados);
    $distributorProfile->setNumVendedores($rangeValues);
    $distributorProfile->setAnoFundacao($year);
    $distributorProfile->setNivelOperacao($nivelOperacao);

    $distributorProfile->setFob_1Y("2020"); 
    $distributorProfile->setFob_2Y("2021"); 
    $distributorProfile->setFob_3Y("2022");

    $distributorProfile->setVol_1Y($ano1); 
    $distributorProfile->setVol_2Y($ano2); 
    $distributorProfile->setVol_3Y($ano3);

    $resultsdistributorProfile = $distributorProfile->cadastrar();
    header("Location: ../view/home.php");
}else{
    echo "teste";
}

?>