
<?php
include_once('../../model/classes/conexao.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include('../../model/classes/tblUserClients.php');
include_once('../../model/classes/tblOperations.php');
$idClientConversa = $_POST['idClientConversa'];

$userClients = new UserClients($dbh);

$userClients->setidClient($idClientConversa);

$results = $userClients->consulta("WHERE idClient = :idClient");

$response = array();

if ($results != null) {
  foreach ($results as $mensagenUnid) {
    if ($mensagenUnid->PersonalUserPicturePath != "Avatar.png" && $mensagenUnid->PersonalUserPicturePath != "") {
        $urlimg = $mensagenUnid->PersonalUserPicturePath;
    } else {
        $urlimg =  "assets/img/Avatar.png";
    }
    
    $IdOperation =$mensagenUnid->CoreBusinessId;
    $operations = new Operations($dbh);
    $operations->setidOperation($IdOperation);
    $resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
    if ($resultsoperation != null) {
      foreach ($resultsoperation as $rowoperation) {
        $NmOperation = $rowoperation->NmOperation;
      }
    }
      $response['messages'][] = array(
        'name' => $mensagenUnid->FirstName." ".$mensagenUnid->LastName,
        'core' =>$NmOperation,
        'img' => $urlimg
      );
   
  }
}

header('Content-Type: application/json');
echo json_encode($response);
?>