<?php

include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tblcertificado.php');
include_once('../../model/classes/tblCertificadoImg.php');

header("Access-Control-Allow-Origin: *");
$idProduto = $_GET['idProduto'];

// Exemplo de consulta usando PDO

$certificado = new Certificado($dbh);
$certificado->setId($idProduto);
$resultscertificado = $certificado->consulta("WHERE id = :id  ORDER BY id ASC ");
if ($resultscertificado != null) {
    foreach ($resultscertificado as $rowProdutos) {
        $idProduct = $rowProdutos->id;
        $ProductName = $rowProdutos->titulo;
        $ProdcuctDescription = $rowProdutos->descricao;
       
    }
}
$qtd = 0;
$productsPicture = new CertiPicture($dbh);
$productsPicture->setIdCertificado($idProduct);
$resultsProductsPicture = $productsPicture->consulta("WHERE idcertificado = :idcertificado");
if ($resultsProductsPicture != null) {
foreach ($resultsProductsPicture as $rowProdutos1) {
    
    if($qtd == 0){
        $path1 = $rowProdutos1->caminho;
        $qtd++;
    } else if($qtd == 1){
        $path2 = $rowProdutos1->caminho;
        $qtd++;
    }else if($qtd == 2){
        $path3 = $rowProdutos1->caminho;
        $qtd++;
    }else  if($qtd == 3){
        $path4 = $rowProdutos1->caminho;
        $qtd++;
    }else if($qtd == 4){
        $path5 = $rowProdutos1->caminho;
        $qtd++;
    }else{
        
    }
    
    
}}

?>

<script>
    $(document).ready(function() {
        $('#summernote96').summernote();
    });
</script>




<div class="modal-header">
    <h5 class="modal-title txtnomeperfil">Edit Certificado</h5>
    <button type="button" class="close rounded-2 border-0" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


<div class="modal-body">
    <form method="POST" enctype="multipart/form-data" action="../controller/profileController.php">
        <div class="row">
            <input class="form-control bordainput" value="<?php echo $idProduct ?>" autocomplete="off" name="idproduto" type="hidden">

            <div class="col-sm-12 mt-4">
                <div class="form-group">
                    <label class="txtinput">Image:</label>
                    <spam>You can choose more than one image to upload</spam>
                    <input type="file" name="imgproduto[]" id="user-produto" class="form-control file-upload-input" multiple="multiple" accept=".jpg, .jpeg, .png" onchange="showImages9(event)" style="display: none;">

                </div>
            </div>


            <div class="col-sm-4 mt-4">
                <br>
                <div class=" d-flex justify-content-center align-middle ">
                    <label for="user-produto" class="btn btn-primary btnupload" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center;">
                        <i class="fas fa-upload" style="font-size: 40px;"></i> <br>
                        <p style="font-size: 10px;">Choose the images</p>
                    </label>
                </div>

            </div>
            <div class="col-sm-4 mt-4 card card-body d-flex justify-content-center">
                <div class="image-preview d-flex justify-content-center" style="" id="image-preview1">
                    <?php if (!isset($path1)) { ?>
                        <i class="fas fa-image iconimage"></i>
                    <?php } else { ?>
                        <img src="<?php echo $path1; ?>">
                    <?php } ?>
                </div>
            </div>
           <div class="col-sm-4 mt-4 card card-body">
                <div class="image-preview  d-flex justify-content-center" style="" id="image-preview2">
                    <?php if (!isset($path2)) { ?>
                        <i class="fas fa-image iconimage"></i>
                    <?php } else { ?>
                        <img src="<?php echo $path2; ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 mt-4 card card-body">
                <div class="image-preview  d-flex justify-content-center" style="" id="image-preview3">
                    <?php if (!isset($path3)) { ?>
                        <i class="fas fa-image iconimage"></i>
                    <?php } else { ?>
                        <img src="<?php echo $path3; ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 mt-4 card card-body">
                <div class="image-preview  d-flex justify-content-center" style="" id="image-preview4">
                    <?php if (!isset($path4)) { ?>
                        <i class="fas fa-image iconimage"></i>
                    <?php } else { ?>
                        <img src="<?php echo $path4; ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 mt-4 card card-body">
                <div class="image-preview  d-flex justify-content-center" style="" id="image-preview5">
                    <?php if (!isset($path5)) { ?>
                        <i class="fas fa-image iconimage"></i>
                    <?php } else { ?>
                        <img src="<?php echo $path5; ?>">
                    <?php } ?>
                </div>
            </div>
                  

            <div class="col-sm-12">
                <div class="form-group">
                    <label class="txtinput">Name:</label>

                    <input class="form-control bordainput" value="<?php echo $ProductName; ?>" required autocomplete="off" name="nomeproduto" type="text" style="height: 40px; font-size: 17px;">
                    <datalist id="referencia">''</datalist>
                </div>
            </div>
            <br>
            <div class="col-sm-12">
                <br>
                <div class="form-group">
                    <br>
                    <label class="txtinput">Description:</label>
                    <textarea class="form-control bordainput summernote" id="summernote96" required name="descricao" type="text" style="height: 100px; font-size: 17px;"><?php echo $ProdcuctDescription; ?> </textarea>
                </div>
            </div>
            <br>
        
            


            <div class="col-sm-6">
                <div class="row">
                    <div class="submit-section">
                        <br>
                        <button type="submit" name="updateproduto" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>
                        <button type="submit" name="deletecertificado" value="Salvar" class="btn btn-danger submit-btn">Delete </button>
                    </div>

                </div>

            </div>

        </div>

</div>
</form>
</div>



<script>
    function showImages9(event) {
        const fileInput = event.target;

        for (let i = 1; i <= 5; i++) {
            const imagePreview = document.getElementById(`image-preview${i}`);
            imagePreview.innerHTML = '';

            if (fileInput.files[i - 1]) {
                const reader = new FileReader();
                const image = document.createElement('img');

                reader.onload = function(e) {
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