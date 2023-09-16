<?
header("Access-Control-Allow-Origin: *");
?>
<div id="add_perfil" class="modal custom-modal fade mt-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title txtnomeperfil">Edit profile</h5>
                <button type="button" class="close rounded-2 border-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="txtinput">Profile picture:</label>
                                <input type="file" name="user-image" id="user-image" class="form-control file-upload-input" accept="image/*">
                            </div>
                        </div>


                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput">Name:</label>
                                <input class="form-control bordainput" value="<?php echo $FirstName; ?>" autocomplete="off" name="nome" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput">LastName:</label>
                                <input class="form-control bordainput" required value="<?php echo $LastName; ?>" autocomplete="off" name="lastname" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput">Job tittle:</label>
                                <input class="form-control bordainput" required value="<?php echo $jobtitle; ?>" autocomplete="off" name="jobtitle" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput">Company name:</label>
                                <input class="form-control bordainput" required value="<?php echo $companyname; ?>" autocomplete="off" name="conpany" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>
                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput">Core Business:</label>

                                <select class="form-control bordainput" onchange="showbusines(this.value)" name="business">

                                    <?php
/*

                                    include_once('../../model/classes/tblOperations.php');
                                    $operations = new Operations();
                                    $resultsoperation = $operations->consulta("");

                                    if ($operations != null) {
                                        foreach ($resultsoperation as $row) { ?>
                                            <option <?php if ($row->NmOperation ==  $NmBusiness) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $row->idOperation; ?>"><?php echo $row->NmOperation; ?></option>
                                    <?php     }
                                    }*/
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") { ?>
                            <div class="col-sm-6 mt-4" id="refHint">
                                <div class="form-group">
                                    <label class="txtinput">Business:</label>
                                    <select onchange="showbusines2(this.value)" class="form-control bordainput" id="coreBusiness" name="coreBusiness">
                                        <?php
                                      /*  include_once('../../model/classes/tblBusiness.php');
                                        $bussiness = new Business();

                                        $resultsbusiness = $bussiness->consulta("WHERE FlagOperation = '0' AND FlagOperation != 'D'");


                                        if ($resultsbusiness != null) {
                                            foreach ($resultsbusiness as $rowcor) { ?>
                                                <option <?php if ($rowcor->NmBusiness ==  $NmBusinesscor) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $rowcor->idBusiness; ?>"><?php echo $rowcor->NmBusiness; ?></option>
                                        <?php }
                                        }*/
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col mt-4" id="refHint2">
                                <label>Business Category:</label>
                                <select name="satellite" class="form-control bordainput">

                                    <?php
/*
                                    include_once('../../model/classes/tblBusiness.php');
                                    $bussinesscategory = new BusinessCategory;
                                    $bussinesscategory->setidBusinessCategory($idoperation);
                                    $resultsbussinesscategory = $bussinesscategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

                                   
                                    if ($resultsbussinesscategory != null) {
                                        foreach ($resultsbussinesscategory as $rowcor2) { ?>
                                            <option value="<?php echo $rowcor2->idBusinessCategory; ?>"><?php echo $rowcor2->NmBusinessCategory; ?></option>
                                    <?php }
                                    }*/
                                    ?>
                                </select>
                            </div>


                        <?php }  ?>
                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput">Description:</label>
                                <textarea class="form-control bordainput" name="descricao" type="text"><?php echo $descricao; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section mt-4">
                        <button type="submit" name="add_orcamento" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>