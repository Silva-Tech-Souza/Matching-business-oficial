<?php

class SearchProfile_ResultsHistoryLog{
    
    protected $SearchProfile_ResultsHistoryID = null;
    protected $SearchProfile_OriginalUserResultsID = null;
    protected $SearchProfileNameId = null;
    protected $idClient_Founded = null;
    protected $idClient_DateFounded = null;
    protected $UserResultsID_StatusMatch = null;
    protected $UserResultsID_DateMatch = null;
    protected $ResultsHistoryLogDate = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function setSearchProfile_ResultsHistoryID($param){$this->SearchProfile_ResultsHistoryID = $param;}

    public function getSearchProfile_ResultsHistoryID(){return $this->SearchProfile_ResultsHistoryID;}

    public function setSearchProfile_OriginalUserResultsID($param){$this->SearchProfile_OriginalUserResultsID = $param;}
    
    public function getSearchProfile_OriginalUserResultsID(){return $this->SearchProfile_OriginalUserResultsID;}

    public function setSearchProfileNameId($param){$this->SearchProfileNameId = $param;}
    
    public function getSearchProfileNameId(){return $this->SearchProfileNameId;}

    public function setidClient_Founded($param){$this->idClient_Founded = $param;}
    
    public function getidClient_Founded(){return $this->idClient_Founded;}

    public function setidClient_DateFounded($param){$this->idClient_DateFounded = $param;}
    
    public function getidClient_DateFounded(){return $this->idClient_DateFounded;}

    public function setUserResultsID_StatusMatch($param){$this->UserResultsID_StatusMatch = $param;}
    
    public function getUserResultsID_StatusMatch(){return $this->UserResultsID_StatusMatch;}

    public function setUserResultsID_DateMatch($param){$this->UserResultsID_DateMatch = $param;}
    
    public function getUserResultsID_DateMatch(){return $this->UserResultsID_DateMatch;}

    public function setResultsHistoryLogDate($param){$this->ResultsHistoryLogDate = $param;}
    
    public function getResultsHistoryLogDate(){return $this->ResultsHistoryLogDate;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblSearchProfile_ResultsHistoryLog (SearchProfile_ResultsHistoryID,SearchProfile_OriginalUserResultsID,SearchProfileNameId,idClient_Founded,idClient_DateFounded,UserResultsID_StatusMatch,UserResultsID_DateMatch,ResultsHistoryLogDate) VALUES (:SearchProfile_ResultsHistoryID,:SearchProfile_OriginalUserResultsID,:SearchProfileNameId,:idClient_Founded,:idClient_DateFounded,:UserResultsID_StatusMatch,:UserResultsID_DateMatch,:ResultsHistoryLogDate)";
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsHistoryID != null){
            $query->bindParam(':SearchProfile_ResultsHistoryID', $this->SearchProfile_ResultsHistoryID, PDO::PARAM_INT);
        }
        if($this->SearchProfile_OriginalUserResultsID != null){
            $query->bindParam(':SearchProfile_OriginalUserResultsID', $this->SearchProfile_OriginalUserResultsID, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient_Founded != null){
            $query->bindParam(':idClient_Founded', $this->idClient_Founded, PDO::PARAM_INT);
        }
        if($this->idClient_DateFounded != null){
            $query->bindParam(':idClient_DateFounded', $this->idClient_DateFounded, PDO::PARAM_STR);
        }
        if($this->UserResultsID_StatusMatch != null){
            $query->bindParam(':UserResultsID_StatusMatch', $this->UserResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->UserResultsID_DateMatch != null){
            $query->bindParam(':UserResultsID_DateMatch', $this->UserResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->ResultsHistoryLogDate != null){
            $query->bindParam(':ResultsHistoryLogDate', $this->ResultsHistoryLogDate, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchProfile_ResultsHistoryLog ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsHistoryID != null){
            $query->bindParam(':SearchProfile_ResultsHistoryID', $this->SearchProfile_ResultsHistoryID, PDO::PARAM_INT);
        }
        if($this->SearchProfile_OriginalUserResultsID != null){
            $query->bindParam(':SearchProfile_OriginalUserResultsID', $this->SearchProfile_OriginalUserResultsID, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient_Founded != null){
            $query->bindParam(':idClient_Founded', $this->idClient_Founded, PDO::PARAM_INT);
        }
        if($this->idClient_DateFounded != null){
            $query->bindParam(':idClient_DateFounded', $this->idClient_DateFounded, PDO::PARAM_STR);
        }
        if($this->UserResultsID_StatusMatch != null){
            $query->bindParam(':UserResultsID_StatusMatch', $this->UserResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->UserResultsID_DateMatch != null){
            $query->bindParam(':UserResultsID_DateMatch', $this->UserResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->ResultsHistoryLogDate != null){
            $query->bindParam(':ResultsHistoryLogDate', $this->ResultsHistoryLogDate, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchProfile_ResultsHistoryLog SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsHistoryID != null){
            $query->bindParam(':SearchProfile_ResultsHistoryID', $this->SearchProfile_ResultsHistoryID, PDO::PARAM_INT);
        }
        if($this->SearchProfile_OriginalUserResultsID != null){
            $query->bindParam(':SearchProfile_OriginalUserResultsID', $this->SearchProfile_OriginalUserResultsID, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient_Founded != null){
            $query->bindParam(':idClient_Founded', $this->idClient_Founded, PDO::PARAM_INT);
        }
        if($this->idClient_DateFounded != null){
            $query->bindParam(':idClient_DateFounded', $this->idClient_DateFounded, PDO::PARAM_STR);
        }
        if($this->UserResultsID_StatusMatch != null){
            $query->bindParam(':UserResultsID_StatusMatch', $this->UserResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->UserResultsID_DateMatch != null){
            $query->bindParam(':UserResultsID_DateMatch', $this->UserResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->ResultsHistoryLogDate != null){
            $query->bindParam(':ResultsHistoryLogDate', $this->ResultsHistoryLogDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchProfile_ResultsHistoryLog ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsHistoryID != null){
            $query->bindParam(':SearchProfile_ResultsHistoryID', $this->SearchProfile_ResultsHistoryID, PDO::PARAM_INT);
        }
        if($this->SearchProfile_OriginalUserResultsID != null){
            $query->bindParam(':SearchProfile_OriginalUserResultsID', $this->SearchProfile_OriginalUserResultsID, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->idClient_Founded != null){
            $query->bindParam(':idClient_Founded', $this->idClient_Founded, PDO::PARAM_INT);
        }
        if($this->idClient_DateFounded != null){
            $query->bindParam(':idClient_DateFounded', $this->idClient_DateFounded, PDO::PARAM_STR);
        }
        if($this->UserResultsID_StatusMatch != null){
            $query->bindParam(':UserResultsID_StatusMatch', $this->UserResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->UserResultsID_DateMatch != null){
            $query->bindParam(':UserResultsID_DateMatch', $this->UserResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->ResultsHistoryLogDate != null){
            $query->bindParam(':ResultsHistoryLogDate', $this->ResultsHistoryLogDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>