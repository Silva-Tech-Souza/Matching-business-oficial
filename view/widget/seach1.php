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
    $_SESSION["FlagOperation"] = $FlagOperation = $rowoperacao->FlagOperation;
  }
}

if ($FlagOperation  != "D") {

  if ($_SESSION["tipoflag"] == "B" && $FlagOperation  == "B") { ?>
    <div class="row">
      <div class="col-12">
        <h2 class="fs-title">What type of market?</h2>
      </div>
      <div class="col-sm-12">
        <p class="alinharforcado">Specify the market or industry you're interested in. This will help us narrow down relevant options for you.</p>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="form-floating">
        <select name="business[]" class=" form-select categmulti border-dark inputtamanho" multiple id="floatingSelectGrid" aria-label="Floating label select example">
          <option>Select</option>
          <?php
          $sqlpaises = "SELECT * FROM tblBusiness  WHERE FlagOperation = '0'";
          $querypaises = $dbh->prepare($sqlpaises);
          $querypaises->execute();
          $resulpaises = $querypaises->fetchAll(PDO::FETCH_OBJ);
          if ($querypaises->rowCount() > 0) {
            foreach ($resulpaises as $rowpaises) { ?>
              <option value="<?php echo $rowpaises->idBusiness; ?>"><?php echo $rowpaises->NmBusiness; ?></option>
          <?php  }
          }
          ?>
        </select>
        <label for="floatingSelectGrid">Define type Service:</label>
      </div>
    </div>
  <?php } else { ?>

    <div class="row">
      <div class="col-12">
        <h2 class="fs-title">What type of market?</h2>
      </div>
      <div class="col-sm-12">
        <p class="alinharforcado">Specify the market or industry you're interested in. This will help us narrow down relevant options for you.</p>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="form-floating">
        <select name="business" onchange="showcategoria(this.value)" class="form-select border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
          <option>Select</option>
          <?php
          $sqlpaises = "SELECT * FROM tblBusiness  WHERE FlagOperation = '0'";
          $querypaises = $dbh->prepare($sqlpaises);
          $querypaises->execute();
          $resulpaises = $querypaises->fetchAll(PDO::FETCH_OBJ);
          if ($querypaises->rowCount() > 0) {
            foreach ($resulpaises as $rowpaises) { ?>
              <option value="<?php echo $rowpaises->idBusiness; ?>"><?php echo $rowpaises->NmBusiness; ?></option>
          <?php  }
          }
          ?>
        </select>
        <label for="floatingSelectGrid">Define type Service:</label>
      </div>
    </div>
  <?php } ?>
<?php } ?>