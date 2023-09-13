<?php

class Chat{
    protected $idChat = null;
    protected $clientChatId = null;
    protected $chatText = null;
    protected $chatTextDate = null;
    protected $idClients = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidChat($param){$this->idChat = $param;}

    public function getidChat(){return $this->idChat;}

    public function setClientChatId($param){$this->clientChatId = $param;}
    
    public function getClientChatId(){return $this->clientChatId;}

    public function setChatText($param){$this->chatText = $param;}
    
    public function getChatText(){return $this->chatText;}

    public function setChatTextDate($param){$this->chatTextDate = $param;}
    
    public function getChatTextDate(){return $this->chatTextDate;}

    public function setidClients($param){$this->idClients = $param;}
    
    public function getidClients(){return $this->idClients;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblChat (idChat,ClientChatId,ChatText,ChatTextDate,idClients) VALUES (:idChat,:clientChatId,:chatText,:chatTextDate,:idClients)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_INT);
        }
        if($this->chatText != null){
            $query->bindParam(':chatText', $this->chatText, PDO::PARAM_STR);
        }
        if($this->chatTextDate != null){
            $query->bindParam(':chatTextDate', $this->chatTextDate, PDO::PARAM_STR);
        }
        if($this->idClients != null){
            $query->bindParam(':idClients', $this->idClients, PDO::PARAM_STR);
        }

        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblChat ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_STR);
        }
        if($this->chatText != null){
            $query->bindParam(':chatText', $this->chatText, PDO::PARAM_STR);
        }
        if($this->chatTextDate != null){
            $query->bindParam(':chatTextDate', $this->chatTextDate, PDO::PARAM_INT);
        }
        if($this->idClients != null){
            $query->bindParam(':idClients', $this->idClients, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblChat SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_STR);
        }
        if($this->chatText != null){
            $query->bindParam(':chatText', $this->chatText, PDO::PARAM_STR);
        }
        if($this->chatTextDate != null){
            $query->bindParam(':chatTextDate', $this->chatTextDate, PDO::PARAM_INT);
        }
        if($this->idClients != null){
            $query->bindParam(':idClients', $this->idClients, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblChat ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->clientChatId != null){
            $query->bindParam(':clientChatId', $this->clientChatId, PDO::PARAM_STR);
        }
        if($this->chatText != null){
            $query->bindParam(':chatText', $this->chatText, PDO::PARAM_STR);
        }
        if($this->chatTextDate != null){
            $query->bindParam(':chatTextDate', $this->chatTextDate, PDO::PARAM_INT);
        }
        if($this->idClients != null){
            $query->bindParam(':idClients', $this->idClients, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }
}

?>
