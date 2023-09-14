<?php

class ContractTypes{
    
    protected $IdContractType = null;
    protected $ContractType = null;
    protected $ContractText = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setIdContractType($param){$this->IdContractType = $param;}

    public function getIdContractType(){return $this->IdContractType;}

    public function setContractType($param){$this->ContractType = $param;}
    
    public function getContractType(){return $this->ContractType;}

    public function setContractText($param){$this->ContractText = $param;}
    
    public function getContractText(){return $this->ContractText;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblContractTypes (IdContractType,ContractType,ContractText) VALUES (:IdContractType, :ContractType,:ContractText)";
        $query = $this->dbh->prepare($sql);
        
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractType != null){
            $query->bindParam(':ContractType', $this->ContractType, PDO::PARAM_STR);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblContractTypes ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractType != null){
            $query->bindParam(':ContractType', $this->ContractType, PDO::PARAM_STR);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblContractTypes SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractType != null){
            $query->bindParam(':ContractType', $this->ContractType, PDO::PARAM_STR);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblContractTypes ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractType != null){
            $query->bindParam(':ContractType', $this->ContractType, PDO::PARAM_STR);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }
}

?>