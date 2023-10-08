<div id="emailcolab" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header p-1">
                <h5 class="modal-title txtnomeperfil">Collaborator Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr>
            <div class="modal-body p-2">

                <div class="row">
                        <form method="POST" enctype="multipart/form-data" action="../controller/profileController.php">
                    <p style=" font-size: small;">
                     Write the employee's email, and Matching Business will send a link to register
                    </p>
                        <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                <label class="txtinput">Email:</label>
                                <input class="form-control bordainput" required  autocomplete="off" name="emailcolab" type="email">
                                  <input class="form-control bordainput" value="<?php echo $taxidempresa;?>" required  autocomplete="off" name="taxid" type="hidden">
                            </div>
                        </div>

                    <div class="submit-section m-0" style="
    justify-content: center;
    text-align: center;
    margin: 10px !important;
   
">
                        <input type="submit" name="enviaremail" class="btn btn-primary p-1" value="ToSend" style="height: 28px;width: 100px;">
                    </div>
 </form>
                </div>
               
            </div>
        </div>
    </div>