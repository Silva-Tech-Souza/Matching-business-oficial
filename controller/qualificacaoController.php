<?php
    if ($_POST["create"] != "") {

        $id =  $_SESSION["id"];
        $idoperationbs = 0;
        $businesst = $_POST["business"];
        

        //$sqlbusinesop = "SELECT * from tblBusiness WHERE IdOperation = :IdOperation ";
        //$querybusinesop = $dbh->prepare($sqlbusinesop);
        //$querybusinesop->bindParam(':IdOperation', $businesst, PDO::PARAM_INT);
        //$querybusinesop->execute();
        //$resulbusinesop = $querybusinesop->fetchAll(PDO::FETCH_OBJ);
        //if ($querybusinesop->rowCount() > 0){return $resulbusinesop;}else{return null;}

        include_once('../model/classes/tblBusiness.php');

        $business = new Business();

        $business->setidBusiness($businesst);

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
            $satellitet = $businesst;
        }
        if ($coreBusinesst == "") {
            $satellitet = $businesst;
        }

        //$sqlcategoria = "UPDATE tblUserClients SET CoreBusinessId = :CoreBusinessId, SatBusinessId = :SatBusinessId, IdOperation = :IdOperation WHERE idClient = :idClient LIMIT 1";
        //$querycategoria = $dbh->prepare($sqlcategoria);
        //$querycategoria->bindParam(':CoreBusinessId', $businesst, PDO::PARAM_INT);
        //$querycategoria->bindParam(':SatBusinessId', $coreBusinesst, PDO::PARAM_INT);
        //$querycategoria->bindParam(':IdOperation', $satellitet, PDO::PARAM_INT);
        //$querycategoria->bindParam(':idClient', $id, PDO::PARAM_INT);
        //$querycategoria->execute();

        include_once('../model/classes/tblUserClients.php');

        $userClients = new UserClients();

        $userClients->setCoreBusinessId($businesst);
        $userClients->setSatBusinessId($coreBusinesst);
        $userClients->setIdOperation($satellitet);
        $userClients->setidClient($id);

        $userClients->atualizar("CoreBusinessId = :CoreBusinessId, SatBusinessId = :SatBusinessId, IdOperation = :IdOperation WHERE idClient = :idClient LIMIT 1");

        $_POST["create"] = "";

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
        //$query = $dbh->prepare($sql);
        //$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
        //$query->execute();
        //$results = $query->fetchAll(PDO::FETCH_OBJ);
        //if ($query->rowCount() > 0) {return $results;}else{return null;}

        include_once('../model/classes/tblUserClients.php');

        $userClients = new UserClients();

        $userClients->setidClient($iduser);

        $resultslogin = $userClients->consulta("WHERE idClient = :idClient");

        if ($resultslogin != null) {
            foreach ($resultslogin as $rowlogin) {
                $_SESSION['sessao'] = 1;
                $_SESSION['loginerro'] = "";
                $_SESSION["id"] = $rowlogin->idClient;
                $_SESSION['emailC'] = $rowlogin->email;
                $_SESSION['idC'] = $rowlogin->idClient;
                $_SESSION['fName'] = $rowlogin->FirstName;
                $_SESSION['lName'] = $rowlogin->LastName;

                if($businesst == "3" || $businesst == "4"){
                    header("Location: ../view/qualidistribuidor.php");
                }else{
                    header("Location: ../view/home.php");
                }
                
            }
        }
    }

?>