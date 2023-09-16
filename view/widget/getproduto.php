<?php

header("Access-Control-Allow-Origin: *");
$idProduto = $_GET['idProduto'];

// Exemplo de consulta usando PDO

include_once("../../model/classes/tblProducts.php");

$products = new Products();
$products->setidProduct($idProduto);
$produto = $products->consulta("WHERE idProduct = :idProduct");

$html ='<div class="modal-header">';
$html .='<h5 class="modal-title txtnomeperfil">Edit Product</h5>';
$html .='<button type="button" class="close rounded-2 border-0" data-dismiss="modal" aria-label="Close">';
$html .='<span aria-hidden="true">&times;</span>';
$html .='</button>';
$html .='</div>';


$html .='<div class="modal-body">';
$html .=  '<form method="POST" enctype="multipart/form-data">';
$html .=  '<div class="row">';
$html .=  '<input class="form-control bordainput" value="'.$produto['idProduct'].'"   autocomplete="off" name="idproduto" type="hidden">';

$html .= '<div class="col-sm-12">';
$html .= '<div class="form-group">';
$html .=  ' <label class="txtinput">Image:</label>';
$html .=  '<input type="file" name="imgproduto"  id="imgproduto" class="form-control file-upload-input " accept="image/*">';
$html .= '</div>';
$html .= '</div>';


$html .= '<div class="col-sm-12">';
$html .= '<div class="form-group">';
$html .=   '<label class="txtinput">Name:</label>';

$html .=  '<input class="form-control bordainput" value="'.$produto['ProductName'].'" required  autocomplete="off" name="nomeproduto" type="text">';
$html .=    '<datalist id="referencia">';
$html .=   '</datalist>';
$html .= '</div>';
$html .= '</div>';

$html .='<div class="col-sm-6">';
$html .='<div class="form-group">';
$html .= '<label class="txtinput">Description:</label>';
$html .=  '<textarea class="form-control bordainput" required name="descricao" type="text">' . $produto['ProdcuctDescription'] . '</textarea>';
$html .='</div>';
$html .='</div>';

$html .='<div class="col-sm-6">';
$html .='<div class="form-group">';
$html .= '<label class="txtinput">Specification:</label>';
$html .=  '<textarea class="form-control bordainput"  name="specification" type="text">' . $produto['ProdcuctEspecification'] . '</textarea>';
$html .='</div>';
$html .='</div>';

$html .='<div class="col-sm-6">';
$html .= '<div class="submit-section">';
$html .= '<button type="submit" name="deleteproduto" value="Salvar" class="btn btn-danger submit-btn">Delete </button>';
$html .= '</div>';
$html .= '</div>';
$html .='<div class="col-sm-6">';
$html .= '<div class="submit-section">';
$html .= '<button type="submit" name="updateproduto" value="Salvar" class="btn btn-primary submit-btn">Confirm</button>';
$html .= '</div>';
$html .= '</div>';

$html .=  '</div>';

$html .=  '</div>';
$html .= '</form>';
$html .='</div>';



// Retorne o conteúdo HTML com as informações do produto
echo $html;
