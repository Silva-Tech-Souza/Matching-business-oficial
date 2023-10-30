<?php

class Action{

    protected $idAction = null;
    protected $description = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }
    
    public function setIdAction($param){$this->idAction = $param;}

    public function setDescription($param){$this->description = $param;}

    public function getIdAction(){return $this->idAction;}
    
    public function getDescription(){return $this->description;}

    public function cadastrar(){

        $sql = "INSERT INTO `tblAction` (`IdAction`,`Description`) VALUES (`:idAction`, `:description`)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idAction != null){
            $query->bindParam(':`idAction`', $this->idAction, PDO::PARAM_INT);
        }
        if($this->description != null){
            $query->bindParam(':`description`', $this->description, PDO::PARAM_STR);
        }

        $query->execute();

        return $query;

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblAction ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idAction != null){
            $query->bindParam(':idAction', $this->idAction, PDO::PARAM_INT);
        }
        if($this->description != null){
            $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblAction SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idAction != null){
            $query->bindParam(':idAction', $this->idAction, PDO::PARAM_INT);
        }
        if($this->description != null){
            $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblAction ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idAction != null){
            $query->bindParam(':idAction', $this->idAction, PDO::PARAM_INT);
        }

        if($this->description != null){
            $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;

    }

}

?>