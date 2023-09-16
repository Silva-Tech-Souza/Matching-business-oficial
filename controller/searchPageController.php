<?php

include_once('../model/classes/tblSearch.php');
include_once('../model/classes/tblSearchBusiness.php');
include_once('../model/classes/tblSearchCategory.php');
include_once('../model/classes/tblSearchCountry.php');
include_once('../model/classes/tblSearchEspecificationTag.php');
include_once('../model/classes/tblSearchSpecification.php');

$corbusiness = $_POST["corbusiness"];
//echo "corbusiness: " . $corbusiness . "<br>";

if ($_POST["flagtipo"] == "D") {
    $business = $corbusiness;
  //  echo "business: " . $business;
}

 $_POST["flagtipo"];
try {
    //caso o flag do cor Business for tipo B ELENCAI DENTRO DO IF E SE FOR
    if ($_POST["flagtipo"] == "B") {
        $business = implode(", ", $_POST["business"]);
      //  echo "business: " . $business . "<br>";
    } else {
        $business = $_POST["business"];
      //  echo "business: " . $busines . "<br>";
        //só existe categoria se a business não for um array
        try {
            if (!is_null($_POST["category"])) {
                $category = implode(", ", $_POST["category"]);
                //echo  "category: " . $category  . "<br>";
            }
        } catch (\Throwable $th) {
        }
    }
} catch (\Throwable $th) {
    echo "erro na parte 1 da step";
}


try {
    //só existe se o flag do cor business for A OU C
    $produtostags =  $_POST["produtostags"];
 //   echo "produtostags: " . $produtostags  . "<br>";

    //só existe se o flag do cor business for D
    $servicostags =  $_POST["servicostags"];
 //   echo "servicostags: " . $servicostags . "<br>";

} catch (\Throwable $th) {
   // echo "erro na parte 2 da step";
}


try {
    //PAÍS e id name
    $country =  implode(", ", $_POST["country"]);
   // echo "country: " .  $country  . "<br>";
    $idname =  $_POST["idname"];
  //  echo "idname: " . $idname  . "<br>";
} catch (\Throwable $th) {
   // echo "erro na parte final da step";
}

$search = new Search();

$searchBussiness = new SearchBusiness();

$searchCategory = new SearchCategory();

$searchCountry = new SearchCountry(); 

