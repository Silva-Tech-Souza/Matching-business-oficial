<?php
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");
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
<div class="row">
    <div class="col-">
      <h2 class="fs-title">What kind of category?</h2>
    </div>
    <div class="col-sm-12">
        <p class="alinharforcado">Choose the specific category that best matches your search. This will ensure you receive accurate and suitable recommendations.</p>
      </div>
  </div>
<div class="col-sm-12">
    <div class="form-floating">
    <select name="category[]" class=" form-select categmulti border-dark inputtamanho" multiple  id="floatingSelectGrid" aria-label="Floating label select example">
    <option>Select</option>
            <?php
            $sqlpaises = "SELECT * FROM tblBusinessCategory  WHERE idBusiness = :idBusiness";
            $querypaises = $dbh->prepare($sqlpaises);
            $querypaises->bindParam(':idBusiness', $idBusiness, PDO::PARAM_INT);
            $querypaises->execute();
            $resulpaises = $querypaises->fetchAll(PDO::FETCH_OBJ);
            if ($querypaises->rowCount() > 0) {
                foreach ($resulpaises as $rowpaises) { ?>
                    <option <?php if ($rowpaises->idBusinessCategory == 2) {
                                echo "selected";
                            } ?> value="<?php echo $rowpaises->idBusinessCategory; ?>"><?php echo $rowpaises->NmBusinessCategory; ?></option>
            <?php  }
            }
            ?>
        </select>
      
        <label for="floatingSelectGrid">Category:</label>
    </div>
</div>
