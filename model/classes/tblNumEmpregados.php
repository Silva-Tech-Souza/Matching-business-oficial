<?php

class NumEmpregados{
    
    protected $idNumEmpregados = null;
    protected $ValorInicial = null;
    protected $Valor_Final = null;
    protected $DescNumEmpregados = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidNumEmpregados($param){$this->idNumEmpregados = $param;}

    public function getidNumEmpregados(){return $this->idNumEmpregados;}

    public function setValorInicial($param){$this->ValorInicial = $param;}
    
    public function getValorInicial(){return $this->ValorInicial;}

    public function setValor_Final($param){$this->Valor_Final = $param;}
    
    public function getValor_Final(){return $this->Valor_Final;}

    public function setDescNumEmpregados($param){$this->DescNumEmpregados = $param;}
    
    public function getDescNumEmpregados(){return $this->DescNumEmpregados;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblNumEmpregados (idNumEmpregados,ValorInicial,Valor_Final,DescNumEmpregados) VALUES (:idNumEmpregados, :ValorInicial,:Valor_Final,:DescNumEmpregados)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->Valor_Final != null){
            $query->bindParam(':Valor_Final', $this->Valor_Final, PDO::PARAM_INT);
        }
        if($this->DescNumEmpregados != null){
            $query->bindParam(':DescNumEmpregados', $this->DescNumEmpregados, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblNumEmpregados ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->Valor_Final != null){
            $query->bindParam(':Valor_Final', $this->Valor_Final, PDO::PARAM_INT);
        }
        if($this->DescNumEmpregados != null){
            $query->bindParam(':DescNumEmpregados', $this->DescNumEmpregados, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblNumEmpregados SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->Valor_Final != null){
            $query->bindParam(':Valor_Final', $this->Valor_Final, PDO::PARAM_INT);
        }
        if($this->DescNumEmpregados != null){
            $query->bindParam(':DescNumEmpregados', $this->DescNumEmpregados, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblNumEmpregados ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idNumEmpregados != null){
            $query->bindParam(':idNumEmpregados', $this->idNumEmpregados, PDO::PARAM_INT);
        }
        if($this->ValorInicial != null){
            $query->bindParam(':ValorInicial', $this->ValorInicial, PDO::PARAM_INT);
        }
        if($this->Valor_Final != null){
            $query->bindParam(':Valor_Final', $this->Valor_Final, PDO::PARAM_INT);
        }
        if($this->DescNumEmpregados != null){
            $query->bindParam(':DescNumEmpregados', $this->DescNumEmpregados, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;
        

    }

}

?>