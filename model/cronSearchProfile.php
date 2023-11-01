<?php
    include_once('classes/conexao.php');

    $query = "CALL `ProcedureMestre`()";

    $stmt = $dbh->prepare($query);

    $stmt->execute();

     // Verificando se a execução foi bem-sucedida
     if ($stmt) {
        echo "A chamada da procedure foi bem-sucedida!";
    } else {
        echo "Ocorreu um erro ao chamar a procedure.";
    }
    
    
    //Teste de Perfil inativo sem criação de senha
    
    include_once('classes/tblUserClients.php');

    $usuarioModel = new UserClients($dbh);

    $results = $usuarioModel->consulta('WHERE idFlagStatusCadastro = "2" ');

    if($results != null){

        foreach($results as $resultadoUnid){

            $dataDeCriacao = strtotime($resultadoUnid->created_at);
            $atual = time();

            if ($atual - $dataDeCriacao >= 24 * 60 * 60) {
              
                echo 'Achou '.$resultadoUnid->FirstName. "
                Diferença Tempo: ".($atual - $dataDeCriacao); 

                $usuarioModel = new UserClients($dbh);
                $usuarioModel->setidClient($resultadoUnid->idClient);

                $usuarioModel->deletar("WHERE idClient = :idClient");

            }else{

                echo 'Não Achou '.$resultadoUnid->FirstName. "
                Diferença Tempo: ".($atual - $dataDeCriacao);

            }

        }

    }

?>