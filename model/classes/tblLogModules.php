<?php

class LogModules{
    
    protected $idLogModules = null;
    protected $DescLogModule = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidLogModules($param){$this->idLogModules = $param;}

    public function getidLogModules(){return $this->idLogModules;}

    public function setDescLogModule($param){$this->DescLogModule = $param;}
    
    public function getDescLogModule(){return $this->DescLogModule;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblLogModules (idLogModules,DescLogModule) VALUES (:idLogModules, :DescLogModule)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogModules != null){
            $query->bindParam(':idLogModules', $this->idLogModules, PDO::PARAM_INT);
        }
        if($this->DescLogModule != null){
            $query->bindParam(':DescLogModule', $this->DescLogModule, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblLogModules ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idLogModules != null){
            $query->bindParam(':idLogModules', $this->idLogModules, PDO::PARAM_INT);
        }
        if($this->DescLogModule != null){
            $query->bindParam(':DescLogModule', $this->DescLogModule, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblLogModules SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idLogModules != null){
            $query->bindParam(':idLogModules', $this->idLogModules, PDO::PARAM_INT);
        }
        if($this->DescLogModule != null){
            $query->bindParam(':DescLogModule', $this->DescLogModule, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblLogModules ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogModules != null){
            $query->bindParam(':idLogModules', $this->idLogModules, PDO::PARAM_INT);
        }
        if($this->DescLogModule != null){
            $query->bindParam(':DescLogModule', $this->DescLogModule, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>