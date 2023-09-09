<?php

class Search{
    
    protected $idSearch = null;
    protected $coreBussinessID  = null;
    protected $Nome = null;
    protected $idClient = null;
    protected $Estado = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setcoreBussinessID($param){$this->coreBussinessID = $param;}

    public function getcoreBussinessID(){return $this->coreBussinessID;}

    public function setNome($param){$this->Nome = $param;}

    public function getNome(){return $this->Nome;}

    public function setidClient($param){$this->idClient = $param;}

    public function getidClient(){return $this->idClient;}

    public function setEstado($param){$this->Estado = $param;}

    public function getEstado(){return $this->Estado;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearch (coreBussinessID, idClient, Nome, Estado) VALUES (:coreBussinessID,:idClient, :Nome, :Estado)";
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
        if($this->Estado != null){
            $query->bindParam(':Estado', $this->Estado, PDO::PARAM_BOOL);
        }

        $query->execute();
        return $query;

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
        if($this->Estado != null){
            $query->bindParam(':Estado', $this->Estado, PDO::PARAM_BOOL);
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
        if($this->Estado != null){
            $query->bindParam(':Estado', $this->Estado, PDO::PARAM_BOOL);
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
        if($this->Estado != null){
            $query->bindParam(':Estado', $this->Estado, PDO::PARAM_BOOL);
        }

        $query->execute();
        return $query;

    }

}

?>