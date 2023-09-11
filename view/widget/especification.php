<?php
session_start();
//error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

$idbusines = $_GET["q"];
include_once('../../model/classes/tblOperations.php');
$tblOperations1 = new Operations();
$tblOperations1->setidOperation($idbusines);
$resultstblOperations = $tblOperations1->consulta("WHERE idOperation = :idOperation");
if ($tblOperations1 != null) {
    foreach ($resultstblOperations as $rowoperation) {
        $_SESSION["FlagOperation"] = $FlagOperation = $rowoperation->FlagOperation;
    }
}
if ($_SESSION["FlagOperation"] == "A" || $_SESSION["FlagOperation"] == "C") {
    $cabexalho = "Refine your search by specifying the exact product you're seeking. This step ensures that the results we provide are tailored to match your precise product requirements. By sharing detailed information about the product you have in mind, you enhance the accuracy and relevance of the search outcomes.";
    $titulo = "Want to search for a specific product?";
    $subtitulo = "Use this field to specify the exact product you are searching for. Providing details will help us tailor your search results to match your desired product.";
} else if ($_SESSION["FlagOperation"] == "B") {
    $cabexalho = "Tailor your distributor search by outlining your preferences and expectations. This step ensures that the distributors we recommend align closely with your business requirements. By providing specific details about your desired distributor profile, you empower our system to present you with the most relevant and fitting options.";
    $titulo = "Define the ideal profile of your distributor";
    $subtitulo = "Describe the characteristics and qualities you are seeking in a distributor. This information will guide us in finding distributors that best fit your preferences.";
} else {
    $cabexalho = "Define your search by detailing the specific service you're in need of. This crucial step helps us match you with service providers that offer exactly what you're seeking. By sharing clear and concise information about the type of service required, you ensure that the search results align perfectly with your service-related goals.";
    $titulo = "What kind of service are you looking for?";
    $subtitulo = "Informe-nos sobre o tipo específico de serviço de que necessita. Compartilhar essas informações nos permitirá identificar provedores de serviços que atendam às suas necessidades.";
}
?>
<div class="row">
    <div class="col-12">
        <h4 class="alinharforcado"><?php echo  $cabexalho; ?></h4><br>
    </div>
    <div class="col-12">
        <h2 class="fs-title"><?php echo  $titulo; ?>:</h2>
    </div>
    <div class="col-sm-12">
        <p class="alinharforcado"><?php echo $subtitulo; ?></p>
    </div>
</div>
<div class="row">
    <?php if ($_SESSION["FlagOperation"] == "A" || $_SESSION["FlagOperation"] == "C") { ?>
        <div class="col-sm-12">
            <div class="form-floating mb-3 multi-search-filter" onclick="Array.from(this.children).find(n=>n.tagName==='INPUT').focus()">

                <input type="text" class="form-control inputstyle border-dark inputtamanhoarea" onkeyup="multiSearchKeyup(this)">
                <input type="hidden" id="keywords-hiddens" name="produtostags" value="">

            </div>
        </div>
    <?php } else if ($_SESSION["FlagOperation"] == "B") { ?>
        <div class="col-sm-12">
            <div class="form-floating mb-3">
                <select required name="numempregados" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                    <?php
                    include_once('../../model/classes/tblNumEmpregados.php');
                    $tblNumEmpregados = new NumEmpregados();
                    $resultsNumEmpregados = $tblNumEmpregados->consulta("");
                    if ($tblNumEmpregados != null) {
                        foreach ($resultsNumEmpregados as $rowemply) {
                    ?>
                            <option value="<?php echo $rowemply->idNumEmpregados; ?>"><?php echo $rowemply->DescNumEmpregados; ?></option>
                    <?php  }
                    } ?>
                </select>
                <label for="floatingSelectGrid">N° of employees:</label>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-floating mb-3">
                <select required name="rangevalues" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                    <?php
                    include_once('../../model/classes/tblRangeValues.php');
                    $tblRangeValues = new RangeValues();
                    $resultsRangeValues = $tblRangeValues->consulta("");
                    if ($tblRangeValues != null) {
                        foreach ($resultsRangeValues as $rowsallers) {
                    ?>
                            <option value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                    <?php  }
                    } ?>
                </select>
                <label for="floatingSelectGrid">N° of sellers:</label>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-floating mb-3">
                <input required type="date" id="yearInput" name="year" min="1900" max="2024" class="form-control inputstyle border-dark inputtamanho">
                <label for="yearInput">Founded in:</label>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-floating">

                <select required name="niveloperacao" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                    <?php
                    include_once('../../model/classes/tblNivelOperacao.php');
                    $tblNivelOperacao = new NivelOperacao();
                    $resultstblNivelOperacao = $tblNivelOperacao->consulta("");
                    if ($resultstblNivelOperacao != null) {
                        foreach ($resultstblNivelOperacao as $rowoperation) {
                    ?>
                            <option value="<?php echo $rowoperation->idNivelOperacao; ?>"><?php echo $rowoperation->DescNivelOperacao; ?></option>
                    <?php  }
                    } ?>
                </select>
                <label for="floatingSelectGrid">Operation Level:</label>
            </div>
        <?php } else { ?>
            <div class="col-sm-12">
                <div class="form-floating mb-3 multi-search-filter" onclick="Array.from(this.children).find(n=>n.tagName==='INPUT').focus()">

                    <input type="text" class="form-control inputstyle border-dark inputtamanhoarea" onkeyup="multiSearchKeyup(this)">
                    <input type="hidden" id="keywords-hiddens" name="servicostags" value="">

                </div>
            </div>
        <?php } ?>
        </div>