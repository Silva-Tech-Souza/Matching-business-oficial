<?php

class Views{
    
    protected $id = null;
    protected $idUser = null;
    protected $idView = null;
    protected $datacriacao = null;
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

    public function setidUser($param){$this->idUser = $param;}
    
    public function getidUser(){return $this->idUser;}

    public function setidView($param){$this->idView = $param;}
    
    public function getidView(){return $this->idView;}

    public function setdatacriacao($param){$this->datacriacao = $param;}
    
    public function getdatacriacao(){return $this->datacriacao;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblviews (id,idUser,idView,datacriacao) VALUES (id,idUser,idView,:datacriacao)";
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUser != null){
            $query->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
        }
        if($this->idView != null){
            $query->bindParam(':idView', $this->idView, PDO::PARAM_INT);
        }
        if($this->datacriacao != null){
            $query->bindParam(':datacriacao', $this->datacriacao, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblviews ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUser != null){
            $query->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
        }
        if($this->idView != null){
            $query->bindParam(':idView', $this->idView, PDO::PARAM_INT);
        }
        if($this->datacriacao != null){
            $query->bindParam(':datacriacao', $this->datacriacao, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblviews SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUser != null){
            $query->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
        }
        if($this->idView != null){
            $query->bindParam(':idView', $this->idView, PDO::PARAM_INT);
        }
        if($this->datacriacao != null){
            $query->bindParam(':datacriacao', $this->datacriacao, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblviews ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUser != null){
            $query->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
        }
        if($this->idView != null){
            $query->bindParam(':idView', $this->idView, PDO::PARAM_INT);
        }
        if($this->datacriacao != null){
            $query->bindParam(':datacriacao', $this->datacriacao, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>