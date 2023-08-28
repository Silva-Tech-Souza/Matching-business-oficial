<?php

    $txtpesquisa = $_GET["txtpesquisa"];
    $txtdigitado = $_GET["txtdigitado"];
    $txtdigitado2 = $_POST["txtdigitado"];
    if ($txtdigitado2 != "") {
    $txtpesquisa = "";
    $txtdigitado = $_POST["txtdigitado"];
    header("Location: searchPage.php?txtdigitado=$txtdigitado");
    $_POST["txtdigitado"] = "";
    }
    if ($txtdigitado2 === "") {
    $txtpesquisa = "";
    $txtdigitado = "";
    header("Location: searchPage.php");
    }

?>