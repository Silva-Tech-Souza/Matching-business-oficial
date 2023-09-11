<?php

class DistributorProfile{
    
    protected $idDistributorProfile = null;
    protected $idClient = null;
    protected $AnoFundacao = null;
    protected $NumEmpregados = null;
    protected $NumVendedores = null;
    protected $NivelOperacao = null;
    protected $DetalheRegiao = null;
    protected $Fob_3Y = null;
    protected $Vol_3Y = null;
    protected $Fob_2Y = null;
    protected $Vol_2Y = null;
    protected $Fob_1Y = null;
    protected $Vol_1Y = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidDistributorProfile($param){$this->idDistributorProfile = $param;}

    public function getidDistributorProfile(){return $this->idDistributorProfile;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setAnoFundacao($param){$this->AnoFundacao = $param;}
    
    public function getAnoFundacao(){return $this->AnoFundacao;}

    public function setNumEmpregados($param){$this->NumEmpregados = $param;}
    
    public function getNumEmpregados(){return $this->NumEmpregados;}

    public function setNumVendedores($param){$this->NumVendedores = $param;}
    
    public function getNumVendedores(){return $this->NumVendedores;}

    public function setNivelOperacao($param){$this->NivelOperacao = $param;}
    
    public function getNivelOperacao(){return $this->NivelOperacao;}

    public function setDetalheRegiao($param){$this->DetalheRegiao = $param;}
    
    public function getDetalheRegiao(){return $this->DetalheRegiao;}
    
    public function setFob_3Y($param){$this->Fob_3Y = $param;}
    
    public function getFob_3Y(){return $this->Fob_3Y;}

    public function setVol_3Y($param){$this->Vol_3Y = $param;}
    
    public function getVol_3Y(){return $this->Vol_3Y;}

    public function setFob_2Y($param){$this->Fob_2Y = $param;}
    
    public function getFob_2Y(){return $this->Fob_2Y;}
    
    public function setVol_2Y($param){$this->Vol_2Y = $param;}
    
    public function getVol_2Y(){return $this->Vol_2Y;}

    public function setFob_1Y($param){$this->Fob_1Y = $param;}
    
    public function getFob_1Y(){return $this->Fob_1Y;}

    public function setVol_1Y($param){$this->Vol_1Y = $param;}
    
    public function getVol_1Y(){return $this->Vol_1Y;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblDistributorProfile (idClient, AnoFundacao, NumEmpregados, NumVendedores, NivelOperacao, Fob_3Y, Vol_3Y, Fob_2Y, Vol_2Y, Fob_1Y, Vol_1Y) VALUES (:idClient, :AnoFundacao, :NumEmpregados, :NumVendedores, :NivelOperacao, :Fob_3Y, :Vol_3Y, :Fob_2Y, :Vol_2Y, :Fob_1Y, :Vol_1Y)";
        $query = $this->dbh->prepare($sql);
        
       
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblDistributorProfile ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idDistributorProfile != null){
            $query->bindParam(':idDistributorProfile', $this->idDistributorProfile, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblDistributorProfile SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idDistributorProfile != null){
            $query->bindParam(':idDistributorProfile', $this->idDistributorProfile, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblDistributorProfile ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idDistributorProfile != null){
            $query->bindParam(':idDistributorProfile', $this->idDistributorProfile, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>