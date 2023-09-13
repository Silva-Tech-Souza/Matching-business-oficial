<?php

class UserPerfil{

    protected $idPerfilUsuario = null;
    protected $NmPerfil = null;
    protected $NumMeses = null;
    protected $DataInicio = null;
    protected $DataFinal = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }

    public function setidPerfilUsuario($param){$this->idPerfilUsuario = $param;}

    public function getidPerfilUsuario(){return $this->idPerfilUsuario;}

    public function setNmPerfil($param){$this->NmPerfil = $param;}
    
    public function getNmPerfil(){return $this->NmPerfil;}

    public function setNumMeses($param){$this->NumMeses = $param;}
    
    public function getNumMeses(){return $this->NumMeses;}

    public function setDataInicio($param){$this->DataInicio = $param;}
    
    public function getDataInicio(){return $this->DataInicio;}

    public function setDataFinal($param){$this->DataFinal = $param;}
    
    public function getDataFinal(){return $this->DataFinal;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblUserPerfil (idPerfilUsuario,NmPerfil,NumMeses,DataInicio,DataFinal) VALUES (:idPerfilUsuario, :NmPerfil,:NumMeses,:DataInicio,:DataFinal)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->NmPerfil != null){
            $query->bindParam(':NmPerfil', $this->NmPerfil, PDO::PARAM_STR);
        }
        if($this->NumMeses != null){
            $query->bindParam(':NumMeses', $this->NumMeses, PDO::PARAM_INT);
        }
        if($this->DataInicio != null){
            $query->bindParam(':DataInicio', $this->DataInicio, PDO::PARAM_STR);
        }
        if($this->DataFinal != null){
            $query->bindParam(':DataFinal', $this->DataFinal, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblUserPerfil ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->NmPerfil != null){
            $query->bindParam(':NmPerfil', $this->NmPerfil, PDO::PARAM_STR);
        }
        if($this->NumMeses != null){
            $query->bindParam(':NumMeses', $this->NumMeses, PDO::PARAM_INT);
        }
        if($this->DataInicio != null){
            $query->bindParam(':DataInicio', $this->DataInicio, PDO::PARAM_STR);
        }
        if($this->DataFinal != null){
            $query->bindParam(':DataFinal', $this->DataFinal, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblUserPerfil SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->NmPerfil != null){
            $query->bindParam(':NmPerfil', $this->NmPerfil, PDO::PARAM_STR);
        }
        if($this->NumMeses != null){
            $query->bindParam(':NumMeses', $this->NumMeses, PDO::PARAM_INT);
        }
        if($this->DataInicio != null){
            $query->bindParam(':DataInicio', $this->DataInicio, PDO::PARAM_STR);
        }
        if($this->DataFinal != null){
            $query->bindParam(':DataFinal', $this->DataFinal, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblUserPerfil ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->NmPerfil != null){
            $query->bindParam(':NmPerfil', $this->NmPerfil, PDO::PARAM_STR);
        }
        if($this->NumMeses != null){
            $query->bindParam(':NumMeses', $this->NumMeses, PDO::PARAM_INT);
        }
        if($this->DataInicio != null){
            $query->bindParam(':DataInicio', $this->DataInicio, PDO::PARAM_STR);
        }
        if($this->DataFinal != null){
            $query->bindParam(':DataFinal', $this->DataFinal, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }
}

?>