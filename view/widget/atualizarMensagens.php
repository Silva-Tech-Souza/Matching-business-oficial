
<?php
include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tblChat.php');

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$iduser = $_POST['iduser'];
$idClientConversa = $_POST['idClientConversa'];

$Message_Results = new Chat($dbh);
$Message_Results->setidClient($iduser);
$Message_Results->setidClientEnviado($idClientConversa);


$mensagens = $Message_Results->consulta('WHERE (idClientEnviado = :idClient AND idClient = :idClientEnviado) OR (idClientEnviado = :idClientEnviado AND idClient = :idClient) ORDER BY `tblChat`.`Date` ASC LIMIT 100');

$response = array();

if ($mensagens != null) {
  foreach ($mensagens as $mensagenUnid) {
    if ($mensagenUnid->idClient == $iduser) {
        $data = new DateTime($mensagenUnid->Date); 
         $dataFormatada = $data->format('d/m/Y H:s');
      $response['messages'][] = array(
        'type' => 'repaly',
        'text' => $mensagenUnid->Text,
        'date' => $dataFormatada
      );
    } else {
      $response['messages'][] = array(
        'type' => 'sender',
        'text' => $mensagenUnid->Text,
        'date' => $dataFormatada
      );
    }
  }
}

header('Content-Type: application/json');
echo json_encode($response);
?>