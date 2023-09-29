<?php
session_start();
    if ($_POST["create"] != "") {
        

        $id = $_SESSION["id"];
        $idoperationbs = 0;
        $operationIdG = $_POST["business"];
        

        //$sqlbusinesop = "SELECT * from tblBusiness WHERE IdOperation = :IdOperation ";
        //$querybusinesop = $dbh->prepare($sqlbusinesop);
        //$querybusinesop->bindParam(':IdOperation', $businesst, PDO::PARAM_INT);
        //$querybusinesop->execute();
        //$resulbusinesop = $querybusinesop->fetchAll(PDO::FETCH_OBJ);
        //if ($querybusinesop->rowCount() > 0){return $resulbusinesop;}else{return null;}

        include_once('../model/classes/tblBusiness.php');

        $business = new Business();

        $business->setIdOperation($operationIdG);

        $resulbusinesop = $business->consulta("WHERE IdOperation = :IdOperation");

        if($resulbusinesop != null) {
            foreach ($resulbusinesop as $rowlbssop) {
                $idoperationbs = $rowlbssop->idBusiness;
            }
        }

        if ($idoperationbs == 0) {
            $coreBusinesst = $_POST["coreBusiness"];
        } else {
            $coreBusinesst = $idoperationbs;
        }

        $satellitet = $_POST["satellite"];
    

        if ($satellitet == "") {
            $satellitet = $operationIdG;
        }
        if ($coreBusinesst == "") {
            $satellitet = $operationIdG;
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

        include_once('../model/classes/tblUserClients.php');

        $userClients2 = new UserClients();

        $userClients2->setCoreBusinessId($operationIdG);
        $userClients2->setSatBusinessId($coreBusinesst);
        $userClients2->setIdOperation($satellitet);
        $userClients2->setidClient($id);

        $userClients2->atualizar("CoreBusinessId = :CoreBusinessId, SatBusinessId = :SatBusinessId, IdOperation = :IdOperation WHERE idClient = :idClient");

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

                if($operationIdG == "3" || $operationIdG == "4"){
                    header("Location: ../view/qualidistribuidor.php");
                }else{
                    header("Location: ../view/home.php");
                }
                
            }
        }
    }

?>