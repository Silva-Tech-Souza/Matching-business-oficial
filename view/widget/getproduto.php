<?php
include_once('../../model/classes/conexao.php');
header("Access-Control-Allow-Origin: *");
$idProduto = $_GET['idProduto'];

// Exemplo de consulta usando PDO

include_once("../../model/classes/tblProducts.php");

$products = new Products($dbh);
$products->setidProduct($idProduto);
$produtoResults = $products->consulta("WHERE idProduct = :idProduct");

if($produtoResults != null){

    foreach($produtoResults as $produtoResultUnid){

        $idProduct = $produtoResultUnid->idProduct;
        $ProductName = $produtoResultUnid->ProductName;
        $ProdcuctDescription = $produtoResultUnid->ProdcuctDescription;
        $ProdcuctEspecification = $produtoResultUnid->ProdcuctEspecification;

    }

}
?>

<div class="modal-header">
    <h5 class="modal-title txtnomeperfil">Edit Product</h5>
        <button type="button" class="close rounded-2 border-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>


<div class="modal-body">
    <form method="POST" enctype="multipart/form-data" action="../controller/profileController.php">
        <div class="row">
            <input class="form-control bordainput" value="<?php echo $idProduct?>"   autocomplete="off" name="idproduto" type="hidden">

            <div class="col-sm-12">
                <div class="form-group">
                     <label class="txtinput">Image:</label>
                    <input type="file" name="imgproduto[]" multiple="multiple" id="imgproduto" class="form-control file-upload-input " accept="image/*">
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <label class="txtinput">Name:</label>

                    <input class="form-control bordainput" value="<?php echo $ProductName;?>" required  autocomplete="off" name="nomeproduto" type="text">
                    <datalist id="referencia">''</datalist>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="txtinput">Description:</label>
                    <textarea class="form-control bordainput" required name="descricao" type="text"><?php echo $ProdcuctDescription; ?> </textarea>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="txtinput">Specification:</label>
                    <textarea class="form-control bordainput"  name="specification" type="text"><?php echo $ProdcuctEspecification; ?></textarea>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="submit-section">
                    <button type="submit" name="deleteproduto" value="Salvar" class="btn btn-danger submit-btn">Delete </button>
                </div>
            </div>
            <div class="col-sm-6">
                '<div class="submit-section">
                    <button type="submit" name="updateproduto" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>
                </div>
            </div>

        </div>

        </div>
    </form>
</div>