if($_POST["flagtipo"] == "A"){

    $search->setcoreBussinessID($corbusiness);
    $search->setNome($idname);
    $search->setidClient($_POST["idClient"]);
    $search->setEstado(TRUE);

    $idSearch = $search->cadastrar();

    if($idSearch!= null){

        $searchBussiness->setidSearch($idSearch);
        $searchBussiness->setidBusiness($business);

        $searchBussiness->cadastrar();

        foreach($_POST["category"] as $categoryUnid){

            if($categoryUnid != 'Select'){
                $searchCategory->setidSearch($idSearch);
                $searchCategory->setidCategory($categoryUnid);

                $searchCategory->cadastrar();
            }

        }

        foreach($_POST["country"] as $countryUnid){

            if($countryUnid != 'Select'){
                $searchCountry->setidSearch($idSearch);
                $searchCountry->setidCountry($countryUnid);

                $searchCountry->cadastrar();
            }

        }

        foreach(explode(",",$_POST["produtostags"]) as $produtostagsUnid){

            if($produtostagsUnid != '' && $produtostagsUnid != null){
                
                $searchEspecificationTag = new SearchEspecificationTag();

                $searchEspecificationTag->setidSearch($idSearch);
                //idTagKeys = 1 é produto
                $searchEspecificationTag->setidTagKeys(1);
                $searchEspecificationTag->setKeys($produtostagsUnid);

                $searchEspecificationTag->cadastrar();

            }

        }

    //    echo 'Cadastro Realizado com sucesso';
        header("Location: ../view/listcompani.php");
    }
    

}else if($_POST["flagtipo"] == "B"){

    $search->setcoreBussinessID($corbusiness);
    $search->setNome($idname);
    $search->setidClient($_POST["idClient"]);
    $search->setEstado(TRUE);

    $idSearch = $search->cadastrar();

    if($idSearch!= null){

        foreach($_POST["business"] as $businessUnid){

            if($businessUnid != null && $businessUnid != 'Select'){
                $searchBussiness->setidSearch($idSearch);
                $searchBussiness->setidBusiness($businessUnid);
        
                $searchBussiness->cadastrar();
            }

        }

        foreach($_POST["country"] as $countryUnid){

            if($countryUnid != 'Select'){
                $searchCountry->setidSearch($idSearch);
                $searchCountry->setidCountry($countryUnid);

                $searchCountry->cadastrar();
            }

        }

        //caso for um distribuidor -TIPO B
        /*
        $servicostags =  $_POST["numempregados"];
        echo "numempregados: " .  $servicostags  . "<br>";
        $servicostags =  $_POST["rangevalues"];
        echo "rangevalues: " .  $servicostags  . "<br>";
        $servicostags =  $_POST["year"];
        echo "year: " .$servicostags   . "<br>";
        $servicostags =  $_POST["niveloperacao"];
        echo "niveloperacao: " . $_POST["niveloperacao"] . "<br>";
        */

        $searchspecification = new SearchEspecification();

        $searchspecification->setidSearch($idSearch);
        $searchspecification->setidNumEmpregados($_POST["numempregados"]);
        $searchspecification->setidlRangeValue($_POST["rangevalues"]);
        $searchspecification->setidNivelOperacao($_POST["niveloperacao"]);
        $searchspecification->setDataDeAbertura($_POST["year"]);

        $searchspecification->cadastrar();


        //echo 'Cadastro Realizado com sucesso';
        header("Location: ../view/listcompani.php");
    }


}else if($_POST["flagtipo"] == "C"){

    $search->setcoreBussinessID($corbusiness);
    $search->setNome($idname);
    $search->setidClient($_POST["idClient"]);
    $search->setEstado(TRUE);

    $idSearch = $search->cadastrar();

    if($idSearch!= null){

        $searchBussiness->setidSearch($idSearch);
        $searchBussiness->setidBusiness($corbusiness);

        $searchBussiness->cadastrar();

        foreach($_POST["category"] as $categoryUnid){

            if($categoryUnid != 'Select'){
                $searchCategory->setidSearch($idSearch);
                $searchCategory->setidCategory($categoryUnid);

                $searchCategory->cadastrar();
            }

        }

        foreach($_POST["country"] as $countryUnid){

            if($countryUnid != 'Select'){
                $searchCountry->setidSearch($idSearch);
                $searchCountry->setidCountry($countryUnid);

                $searchCountry->cadastrar();
            }

        }

        foreach(explode(",",$_POST["produtostags"]) as $produtostagsUnid){

            if($produtostagsUnid != '' && $produtostagsUnid != null){
                
                $searchEspecificationTag = new SearchEspecificationTag();

                $searchEspecificationTag->setidSearch($idSearch);
                //idTagKeys = 1 é produto
                $searchEspecificationTag->setidTagKeys(1);
                $searchEspecificationTag->setKeys($produtostagsUnid);

                $searchEspecificationTag->cadastrar();

            }

        }

      //  echo 'Cadastro Realizado com sucesso';
        header("Location: ../view/listcompani.php");
    }

}else if($_POST["flagtipo"] == "D"){

    $search->setcoreBussinessID($corbusiness);
    $search->setNome($idname);
    $search->setidClient($_POST["idClient"]);
    $search->setEstado(TRUE);

    $idSearch = $search->cadastrar();

    if($idSearch!= null){

        $searchBussiness->setidSearch($idSearch);
        $searchBussiness->setidBusiness($corbusiness);

        $searchBussiness->cadastrar();

        foreach($_POST["country"] as $countryUnid){

            if($countryUnid != 'Select'){
                $searchCountry->setidSearch($idSearch);
                $searchCountry->setidCountry($countryUnid);

                $searchCountry->cadastrar();
            }

        }

        foreach(explode(",",$servicostags) as $servicosUnid){

            if($servicosUnid != '' && $servicosUnid != null){
                
                $searchEspecificationTag = new SearchEspecificationTag();
    
                $searchEspecificationTag->setidSearch($idSearch);
                //idTagKeys = 2 é serviço
                $searchEspecificationTag->setidTagKeys(2);
                $searchEspecificationTag->setKeys($servicosUnid);
    
                $searchEspecificationTag->cadastrar();
    
            }
    
        }

        //echo 'Cadastro Realizado com sucesso';
        header("Location: ../view/listcompani.php");
    }

}else{
   
}

