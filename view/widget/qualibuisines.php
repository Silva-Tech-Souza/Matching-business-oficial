<?php 
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
include('../../../conexao/conexao.php');

$idbusines = $_GET["q"];
$sqloperacao = "SELECT * from tblOperations WHERE idOperation = :idOperation";
$queryoperacao = $dbh->prepare($sqloperacao);
$queryoperacao->bindParam(':idOperation', $idbusines, PDO::PARAM_INT);
$queryoperacao->execute();
$resultsoperacao = $queryoperacao->fetchAll(PDO::FETCH_OBJ);
if ($queryoperacao->rowCount() > 0) {
    foreach ($resultsoperacao as $rowoperacao) { 
        $FlagOperation = $rowoperacao->FlagOperation;
            }
}
if($FlagOperation  != "D"){


?>

<label>Core Business: </label>
        <select  class="form-control bordainput"   onchange="showbusines2(this.value)" id="coreBusiness" name="coreBusiness">
            <option value="0">Select</option>
            <?php 
                $sqlcorbusiness = "SELECT * from tblBusiness WHERE FlagOperation = '0'";
                $querycorbusiness = $dbh->prepare($sqlcorbusiness);
                $querycorbusiness->execute();
                $resultscorbusiness = $querycorbusiness->fetchAll(PDO::FETCH_OBJ);
                if ($querycorbusiness->rowCount() > 0) {
                    foreach ($resultscorbusiness as $rowcor) { ?>
                        <option value="<?php echo $rowcor->idBusiness;?>"><?php echo $rowcor->NmBusiness;?></option>
                    <?php }
                }
            ?>
        </select> 
        <?php  } ?>