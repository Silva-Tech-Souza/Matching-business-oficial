<?php
include_once('../model/classes/conexao.php');
include_once("../model/classes/tblBusiness.php");
include_once('../model/classes/tblUserClients.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}
if (!isset($_SESSION["id"])) {
    header("Location: ../view/login.php");
}

    if ($_POST["create"] != "") {
        

        $id = $_SESSION["id"];

        $CoreBusinessIdpost = $_POST["coreBusiness"];

        if($_POST["coreBusiness"] >= 6){


          $operation = new Business($dbh);
  
          $operation->setidOperation($CoreBusinessIdpost);
          $resultOperation = $operation->consulta('WHERE IdOperation = :IdOperation');

          if($resultOperation != null){

            foreach($resultOperation as $resultOperationUNID){

              $_POST["satellite"] = $resultOperationUNID->idBusiness;

            }

          }
      
        }
      
      
        $userClients = new UserClients($dbh);
        $userClients-> setidClient($id);

        $userClients-> setCoreBusinessId($CoreBusinessIdpost);
        
        if(isset($_POST["satellite"])){
          $userClients-> setSatBusinessId($_POST["satellite"]);
        }
        if(isset($_POST["category"])){
          $userClients-> setIdOperation($_POST["category"]);
        }
      
        if(isset($_POST["category"])){
      
          $userClients->atualizar("CoreBusinessId = :CoreBusinessId, IdOperation = :IdOperation, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
        }else{
      
          $userClients->atualizar("CoreBusinessId = :CoreBusinessId, IdOperation = NULL, SatBusinessId = :SatBusinessId WHERE idClient = :idClient");
        }

        $_POST["create"] = "";

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient";
        //$query = $dbh->prepare($sql);
        //$query->bindParam(':idClient', $iduser, PDO::PARAM_INT);
        //$query->execute();
        //$results = $query->fetchAll(PDO::FETCH_OBJ);
        //if ($query->rowCount() > 0) {return $results;}else{return null;}

        $userClients3 = new UserClients($dbh);

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

                if($CoreBusinessIdpost == "3" || $CoreBusinessIdpost == "4"){
                    header("Location: ../view/qualidistribuidor.php");
                }else{
                    header("Location: ../view/profile.php");
                }
                
            }
        }
    }

?>