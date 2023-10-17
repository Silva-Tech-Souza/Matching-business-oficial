<?php 
if ( session_status() !== PHP_SESSION_ACTIVE )
{
   session_start();
}
if(isset($_SESSION['error'])){
    error_reporting(0);
}

header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Sao_Paulo');

$idbusines = $_GET["q"];

include_once('../../model/classes/tblOperations.php');

$tblOperations1 = new Operations();
$tblOperations1->setidOperation($idbusines);
$resultstblOperations = $tblOperations1->consulta("WHERE idOperation = :idOperation");

if ($tblOperations1 != null) {
    if (is_array($resultstblOperations) || is_object($resultstblOperations)) {
        foreach ($resultstblOperations as $rowoperation) {
        $FlagOperation = $rowoperation->FlagOperation;
            }}
}
if($FlagOperation  != "D"){


?>

<label class="color-branco labelcadastro">What is your business sector? </label>
        <select  class="form-control bordainput inputtamanho selectsize"   onchange="showbusines2(this.value)" id="coreBusiness" name="satellite">
            <option value="0">Select</option>
            <?php 
            
                include_once('../../model/classes/tblBusiness.php');
                $tblBusiness = new Business();
                $resultstblBusiness = $tblBusiness->consulta("WHERE FlagOperation = '0'");
               
               
                if ($tblBusiness != null) {
                    if (is_array($resultstblBusiness) || is_object($resultstblBusiness)) {
                        foreach ($resultstblBusiness as $rowcor) { ?>
                        <option value="<?php echo $rowcor->idBusiness;?>"><?php echo $rowcor->NmBusiness;?></option>
                    <?php }
                }}
            ?>
        </select><br> 
        <?php  } ?>