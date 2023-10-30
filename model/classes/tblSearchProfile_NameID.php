<?php

class SearchProfile_NameID{
    
    protected $SearchProfileNameId = null;
    protected $idClient = null;
    protected $SearchProfileName = null;
    protected $SearchProfileStatus = null;
    protected $SearchProfile_CreatedAt = null;
    protected $SearchProfile_LastChange = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setSearchProfileNameId($param){$this->SearchProfileNameId = $param;}

    public function getSearchProfileNameId(){return $this->SearchProfileNameId;}

    public function setIdClient($param){$this->idClient = $param;}
    
    public function getIdClient(){return $this->idClient;}

    public function setSearchProfileName($param){$this->SearchProfileName = $param;}
    
    public function getSearchProfileName(){return $this->SearchProfileName;}

    public function setSearchProfileStatus($param){$this->SearchProfileStatus = $param;}
    
    public function getSearchProfileStatus(){return $this->SearchProfileStatus;}

    public function setSearchProfile_CreatedAt($param){$this->SearchProfile_CreatedAt = $param;}
    
    public function getSearchProfile_CreatedAt(){return $this->SearchProfile_CreatedAt;}

    public function setSearchProfile_LastChange($param){$this->SearchProfile_LastChange = $param;}
    
    public function getSearchProfile_LastChange(){return $this->SearchProfile_LastChange;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblSearchProfile_NameID (SearchProfileNameId,idClient,SearchProfileName,SearchProfileStatus,SearchProfile_CreatedAt,SearchProfile_LastChange) VALUES (:SearchProfileNameId,:idClient,:SearchProfileName,:SearchProfileStatus,:SearchProfile_CreatedAt,:SearchProfile_LastChange)";
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->SearchProfileName != null){
            $query->bindParam(':SearchProfileName', $this->SearchProfileName, PDO::PARAM_STR);
        }
        if($this->SearchProfileStatus != null){
            $query->bindParam(':SearchProfileStatus', $this->SearchProfileStatus, PDO::PARAM_STR);
        }
        if($this->SearchProfile_CreatedAt != null){
            $query->bindParam(':SearchProfile_CreatedAt', $this->SearchProfile_CreatedAt, PDO::PARAM_STR);
        }
        if($this->SearchProfile_LastChange != null){
            $query->bindParam(':SearchProfile_LastChange', $this->SearchProfile_LastChange, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchProfile_NameID ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->SearchProfileName != null){
            $query->bindParam(':SearchProfileName', $this->SearchProfileName, PDO::PARAM_STR);
        }
        if($this->SearchProfileStatus != null){
            $query->bindParam(':SearchProfileStatus', $this->SearchProfileStatus, PDO::PARAM_STR);
        }
        if($this->SearchProfile_CreatedAt != null){
            $query->bindParam(':SearchProfile_CreatedAt', $this->SearchProfile_CreatedAt, PDO::PARAM_STR);
        }
        if($this->SearchProfile_LastChange != null){
            $query->bindParam(':SearchProfile_LastChange', $this->SearchProfile_LastChange, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchProfile_NameID SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->SearchProfileName != null){
            $query->bindParam(':SearchProfileName', $this->SearchProfileName, PDO::PARAM_STR);
        }
        if($this->SearchProfileStatus != null){
            $query->bindParam(':SearchProfileStatus', $this->SearchProfileStatus, PDO::PARAM_STR);
        }
        if($this->SearchProfile_CreatedAt != null){
            $query->bindParam(':SearchProfile_CreatedAt', $this->SearchProfile_CreatedAt, PDO::PARAM_STR);
        }
        if($this->SearchProfile_LastChange != null){
            $query->bindParam(':SearchProfile_LastChange', $this->SearchProfile_LastChange, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchProfile_NameID ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->SearchProfileName != null){
            $query->bindParam(':SearchProfileName', $this->SearchProfileName, PDO::PARAM_STR);
        }
        if($this->SearchProfileStatus != null){
            $query->bindParam(':SearchProfileStatus', $this->SearchProfileStatus, PDO::PARAM_STR);
        }
        if($this->SearchProfile_CreatedAt != null){
            $query->bindParam(':SearchProfile_CreatedAt', $this->SearchProfile_CreatedAt, PDO::PARAM_STR);
        }
        if($this->SearchProfile_LastChange != null){
            $query->bindParam(':SearchProfile_LastChange', $this->SearchProfile_LastChange, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>