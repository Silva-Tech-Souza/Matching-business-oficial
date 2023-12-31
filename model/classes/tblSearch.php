<?php

class Search{
    
    protected $idSearch = null;
    protected $coreBussinessID  = null;
    protected $Nome = null;
    protected $idClient = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setcoreBussinessID($param){$this->coreBussinessID = $param;}

    public function getcoreBussinessID(){return $this->coreBussinessID;}

    public function setNome($param){$this->Nome = $param;}

    public function getNome(){return $this->Nome;}

    public function setidClient($param){$this->idClient = $param;}

    public function getidClient(){return $this->idClient;}



    public function cadastrar(){

        $sql = "INSERT INTO tblSearch (coreBussinessID, idClient, Nome) VALUES (:coreBussinessID,:idClient, :Nome)";
        $query = $this->dbh->prepare($sql);


        if($this->coreBussinessID != null){
            $query->bindParam(':coreBussinessID', $this->coreBussinessID, PDO::PARAM_INT);
        }
        if($this->Nome != null){
            $query->bindParam(':Nome', $this->Nome, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        
        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearch ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->coreBussinessID != null){
            $query->bindParam(':coreBussinessID', $this->coreBussinessID, PDO::PARAM_INT);
        }
        if($this->Nome != null){
            $query->bindParam(':Nome', $this->Nome, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }


        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearch SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->coreBussinessID != null){
            $query->bindParam(':coreBussinessID', $this->coreBussinessID, PDO::PARAM_INT);
        }
        if($this->Nome != null){
            $query->bindParam(':Nome', $this->Nome, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }


        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearch ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->coreBussinessID != null){
            $query->bindParam(':coreBussinessID', $this->coreBussinessID, PDO::PARAM_INT);
        }
        if($this->Nome != null){
            $query->bindParam(':Nome', $this->Nome, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }


        $query->execute();
        return $query;

    }

}

?>