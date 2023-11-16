<?php

class MatchStatusId{
    
    protected $MatchStatusId = null;
    protected $MatchStatusDesc = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setMatchStatusId($param){$this->MatchStatusId = $param;}

    public function getMatchStatusId(){return $this->MatchStatusId;}

    public function setMatchStatusDesc($param){$this->MatchStatusDesc = $param;}
    
    public function getMatchStatusDesc(){return $this->MatchStatusDesc;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblMatchStatusId (MatchStatusId,MatchStatusDesc) VALUES (:MatchStatusId, :MatchStatusDesc)";
        $query = $this->dbh->prepare($sql);
        
        if($this->MatchStatusId != null){
            $query->bindParam(':MatchStatusId', $this->MatchStatusId, PDO::PARAM_INT);
        }
        if($this->MatchStatusDesc != null){
            $query->bindParam(':MatchStatusDesc', $this->MatchStatusDesc, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblMatchStatusId ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->MatchStatusId != null){
            $query->bindParam(':MatchStatusId', $this->MatchStatusId, PDO::PARAM_INT);
        }
        if($this->MatchStatusDesc != null){
            $query->bindParam(':MatchStatusDesc', $this->MatchStatusDesc, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblMatchStatusId SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->MatchStatusId != null){
            $query->bindParam(':MatchStatusId', $this->MatchStatusId, PDO::PARAM_INT);
        }
        if($this->MatchStatusDesc != null){
            $query->bindParam(':MatchStatusDesc', $this->MatchStatusDesc, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblMatchStatusId ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->MatchStatusId != null){
            $query->bindParam(':MatchStatusId', $this->MatchStatusId, PDO::PARAM_INT);
        }
        if($this->MatchStatusDesc != null){
            $query->bindParam(':MatchStatusDesc', $this->MatchStatusDesc, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>