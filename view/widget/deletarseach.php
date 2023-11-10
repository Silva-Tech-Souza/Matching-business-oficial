<?php
include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tblSearch.php');
include_once('../../model/classes/tblSearchBusiness.php');
include_once('../../model/classes/tblSearchCategory.php');
include_once('../../model/classes/tblSearchCountry.php');
include_once('../../model/classes/tblSearchEspecificationTag.php');
include_once('../../model/classes/tblSearchSpecification.php');

$idseach = $_GET["idseach"];

$search = new Search($dbh);
$searchBussiness = new SearchBusiness($dbh);
$searchCategory = new SearchCategory($dbh);
$searchCountry = new SearchCountry($dbh);
$searchspecification = new SearchSpecification($dbh);

$search->setidSearch($idseach);
$searchBussiness->setidSearch($idseach);
$searchCategory->setidSearch($idseach);
$searchCountry->setidSearch($idseach);
$searchspecification->setidSearch($idseach);

$search->deletar(" WHERE idSearch = :idSearch");
$searchBussiness->deletar(" WHERE idSearch = :idSearch");
$searchCategory->deletar(" WHERE idSearch = :idSearch");
$searchCountry->deletar(" WHERE idSearch = :idSearch");
$searchspecification->deletar(" WHERE idSearch = :idSearch");


header("Location: ../listcompani.php?text=mysp#");
?>