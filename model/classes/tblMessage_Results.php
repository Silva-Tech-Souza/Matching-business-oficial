<?php

class Message_Results{
    
    protected $MessageID = null;
    protected $idClient = null;
    protected $idClient_Sender = null;
    protected $Message_Text = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setMessageID($param){$this->MessageID = $param;}

    public function getMessageID(){return $this->MessageID;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setidClient_Sender($param){$this->idClient_Sender = $param;}
    
    public function getidClient_Sender(){return $this->idClient_Sender;}

    public function setMessage_Text($param){$this->Message_Text = $param;}
    
    public function getMessage_Text(){return $this->Message_Text;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblMessage_Results (MessageID,idClient,idClient_Sender,Message_Text) VALUES (:MessageID, :idClient,:idClient_Sender,:Message_Text)";
        $query = $this->dbh->prepare($sql);
        
        if($this->MessageID != null){
            $query->bindParam(':MessageID', $this->MessageID, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClient_Sender != null){
            $query->bindParam(':idClient_Sender', $this->idClient_Sender, PDO::PARAM_INT);
        }
        if($this->Message_Text != null){
            $query->bindParam(':Message_Text', $this->Message_Text, PDO::PARAM_STR);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblMessage_Results ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->MessageID != null){
            $query->bindParam(':MessageID', $this->MessageID, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClient_Sender != null){
            $query->bindParam(':idClient_Sender', $this->idClient_Sender, PDO::PARAM_INT);
        }
        if($this->Message_Text != null){
            $query->bindParam(':Message_Text', $this->Message_Text, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblMessage_Results SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->MessageID != null){
            $query->bindParam(':MessageID', $this->MessageID, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClient_Sender != null){
            $query->bindParam(':idClient_Sender', $this->idClient_Sender, PDO::PARAM_INT);
        }
        if($this->Message_Text != null){
            $query->bindParam(':Message_Text', $this->Message_Text, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblMessage_Results ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->MessageID != null){
            $query->bindParam(':MessageID', $this->MessageID, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClient_Sender != null){
            $query->bindParam(':idClient_Sender', $this->idClient_Sender, PDO::PARAM_INT);
        }
        if($this->Message_Text != null){
            $query->bindParam(':Message_Text', $this->Message_Text, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>