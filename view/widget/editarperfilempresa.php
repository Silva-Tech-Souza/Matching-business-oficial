<?php 
include_once('../model/classes/tblCountry.php');
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
                <form method="POST" id="editarperfilforms" enctype="multipart/form-data" action="../controller/empresaController.php">
                    <div class="row">
                        <input type="hidden" name="idempresa" value="<?php echo $idempresa; ?>">
                        <div class="col-sm-12 ">
                            <label class="txtinput sizetituloedit">Profile and banner images:</label>
                            <div class="avatar-upload-banner">
                                <div class="avatar-edit">
                                    <input type='file' name="banner-image" id="banner-image" class="form-control file-upload-input" accept=".png, .jpg, .jpeg" />
                                    <label for="banner-image"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview2" style="background-image: url(<?php if ($bannerempresa != "Avatar.png" && $bannerempresa != "" && $bannerempresa != null) {
                                                                                                echo "" . $bannerempresa;
                                                                                            } else {
                                                                                                echo "https://images2.alphacoders.com/131/1317606.jpeg";
                                                                                            } ?>);">
                                    </div>
                                </div>
                            </div>
                            <div class="avatar-upload" style="position: absolute; top: 55px;left: 21px;">
                                <div class="avatar-edit">
                                    <input type='file' id="user-image" name="user-image" class="form-control file-upload-input" accept=".png, .jpg, .jpeg" />
                                    <label for="user-image"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(<?php if ($fotoempresa != "Avatar.png" && $fotoempresa != "") {
                                                                                            echo "" . $fotoempresa;
                                                                                        } else {
                                                                                            echo "assets/img/Avatar.png";
                                                                                        } ?>);">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Company Name:</label>
                                <input class="form-control bordainput sizeinputedit" required value="<?php echo $nomeempresa; ?>" autocomplete="off" name="nomeempresa" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Social network:</label>
                                <input class="form-control bordainput sizeinputedit" value="<?php echo $redesocial; ?>" autocomplete="off" name="redesocial" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Site:</label>
                                <input class="form-control bordainput sizeinputedit" value="<?php echo $site; ?>" autocomplete="off" name="site" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Country:</label>
                                <select required class="form-control bordainput sizeinputedit" id="country-select" name="country">
                                    <option value="">Select a country</option>
                                    <?php

                                    $tblCountry = new Country($dbh);

                                    $resultstblCountry = $tblCountry->consulta("ORDER BY NmCountry ASC");

                                    if ($tblCountry != null) {
                                        if (is_array($resultstblCountry) || is_object($resultstblCountry)) {
                                            foreach ($resultstblCountry as $rowpaises) {
                                                $selected = ($rowpaises->idCountry == $paisempresa2) ? 'selected' : '';
                                    ?>
                                                <option value="<?php echo $rowpaises->idCountry; ?>" <?php echo $selected; ?>><?php echo $rowpaises->NmCountry; ?></option>
                                    <?php  }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12  mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Description:</label>
                                <textarea class="form-control bordainput" maxlength="1000" name="descricao" type="text" style="font-size: larger; min-height: 109px;"><?php echo $descempresa; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-striped active mt-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 88%"></div>
                    </div>
                    <div class="submit-section mt-4">
                        <button type="submit" name="editarPerfilempresa" id="editarPerfil" value="Salvar" class="btn btn-primary submit-btn sizetituloedit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>