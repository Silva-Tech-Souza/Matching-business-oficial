<?php

class SearchEspecificationTag{
    
    protected $idSearchEspecificationTag = null;
    protected $idSearch = null;
    protected $idTagKeys = null;
    protected $Keys = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }

    public function setidSearchEspecificationTag($param){$this->idSearchEspecificationTag = $param;}

    public function getidSearchEspecificationTag(){return $this->idSearchEspecificationTag;}

    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setidTagKeys($param){$this->idTagKeys = $param;}

    public function getidTagKeys(){return $this->idTagKeys;}

    public function setKeys($param){$this->Keys = $param;}

    public function getKeys(){return $this->Keys;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearchEspecificationTag (idSearch, idTagKeys, Keys) VALUES (:idSearchEspecificationTag, :idSearch, :idTagKeys, :Keys)";
        $query = $this->dbh->prepare($sql);

        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idTagKeys != null){
            $query->bindParam(':idTagKeys', $this->idTagKeys,PDO::PARAM_INT);
        }
        if($this->Keys != null){
            $query->bindParam(':Keys', $this->Keys,  PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchEspecificationTag ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchEspecificationTag != null){
            $query->bindParam(':idSearchEspecificationTag', $this->idSearchEspecificationTag, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idTagKeys != null){
            $query->bindParam(':idTagKeys', $this->idTagKeys,PDO::PARAM_INT);
        }
        if($this->Keys != null){
            $query->bindParam(':Keys', $this->Keys,  PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchEspecificationTag SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchEspecificationTag != null){
            $query->bindParam(':idSearchEspecificationTag', $this->idSearchEspecificationTag, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idTagKeys != null){
            $query->bindParam(':idTagKeys', $this->idTagKeys,PDO::PARAM_INT);
        }
        if($this->Keys != null){
            $query->bindParam(':Keys', $this->Keys,  PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchEspecificationTag ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchEspecificationTag != null){
            $query->bindParam(':idSearchEspecificationTag', $this->idSearchEspecificationTag, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idTagKeys != null){
            $query->bindParam(':idTagKeys', $this->idTagKeys,PDO::PARAM_INT);
        }
        if($this->Keys != null){
            $query->bindParam(':Keys', $this->Keys,  PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>