<?php 
include_once('../model/classes/conexao.php');
if ($_POST["savedistribuidor"] != "") {

     $id =  $_SESSION["id"]."<br>";
      $numEmpregados = $_POST["numEmpregados"];
     $rangeValues = $_POST["rangeValues"];
    $year = substr($_POST["year"], 0, 4);
     $nivelOperacao = $_POST["nivelOperacao"];
    
    
    $ano1 = $_POST["ano1"];
    $ano2 = $_POST["ano2"];
    $ano3 = $_POST["ano3"];

    include_once('../model/classes/tblUserClients.php');
    $distributorProfile = new UserClients($dbh);
  
    $distributorProfile->setAnoFundacao($year);
    $distributorProfile->setNumEmpregados($numEmpregados);
    $distributorProfile->setNumVendedores($ano3);
    $distributorProfile->setNivelOperacao($nivelOperacao);
    $distributorProfile->setidClient($id);
    $distributorProfile->setFob_1Y("2020"); 
    $distributorProfile->setFob_2Y("2021"); 
    $distributorProfile->setFob_3Y("2022");

    $distributorProfile->setVol_1Y($ano1); 
    $distributorProfile->setVol_2Y($ano2); 
    $distributorProfile->setVol_3Y($ano3);

   $resultsdistributorProfile = $distributorProfile->atualizar("AnoFundacao = :AnoFundacao, NumEmpregados = :NumEmpregados, NumVendedores = :NumVendedores, NivelOperacao = :NivelOperacao, Fob_3Y = :Fob_3Y, Vol_3Y = :Vol_3Y, Fob_2Y = :Fob_2Y, Vol_2Y = :Vol_2Y, Fob_1Y = :Fob_1Y, Vol_1Y = :Vol_1Y WHERE idClient = :idClient");
    header("Location: ../view/profile.php");
}else{

}
