<?php

class Customer{

    protected $IdCustomer = null;
    protected $CustomerName = null;
    protected $CustomerObs = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setIdCustomer($param){$this->IdCustomer = $param;}

    public function getIdCustomer(){return $this->IdCustomer;}

    public function setCustomerName($param){$this->CustomerName = $param;}
    
    public function getCustomerName(){return $this->CustomerName;}

    public function setCustomerObs($param){$this->CustomerObs = $param;}
    
    public function getCustomerObs(){return $this->CustomerObs;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblCustomer (IdCustomer,CustomerName,CustomerObs) VALUES (:CustomerObs, :CustomerObs,:CustomerObs)";
        $query = $this->dbh->prepare($sql);
        
        if($this->IdCustomer != null){
            $query->bindParam(':IdCustomer', $this->IdCustomer, PDO::PARAM_INT);
        }
        if($this->CustomerName != null){
            $query->bindParam(':CustomerName', $this->CustomerName, PDO::PARAM_STR);
        }
        if($this->CustomerObs != null){
            $query->bindParam(':CustomerObs', $this->CustomerObs, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblCustomer ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->IdCustomer != null){
            $query->bindParam(':IdCustomer', $this->IdCustomer, PDO::PARAM_INT);
        }
        if($this->CustomerName != null){
            $query->bindParam(':CustomerName', $this->CustomerName, PDO::PARAM_STR);
        }
        if($this->CustomerObs != null){
            $query->bindParam(':CustomerObs', $this->CustomerObs, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblCustomer SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->IdCustomer != null){
            $query->bindParam(':IdCustomer', $this->IdCustomer, PDO::PARAM_INT);
        }
        if($this->CustomerName != null){
            $query->bindParam(':CustomerName', $this->CustomerName, PDO::PARAM_STR);
        }
        if($this->CustomerObs != null){
            $query->bindParam(':CustomerObs', $this->CustomerObs, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblCustomer ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->IdCustomer != null){
            $query->bindParam(':IdCustomer', $this->IdCustomer, PDO::PARAM_INT);
        }
        if($this->CustomerName != null){
            $query->bindParam(':CustomerName', $this->CustomerName, PDO::PARAM_STR);
        }
        if($this->CustomerObs != null){
            $query->bindParam(':CustomerObs', $this->CustomerObs, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }
    
}

?>