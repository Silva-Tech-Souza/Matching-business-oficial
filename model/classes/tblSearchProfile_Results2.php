<?php

class SearchProfile_Results2{
    
    protected $SearchProfile_ResultsID = null;
    protected $SearchProfileNameId = null;
    protected $idClient_Founded = null;
    protected $idClient_DateFounded = null;
    protected $ResultsID_StatusMatch = null;
    protected $ResultsID_DateMatch = null;
    protected $idTypeNotifcation = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setSearchProfile_ResultsID($param){$this->SearchProfile_ResultsID = $param;}

    public function getSearchProfile_ResultsID(){return $this->SearchProfile_ResultsID;}

    public function setSearchProfileNameId($param){$this->SearchProfileNameId = $param;}
    
    public function getSearchProfileNameId(){return $this->SearchProfileNameId;}

    public function setidClient_Founded($param){$this->idClient_Founded = $param;}
    
    public function getidClient_Founded(){return $this->idClient_Founded;}

    public function setidClient_DateFounded($param){$this->idClient_DateFounded = $param;}
    
    public function getidClient_DateFounded(){return $this->idClient_DateFounded;}

    public function setResultsID_StatusMatch($param){$this->ResultsID_StatusMatch = $param;}
    
    public function getResultsID_StatusMatch(){return $this->ResultsID_StatusMatch;}

    public function setResultsID_DateMatch($param){$this->ResultsID_DateMatch = $param;}
    
    public function getResultsID_DateMatch(){return $this->ResultsID_DateMatch;}

    public function setidTypeNotifcation($param){$this->idTypeNotifcation = $param;}
    
    public function getidTypeNotifcation(){return $this->idTypeNotifcation;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblSearchProfile_Results2 (SearchProfile_ResultsID,SearchProfileNameId,idClient_Founded,ResultsID_StatusMatch,ResultsID_DateMatch,idTypeNotifcation) VALUES (:SearchProfile_ResultsID,:SearchProfileNameId,:idClient_Founded,:ResultsID_StatusMatch,:ResultsID_DateMatch,:idTypeNotifcation)";
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsID != null){
            $query->bindParam(':SearchProfile_ResultsID', $this->SearchProfile_ResultsID, PDO::PARAM_INT);
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
        if($this->ResultsID_StatusMatch != null){
            $query->bindParam(':ResultsID_StatusMatch', $this->ResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->ResultsID_DateMatch != null){
            $query->bindParam(':ResultsID_DateMatch', $this->ResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchProfile_Results2 ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsID != null){
            $query->bindParam(':SearchProfile_ResultsID', $this->SearchProfile_ResultsID, PDO::PARAM_INT);
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
        if($this->ResultsID_StatusMatch != null){
            $query->bindParam(':ResultsID_StatusMatch', $this->ResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->ResultsID_DateMatch != null){
            $query->bindParam(':ResultsID_DateMatch', $this->ResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchProfile_Results2 SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsID != null){
            $query->bindParam(':SearchProfile_ResultsID', $this->SearchProfile_ResultsID, PDO::PARAM_INT);
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
        if($this->ResultsID_StatusMatch != null){
            $query->bindParam(':ResultsID_StatusMatch', $this->ResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->ResultsID_DateMatch != null){
            $query->bindParam(':ResultsID_DateMatch', $this->ResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchProfile_Results2 ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->SearchProfile_ResultsID != null){
            $query->bindParam(':SearchProfile_ResultsID', $this->SearchProfile_ResultsID, PDO::PARAM_INT);
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
        if($this->ResultsID_StatusMatch != null){
            $query->bindParam(':ResultsID_StatusMatch', $this->ResultsID_StatusMatch, PDO::PARAM_STR);
        }
        if($this->ResultsID_DateMatch != null){
            $query->bindParam(':ResultsID_DateMatch', $this->ResultsID_DateMatch, PDO::PARAM_STR);
        }
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>