
<?php
include_once('../../model/classes/conexao.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include('../../model/classes/tblUserClients.php');

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
      $response['messages'][] = array(
        'name' => $mensagenUnid->FirstName." ".$mensagenUnid->LastName,
        'core' =>$mensagenUnid->FirstName,
        'img' => $urlimg
      );
   
  }
}

header('Content-Type: application/json');
echo json_encode($response);
?>