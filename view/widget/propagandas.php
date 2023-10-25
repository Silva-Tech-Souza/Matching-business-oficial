<?php
include_once("../../model/classes/tblEmpresas.php");
echo "teste";
$empresas = new Empresas();
$resultsempresas = $empresas->consulta("LIMIT 3");
if ($resultsempresas != null) {
    foreach ($resultsempresas as $rowempresas) {
?>
        <div class="row sponsoredrow sponsored-item">

            <img src="assets/img/logo.png" class="sponsoredimg">

            <div class="col-lg-7 col-sm-4 col-md-4 col-xs-4">
                <h2 style="white-space: pre-line;"><?php echo $rowempresas->nome; ?></h2>
                <p style=" font-size: larger;">Descrição das empresas ficará aqui.</p>
            </div>
        </div>
<?php }
} ?>
