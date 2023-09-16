<?php

class SearchCategory{
    
    protected $idSearchCategory = null;
    protected $idSearch  = null;
    protected $idCategory = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidSearchCategory($param){$this->idSearchCategory = $param;}

    public function getidSearchCategory(){return $this->idSearchCategory;}

    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setidCategory($param){$this->idCategory = $param;}

    public function getidCategory(){return $this->idCategory;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearchCategory (idSearch, idCategory) VALUES (:idSearch, :idCategory)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCategory != null){
            $query->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
        }

        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchCategory ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchCategory != null){
            $query->bindParam(':idSearchCategory', $this->idSearchCategory, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCategory != null){
            $query->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchCategory SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchCategory != null){
            $query->bindParam(':idSearchCategory', $this->idSearchCategory, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCategory != null){
            $query->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchCategory ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchCategory != null){
            $query->bindParam(':idSearchCategory', $this->idSearchCategory, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idCategory != null){
            $query->bindParam(':idCategory', $this->idCategory, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>