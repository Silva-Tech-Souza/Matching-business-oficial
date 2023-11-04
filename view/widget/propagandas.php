<?php
include_once('../../model/classes/conexao.php');
include_once("../../model/classes/tblEmpresas.php");

$empresas = new Empresasview($dbh);
$resultsempresas = $empresas->consulta("LIMIT 12");
if ($resultsempresas != null) {
    foreach ($resultsempresas as $rowempresas) {
?>
        <div class="row sponsoredrow sponsored-item">

            <img src="<?php if($rowempresas->fotoperfil != ""){echo $rowempresas->fotoperfil;}else{echo "assets/img/logo.png";}?>" class="sponsoredimg" style=" padding: 0px;margin: 0px;box-shadow: 2px 2px 1px #00000042;">

            <div class="col-lg-7 col-sm-4 col-md-4 col-xs-4">
                <h2 style="white-space: pre-line;"><?php echo $rowempresas->nome; ?></h2>
                <p style=" font-size: larger;">Descrição das empresas ficará aqui.</p>
            </div>
        </div>
<?php }
} ?>