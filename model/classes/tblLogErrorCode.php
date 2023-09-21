<?php

class LogErrorCode{
    
    protected $idLogErrorCode = null;
    protected $DescLogError = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidLogErrorCode($param){$this->idLogErrorCode = $param;}

    public function getidLogErrorCode(){return $this->idLogErrorCode;}

    public function setDescLogError($param){$this->DescLogError = $param;}
    
    public function getDescLogError(){return $this->DescLogError;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblLogErrorCode (DescLogError) VALUES ( :DescLogError)";
        $query = $this->dbh->prepare($sql);
        
        if($this->DescLogError != null){
            $query->bindParam(':DescLogError', $this->DescLogError, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblLogErrorCode ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idLogErrorCode != null){
            $query->bindParam(':idLogErrorCode', $this->idLogErrorCode, PDO::PARAM_INT);
        }
        if($this->DescLogError != null){
            $query->bindParam(':DescLogError', $this->DescLogError, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblLogErrorCode SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idLogErrorCode != null){
            $query->bindParam(':idLogErrorCode', $this->idLogErrorCode, PDO::PARAM_INT);
        }
        if($this->DescLogError != null){
            $query->bindParam(':DescLogError', $this->DescLogError, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblLogErrorCode ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogErrorCode != null){
            $query->bindParam(':idLogErrorCode', $this->idLogErrorCode, PDO::PARAM_INT);
        }
        if($this->DescLogError != null){
            $query->bindParam(':DescLogError', $this->DescLogError, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>