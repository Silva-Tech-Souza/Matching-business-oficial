<?php 
include_once('../model/classes/tblOperations.php');
include_once('../model/classes/tblBusiness.php');
?>

<div id="add_perfil" class="modal custom-modal fade mt-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title txtnomeperfil">Edit profile</h5>
                <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro" data-dismiss="modal" aria-label="Close">
                    <span class="color-branco" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editarperfilforms" enctype="multipart/form-data" action="../controller/profileController.php">
                    <div class="row">

                        <div class="col-sm-12 ">
                        <label class="txtinput sizetituloedit">Profile and banner images:</label>
                            <div class="avatar-upload-banner">
                                <div class="avatar-edit">
                                    <input type='file' name="banner-image" id="banner-image" class="form-control file-upload-input" accept=".png, .jpg, .jpeg" />
                                    <label for="banner-image"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview2" style="background-image: url(<?php if ($imgcapa != "Avatar.png" && $imgcapa != "" && $imgcapa != null) {
                                                        echo "" . $imgcapa;
                                                      } else {
                                                        echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                      } ?>);">
                                    </div>
                                </div>
                            </div>
                            <div class="avatar-upload" style="position: absolute; top: 55px;left: 21px;">
                                <div class="avatar-edit" >
                                    <input type='file' id="user-image" name="user-image" class="form-control file-upload-input" accept=".png, .jpg, .jpeg" />
                                    <label for="user-image"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(<?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                echo "" . $imgperfil;
                              } else {
                                echo "assets/img/Avatar.png";
                              } ?>);">
                                    </div>
                                </div>
                            </div>
 
                        </div>






                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Name:</label>
                                <input class="form-control bordainput sizeinputedit" value="<?php echo $FirstName; ?>" required autocomplete="off" name="nome" type="text">
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

                        <div class=" <?php if ($adm) {?>col-sm-6 <?php }else{echo "col-sm-12";}?> mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Job tittle:</label>
                                <input class="form-control bordainput sizeinputedit" required value="<?php echo $jobtitle; ?>" autocomplete="off" name="jobtitle" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <?php if ($adm) {?> <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Company name:</label>
                                <input class="form-control bordainput sizeinputedit" required value="<?php echo $companyname; ?>" autocomplete="off" name="conpany" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>
                        <?php }else{?>
                            <input class="form-control bordainput sizeinputedit" required value="<?php echo $companyname; ?>" autocomplete="off" name="conpany" type="hidden">
                        <?php }if ($adm) {?>
                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Core Business:</label>

                                <select class="form-control bordainput sizeinputedit" onchange="showbusines(this.value)" required id="coreBusiness" name="coreBusiness">

                                    <?php
                                    
                                    $operations = new Operations($dbh);
                                    $resultsoperation = $operations->consulta("");
                                    if ($operations != null) {
                                        foreach ($resultsoperation as $row) { ?>
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
                                    <select onchange="showbusines2(this.value)" required class="form-control bordainput sizeinputedit" id="satellite" name="satellite">
                                        <?php
                                        $bussiness = new Business($dbh);

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
                                <select class="form-control bordainput sizeinputedit" name="category" id="category">

                                    <?php

                                    $bussinesscategory = new BusinessCategory($dbh);
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
                        <?php } else { ?>

                            <div class="col-sm-6 mt-4">
                                <div class="form-group" style="text-align: start;">

                                    <div class="col" id="refHint"></div>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-group" style="text-align: start;">
                                    <div class="col" id="refHint2"></div>
                                </div>
                            </div>
                        <?php }}else{ ?>
                            <input  value="<?php echo $corebusiness; ?>" id="coreBusiness" name="coreBusiness" type="hidden">
                            <input  value="<?php echo $satBusinessId; ?>" id="satellite" name="satellite" type="hidden">
                            <input  value="<?php echo $idoperation; ?>" id="category" name="category" type="hidden">
                            <?php } ?>
                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Description:</label>
                                <textarea class="form-control bordainput summernote" id="summernote" style="font-size: small !important;"  maxlength="1000" name="descricao" type="text" style="font-size: larger; min-height: 109px;"><?php echo $descricao; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-striped active mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 88%"></div>
                                            </div>
                    <div class="submit-section mt-4">
                        <button type="submit" name="editarPerfil" id="editarPerfil" value="Salvar" class="btn btn-primary submit-btn sizetituloedit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>