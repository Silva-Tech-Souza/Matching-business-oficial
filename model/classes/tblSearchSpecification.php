<?php

class SearchSpecification{
    
    protected $idSearchSpecification = null;
    protected $idSearch = null;
    protected $idNumEmpregados = null;
    protected $idlRangeValue = null;
    protected $idNivelOperacao = null;
    protected $idTotalImportacao = null;
    protected $idtotalSalesRep = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function setidSearchSpecification($param){$this->idSearchSpecification = $param;}

    public function getidSearchSpecification(){return $this->idSearchSpecification;}

    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setidNumEmpregados($param){$this->idNumEmpregados = $param;}

    public function getidNumEmpregados(){return $this->idNumEmpregados;}

    public function setidlRangeValue($param){$this->idlRangeValue = $param;}

    public function getidlRangeValue(){return $this->idlRangeValue;}

    public function setidNivelOperacao($param){$this->idNivelOperacao = $param;}

    public function getidNivelOperacao(){return $this->idNivelOperacao;}

    public function setidTotalImportacao($param){$this->idTotalImportacao = $param;}

    public function getidTotalImportacao(){return $this->idTotalImportacao;}

    public function setidtotalSalesRep($param){$this->idtotalSalesRep = $param;}

    public function getidtotalSalesRep(){return $this->idtotalSalesRep;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearchSpecification (idSearch, idNumEmpregados, `idlRangeValue`, idNivelOperacao, idTotalImportacao, idtotalSalesRep) VALUES ( :idSearch, :idNumEmpregados, :idlRangeValue, :idNivelOperacao, :idTotalImportacao, :idtotalSalesRep)";
        $query = $this->dbh->prepare($sql);

        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados,PDO::PARAM_INT);
        }
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue,PDO::PARAM_INT);
        }
        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao,  PDO::PARAM_INT);
        }
        if($this->idTotalImportacao != null){
            $query->bindParam(':idTotalImportacao', $this->idTotalImportacao, PDO::PARAM_INT);
        }
        if($this->idtotalSalesRep != null){
            $query->bindParam(':idtotalSalesRep', $this->idtotalSalesRep,  PDO::PARAM_STR);
        }

        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchSpecification ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchSpecification != null){
            $query->bindParam(':idSearchSpecification', $this->idSearchSpecification, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados,PDO::PARAM_INT);
        }
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue,PDO::PARAM_INT);
        }
        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao,  PDO::PARAM_INT);
        }
        if($this->idTotalImportacao != null){
            $query->bindParam(':idTotalImportacao', $this->idTotalImportacao, PDO::PARAM_INT);
        }
        if($this->idtotalSalesRep != null){
            $query->bindParam(':idtotalSalesRep', $this->idtotalSalesRep,  PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchSpecification SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idSearchSpecification != null){
            $query->bindParam(':idSearchSpecification', $this->idSearchSpecification, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados,PDO::PARAM_INT);
        }
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue,PDO::PARAM_INT);
        }
        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao,  PDO::PARAM_INT);
        }
        if($this->idTotalImportacao != null){
            $query->bindParam(':idTotalImportacao', $this->idTotalImportacao, PDO::PARAM_INT);
        }
        if($this->idtotalSalesRep != null){
            $query->bindParam(':idtotalSalesRep', $this->idtotalSalesRep,  PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchSpecification ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchSpecification != null){
            $query->bindParam(':idSearchSpecification', $this->idSearchSpecification, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados,PDO::PARAM_INT);
        }
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue,PDO::PARAM_INT);
        }
        if($this->idNivelOperacao != null){
            $query->bindParam(':idNivelOperacao', $this->idNivelOperacao,  PDO::PARAM_INT);
        }
        if($this->idTotalImportacao != null){
            $query->bindParam(':idTotalImportacao', $this->idTotalImportacao, PDO::PARAM_INT);
        }
        if($this->idtotalSalesRep != null){
            $query->bindParam(':idtotalSalesRep', $this->idtotalSalesRep,  PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

}


?>