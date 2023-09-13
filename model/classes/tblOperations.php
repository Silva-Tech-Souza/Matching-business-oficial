<?php

class Operations{
    
    protected $idOperation = null;
    protected $NmOperation = null;
    protected $FlagOperation = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidOperation($param){$this->idOperation = $param;}

    public function getidOperation(){return $this->idOperation;}

    public function setNmOperation($param){$this->NmOperation = $param;}
    
    public function getNmOperation(){return $this->NmOperation;}

    public function setFlagOperation($param){$this->FlagOperation = $param;}
    
    public function getFlagOperation(){return $this->FlagOperation;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblOperations (idOperation,NmOperation,FlagOperation) VALUES (:idOperation,:NmOperation,:FlagOperation)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idOperation != null){
            $query->bindParam(':idOperation', $this->idOperation, PDO::PARAM_INT);
        }
        if($this->NmOperation != null){
            $query->bindParam(':NmOperation', $this->NmOperation, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblOperations ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idOperation != null){
            $query->bindParam(':idOperation', $this->idOperation, PDO::PARAM_INT);
        }
        if($this->NmOperation != null){
            $query->bindParam(':NmOperation', $this->NmOperation, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblOperations SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idOperation != null){
            $query->bindParam(':idOperation', $this->idOperation, PDO::PARAM_INT);
        }
        if($this->NmOperation != null){
            $query->bindParam(':NmOperation', $this->NmOperation, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblOperations ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idOperation != null){
            $query->bindParam(':idOperation', $this->idOperation, PDO::PARAM_INT);
        }
        if($this->NmOperation != null){
            $query->bindParam(':NmOperation', $this->NmOperation, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>