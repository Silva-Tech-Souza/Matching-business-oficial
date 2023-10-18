<?php

class Business{
    protected $idBusiness = null;
    protected $NmBusiness = null;
    protected $FlagOperation = null;
    protected $IdOperation = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidBusiness($param){$this->idBusiness = $param;}

    public function getidBusiness(){return $this->idBusiness;}

    public function setNmBusiness($param){$this->NmBusiness = $param;}
    
    public function getNmBusiness(){return $this->NmBusiness;}

    public function setFlagOperation($param){$this->FlagOperation = $param;}
    
    public function getFlagOperation(){return $this->FlagOperation;}

    public function setIdOperation($param){$this->IdOperation = $param;}
    
    public function getIdOperation(){return $this->IdOperation;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblBusiness (idBusiness,NmBusiness,FlagOperation,IdOperation) VALUES (:idBusiness, :NmBusiness,:FlagOperation,:IdOperation)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusiness != null){
            $query->bindParam(':NmBusiness', $this->NmBusiness, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }

        $query->execute();
        
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from `tblBusiness` ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusiness != null){
            $query->bindParam(':NmBusiness', $this->NmBusiness, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblBusiness SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusiness != null){
            $query->bindParam(':NmBusiness', $this->NmBusiness, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }

        $query->execute();
       
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblBusiness ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusiness != null){
            $query->bindParam(':NmBusiness', $this->NmBusiness, PDO::PARAM_STR);
        }
        if($this->FlagOperation != null){
            $query->bindParam(':FlagOperation', $this->FlagOperation, PDO::PARAM_STR);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }

        $query->execute();
        
        return $query;

    }
}

?>