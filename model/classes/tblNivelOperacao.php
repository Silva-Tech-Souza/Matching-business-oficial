<?php

class NivelOperacao{
    
    protected $idNivelOperacao = null;
    protected $DescNivelOperacao = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidNivelOperacao($param){$this->idNivelOperacao = $param;}

    public function getidNivelOperacao(){return $this->idNivelOperacao;}

    public function setDescNivelOperacao($param){$this->DescNivelOperacao = $param;}
    
    public function getDescNivelOperacao(){return $this->DescNivelOperacao;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblNivelOperacao (idNivelOperacao,DescNivelOperacao) VALUES (:idNivelOperacao, :DescNivelOperacao)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao, PDO::PARAM_INT);
        }
        if($this->DescNivelOperacao != null){
            $query->bindParam(':DescNivelOperacao', $this->DescNivelOperacao, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblNivelOperacao ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao, PDO::PARAM_INT);
        }
        if($this->DescNivelOperacao != null){
            $query->bindParam(':DescNivelOperacao', $this->DescNivelOperacao, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblNivelOperacao SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao, PDO::PARAM_INT);
        }
        if($this->DescNivelOperacao != null){
            $query->bindParam(':DescNivelOperacao', $this->DescNivelOperacao, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblNivelOperacao ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao, PDO::PARAM_INT);
        }
        if($this->DescNivelOperacao != null){
            $query->bindParam(':DescNivelOperacao', $this->DescNivelOperacao, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>