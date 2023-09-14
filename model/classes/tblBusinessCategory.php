<?php

class BusinessCategory{
    protected $idBusinessCategory = null;
    protected $idBusiness = null;
    protected $NmBusinessCategory = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }

    
    public function setidBusinessCategory($param){$this->idBusinessCategory = $param;}
    
    public function getidBusinessCategory(){return $this->idBusinessCategory;}

    public function setidBusiness($param){$this->idBusiness = $param;}

    public function getidBusiness(){return $this->idBusiness;}

    public function setNmBusinessCategory($param){$this->NmBusinessCategory = $param;}
    
    public function getNmBusinessCategory(){return $this->NmBusinessCategory;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblBusinessCategory (idBusinessCategory,idBusiness,NmBusinessCategory) VALUES (:idBusinessCategory,:idBusiness,:NmBusinessCategory)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusinessCategory != null){
            $query->bindParam(':NmBusinessCategory', $this->NmBusinessCategory, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblBusinessCategory ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusinessCategory != null){
            $query->bindParam(':NmBusinessCategory', $this->NmBusinessCategory, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblBusinessCategory SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusinessCategory != null){
            $query->bindParam(':NmBusinessCategory', $this->NmBusinessCategory, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblBusinessCategory ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->idBusiness != null){
            $query->bindParam(':idBusiness', $this->idBusiness, PDO::PARAM_INT);
        }
        if($this->NmBusinessCategory != null){
            $query->bindParam(':NmBusinessCategory', $this->NmBusinessCategory, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;
        

    }
}

?>