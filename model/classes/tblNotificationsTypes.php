<?php

class NotificationsTypes{
    
    protected $idTypeNotifcation = null;
    protected $textNotifcation = null;
    protected $iconNotifcation = null;
    protected $descricaoType = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidTypeNotifcation($param){$this->idTypeNotifcation = $param;}

    public function getidTypeNotifcation(){return $this->idTypeNotifcation;}

    public function settextNotifcation($param){$this->textNotifcation = $param;}
    
    public function gettextNotifcation(){return $this->textNotifcation;}

    public function seticonNotifcation($param){$this->iconNotifcation = $param;}
    
    public function geticonNotifcation(){return $this->iconNotifcation;}

    public function setdescricaoType($param){$this->descricaoType = $param;}
    
    public function getdescricaoType(){return $this->descricaoType;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblNotificationsTypes (idTypeNotifcation,textNotifcation,iconNotifcation,descricaoType) VALUES (:idTypeNotifcation, :textNotifcation,:iconNotifcation,:descricaoType)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }
        if($this->textNotifcation != null){
            $query->bindParam(':textNotifcation', $this->textNotifcation, PDO::PARAM_STR);
        }
        if($this->iconNotifcation != null){
            $query->bindParam(':iconNotifcation', $this->iconNotifcation, PDO::PARAM_STR);
        }
        if($this->descricaoType != null){
            $query->bindParam(':descricaoType', $this->descricaoType, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblNotificationsTypes ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }
        if($this->textNotifcation != null){
            $query->bindParam(':textNotifcation', $this->textNotifcation, PDO::PARAM_STR);
        }
        if($this->iconNotifcation != null){
            $query->bindParam(':iconNotifcation', $this->iconNotifcation, PDO::PARAM_STR);
        }
        if($this->descricaoType != null){
            $query->bindParam(':descricaoType', $this->descricaoType, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblNotificationsTypes SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }
        if($this->textNotifcation != null){
            $query->bindParam(':textNotifcation', $this->textNotifcation, PDO::PARAM_STR);
        }
        if($this->iconNotifcation != null){
            $query->bindParam(':iconNotifcation', $this->iconNotifcation, PDO::PARAM_STR);
        }
        if($this->descricaoType != null){
            $query->bindParam(':descricaoType', $this->descricaoType, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblNotificationsTypes ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idTypeNotifcation != null){
            $query->bindParam(':idTypeNotifcation', $this->idTypeNotifcation, PDO::PARAM_INT);
        }
        if($this->textNotifcation != null){
            $query->bindParam(':textNotifcation', $this->textNotifcation, PDO::PARAM_STR);
        }
        if($this->iconNotifcation != null){
            $query->bindParam(':iconNotifcation', $this->iconNotifcation, PDO::PARAM_STR);
        }
        if($this->descricaoType != null){
            $query->bindParam(':descricaoType', $this->descricaoType, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>
