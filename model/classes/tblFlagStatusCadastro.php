<?php

class FlagStatusCadastro{
    
    protected $idFlagStatusCadastro = null;
    protected $NmFlagStatusCadastro = null;
    protected $Contexto = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidFlagStatusCadastro($param){$this->idFlagStatusCadastro = $param;}

    public function getidFlagStatusCadastrod(){return $this->idFlagStatusCadastro;}

    public function setNmFlagStatusCadastro($param){$this->NmFlagStatusCadastro = $param;}
    
    public function getNmFlagStatusCadastro(){return $this->NmFlagStatusCadastro;}

    public function setContexto($param){$this->Contexto = $param;}
    
    public function getContexto(){return $this->Contexto;}

    

    public function cadastrar(){

        

        $sql = "INSERT INTO tblFlagStatusCadastro (idFlagStatusCadastro,NmFlagStatusCadastro,Contexto) VALUES (:idFlagStatusCadastro,:NmFlagStatusCadastro,:Contexto)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->NmFlagStatusCadastro != null){
            $query->bindParam(':NmFlagStatusCadastro', $this->NmFlagStatusCadastro, PDO::PARAM_STR);
        }
        if($this->Contexto != null){
            $query->bindParam(':Contexto', $this->Contexto, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblFlagStatusCadastro ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->NmFlagStatusCadastro != null){
            $query->bindParam(':NmFlagStatusCadastro', $this->NmFlagStatusCadastro, PDO::PARAM_STR);
        }
        if($this->Contexto != null){
            $query->bindParam(':Contexto', $this->Contexto, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblFlagStatusCadastro SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->NmFlagStatusCadastro != null){
            $query->bindParam(':NmFlagStatusCadastro', $this->NmFlagStatusCadastro, PDO::PARAM_STR);
        }
        if($this->Contexto != null){
            $query->bindParam(':Contexto', $this->Contexto, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblFlagStatusCadastro ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->NmFlagStatusCadastro != null){
            $query->bindParam(':NmFlagStatusCadastro', $this->NmFlagStatusCadastro, PDO::PARAM_STR);
        }
        if($this->Contexto != null){
            $query->bindParam(':Contexto', $this->Contexto, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>