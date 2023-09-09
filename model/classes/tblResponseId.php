<?php

class ResponseId{
    
    protected $ResponseId = null;
    protected $ResponseDesc = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setResponseId($param){$this->ResponseId = $param;}

    public function getResponseId(){return $this->ResponseId;}

    public function setResponseDesc($param){$this->ResponseDesc = $param;}
    
    public function getResponseDesc(){return $this->ResponseDesc;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblResponseId (ResponseId,ResponseDesc) VALUES (:ResponseId,:ResponseDesc)";
        $query = $this->dbh->prepare($sql);
        
        if($this->ResponseId != null){
            $query->bindParam(':ResponseId', $this->ResponseId, PDO::PARAM_INT);
        }
        if($this->ResponseDesc != null){
            $query->bindParam(':ResponseDesc', $this->ResponseDesc, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblResponseId ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        if($this->ResponseId != null){
            $query->bindParam(':ResponseId', $this->ResponseId, PDO::PARAM_INT);
        }
        if($this->ResponseDesc != null){
            $query->bindParam(':ResponseDesc', $this->ResponseDesc, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblResponseId SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->ResponseId != null){
            $query->bindParam(':ResponseId', $this->ResponseId, PDO::PARAM_INT);
        }
        if($this->ResponseDesc != null){
            $query->bindParam(':ResponseDesc', $this->ResponseDesc, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblResponseId ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->ResponseId != null){
            $query->bindParam(':ResponseId', $this->ResponseId, PDO::PARAM_INT);
        }
        if($this->ResponseDesc != null){
            $query->bindParam(':ResponseDesc', $this->ResponseDesc, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>