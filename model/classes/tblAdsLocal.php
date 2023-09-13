<?php

class AdsLocal{
    protected $adLocalId = null;
    protected $adLocalCode = null;
    protected $adLocalObs = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setAdLocalId($param){$this->adLocalId = $param;}

    public function getAdLocalId(){return $this->adLocalId;}

    public function setAdLocalCode($param){$this->adLocalCode = $param;}
    
    public function getAdLocalCode(){return $this->adLocalCode;}

    public function setAdLocalObs($param){$this->adLocalObs = $param;}
    
    public function getAdLocalObs(){return $this->adLocalObs;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblAdsLocal (AdLocalId,AdLocalCode,AdLocalObs) VALUES (:adLocalId, :adLocalCode,:adLocalObs)";
        $query = $this->dbh->prepare($sql);
        
        if($this->adLocalId != null){
            $query->bindParam(':adLocalId', $this->adLocalId, PDO::PARAM_INT);
        }
        if($this->adLocalCode != null){
            $query->bindParam(':adLocalCode', $this->adLocalCode, PDO::PARAM_STR);
        }
        if($this->adLocalObs != null){
            $query->bindParam(':adLocalObs', $this->adLocalObs, PDO::PARAM_STR);
        }

        $query->execute();
       
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblAdsLocal ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->adLocalId != null){
            $query->bindParam(':adLocalId', $this->adLocalId, PDO::PARAM_INT);
        }
        if($this->adLocalCode != null){
            $query->bindParam(':adLocalCode', $this->adLocalCode, PDO::PARAM_STR);
        }
        if($this->adLocalObs != null){
            $query->bindParam(':adLocalObs', $this->adLocalObs, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblAdsLocal SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->adLocalId != null){
            $query->bindParam(':adLocalId', $this->adLocalId, PDO::PARAM_INT);
        }
        if($this->adLocalCode != null){
            $query->bindParam(':adLocalCode', $this->adLocalCode, PDO::PARAM_STR);
        }
        if($this->adLocalObs != null){
            $query->bindParam(':adLocalObs', $this->adLocalObs, PDO::PARAM_STR);
        }

        $query->execute();
        
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblAdsLocal ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->adLocalId != null){
            $query->bindParam(':adLocalId', $this->adLocalId, PDO::PARAM_INT);
        }
        if($this->adLocalCode != null){
            $query->bindParam(':adLocalCode', $this->adLocalCode, PDO::PARAM_STR);
        }
        if($this->adLocalObs != null){
            $query->bindParam(':adLocalObs', $this->adLocalObs, PDO::PARAM_STR);
        }

        $query->execute();
        
        return $query;

    }
}

?>