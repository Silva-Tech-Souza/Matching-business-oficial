<?php

class SearchStructure{
    
    protected $SearchFieldID = null;
    protected $PKTable = null;
    protected $PKField = null;
    protected $DescTableField = null;
    protected $SearcheFieldNameForUser = null;
    protected $OrderByExpression = null;
    protected $TypeOfSearch = null;
    protected $LinkStatement = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function setSearchFieldID($param){$this->SearchFieldID = $param;}

    public function getSearchFieldID(){return $this->SearchFieldID;}

    public function setPKTable($param){$this->PKTable = $param;}
    
    public function getPKTable(){return $this->PKTable;}

    public function setPKField($param){$this->PKField = $param;}
    
    public function getPKField(){return $this->PKField;}

    public function setDescTableField($param){$this->DescTableField = $param;}
    
    public function getDescTableField(){return $this->DescTableField;}

    public function setSearcheFieldNameForUser($param){$this->SearcheFieldNameForUser = $param;}
    
    public function getSearcheFieldNameForUser(){return $this->SearcheFieldNameForUser;}

    public function setOrderByExpression($param){$this->OrderByExpression = $param;}
    
    public function getOrderByExpression(){return $this->OrderByExpression;}

    public function setTypeOfSearch($param){$this->TypeOfSearch = $param;}
    
    public function getTypeOfSearch(){return $this->TypeOfSearch;}

    public function setLinkStatement($param){$this->LinkStatement = $param;}
    
    public function getLinkStatement(){return $this->LinkStatement;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblSearchStructure (SearchFieldID,PKTable,PKField,SearchFieldID,DescTableField,SearcheFieldNameForUser,OrderByExpression,TypeOfSearch,LinkStatement) VALUES (:SearchFieldID,:PKTable,:PKField,:SearchFieldID,:DescTableField,:SearcheFieldNameForUser,:OrderByExpression,:TypeOfSearch,:LinkStatement)";
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->PKTable != null){
            $query->bindParam(':PKTable', $this->PKTable, PDO::PARAM_STR);
        }
        if($this->PKField != null){
            $query->bindParam(':PKField', $this->PKField, PDO::PARAM_STR);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_STR);
        }
        if($this->DescTableField != null){
            $query->bindParam(':DescTableField', $this->DescTableField, PDO::PARAM_STR);
        }
        if($this->SearcheFieldNameForUser != null){
            $query->bindParam(':SearcheFieldNameForUser', $this->SearcheFieldNameForUser, PDO::PARAM_STR);
        }
        if($this->OrderByExpression != null){
            $query->bindParam(':OrderByExpression', $this->OrderByExpression, PDO::PARAM_STR);
        }
        if($this->TypeOfSearch != null){
            $query->bindParam(':TypeOfSearch', $this->TypeOfSearch, PDO::PARAM_STR);
        }
        if($this->LinkStatement != null){
            $query->bindParam(':LinkStatement', $this->LinkStatement, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchStructure ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->PKTable != null){
            $query->bindParam(':PKTable', $this->PKTable, PDO::PARAM_STR);
        }
        if($this->PKField != null){
            $query->bindParam(':PKField', $this->PKField, PDO::PARAM_STR);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_STR);
        }
        if($this->DescTableField != null){
            $query->bindParam(':DescTableField', $this->DescTableField, PDO::PARAM_STR);
        }
        if($this->SearcheFieldNameForUser != null){
            $query->bindParam(':SearcheFieldNameForUser', $this->SearcheFieldNameForUser, PDO::PARAM_STR);
        }
        if($this->OrderByExpression != null){
            $query->bindParam(':OrderByExpression', $this->OrderByExpression, PDO::PARAM_STR);
        }
        if($this->TypeOfSearch != null){
            $query->bindParam(':TypeOfSearch', $this->TypeOfSearch, PDO::PARAM_STR);
        }
        if($this->LinkStatement != null){
            $query->bindParam(':LinkStatement', $this->LinkStatement, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchStructure SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->PKTable != null){
            $query->bindParam(':PKTable', $this->PKTable, PDO::PARAM_STR);
        }
        if($this->PKField != null){
            $query->bindParam(':PKField', $this->PKField, PDO::PARAM_STR);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_STR);
        }
        if($this->DescTableField != null){
            $query->bindParam(':DescTableField', $this->DescTableField, PDO::PARAM_STR);
        }
        if($this->SearcheFieldNameForUser != null){
            $query->bindParam(':SearcheFieldNameForUser', $this->SearcheFieldNameForUser, PDO::PARAM_STR);
        }
        if($this->OrderByExpression != null){
            $query->bindParam(':OrderByExpression', $this->OrderByExpression, PDO::PARAM_STR);
        }
        if($this->TypeOfSearch != null){
            $query->bindParam(':TypeOfSearch', $this->TypeOfSearch, PDO::PARAM_STR);
        }
        if($this->LinkStatement != null){
            $query->bindParam(':LinkStatement', $this->LinkStatement, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchStructure ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_INT);
        }
        if($this->PKTable != null){
            $query->bindParam(':PKTable', $this->PKTable, PDO::PARAM_STR);
        }
        if($this->PKField != null){
            $query->bindParam(':PKField', $this->PKField, PDO::PARAM_STR);
        }
        if($this->SearchFieldID != null){
            $query->bindParam(':SearchFieldID', $this->SearchFieldID, PDO::PARAM_STR);
        }
        if($this->DescTableField != null){
            $query->bindParam(':DescTableField', $this->DescTableField, PDO::PARAM_STR);
        }
        if($this->SearcheFieldNameForUser != null){
            $query->bindParam(':SearcheFieldNameForUser', $this->SearcheFieldNameForUser, PDO::PARAM_STR);
        }
        if($this->OrderByExpression != null){
            $query->bindParam(':OrderByExpression', $this->OrderByExpression, PDO::PARAM_STR);
        }
        if($this->TypeOfSearch != null){
            $query->bindParam(':TypeOfSearch', $this->TypeOfSearch, PDO::PARAM_STR);
        }
        if($this->LinkStatement != null){
            $query->bindParam(':LinkStatement', $this->LinkStatement, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>