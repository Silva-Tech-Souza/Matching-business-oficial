<?php
include_once('../../model/classes/conexao.php');
header("Access-Control-Allow-Origin: *");
$idProduto = $_GET['idProduto'];

// Exemplo de consulta usando PDO
$qtd = 0;
include_once("../../model/classes/tblProducts.php");

$products = new Products($dbh);
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



 <style>
        .image-gallery {
            display: flex;
            align-items: center;
        }

        .thumbnail-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .thumbnail-list li {
            cursor: pointer;
            margin: 5px;
        }

        .thumbnail-list img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .main-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }
        
        
        
        .zoomimg{
            transition: transform 0.3s;
        }
        
        .zoomimg:hover {
           transform: scale(1.2);
        }
        
         @media (max-width: 768px) {
        .main-image {
            width: 200px; /* Tamanho diferente para dispositivos móveis */
            height: 200px;
        }
        
        .zoomimg{
           width: 40px; /* Tamanho diferente para dispositivos móveis */
             height: 40px;
        }
    }
    </style>
    
    
        <script>
        function changeImage(imagePath) {
            document.getElementById("mainImage").src = imagePath;
        }
    </script>


<div class="modal-header">
    <h5 class="modal-title txtnomeperfil">View Product</h5>
    <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="color:white;width: 25px; height: 25px;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>





<div class="modal-body">
    <div class="row">
        <div class="">
            <div class="productCard_block">
                <div class="row" style="margin: 0px !important;">
                    <div class="col-md-6" style="flex: 1; z-index: 31; ">
                        <div class="image-gallery">
                            <ul class="thumbnail-list">
                                <?php
                                include_once('../../model/classes/tblProductPictures.php');
                                    $productsPictures = new ProductPictures($dbh);
                                    $productsPictures->setidProduct($idProduto);
                                    $resultsProdutos1 = $productsPictures->consulta("WHERE idProduct = :idProduct");
                                    if ($resultsProdutos1 != null) {
                                        foreach ($resultsProdutos1 as $rowProdutosu) { 
                                        
                                        if($qtd == 0){
                                            $pathinicial = $rowProdutosu->tblProductPicturePath;
                                            $qtd++;
                                        }
                                        
                                        ?>
                                <li><img class="zoomimg" src="<?php echo $rowProdutosu->tblProductPicturePath;?>" onclick="changeImage('<?php echo $rowProdutosu->tblProductPicturePath;?>')"></li>
                                <?php }}?>
                 
                                <!-- Adicione mais imagens à lista conforme necessário -->
                            </ul>
                            <img src="<?php echo $pathinicial;?>" class="main-image" id="mainImage">
                        </div>
                    </div>    
                   
                    <div class="col-md-6 p-4" style="flex: 1;     z-index: 31;">
                        <div class="">
                            <div class="">
                                <h2 class=""><?php echo $ProductName; ?></h2>

 <hr>

                                <div class="" style="display: contents;">




                                    <div class="">
                                        <span style="word-wrap: break-word;"><?php echo $ProdcuctDescription; ?>
                                        </span>
                                    </div>

                                    <div class="mt-3">
                                        <h4><b>Especification</b>:</h4>
                                        <span style="word-wrap: break-word;"><?php echo $ProdcuctEspecification; ?>
                                        </span>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-12 d-flex justify-content-end" style="margin-top: 14px;">
            <a href="viewProfile.php?profile=<?php echo $idClient; ?>" type="button" class="btn btn-primary" style="height: 50px !important; width: 100px !important; font-size: 15px;">View Profile</a>
        </div>
        
    </div>

</div>