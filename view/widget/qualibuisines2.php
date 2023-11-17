<?php
include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tblBusiness.php');
include_once('../../model/classes/tblBusinessCategory.php');
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
if(isset($_SESSION['error'])){
    error_reporting(0);
}

header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Sao_Paulo');

$idbusines2 = $_GET["q"];

$tblBusiness1 = new Business($dbh);
$tblBusiness1->setidBusiness($idbusines2);
$resultstblBusiness1 = $tblBusiness1->consulta("WHERE idBusiness = :idBusiness");


if ($tblBusiness1 != null) {
    if (is_array($resultstblBusiness1) || is_object($resultstblBusiness1)) {
        foreach ($resultstblBusiness1 as $rowcor) {
            $idBusiness = $rowcor->idBusiness;
        }
    }
}
?>
<label class="color-branco labelcadastro">What is your business category? </label>
<select class="form-control bordainput inputtamanho selectsize" name="category">
    <option value="0">Select</option>
    <?php

$tblBusinessCategory = new BusinessCategory($dbh);
$tblBusinessCategory->setidBusiness($idBusiness);
$resultstblBusinessCategory = $tblBusinessCategory->consulta("WHERE idBusiness = :idBusiness ORDER BY NmBusinessCategory ASC");
    
if ($tblBusinessCategory != null) {
    if (is_array($resultstblBusinessCategory) || is_object($resultstblBusinessCategory)) {
        foreach ($resultstblBusinessCategory as $rowcor) { ?>
            <option value="<?php echo $rowcor->idBusinessCategory; ?>"><?php echo $rowcor->NmBusinessCategory; ?></option>
    <?php }}
    }
    ?>
</select>