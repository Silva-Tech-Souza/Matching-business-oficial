<?php
session_start();
if ($_POST["create"] != "") {
        

    $id = $_SESSION["id"];
    $idoperationbs = 0;

    echo $_POST["coreBusiness"];
    echo $_POST["business"];
    echo $_POST["category"];

    if(isset($_POST["coreBusiness"]) && $_POST["coreBusiness"] != 0){
        $coreBussines = $_POST["coreBusiness"];
        

        if(($coreBussines >= 2 && $coreBussines <= 5) && (isset($_POST["coreBusiness"]) && $_POST["coreBusiness"] != 0)  && (isset($_POST["category"]) && $_POST["category"] != 0) ){
            
            $sateliteBussines = $_POST["business"];
            $category = $_POST["category"];

            include_once('../model/classes/tblUserClients.php');

            $userClients2 = new UserClients();

            $userClients2->setCoreBusinessId($coreBussines);
            $userClients2->setSatBusinessId($sateliteBussines);
            $userClients2->setIdOperation($category);
            $userClients2->setidClient($id);

            $userClients2->atualizar("CoreBusinessId = :CoreBusinessId, SatBusinessId = :SatBusinessId, IdOperation = :IdOperation WHERE idClient = :idClient");


        }else if(($coreBussines >= 6)){    


            $sateliteBussines = $_POST["coreBusiness"];

            include_once('../model/classes/tblUserClients.php');

            $userClients2 = new UserClients();

            $userClients2->setCoreBusinessId($coreBussines);
            $userClients2->setSatBusinessId($sateliteBussines);
            $userClients2->setidClient($id);

            $userClients2->atualizar("CoreBusinessId = :CoreBusinessId, SatBusinessId = :SatBusinessId, IdOperation = NULL WHERE idClient = :idClient");

            
        }else{

            $_SESSION['errorQuali'] = "Nenhum satelite bussiness ou category selecionado";

            header("Location: ../view/qualificacao.php?aba=".$_SESSION['errorQuali']);

        }

        //$sqlcategoria = "UPDATE tblUserClients SET CoreBusinessId = :CoreBusinessId, SatBusinessId = :SatBusinessId, IdOperation = :IdOperation WHERE idClient = :idClient LIMIT 1";
        //$querycategoria = $dbh->prepare($sqlcategoria);
        //$querycategoria->bindParam(':CoreBusinessId', $businesst, PDO::PARAM_INT);
        //$querycategoria->bindParam(':SatBusinessId', $coreBusinesst, PDO::PARAM_INT);
        //$querycategoria->bindParam(':IdOperation', $satellitet, PDO::PARAM_INT);
        //$querycategoria->bindParam(':idClient', $id, PDO::PARAM_INT);
        //$querycategoria->execute();

        //echo '<br>OperationsIdg: ' . $operationIdG;
        //echo '<br>coreBusinnesst: ' . $coreBusinesst;
        //echo '<br>satelliet: ' . $satellitet;
        //echo '<br>id: ' . $id;

        
        $_POST["create"] = "";

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
        //$query = $dbh->prepare($sql);
        //$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
        //$query->execute();
        //$results = $query->fetchAll(PDO::FETCH_OBJ);
        //if ($query->rowCount() > 0) {return $results;}else{return null;}

        $userClients3 = new UserClients();

        $userClients3->setidClient($id);

        $resultslogin = $userClients3->consulta("WHERE idClient = :idClient");

        if ($resultslogin != null) {
            foreach ($resultslogin as $rowlogin) {
                $_SESSION['sessao'] = 1;
                $_SESSION['loginerro'] = "";
                $_SESSION["id"] = $rowlogin->idClient;
                $_SESSION['emailC'] = $rowlogin->email;
                $_SESSION['idC'] = $rowlogin->idClient;
                $_SESSION['fName'] = $rowlogin->FirstName;
                $_SESSION['lName'] = $rowlogin->LastName;

                if($coreBussines == "3" || $coreBussines == "4"){
                    header("Location: ../view/qualidistribuidor.php");
                }else{
                    header("Location: ../view/home.php");
                }
                
            }
        }
    }else{

        $_SESSION['errorQuali'] = "Nenhum core bussiness selecionado";

        header("Location: ../view/qualificacao.php?aba=".$_SESSION['errorQuali']);

    }
}

?>