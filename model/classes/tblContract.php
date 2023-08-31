<?php

class Contract{
    
    protected $idContract = null;
    protected $IdContractType = null;
    protected $ContractText = null;
    protected $ContractFlagAtive = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidContract($param){$this->idContract = $param;}

    public function getidContract(){return $this->idContract;}

    public function setIdContractType($param){$this->IdContractType = $param;}
    
    public function getIdContractType(){return $this->IdContractType;}

    public function setContractText($param){$this->ContractText = $param;}
    
    public function getContractText(){return $this->ContractText;}

    public function setContractFlagAtive($param){$this->ContractFlagAtive = $param;}
    
    public function getContractFlagAtive(){return $this->ContractFlagAtive;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblContract (IdClientContract,IdClient,idContract,DateOfContract) VALUES (:idContract, :IdContractType,:ContractText,:ContractFlagAtive)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }
        if($this->ContractFlagAtive != null){
            $query->bindParam(':ContractFlagAtive', $this->ContractFlagAtive, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblContract ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }
        if($this->ContractFlagAtive != null){
            $query->bindParam(':ContractFlagAtive', $this->ContractFlagAtive, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblContract SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }
        if($this->ContractFlagAtive != null){
            $query->bindParam(':ContractFlagAtive', $this->ContractFlagAtive, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblContract ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->IdContractType != null){
            $query->bindParam(':IdContractType', $this->IdContractType, PDO::PARAM_INT);
        }
        if($this->ContractText != null){
            $query->bindParam(':ContractText', $this->ContractText, PDO::PARAM_STR);
        }
        if($this->ContractFlagAtive != null){
            $query->bindParam(':ContractFlagAtive', $this->ContractFlagAtive, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }
    
}

?>