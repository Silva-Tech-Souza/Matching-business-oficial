<?php
include_once('../../model/classes/conexao.php');

if(isset($_SESSION['error'])){
    error_reporting(0);
}

date_default_timezone_set('America/Sao_Paulo');


$idbusines = $_GET["q"];
include_once('../../model/classes/tblOperations.php');
$tblOperations1 = new Operations($dbh);
$tblOperations1->setidOperation($idbusines);
$resultstblOperations = $tblOperations1->consulta("WHERE idOperation = :idOperation");

if ($tblOperations1 != null) {
  foreach ($resultstblOperations as $rowoperation) {
    $_SESSION["FlagOperation"] = $FlagOperation = $rowoperation->FlagOperation;
  }
} ?>
<input type="hidden" name="flagtipo" value="<?php echo  $_SESSION["FlagOperation"]; ?>">
<?php if ($FlagOperation  != "D") {

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
        <select name="business[]" required class=" form-select categmulti border-dark inputtamanho selecttamanho selectsp2" multiple='multiple' id="floatingSelectGrid" aria-label="Floating label select example">
          <option>Select</option>
          <?php
          include_once('../../model/classes/tblBusiness.php');
          $tblBusiness = new Business($dbh);
          $resultstblBusiness = $tblBusiness->consulta("WHERE FlagOperation = '0'");
          if ($tblBusiness != null) {
            if (is_array($resultstblBusiness) || is_object($resultstblBusiness)) {
              foreach ($resultstblBusiness as $rowBusiness) { ?>
                <option value="<?php echo $rowBusiness->idBusiness; ?>"><?php echo $rowBusiness->NmBusiness; ?></option>
          <?php  }
            }
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
        <select name="business" required onchange="showcategoria(this.value)" class="form-select border-dark inputtamanho selectsp2" id="floatingSelectGrid" aria-label="Floating label select example">
          <option>Select</option>
          <?php
          include_once('../../model/classes/tblBusiness.php');
          $tblBusiness = new Business($dbh);
          $resultstblBusiness = $tblBusiness->consulta("WHERE FlagOperation = '0'");
          if ($tblBusiness != null) {
            if (is_array($resultstblBusiness) || is_object($resultstblBusiness)) {
              foreach ($resultstblBusiness as $rowBusiness) {  ?>
                <option value="<?php echo $rowBusiness->idBusiness; ?>"><?php echo $rowBusiness->NmBusiness; ?></option>
          <?php  }
            }
          }
          ?>
        </select>
        <label for="floatingSelectGrid">Define type Service:</label>
      </div>
    </div>
  <?php } ?>
<?php 
}?>

