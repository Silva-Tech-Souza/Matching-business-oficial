<?php 
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
include('../../../conexao/conexao.php');
 
$idbusines2 = $_GET["q"];
$sqloperacao2 = "SELECT * from tblBusiness WHERE idBusiness = :idBusiness";
$sqloperacao2 = $dbh->prepare($sqloperacao2);
$sqloperacao2->bindParam(':idBusiness', $idbusines2, PDO::PARAM_INT);
$sqloperacao2->execute();
$resultsoperacao2 = $sqloperacao2->fetchAll(PDO::FETCH_OBJ);
if ($sqloperacao2->rowCount() > 0) {
    foreach ($resultsoperacao2 as $rowoperacao2) { 
        $idBusiness = $rowoperacao2->idBusiness;
            }
}
?>
<label >Satellite Business: </label>
        <select  class="form-control bordainput"  name="satellite">
            <option value="0">Select</option>
            <?php 
                $sqlcorbusiness3 = "SELECT * from tblBusinessCategory WHERE idBusiness = :idBusiness";
                $querycorbusiness3 = $dbh->prepare($sqlcorbusiness3);
                $querycorbusiness3->bindParam(':idBusiness', $idBusiness, PDO::PARAM_INT);
                $querycorbusiness3->execute();
                $resultscorbusiness3 = $querycorbusiness3->fetchAll(PDO::FETCH_OBJ);
                if ($querycorbusiness3->rowCount() > 0) {
                    foreach ($resultscorbusiness3 as $rowcor2) { ?>
                        <option value="<?php echo $rowcor2->idBusinessCategory;?>"><?php echo $rowcor2->NmBusinessCategory;?></option>
                    <?php }
                }
            ?>
        </select>