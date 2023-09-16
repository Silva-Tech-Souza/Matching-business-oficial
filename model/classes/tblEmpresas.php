<?php

class Empresas{

    protected $id = null;
    protected $nome = null;
    protected $taxid = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }
    
    public function setId($param){$this->id = $param;}

    public function setNome($param){$this->nome = $param;}

    public function setTaxid($param){$this->taxid = $param;}

    public function getId(){return $this->id;}
    
    public function getNome(){return $this->nome;}

    public function getTaxid(){return $this->taxid;}

    public function cadastrar(){

        $sql = "INSERT INTO tblEmpresas (nome, taxid) VALUES (:nome, :taxid)";
        $query = $this->dbh->prepare($sql);
        
        if($this->nome != null){
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }

        $query->execute();
       
        return  $this->dbh->lastInsertId();;

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblEmpresas ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->nome != null){
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblEmpresas SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->nome != null){
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblEmpresas ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

          if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->nome != null){
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;

    }

}

?>