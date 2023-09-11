<?php

class SearchCountry{
    
    protected $idSearchCountry = null;
    protected $idSearch  = null;
    protected $idCountry = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidSearchCountry($param){$this->idSearchCountry = $param;}

    public function getidSearchCountry(){return $this->idSearchCountry;}

    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setidCountry($param){$this->idCountry = $param;}

    public function getidCountry(){return $this->idCountry;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearchCountry (idSearch, idCountry) VALUES (:idSearch, :idCountry)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchCategory ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchCountry != null){
            $query->bindParam(':idSearchCountry', $this->idSearchCountry, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchCategory SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchCountry != null){
            $query->bindParam(':idSearchCountry', $this->idSearchCountry, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchCategory ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchCountry != null){
            $query->bindParam(':idSearchCountry', $this->idSearchCountry, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>