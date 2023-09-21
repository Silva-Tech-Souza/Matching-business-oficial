<?php

function myLog()
{
    if( ! is_null( $error = error_get_last() ) )
    {
        // obtendo informações do erro e disparando uma Exception
        extract( $error , EXTR_SKIP );

        include_once('../model/classes/tblLogError.php');
        include_once('../model/classes/tblLogErrorCode.php');

        $logErrorCode = new LogErrorCode();

        $logErrorCode->setDescLogError($message.
                                        "\nArquivo: ". $file.
                                        "\nLinha: " . $line);
    
        $idLogErrorCode = $logErrorCode->cadastrar();

        new Exception($message = $message,$code = $line,$previous=null);

    }
}

register_shutdown_function( 'myLog' );

function myException( $exception )
{
    // mensagem de erro, grave um TXT-LOG com os dados do erro
    echo '<h2>Error</h2><h3>Mensagem:</h3><pre>' . $exception->getMessage() . '</pre>
          <h3>Arquivo:</h3><pre>' . $exception->getLine() . '</pre>
          <h3>Linha:</h3><pre>' . $exception->getLine() . '</pre>
          <h3>Código:</h3><pre>' . $exception->getCode() . '</pre>';

    /*if($results != null){ 

      foreach($results as $resultsUnid){

        $logErros = new LogError();

        if($resultsUnid->idLogErrorCode != null){
        
            $logErros->setIdError($resultsUnid->idLogErrorCode);
        
        }

        if(isset($_SESSION["id"])){

        $logErros->setidClient($_SESSION["id"]);

        }else{

        $logErros->setidClient(0);

        }

        if($logErros->getIdError() != null){

            $logErros->cadastrar();
            
        }

      }

    }else{

      
      $logErros = new LogError();

      $logErros->setIdError($idLogErrorCode);

      if(isset($iduser)){

        $logErros->setidClient($iduser);

      }

      $logErros->cadastrar();

    }
    

  }*/


    sleep(10);

    header('location: ../controller/logout.php');

}

//set_exception_handler( 'myException' );

function log_error( $code , $error , $file , $line )
{
    // obtendo informações do erro e disparando uma Exception
    if( error_reporting() === 0 ) return;

    include_once('../model/classes/tblLogError.php');
    include_once('../model/classes/tblLogErrorCode.php');

    $logErrorCode = new LogErrorCode();

    $logErrorCode->setDescLogError($error.
                                    "\nArquivo: ". $file.
                                    "\nLinha: " . $line);

    $idLogErrorCode = $logErrorCode->cadastrar();

    new Exception($message = $error ,$code = $code ,$previous=null);

}

set_error_handler( 'log_error' );

?>