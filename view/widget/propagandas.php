<?php
include_once('../../model/classes/conexao.php');
include_once("../../model/classes/tblEmpresas.php");
include_once('../../model/classes/tblUserClients.php');

$empresas = new Empresas($dbh);
$resultsempresas = $empresas->consulta("LIMIT 12");
if ($resultsempresas != null) {
    
    foreach ($resultsempresas as $rowempresas) {
        $colab1 = $rowempresas->colab1 ;
        $userClients2 = new UserClients($dbh);
        $userClients2->setidClient($colab1);
        $results2 = $userClients2->consulta("WHERE idClient = :idClient");
        if ($results2 != null) {
            foreach ($results2 as $row) {
               
                $imgperfilcolab1 = $row->PersonalUserPicturePath;
                $imgcapacolab1 = $row->LogoPicturePath;
          
            }
        }
?>      <a href="empresa.php?idtax=<?php echo  $rowempresas->taxid;?>">
     <div class="row sponsoredrow sponsored-item">

            <img src="<?php if($imgperfilcolab1 != ""){echo $imgperfilcolab1;}else{echo "assets/img/logo.png";}?>" class="sponsoredimg" style="min-height: 100px;     object-fit: cover;    max-height: 100px;padding: 0px;margin: 0px;box-shadow: 2px 2px 1px #00000042;">

            <div class="col-lg-7 col-sm-4 col-md-4 col-xs-4">
                <h2 style="white-space: pre-line;     color: #1d1d1d;"><?php echo $rowempresas->nome; ?></h2>
                <p style=" font-size: larger;     color: #1d1d1d;">Descrição das empresas ficará aqui.</p>
            </div>
        </div>
</a>
       
<?php }
} ?>