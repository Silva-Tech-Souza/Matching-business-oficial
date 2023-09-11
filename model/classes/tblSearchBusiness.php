<?php

class SearchBusiness{
    
    protected $idSearchBusiness = null;
    protected $idSearch  = null;
    protected $idBusiness = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidSearchBusiness($param){$this->idSearchBusiness = $param;}

    public function getidSearchBusiness(){return $this->idSearchBusiness;}

    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setidBusiness($param){$this->idBusiness = $param;}

    public function getidBusiness(){return $this->idBusiness;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearchBusiness(`idSearch`,`idBusiness`)VALUES(:idSearch, :idBusiness);";
        $query = $this->dbh->prepare($sql);

        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchBusiness ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchBusiness != null){
            $query->bindParam(':idSearchBusiness', $this->idSearchBusiness, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchBusiness SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchBusiness != null){
            $query->bindParam(':idSearchBusiness', $this->idSearchBusiness, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchBusiness ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchBusiness != null){
            $query->bindParam(':idSearchBusiness', $this->idSearchBusiness, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>