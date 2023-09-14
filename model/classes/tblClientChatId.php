<?php

class ClientChatId{
    
    protected $clientChatId = null;
    protected $idClient = null;
    protected $idClienteTo = null;
    protected $idChat = null;
    protected $clientChatDate = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setClientChatId($param){$this->clientChatId = $param;}

    public function getClientChatId(){return $this->clientChatId;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setidClienteTo($param){$this->idClienteTo = $param;}
    
    public function getidClienteTo(){return $this->idClienteTo;}

    public function setidChat($param){$this->idChat = $param;}
    
    public function getidChat(){return $this->idChat;}

    public function setClientChatDate($param){$this->clientChatDate = $param;}
    
    public function getClientChatDate(){return $this->clientChatDate;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblClientChatId (ClientChatId,idClient,idClienteTo,idChat,ClientChatDate) VALUES (:clientChatId,:idClient,:idClienteTo,:idChat,:clientChatDate)";
        $query = $this->dbh->prepare($sql);
        
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClienteTo != null){
            $query->bindParam(':idClienteTo', $this->idClienteTo, PDO::PARAM_STR);
        }
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatDate != null){
            $query->bindParam(':clientChatDate', $this->clientChatDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblClientChatId ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClienteTo != null){
            $query->bindParam(':idClienteTo', $this->idClienteTo, PDO::PARAM_STR);
        }
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatDate != null){
            $query->bindParam(':clientChatDate', $this->clientChatDate, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblClientChatId SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClienteTo != null){
            $query->bindParam(':idClienteTo', $this->idClienteTo, PDO::PARAM_STR);
        }
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatDate != null){
            $query->bindParam(':clientChatDate', $this->clientChatDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblClientChatId ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClienteTo != null){
            $query->bindParam(':idClienteTo', $this->idClienteTo, PDO::PARAM_STR);
        }
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatDate != null){
            $query->bindParam(':clientChatDate', $this->clientChatDate, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>