<?php

class LogError{
    
    protected $idLogError = null;
    protected $idClient = null;
    protected $IdError = null;
    protected $ErrorDate = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidLogError($param){$this->idLogError = $param;}

    public function getidLogError(){return $this->idLogError;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setIdError($param){$this->IdError = $param;}

    public function getIdError(){return $this->IdError;}

    public function setErrorDate($param){$this->ErrorDate = $param;}
    
    public function getErrorDate(){return $this->ErrorDate;}

    

    public function cadastrar(){

        $sql = "INSERT INTO tblLogError (idLogError,idClient,IdError,ErrorDate) VALUES (:idLogError,:idClient,:IdError,:ErrorDate)";
        $query = $this->dbh->prepare($sql);
                
        if($this->idLogError != null){
            $query->bindParam(':idLogError', $this->idLogError, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->IdError != null){
            $query->bindParam(':IdError', $this->IdError, PDO::PARAM_INT);
        }
        if($this->ErrorDate != null){
            $query->bindParam(':ErrorDate', $this->ErrorDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblLogError ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogError != null){
            $query->bindParam(':idLogError', $this->idLogError, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->IdError != null){
            $query->bindParam(':IdError', $this->IdError, PDO::PARAM_INT);
        }
        if($this->ErrorDate != null){
            $query->bindParam(':ErrorDate', $this->ErrorDate, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblLogError SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogError != null){
            $query->bindParam(':idLogError', $this->idLogError, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->IdError != null){
            $query->bindParam(':IdError', $this->IdError, PDO::PARAM_INT);
        }
        if($this->ErrorDate != null){
            $query->bindParam(':ErrorDate', $this->ErrorDate, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblLogError ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogError != null){
            $query->bindParam(':idLogError', $this->idLogError, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->IdError != null){
            $query->bindParam(':IdError', $this->IdError, PDO::PARAM_INT);
        }
        if($this->ErrorDate != null){
            $query->bindParam(':ErrorDate', $this->ErrorDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>