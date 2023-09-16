<?php

class Chat{
    protected $idChat = null;
    protected $Text = null;
    protected $Date = null;
    protected $idClient = null;
    protected $idClientEnviado = null;
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

    public function setText($param){$this->Text = $param;}
    
    public function getText(){return $this->Text;}

    public function setDate($param){$this->Date = $param;}
    
    public function getDate(){return $this->Date;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setidClientEnviado($param){$this->idClientEnviado = $param;}
    
    public function getidClientEnviado(){return $this->idClientEnviado;}



    public function cadastrar(){

        

        $sql = "INSERT INTO `tblChat` (`Text`,idClient,idClientEnviado) VALUES (:Text,:idClient,:idClientEnviado)";
        $query = $this->dbh->prepare($sql);
        
        if($this->Text != null){
            $query->bindParam(':Text', $this->Text, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClientEnviado != null){
            $query->bindParam(':idClientEnviado', $this->idClientEnviado, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblChat ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idChat != null){
            $query->bindParam(':idChat', $this->idChat, PDO::PARAM_INT);
        }
        if($this->Text != null){
            $query->bindParam(':Text', $this->Text, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClientEnviado != null){
            $query->bindParam(':idClientEnviado', $this->idClientEnviado, PDO::PARAM_INT);
        }
        if($this->Date != null){
            $query->bindParam(':Date', $this->Date, PDO::PARAM_STR);
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
        if($this->Text != null){
            $query->bindParam(':Text', $this->Text, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClientEnviado != null){
            $query->bindParam(':idClientEnviado', $this->idClientEnviado, PDO::PARAM_INT);
        }
        if($this->Date != null){
            $query->bindParam(':Date', $this->Date, PDO::PARAM_STR);
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
        if($this->Text != null){
            $query->bindParam(':Text', $this->Text, PDO::PARAM_STR);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idClientEnviado != null){
            $query->bindParam(':idClientEnviado', $this->idClientEnviado, PDO::PARAM_INT);
        }
        if($this->Date != null){
            $query->bindParam(':Date', $this->Date, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }
}

?>
