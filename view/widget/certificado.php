<style>
    .image-previews img {
        width: 150px;
        height: 150px;

    }

    .iconimage {
        font-size: 80px;
        padding: 50px;
    }

    .btnupload {
        width: 150px;
        height: 150px;
    }
</style>


<script>
    $(document).ready(function() {
        $('#summernote6').summernote();
    });
</script>

<div id="add_certificado" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title txtnomeperfil">Create Certificado</h5>
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
                                <input type="file" name="user-certificado[]" required id="user-certificado" class="form-control file-upload-input" multiple="multiple" accept=".jpg, .jpeg, .png" onchange="showImages2(event)" style="display: none;">

                            </div>
                        </div>
                        <div class="col-sm-4 mt-4">
                            <br>
                            <div class=" d-flex justify-content-center align-middle ">
                                <label for="user-certificado" class="btn btn-primary btnupload" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center;">
                                    <i class="fas fa-upload" style="font-size: 40px;"></i> <br>
                                    <p style="font-size: 10px;">Choose the images</p>
                                </label>
                            </div>

                        </div>
                        <div class="col-sm-4 mt-4 card card-body d-flex justify-content-center">
                            <div class="image-preview d-flex justify-content-center" style="" id="image-previews1"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-previews2"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-previews3"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-previews4"><i class="fas fa-image iconimage"></i></div>
                        </div>
                        <div class="col-sm-4 mt-4 card card-body">
                            <div class="image-preview  d-flex justify-content-center" style="" id="image-previews5"><i class="fas fa-image iconimage"></i></div>
                        </div>






                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Título:</label>
                                <input class="form-control bordainput" required autocomplete="off" name="titulocartificado" type="text" style="height: 40px; font-size: 17px;">
                                <datalist id="referencia">
                                </datalist>
                            </div>
                        </div>



                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label class="txtinput sizetituloedit">Description:</label>
                                <textarea class="form-control bordainput summernote" id="summernote6" maxlength="500" required name="descricao" type="text" style="height: 60px; font-size: 17px;"></textarea>

                            </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <div class="progress progress-striped active mt-2">
                                <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 88%"></div>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12">
                        <div class="submit-section mt-4">
                            <button type="submit" name="addcertificado" id="addcertificado" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function showImages2(event) {
        const fileInputs = event.target;
        console.log(fileInputs);
        for (let i = 1; i <= 5; i++) {
            const imagePreviews = document.getElementById(`image-previews${i}`);
            imagePreviews.innerHTML = '';

            if (fileInputs.files[i - 1]) {
                const reader = new FileReader();
                const image = document.createElement('img');

                reader.onload = function(e) {
                    image.src = e.target.result;
                    imagePreviews.appendChild(image);
                };

                reader.readAsDataURL(fileInputs.files[i - 1]);
            } else {
                const icon = document.createElement('i');
                icon.className = 'fas fa-image iconimage';
                imagePreviews.appendChild(icon);
            }
        }
    }
</script>