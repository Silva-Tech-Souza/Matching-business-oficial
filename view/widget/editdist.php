<?
include_once('../../model/classes/conexao.php');
header("Access-Control-Allow-Origin: *");
?>
<div id="edit_dist" class="modal custom-modal fade mt-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title txtnomeperfil">Edit Distributor</h5>
                <button type="button" class="close rounded-2 border-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="../controller/profileController.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                            <input type="hidden" name="labelfob1" value="<?php echo $Fob3; ?>">
                                <input type="hidden" name="labelfob2" value="<?php echo $Fob2; ?>">
                                <input type="hidden" name="labelfob3" value="<?php echo $Fob1; ?>">
                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="numEmpregados" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblNumEmpregados.php');
                                            $tblNumEmpregados = new NumEmpregados($dbh);
                                            $resultsNumEmpregados = $tblNumEmpregados->consulta("ORDER BY ValorInicial ASC");
                                            if ($resultsNumEmpregados != null) {
                                                foreach ($resultsNumEmpregados as $rowemply) {
                                            ?>
                                                    <option <?php if($rowemply->DescNumEmpregados == $numEmpregados){echo "selected";}?> value="<?php echo $rowemply->idNumEmpregados; ?>"><?php echo $rowemply->DescNumEmpregados; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" style=" font-size: larger;">N° of employees:</label>
                                    </div>
                                </div>
                               <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="rangeValues" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                        <?php
                                            include_once('../model/classes/tblNumEmpregados.php');
                                            $tblNumEmpregados = new NumEmpregados($dbh);
                                            $resultsNumEmpregados = $tblNumEmpregados->consulta("ORDER BY ValorInicial ASC");
                                            if ($resultsNumEmpregados != null) {
                                                foreach ($resultsNumEmpregados as $rowemply) {
                                            ?>
                                                    <option <?php if($rowemply->DescNumEmpregados == $numVendedoresr){echo "selected";}?> value="<?php echo $rowemply->idNumEmpregados; ?>"><?php echo $rowemply->DescNumEmpregados; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" style=" font-size: larger;">Total Sales Rep:</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <input style="font-size: small;height: 4.5rem !important;" required type="date" value="<?php echo $AnoFundacao;?>" id="yearInput" name="year" min="1900" max="2024" class="form-control inputstyle border-dark inputtamanho">
                                        <label for="yearInput" style=" font-size: larger;">Founded in:</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating">

                                        <select style="font-size: small;height: 4.5rem !important;" required name="nivelOperacao" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblNivelOperacao.php');
                                            $tblNivelOperacao = new NivelOperacao($dbh);
                                            $resultstblNivelOperacao = $tblNivelOperacao->consulta("");
                                            if ($resultstblNivelOperacao != null) {
                                                foreach ($resultstblNivelOperacao as $rowoperation) {
                                            ?>
                                                    <option value="<?php echo $rowoperation->idNivelOperacao; ?>"><?php echo $rowoperation->DescNivelOperacao; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" style=" font-size: larger;">Operation Level:</label>
                                    </div>

                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <br>
                                        <h3 class="color-preto labelcadastro">Turn Over in the Last Three Years</h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="ano1" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option <?php if($rowsallers->DescricaoRangeValue == $Vol1){echo "selected";}?> value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano3" style=" font-size: larger;"><?php echo $Fob3; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="ano2" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option <?php if($rowsallers->DescricaoRangeValue == $Vol2){echo "selected";}?> value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano2" style=" font-size: larger;"><?php echo $Fob2; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="ano3" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option <?php if($rowsallers->DescricaoRangeValue == $Vol3){echo "selected";}?> value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano1" style=" font-size: larger;"><?php echo $Fob1; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <br>
                                        <h3 class="color-preto labelcadastro">Total Imports/Purchases</h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="ano11" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option <?php if($rowsallers->DescricaoRangeValue == $VolImports_1Y){echo "selected";}?> value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano3" style=" font-size: larger;"><?php echo $Fob3; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="ano22" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option <?php if($rowsallers->DescricaoRangeValue == $VolImports_2Y){echo "selected";}?> value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano2" style=" font-size: larger;"><?php echo $Fob2; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-floating mb-3">
                                        <select style="font-size: small;height: 4.5rem !important;" required name="ano33" class=" form-select  border-dark inputtamanho" id="floatingSelectGrid" aria-label="Floating label select example">
                                            <?php
                                            include_once('../model/classes/tblRangeValues.php');
                                            $tblRangeValues = new RangeValues($dbh);
                                            $resultstblRangeValues = $tblRangeValues->consulta("");
                                            if ($resultstblRangeValues != null) {
                                                foreach ($resultstblRangeValues as $rowsallers) {
                                            ?>
                                                    <option <?php if($rowsallers->DescricaoRangeValue == $VolImports_3Y){echo "selected";}?> value="<?php echo $rowsallers->idlRangeValue; ?>"><?php echo $rowsallers->DescricaoRangeValue; ?></option>
                                            <?php  }
                                            } ?>
                                        </select>
                                        <label for="floatingSelectGrid" id="ano1" style=" font-size: larger;"><?php echo $Fob1; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="text-align: center;">
                                        <button  style="width: 118px;font-size: small;" type="submit" class="btn btn-primary login-btn inputtamanho" value="NETX" name="EditDistribuidor">NEXT</button>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>