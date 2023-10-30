<?php

class Country{
     
    protected $idCountry = null;
    protected $NmCountry = null;
    protected $Continent = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function setidCountry($param){$this->idCountry = $param;}

    public function getidCountry($dbh){return $this->idCountry;}

    public function setNmCountry($param){$this->NmCountry = $param;}
    
    public function getNmCountry($dbh){return $this->NmCountry;}

    public function setContinent($param){$this->Continent = $param;}
    
    public function getContinent(){return $this->Continent;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblCountry (idCountry,NmCountry,Continent) VALUES (:idCountry, :NmCountry,:Continent)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->NmCountry != null){
            $query->bindParam(':NmCountry', $this->NmCountry, PDO::PARAM_STR);
        }
        if($this->Continent != null){
            $query->bindParam(':Continent', $this->Continent, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblCountry ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->NmCountry != null){
            $query->bindParam(':NmCountry', $this->NmCountry, PDO::PARAM_STR);
        }
        if($this->Continent != null){
            $query->bindParam(':Continent', $this->Continent, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblCountry SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->NmCountry != null){
            $query->bindParam(':NmCountry', $this->NmCountry, PDO::PARAM_STR);
        }
        if($this->Continent != null){
            $query->bindParam(':Continent', $this->Continent, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblCountry ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->NmCountry != null){
            $query->bindParam(':NmCountry', $this->NmCountry, PDO::PARAM_STR);
        }
        if($this->Continent != null){
            $query->bindParam(':Continent', $this->Continent, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }
}

?>