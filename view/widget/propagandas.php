<?php
include_once('../../model/classes/conexao.php');
include_once("../../model/classes/tblEmpresas.php");
include_once('../../model/classes/tblUserClients.php');

$empresas = new Empresas($dbh);
$resultsempresas = $empresas->consulta("LIMIT 12");
if ($resultsempresas != null) {
 ;
    foreach ($resultsempresas as $rowempresas) {
        $count = 1;
        $colab1 = $rowempresas->colab1 ;
        if($rowempresas->colab2 != "0"){
           $count =2;
        }
        if($rowempresas->colab3 != "0"){
            $count =3;
        }
        if($rowempresas->colab4 != "0"){
            $count =4;
        }
        if($rowempresas->colab5 != "0"){
            $count =5;
        }
        $userClients2 = new UserClients($dbh);
        $userClients2->setidClient($colab1);
        $results2 = $userClients2->consulta("WHERE idClient = :idClient");
        if ($results2 != null) {
            foreach ($results2 as $row) {
               
                $imgperfilcolab1 = $row->PersonalUserPicturePath;
                $imgcapacolab1 = $row->LogoPicturePath;
                $CoreBusinessId = $row->CoreBusinessId;
                $SatBusinessId = $row->SatBusinessId;
            }
        }

        
include_once('../../model/classes/tblOperations.php');
$operationspropa = new Operations($dbh);
$operationspropa->setidOperation($CoreBusinessId);
$resultsoperationprop = $operationspropa->consulta("WHERE idOperation = :idOperation");
if ($resultsoperationprop != null) {
  foreach ($resultsoperationprop as $rowoperation) {
    $NmBusinesspropa =  $rowoperation->NmOperation;
  }
}



include_once('../../model/classes/tblBusiness.php');
$business = new Business($dbh);
$business->setidBusiness($SatBusinessId);
$resultsbusiness = $business->consulta("WHERE idBusiness = :idBusiness");
if ($resultsbusiness != null) {
  foreach ($resultsbusiness as $rowbusiness) {
    $NmBusinesscor =  $rowbusiness->NmBusiness;
  }
}
?>      <a href="empresa.php?idtax=<?php echo  $rowempresas->taxid;?>">
     <div class="row sponsoredrow sponsored-item">

            <img src="<?php if($imgperfilcolab1 != ""){echo $imgperfilcolab1;}else{echo "assets/img/logo.png";}?>" class="sponsoredimg" style="width: 100px;
    min-height: 100px;
    object-fit: cover;
    max-height: 100px;
    padding: 0px;
    margin: 0px;
    box-shadow: 2px 2px 1px #00000042;
    height: 100px;">

            <div class="col-lg-7 col-sm-4 col-md-4 col-xs-4">
                <h2 style="white-space: pre-line; margin-bottom: 0; color: #1d1d1d;"><?php echo $rowempresas->nome; ?></h2>
                <p style=" font-size: larger;margin-bottom: 0;color: #1d1d1d;"><?php echo $NmBusinesspropa; ?></p>
                <p style=" font-size: larger;margin-bottom: 0;color: #1d1d1d;">BusinessId: <?php echo $NmBusinesscor; ?></p>
                <p style=" font-size: larger;margin-bottom: 0;color: #1d1d1d;">Colaboradores: <?php echo $count; ?></p>
                
            </div>
        </div>
</a>
       
<?php }
} ?>