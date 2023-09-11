<?php

include_once('../model/classes/tblSearch.php');
include_once('../model/classes/tblSearchBusiness.php');
include_once('../model/classes/tblSearchCategory.php');
include_once('../model/classes/tblSearchCountry.php');

echo "corbusiness: " . $corbusiness = $_POST["corbusiness"] . "<br>";

if ($_POST["flagtipo"] == "D") {
    echo "business: " . $business = $corbusiness;
}
echo $_POST["flagtipo"];
try {
    //caso o flag do cor Business for tipo B ELENCAI DENTRO DO IF E SE FOR
    if ($_POST["flagtipo"] == "B") {
        echo "business: " . $business = implode(", ", $_POST["business"]) . "<br>";
    } else {
        echo "business: " . $business = $_POST["business"] . "<br>";
        //só existe categoria se a business não for um array
        try {
            if (!is_null($_POST["category"])) {
                echo  "category: " . $category = implode(", ", $_POST["category"]) . "<br>";
            }
        } catch (\Throwable $th) {
        }
    }
} catch (\Throwable $th) {
    echo "erro na parte 1 da step";
}


try {
    //só existe se o flag do cor business for A OU C
    echo "produtostags: " .  $produtostags =  $_POST["produtostags"] . "<br>";

    //só existe se o flag do cor business for D
    echo "servicostags: " .   $servicostags =  $_POST["servicostags"] . "<br>";

    //caso for um distribuidor -TIPO B
    echo "numempregados: " .   $servicostags =  $_POST["numempregados"] . "<br>";
    echo "rangevalues: " .   $servicostags =  $_POST["rangevalues"] . "<br>";
    echo "year: " .   $servicostags =  $_POST["year"] . "<br>";
    echo "niveloperacao: " .   $servicostags =  $_POST["niveloperacao"] . "<br>";
} catch (\Throwable $th) {
    echo "erro na parte 2 da step";
}


try {
    //PAÍS e id name
    echo "country: " .   $country =  implode(", ", $_POST["country"]) . "<br>";
    echo "idname: " .   $idname =  $_POST["idname"] . "<br>";
} catch (\Throwable $th) {
    echo "erro na parte final da step";
}

$search = new Search();

$searchBussiness = new SearchBusiness();

$searchCategory = new SearchCategory();

$searchCountry = new SearchCountry(); 
echo "flagtipo: " .$_POST["flagtipo"];
if($_POST["flagtipo"] == "A"){

    $search->setcoreBussinessID($corbusiness);
    $search->setNome($idname);
    $search->setidClient($_POST["idClient"]);
    $search->setEstado(TRUE);

    $querySearch = $search->cadastrar();

    $searchBussiness->setidSearch($querySearch);
    $searchBussiness->setidBusiness($business);

    $searchBussiness->cadastrar();

    foreach($_POST["category"] as $categoryUnid){

        $searchCategory->setidSearch($querySearch);
        $searchCategory->setidCategory($categoryUnid);

        $searchCategory->cadastrar();

    }

    foreach($_POST["country"] as $countryUnid){

        $searchCountry->setidSearch($querySearch);
        $searchCountry->setidCountry($countryUnid);

        $searchCountry->cadastrar();

    }

    echo 'Cadastro Realizado com sucesso';
    

}else if($_POST["flagtipo"] == "B"){



}else if($_POST["flagtipo"] == "C"){



}else if($_POST["flagtipo"] == "D"){



}else{

}

//header("Location: ../view/listcompani.php");
