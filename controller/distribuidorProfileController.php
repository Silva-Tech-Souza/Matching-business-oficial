<?php 
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
  session_start();

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}else{

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}

if ($_POST["savedistribuidor"] != "") {

     $id =  $_SESSION["id"]."<br>";
     $numEmpregados = $_POST["numEmpregados"];
     $numSellers = $_POST["numSellers1"];
     $year = $_POST["year"];
     $nivelOperacao = $_POST["nivelOperacao"];
    

    $labelano1 = $_POST["labelfob1"];
    $labelano2 = $_POST["labelfob2"];
    $labelano3 = $_POST["labelfob3"];
    
    $ano1 = $_POST["ano1"];
    $ano2 = $_POST["ano2"];
    $ano3 = $_POST["ano3"];

    $ano11 = $_POST["ano11"];
    $ano22 = $_POST["ano22"];
    $ano33 = $_POST["ano33"];

    
    $distributorProfile = new UserClients($dbh);
  
    $distributorProfile->setAnoFundacao($year);
    $distributorProfile->setNumEmpregados($numEmpregados);
    $distributorProfile->setNumVendedores($numSellers);
    $distributorProfile->setNivelOperacao($nivelOperacao);
    
    $distributorProfile->setidClient($id);

    $distributorProfile->setFob_1Y($labelano1); 
    $distributorProfile->setFob_2Y($labelano2); 
    $distributorProfile->setFob_3Y( $labelano3);

    $distributorProfile->setFobImports_1Y($labelano1); 
    $distributorProfile->setFobImports_2Y($labelano2); 
    $distributorProfile->setFobImports_3Y( $labelano3);

    $distributorProfile->setVol_1Y($ano1); 
    $distributorProfile->setVol_2Y($ano2); 
    $distributorProfile->setVol_3Y($ano3);

    $distributorProfile->setVolImports_1Y($ano11); 
    $distributorProfile->setVolImports_2Y($ano22); 
    $distributorProfile->setVolImports_3Y($ano33);

   $resultsdistributorProfile = $distributorProfile->atualizar("AnoFundacao = :AnoFundacao, NumEmpregados = :NumEmpregados, NumVendedores = :NumVendedores, NivelOperacao = :NivelOperacao, Fob_3Y = :Fob_3Y, Vol_3Y = :Vol_3Y, Fob_2Y = :Fob_2Y, Vol_2Y = :Vol_2Y, Fob_1Y = :Fob_1Y, Vol_1Y = :Vol_1Y, FobImports_3Y = :FobImports_3Y, VolImports_3Y = :VolImports_3Y, FobImports_2Y = :FobImports_2Y, VolImports_2Y = :VolImports_2Y, FobImports_1Y = :FobImports_1Y, VolImports_1Y= :VolImports_1Y  WHERE idClient = :idClient");
    header("Location: ../view/profile.php");

}else{

    header('Location: ../view/login.php');

}
