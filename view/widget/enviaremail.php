<div id="emailcolab" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-2">
            <div class="modal-header p-1">
                <h5 class="modal-title txtnomeperfil">Collaborator Registration</h5>
                <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro" data-dismiss="modal" aria-label="Close">
                    <span class="color-branco" aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body"  style="padding: 10px !important;">

                <div class="row">
                    <form method="POST" enctype="multipart/form-data" action="../controller/profileController.php">
                        <p style=" font-size: medium;">
                            Write the employee's email, and Matching Business will send a link to register
                        </p>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Employee Email:</label>
                                <input class="form-control sizeinputedit file-upload-input bordainput" placeholder="Ex: exemplo@gmail.com" required autocomplete="off" name="emailcolab" type="email">
                                <input class="form-control sizeinputedit file-upload-input bordainput" value="<?php echo $taxidempresa; ?>" required autocomplete="off" name="taxid" type="hidden">
                                <input class="form-control sizeinputedit file-upload-input bordainput" value="<?php echo $nomeempresa; ?>" required autocomplete="off" name="nomeempresa" type="hidden">
                                <input class="form-control sizeinputedit file-upload-input bordainput" value="<?php echo $qtdcolab; ?>" required autocomplete="off" name="qtdcolab" type="hidden">
                            </div>
                        </div>

                        <div class="submit-section mt-3" style="justify-content: end;text-align: end;">
                            <input type="submit" name="enviaremail" class="btn btn-primary p-1" value="To Send" style="height: 28px;width: 100px;">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>