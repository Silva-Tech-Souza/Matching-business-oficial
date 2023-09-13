<?php

class LogAction{
    
    protected $idLogAction = null;
    protected $DescLogAction = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidLogAction($param){$this->idLogAction = $param;}

    public function getidLogAction(){return $this->idLogAction;}

    public function setDescLogAction($param){$this->DescLogAction = $param;}
    
    public function getDescLogAction(){return $this->DescLogAction;}
    

    public function cadastrar(){

        

        $sql = "INSERT INTO tblLogAction (idLogAction,DescLogAction) VALUES (:idLogAction,:DescLogAction)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->DescLogAction != null){
            $query->bindParam(':DescLogAction', $this->DescLogAction, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblLogAction ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->DescLogAction != null){
            $query->bindParam(':DescLogAction', $this->DescLogAction, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblLogAction SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->DescLogAction != null){
            $query->bindParam(':DescLogAction', $this->DescLogAction, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblLogAction ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->DescLogAction != null){
            $query->bindParam(':DescLogAction', $this->DescLogAction, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }


}

?>