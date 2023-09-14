<?php

class PostComent{

    protected $id = null;
    protected $idpost = null;
    protected $texto = null;
    protected $datahora = null;
    protected $iduser = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }

    public function setid($param){$this->id = $param;}

    public function getid(){return $this->id;}

    public function setidpost($param){$this->idpost = $param;}
    
    public function getidpost(){return $this->idpost;}

    public function settexto($param){$this->texto = $param;}
    
    public function gettexto(){return $this->texto;}

    public function setdatahora($param){$this->datahora = $param;}
    
    public function getdatahora(){return $this->datahora;}

    public function setiduser($param){$this->iduser = $param;}
    
    public function getiduser(){return $this->iduser;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tbpostcoment (idpost,texto,iduser) VALUES (:idpost,:texto,:iduser)";
        $query = $this->dbh->prepare($sql);
        
      
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->texto != null){
            $query->bindParam(':texto', $this->texto, PDO::PARAM_STR);
        }
      
        if($this->iduser != null){
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tbpostcoment ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->texto != null){
            $query->bindParam(':texto', $this->texto, PDO::PARAM_STR);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->iduser != null){
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }
    public function quantidade($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tbpostcoment ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->texto != null){
            $query->bindParam(':texto', $this->texto, PDO::PARAM_STR);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->iduser != null){
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $query->rowCount();} else {return 0;}

    }
    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tbpostcoment SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->texto != null){
            $query->bindParam(':texto', $this->texto, PDO::PARAM_STR);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->iduser != null){
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tbpostcoment ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->texto != null){
            $query->bindParam(':texto', $this->texto, PDO::PARAM_STR);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->iduser != null){
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>