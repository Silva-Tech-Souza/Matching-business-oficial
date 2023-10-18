<?php

header("Access-Control-Allow-Origin: *");
$idProduto = $_GET['idProduto'];

// Exemplo de consulta usando PDO

include_once("../../model/classes/tblProducts.php");

$products = new Products();
$products->setidProduct($idProduto);
$produtoResults = $products->consulta("WHERE idProduct = :idProduct");

if ($produtoResults != null) {

    foreach ($produtoResults as $produtoResultUnid) {

        $idProduct = $produtoResultUnid->idProduct;
        $ProductName = $produtoResultUnid->ProductName;
        $ProdcuctDescription = $produtoResultUnid->ProdcuctDescription;
        $ProdcuctEspecification = $produtoResultUnid->ProdcuctEspecification;
        $idClient = $produtoResultUnid->idClient;
    }
}
?>
<style>
    .ttend {
        text-align: start;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title txtnomeperfil">View Product</h5>
    <button type="button" class="close rounded-2 border-0" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


<div class="modal-body">
    <div class="row">
        <div class="col-6">
            <img class="hero-image produto-img w-100" src="<?php

                                                        include_once('../../model/classes/tblProductPictures.php');
                                                        $productsPicture = new ProductPictures();
                                                        $productsPicture->setidProduct($idProduct);

                                                        $resultsProductsPicture = $productsPicture->consulta("WHERE idProduct = :idProduct");


                                                        if ($resultsProductsPicture != null) {
                                                            foreach ($resultsProductsPicture as $rowProdutos1) {
                                                                echo $rowProdutos1->tblProductPicturePath;
                                                            }
                                                        } else {
                                                            echo "https://images.unsplash.com/photo-1507608158173-1dcec673a2e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80";
                                                        }
                                                        ?>" alt="Spinning glass cube" />
        </div>
        <div class="col-6">
            <div class="col-12 d-flex justify-content-start">
                <h1 class="modal-title txtnomeperfil ttend color-preto"><?php echo $ProductName; ?></h1>
                
            </div>
            <hr>
            <div class="col-12 d-flex justify-content-start">
                <h3 class="ttend color-preto">Description</h3>

            </div>
            <div class="col-12 d-flex justify-content-start">
                <h4 class="ttend "><?php echo $ProdcuctDescription; ?></h4>
                <hr>
            </div>
            <hr>
            <div class="col-12 d-flex justify-content-start">
                <h3 class="ttend color-preto">Especification</h3>

            </div>
            <div class="col-12 d-flex justify-content-start">
                <h4 class="ttend "><?php echo $ProdcuctEspecification; ?></h4>
                <hr>
            </div>
            <div class="col-12 d-flex justify-content-start mt-4">
                
            <a href="viewProfile.php?profile=<?php echo $idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>
                
            </div>
        </div>
    </div>
</div>