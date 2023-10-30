<?php

class QualificationCB{
    
    protected $idQualificationCB = null;
    protected $IdClient = null;
    protected $IdBusinessCategory = null;
    protected $FlagDeletado = null;
    protected $FlagSB = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidQualificationCB($param){$this->idQualificationCB = $param;}

    public function getidQualificationCB(){return $this->idQualificationCB;}

    public function setIdClient($param){$this->IdClient = $param;}
    
    public function getIdClient(){return $this->IdClient;}

    public function setIdBusinessCategory($param){$this->IdBusinessCategory = $param;}
    
    public function getIdBusinessCategory(){return $this->IdBusinessCategory;}

    public function setFlagDeletado($param){$this->FlagDeletado = $param;}
    
    public function getFlagDeletado(){return $this->FlagDeletado;}

    public function setFlagSB($param){$this->FlagSB = $param;}
    
    public function getFlagSB(){return $this->FlagSB;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblQualificationCB (idQualificationCB,IdClient,IdBusinessCategory,FlagDeletado,FlagSB) VALUES (:idQualificationCB, :IdClient,:IdBusinessCategory,:FlagDeletado,:FlagSB)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationCB != null){
            $query->bindParam(':idQualificationCB', $this->idQualificationCB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }
        if($this->FlagSB != null){
            $query->bindParam(':FlagSB', $this->FlagSB, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblQualificationCB ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationCB != null){
            $query->bindParam(':idQualificationCB', $this->idQualificationCB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }
        if($this->FlagSB != null){
            $query->bindParam(':FlagSB', $this->FlagSB, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblQualificationCB SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationCB != null){
            $query->bindParam(':idQualificationCB', $this->idQualificationCB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }
        if($this->FlagSB != null){
            $query->bindParam(':FlagSB', $this->FlagSB, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblQualificationCB ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationCB != null){
            $query->bindParam(':idQualificationCB', $this->idQualificationCB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }
        if($this->FlagSB != null){
            $query->bindParam(':FlagSB', $this->FlagSB, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>