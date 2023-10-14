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
                <form method="POST" enctype="multipart/form-data" action="../controller/profileController.php">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Profile picture:</label>
                                <input type="file" name="user-image" id="user-image" class="form-control file-upload-input" accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <img id="preview-image" src="" alt="" class="d-flex post-imgvideo-style">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Banner picture:</label>
                                <input type="file" name="banner-image" id="banner-image" class="form-control file-upload-input" accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <img id="preview-image-banner" src="" alt="" class="d-flex post-imgvideo-style">
                            </div>
                        </div>


                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Name:</label>
                                <input class="form-control bordainput sizeinputedit" value="<?php echo $FirstName; ?>" autocomplete="off" name="nome" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Last Name:</label>
                                <input class="form-control bordainput sizeinputedit" required value="<?php echo $LastName; ?>" autocomplete="off" name="lastname" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Job tittle:</label>
                                <input class="form-control bordainput sizeinputedit" required value="<?php echo $jobtitle; ?>" autocomplete="off" name="jobtitle" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Company name:</label>
                                <input class="form-control bordainput sizeinputedit" required value="<?php echo $companyname; ?>" autocomplete="off" name="conpany" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>
                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Core Business:</label>

                                <select class="form-control bordainput sizeinputedit" onchange="showbusines(this.value)" id="coreBusiness" name="coreBusiness">

                                    <?php
                                    

                                    include_once('../model/classes/tblOperations.php');
                                    $operations = new Operations();
                                    $resultsoperation = $operations->consulta("");

                                    if ($operations != null) {
                                        foreach ($resultsoperation as $row) {?>
                                            <option <?php if ($row->NmOperation ==  $NmBusiness) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $row->idOperation; ?>"><?php echo $row->NmOperation; ?></option>
                                    <?php     }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($corebusiness == "1" || $corebusiness == "2" || $corebusiness == "3" || $corebusiness == "4" || $corebusiness == "5") { ?>
                            <div class="col-sm-6 mt-4" id="refHint">
                                <div class="form-group">
                                    <label class="txtinput sizetituloedit">Business:</label>
                                    <select onchange="showbusines2(this.value)" class="form-control bordainput sizeinputedit" id="business" name="business">
                                        <?php
                                        include_once('../model/classes/tblBusiness.php');
                                        $bussiness = new Business();

                                        $resultsbusiness = $bussiness->consulta("WHERE FlagOperation = '0' AND FlagOperation != 'D'");


                                        if ($resultsbusiness != null) {
                                            foreach ($resultsbusiness as $rowcor) { ?>
                                                <option <?php if ($rowcor->NmBusiness ==  $NmBusinesscor) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $rowcor->idBusiness; ?>"><?php echo $rowcor->NmBusiness; ?></option>
                                        <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col mt-4" id="refHint2">
                                <label class="txtinput sizetituloedit">Business Category:</label>
                                <select  class="form-control bordainput sizeinputedit" name="satellite" id="satellite">

                                    <?php
                                    
                                    include_once('../model/classes/tblBusiness.php');
                                    $bussinesscategory = new BusinessCategory;
                                    $bussinesscategory->setidBusinessCategory($idoperation);
                                    $resultsbussinesscategory = $bussinesscategory->consulta("WHERE idBusinessCategory = :idBusinessCategory");

                                   
                                    if ($resultsbussinesscategory != null) {
                                        foreach ($resultsbussinesscategory as $rowcor2) { ?>
                                            <option value="<?php echo $rowcor2->idBusinessCategory; ?>"><?php echo $rowcor2->NmBusinessCategory; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>


                        <?php }  ?>
                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Description:</label>
                                <textarea class="form-control bordainput sizeinputedit" name="descricao" type="text"><?php echo $descricao; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section mt-4">
                        <button type="submit" name="editarPerfil" value="Salvar" class="btn btn-primary submit-btn sizetituloedit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>