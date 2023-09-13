<?php

class QualificationSB{
    
    protected $idQualificationSB = null;
    protected $IdClient = null;
    protected $IdBusinessCategory = null;
    protected $FlagDeletado = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidQualificationSB($param){$this->idQualificationSB = $param;}

    public function getidQualificationSB(){return $this->idQualificationSB;}

    public function setIdClient($param){$this->IdClient = $param;}
    
    public function getIdClient(){return $this->IdClient;}

    public function setIdBusinessCategory($param){$this->IdBusinessCategory = $param;}
    
    public function getIdBusinessCategory(){return $this->IdBusinessCategory;}

    public function setFlagDeletado($param){$this->FlagDeletado = $param;}
    
    public function getFlagDeletado(){return $this->FlagDeletado;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblQualificationSB (idQualificationSB,IdClient,IdBusinessCategory,FlagDeletado) VALUES (:idQualificationSB, :IdClient,:IdBusinessCategory,:FlagDeletado)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationSB != null){
            $query->bindParam(':idQualificationSB', $this->idQualificationSB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblQualificationSB ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationSB != null){
            $query->bindParam(':idQualificationSB', $this->idQualificationSB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblQualificationSB SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationSB != null){
            $query->bindParam(':idQualificationSB', $this->idQualificationSB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblQualificationSB ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idQualificationSB != null){
            $query->bindParam(':idQualificationSB', $this->idQualificationSB, PDO::PARAM_INT);
        }
        if($this->IdClient != null){
            $query->bindParam(':IdClient', $this->IdClient, PDO::PARAM_INT);
        }
        if($this->IdBusinessCategory != null){
            $query->bindParam(':IdBusinessCategory', $this->IdBusinessCategory, PDO::PARAM_INT);
        }
        if($this->FlagDeletado != null){
            $query->bindParam(':FlagDeletado', $this->FlagDeletado, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>