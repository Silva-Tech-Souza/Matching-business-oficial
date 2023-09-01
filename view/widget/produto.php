<div id="add_produto" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title txtnomeperfil">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="txtinput">Image:</label>
                                <input type="file" name="user-produto" required id="user-produto" class="form-control file-upload-input " accept="image/*">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="txtinput">Name:</label>
                                <input class="form-control bordainput"  required  autocomplete="off" name="nomeproduto" type="text">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                      <!--  <div class="col-sm-6">
                            <div class="form-group">
                                <label class="txtinput">Business:</label>
                                <select  class="form-control bordainput" required id="coreBusiness" name="coreBusiness">
                                  
                                    <?php
                                    $sqlcorbusiness = "SELECT * from tblBusiness WHERE FlagOperation = '0'";
                                    $querycorbusiness = $dbh->prepare($sqlcorbusiness);
                                    $querycorbusiness->execute();
                                    $resultscorbusiness = $querycorbusiness->fetchAll(PDO::FETCH_OBJ);
                                    if ($querycorbusiness->rowCount() > 0) {
                                        foreach ($resultscorbusiness as $rowcor) { ?>
                                            <option value="<?php echo $rowcor->idBusiness; ?>"><?php echo $rowcor->NmBusiness; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="txtinput">Category:</label>
                                <select  class="form-control bordainput" required id="coreBusiness" name="operation">
                                   
                                    <?php
                                     $sql = "SELECT * from tblOperations ";
                                     $query = $dbh->prepare($sql);
                                     $query->execute();
                                     $results = $query->fetchAll(PDO::FETCH_OBJ);
                                     if ($query->rowCount() > 0) {
                                         foreach ($results as $row) { ?>
                                             <option value="<?php echo $row->idOperation;?>"><?php echo $row->NmOperation;?></option>
                                             <?php     }
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>
                                    -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="txtinput">Description:</label>
                                <textarea class="form-control bordainput"  maxlength="500" required name="descricao" type="text"></textarea>
                            
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="txtinput">Specification:</label>
                                <textarea class="form-control bordainput"  maxlength="500"  name="specification" type="text"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button type="submit" name="add_produtos" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>