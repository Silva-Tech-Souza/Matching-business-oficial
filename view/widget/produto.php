<?php

include_once('../model/classes/tblOperations.php');

?>
<style>
        .image-preview img {
            width: 150px;
            height: 150px;
           
        }
        
        .iconimage{
            font-size: 80px;
            padding: 50px;
        }
        
        .btnupload{
            width: 150px;
            height: 150px;
        }
    </style>


<script>
     $(document).ready(function() {
      $('#summernote4').summernote();
    });
    
     $(document).ready(function() {
      $('#summernote5').summernote();
    });
    
</script>

<div id="add_produto" class="modal custom-modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title txtnomeperfil">Create Product</h5>
                <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro" data-dismiss="modal" aria-label="Close">
                    <span class="color-branco" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formsprodutosadd" method="POST" enctype="multipart/form-data" action="../controller/profileController.php">
                    <div class="row">

                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Image:<br></label>
                                <spam><br>You can choose more than one image to upload</spam>
                                <input type="file" name="user-produto[]" required id="user-produto" class="form-control file-upload-input" multiple="multiple" accept=".jpg, .jpeg, .png" onchange="showImages(event)" style="display: none;">

                            </div>
                        </div>
                        <div class="col-sm-4 mt-4">
                            <br>
                            <div class=" d-flex justify-content-center align-middle ">
                                <label for="user-produto" class="btn btn-primary btnupload" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center;">
                                <i class="fas fa-upload" style="font-size: 40px;"></i> <br><p style="font-size: 10px;">Choose the images</p>
                            </label>
                            </div>
                            
                        </div>
                        <div class="col-sm-4 mt-4 card card-body d-flex justify-content-center">
                            <div class="image-preview d-flex justify-content-center" style="" id="image-preview1"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-preview2"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-preview3"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-preview4"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-preview5"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        
                     
                        
                        


                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Name:</label>
                                <input class="form-control bordainput" required autocomplete="off" name="nomeproduto" type="text" style="height: 40px; font-size: 17px;">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>

                        <!--  <div class="col-sm-6">
                            <div class="form-group">
                                <label class="txtinput">Business:</label>
                                <select  class="form-control bordainput" required id="coreBusiness" name="coreBusiness">
                                  
                                    <?php

                                    $operations = new Operations($dbh);

                                    $resultsOperation = $operations->consulta("WHERE FlagOperation = '0'");


                                    if ($resultsOperation != null) {
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

                                    $operations = new Operations($dbh);

                                    $results = $operations->consulta("");


                                    if ($resultsOperation != null) {
                                        foreach ($results as $row) { ?>
                                             <option value="<?php echo $row->idOperation; ?>"><?php echo $row->NmOperation; ?></option>
                                             <?php     }
                                        }
                                                ?>
                                </select>
                            </div>
                        </div>
                                    -->

                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Description:</label>
                                <textarea class="form-control bordainput summernote" id="summernote4" maxlength="500" required name="descricao" type="text" style="height: 60px; font-size: 17px;"></textarea>

                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Specification:</label>
                                <textarea class="form-control bordainput summernote" id="summernote5" maxlength="500" name="specification" type="text" style="height: 60px; font-size: 17px;"></textarea>
                            </div>
                        </div>
                          <div class="col-sm-12 mt-4">
                         <div class="progress progress-striped active mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 88%"></div>
                                            </div>
                                             </div>
                    </div>
                    
                    
              
                  
                    <div class="submit-section mt-4">
                        <button type="submit" name="AdicionarProdutos" id="adicionarProdutos" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function showImages(event) {
        const fileInput = event.target;

        for (let i = 1; i <= 5; i++) {
            const imagePreview = document.getElementById(`image-preview${i}`);
            imagePreview.innerHTML = '';

            if (fileInput.files[i - 1]) {
                const reader = new FileReader();
                const image = document.createElement('img');

                reader.onload = function (e) {
                    image.src = e.target.result;
                    imagePreview.appendChild(image);
                };

                reader.readAsDataURL(fileInput.files[i - 1]);
            } else {
                const icon = document.createElement('i');
                icon.className = 'fas fa-image iconimage';
                imagePreview.appendChild(icon);
            }
        }
    }
</script>

