<?php
include_once('../../model/classes/conexao.php');
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
if(isset($_SESSION['error'])){
    error_reporting(0);
}

date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");

$idbusines2 = $_GET["q"];

include_once('../../model/classes/tblBusiness.php');
$tblBusiness = new Business($dbh);
$tblBusiness ->setidBusiness($idbusines2);
$resultstblBusiness = $tblBusiness->consulta(" WHERE idBusiness = :idBusiness");
if ($tblBusiness != null) {
    if (is_array($resultstblBusiness) || is_object($resultstblBusiness)) {
        foreach ($resultstblBusiness as $rowBusiness) {

        $idBusiness = $rowBusiness->idBusiness;
    }
}}
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
    <select name="category[]"  class=" form-select categmulti border-dark inputtamanho selecttamanho" multiple  id="floatingSelectGrid" aria-label="Floating label select example">
    <option>Select</option>
            <?php
            include_once('../../model/classes/tblBusinessCategory.php');
            $tblBusinessCategory = new BusinessCategory($dbh);
            $tblBusinessCategory->setidBusiness($idBusiness);
            $resultstblBusinessCategory = $tblBusinessCategory->consulta(" WHERE idBusiness = :idBusiness");
            if ($tblBusinessCategory != null) {
            
                    foreach ($resultstblBusinessCategory as $rowBusiness) { ?>
                    <option <?php if ($rowBusiness->idBusinessCategory == 2) {
                                echo "selected";
                            } ?> value="<?php echo $rowBusiness->idBusinessCategory; ?>"><?php echo $rowBusiness->NmBusinessCategory; ?></option>
            <?php  }
            }
            ?>
        </select>
      
        <label for="floatingSelectGrid">Category:</label>
    </div>
</div>
