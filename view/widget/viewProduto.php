<?php
include_once('../../model/classes/conexao.php');
header("Access-Control-Allow-Origin: *");
$idProduto = $_GET['idProduto'];

// Exemplo de consulta usando PDO

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

<div class="modal-header">
    <h5 class="modal-title txtnomeperfil">View Product</h5>
    <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="color:white;width: 25px; height: 25px;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


<div class="modal-body">
    <div class="row">
        <div class="column small-centered">
            <div class="productCard_block">
                <div class="row" style="margin: 0px !important;">
                    <div class="small-12 large-6 columns imagensmobile" style="flex: 1; height: 450px; padding: 0; margin: 0;">
                        <div class="productCard_leftSide clearfix">

                            <div class="sliderBlock" style="width: -webkit-fill-available;height: 450px;">
                                <ul class="sliderBlock_items" style="width: -webkit-fill-available;height: -webkit-fill-available;">
                                    <li class="sliderBlockitemsitemPhoto sliderBlock_items__showing">
                                        <img src="https://github.com/BlackStar1991/CardProduct/blob/master/app/img/goods/item1/phones1.png?raw=true" alt="headphones" class="imgproduto">
                                    </li>
                                    <li class="sliderBlockitemsitemPhoto">
                                        <img src="https://github.com/BlackStar1991/CardProduct/blob/master/app/img/goods/item1/phones2.png?raw=true" alt="headphones" class="imgproduto">
                                    </li>
                                    <li class="sliderBlockitemsitemPhoto">
                                        <img src="https://github.com/BlackStar1991/CardProduct/blob/master/app/img/goods/item1/phones5.png?raw=true" alt="headphones" class="imgproduto">
                                    </li>

                                </ul>


                                <div class="sliderBlock_controls" style="z-index: 100000000;position: relative;    top: -19%;">
                                    <div class="sliderBlock_controls__navigatin">
                                        <div class="sliderBlock_controls__wrapper">
                                            <div class="sliderBlock_controls__arrow sliderBlockcontrolsarrowBackward">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            </div>
                                            <div class="sliderBlock_controls__arrow sliderBlockcontrolsarrowForward">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="sliderBlock_positionControls">
                                        <li class="sliderBlockpositionControlspaginatorItem sliderBlock_positionControls__active">
                                        </li>
                                        <li class="sliderBlockpositionControlspaginatorItem">
                                        </li>
                                        <li class="sliderBlockpositionControlspaginatorItem">
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="small-12 large-6 columns txtmobile" style="flex: 1;     z-index: 31;">
                        <div class="productCard_rightSide">
                            <div class="block_product">
                                <h2 class="block_name block_name__mainName"><?php echo $ProductName; ?></h2>



                                <div class="block_informationAboutDevice" style="display: contents;">




                                    <div class="block_descriptionInformation">
                                        <span><?php echo $ProdcuctDescription; ?>
                                        </span>
                                    </div>



                                </div>
                                <div class="large-6 small-12 column end" style="margin-top: 14px;">

                                    <a href="viewProfile.php?profile=<?php echo $idClient; ?>" type="button" class="btn btn-primary" style="">View Profile</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>