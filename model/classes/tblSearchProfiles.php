<?php

class SearchProfiles{
    
    protected $SearchProfilesId = null;
    protected $SearchProfileNameId = null;
    protected $ClientId = null;
    protected $SearchFieldID = null;
    protected $Value = null;
    protected $Concatenator = null;
    protected $FlagDeleted = null;



    public function setSearchProfilesId($param){$this->SearchProfilesId = $param;}

    public function getSearchProfilesId(){return $this->SearchProfilesId;}

    public function setSearchProfileNameId($param){$this->SearchProfileNameId = $param;}
    
    public function getSearchProfileNameId(){return $this->SearchProfileNameId;}

    public function setClientId($param){$this->ClientId = $param;}
    
    public function getClientId(){return $this->ClientId;}

    public function setSearchFieldID($param){$this->SearchFieldID = $param;}
    
    public function getSearchFieldID(){return $this->SearchFieldID;}

    public function setValue($param){$this->Value = $param;}
    
    public function getValue(){return $this->Value;}

    public function setConcatenator($param){$this->Concatenator = $param;}
    
    public function getConcatenator(){return $this->Concatenator;}

    public function setFlagDeleted($param){$this->FlagDeleted = $param;}
    
    public function getFlagDeleted(){return $this->FlagDeleted;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblSearchProfiles (SearchProfilesId,SearchProfileNameId,ClientId,SearchFieldID,Value,Concatenator,FlagDeleted) VALUES (:SearchProfilesId,:SearchProfileNameId,:ClientId,:SearchFieldID,:Value,:Concatenator,:FlagDeleted)";
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfilesId != null){
            $query->bindParam(':SearchProfilesId', $this->SearchProfilesId, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->ClientId != null){
            $query->bindParam(':ClientId', $this->ClientId, PDO::PARAM_INT);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->Value != null){
            $query->bindParam(':Value', $this->Value, PDO::PARAM_STR);
        }
        if($this->Concatenator != null){
            $query->bindParam(':Concatenator', $this->Concatenator, PDO::PARAM_STR);
        }
        if($this->FlagDeleted != null){
            $query->bindParam(':FlagDeleted', $this->FlagDeleted, PDO::PARAM_INT);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchProfiles ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfilesId != null){
            $query->bindParam(':SearchProfilesId', $this->SearchProfilesId, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->ClientId != null){
            $query->bindParam(':ClientId', $this->ClientId, PDO::PARAM_INT);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->Value != null){
            $query->bindParam(':Value', $this->Value, PDO::PARAM_STR);
        }
        if($this->Concatenator != null){
            $query->bindParam(':Concatenator', $this->Concatenator, PDO::PARAM_STR);
        }
        if($this->FlagDeleted != null){
            $query->bindParam(':FlagDeleted', $this->FlagDeleted, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchProfiles SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfilesId != null){
            $query->bindParam(':SearchProfilesId', $this->SearchProfilesId, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->ClientId != null){
            $query->bindParam(':ClientId', $this->ClientId, PDO::PARAM_INT);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->Value != null){
            $query->bindParam(':Value', $this->Value, PDO::PARAM_STR);
        }
        if($this->Concatenator != null){
            $query->bindParam(':Concatenator', $this->Concatenator, PDO::PARAM_STR);
        }
        if($this->FlagDeleted != null){
            $query->bindParam(':FlagDeleted', $this->FlagDeleted, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchProfiles ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfilesId != null){
            $query->bindParam(':SearchProfilesId', $this->SearchProfilesId, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->ClientId != null){
            $query->bindParam(':ClientId', $this->ClientId, PDO::PARAM_INT);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->Value != null){
            $query->bindParam(':Value', $this->Value, PDO::PARAM_STR);
        }
        if($this->Concatenator != null){
            $query->bindParam(':Concatenator', $this->Concatenator, PDO::PARAM_STR);
        }
        if($this->FlagDeleted != null){
            $query->bindParam(':FlagDeleted', $this->FlagDeleted, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>