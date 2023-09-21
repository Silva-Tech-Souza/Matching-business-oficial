
<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include_once('../../model/classes/tblChat.php');
$iduser = $_POST['iduser'];
$idClientConversa = $_POST['idClientConversa'];

$Message_Results = new Chat();
$Message_Results->setidClient($iduser);
$Message_Results->setidClientEnviado($idClientConversa);


$mensagens = $Message_Results->consulta('WHERE (idClientEnviado = :idClient AND idClient = :idClientEnviado) OR (idClientEnviado = :idClientEnviado AND idClient = :idClient) ORDER BY `tblChat`.`Date` ASC LIMIT 100');

$response = array();

if ($mensagens != null) {
  foreach ($mensagens as $mensagenUnid) {
    if ($mensagenUnid->idClient == $iduser) {
      $response['messages'][] = array(
        'type' => 'repaly',
        'text' => $mensagenUnid->Text,
        'date' => $mensagenUnid->Date
      );
    } else {
      $response['messages'][] = array(
        'type' => 'sender',
        'text' => $mensagenUnid->Text,
        'date' => $mensagenUnid->Date
      );
    }
  }
}

header('Content-Type: application/json');
echo json_encode($response);
?>