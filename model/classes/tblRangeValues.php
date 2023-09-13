<?php

class RangeValues{
    
    protected $idlRangeValue = null;
    protected $ValorInicial = null;
    protected $ValorFinal = null;
    protected $DescricaoRangeValue = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidlRangeValue($param){$this->idlRangeValue = $param;}

    public function getidlRangeValue(){return $this->idlRangeValue;}

    public function setValorInicial($param){$this->ValorInicial = $param;}
    
    public function getValorInicial(){return $this->ValorInicial;}

    public function setValorFinal($param){$this->ValorFinal = $param;}
    
    public function getValorFinal(){return $this->ValorFinal;}

    public function setDescricaoRangeValue($param){$this->DescricaoRangeValue = $param;}
    
    public function getDescricaoRangeValue(){return $this->DescricaoRangeValue;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblRangeValues (idlRangeValue,ValorInicial,ValorFinal,DescricaoRangeValue) VALUES (:idlRangeValue, :ValorInicial,:ValorFinal,:DescricaoRangeValue)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->ValorFinal != null){
            $query->bindParam(':ValorFinal', $this->ValorFinal, PDO::PARAM_INT);
        }
        if($this->DescricaoRangeValue != null){
            $query->bindParam(':DescricaoRangeValue', $this->DescricaoRangeValue, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblRangeValues ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->ValorFinal != null){
            $query->bindParam(':ValorFinal', $this->ValorFinal, PDO::PARAM_INT);
        }
        if($this->DescricaoRangeValue != null){
            $query->bindParam(':DescricaoRangeValue', $this->DescricaoRangeValue, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblRangeValues SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->ValorFinal != null){
            $query->bindParam(':ValorFinal', $this->ValorFinal, PDO::PARAM_INT);
        }
        if($this->DescricaoRangeValue != null){
            $query->bindParam(':DescricaoRangeValue', $this->DescricaoRangeValue, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblRangeValues ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idlRangeValue != null){
            $query->bindParam(':idlRangeValue', $this->idlRangeValue, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->ValorFinal != null){
            $query->bindParam(':ValorFinal', $this->ValorFinal, PDO::PARAM_INT);
        }
        if($this->DescricaoRangeValue != null){
            $query->bindParam(':DescricaoRangeValue', $this->DescricaoRangeValue, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>