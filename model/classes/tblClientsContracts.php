<?php

class ClientsContracts{
    protected $idClientContract = null;
    protected $idClient = null;
    protected $idContract = null;
    protected $DateOfContract = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function setIdClientContract($param){$this->idClientContract = $param;}

    public function getIdClientContract(){return $this->idClientContract;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setidContract($param){$this->idContract = $param;}
    
    public function getidContract(){return $this->idContract;}

    public function setDateOfContract($param){$this->DateOfContract = $param;}
    
    public function getDateOfContract(){return $this->DateOfContract;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblClientsContracts (IdClientContract,IdClient,idContract,DateOfContract) VALUES (:idClientContract, :idClient,:idContract,:DateOfContract)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idClientContract != null){
            $query->bindParam(':idClientContract', $this->idClientContract, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->DateOfContract != null){
            $query->bindParam(':DateOfContract', $this->DateOfContract, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblBusiness ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idClientContract != null){
            $query->bindParam(':idClientContract', $this->idClientContract, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->DateOfContract != null){
            $query->bindParam(':DateOfContract', $this->DateOfContract, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblBusiness SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idClientContract != null){
            $query->bindParam(':idClientContract', $this->idClientContract, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->DateOfContract != null){
            $query->bindParam(':DateOfContract', $this->DateOfContract, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblBusiness ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idClientContract != null){
            $query->bindParam(':idClientContract', $this->idClientContract, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idContract != null){
            $query->bindParam(':idContract', $this->idContract, PDO::PARAM_INT);
        }
        if($this->DateOfContract != null){
            $query->bindParam(':DateOfContract', $this->DateOfContract, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }
}

?>