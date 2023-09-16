<?php

class Conect{
        
    protected $id = null;
    protected $idUserPed = null;
    protected $idUserReceb = null;
    protected $datapedido = null;
    protected $status = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setid($param){$this->id = $param;}

    public function getid(){return $this->id;}

    public function setidUserPed($param){$this->idUserPed = $param;}
    
    public function getidUserPed(){return $this->idUserPed;}

    public function setidUserReceb($param){$this->idUserReceb = $param;}
    
    public function getidUserReceb(){return $this->idUserReceb;}

    public function setdatapedido($param){$this->datapedido = $param;}
    
    public function getdatapedido(){return $this->datapedido;}

    public function setstatus($param){$this->status = $param;}
    
    public function getstatus(){return $this->status;}

    public function cadastrar(){
        $sql = "INSERT INTO tblconect (idUserPed, idUserReceb) VALUES (:idUserPed, :idUserReceb)"; 
        $query = $this->dbh->prepare($sql);
       
        if($this->idUserPed != null){
            $query->bindParam(':idUserPed', $this->idUserPed, PDO::PARAM_INT);
        }
        if($this->idUserReceb != null){
            $query->bindParam(':idUserReceb', $this->idUserReceb, PDO::PARAM_INT);
        }
        $query->execute();
        return $query;
    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblconect ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUserPed != null){
            $query->bindParam(':idUserPed', $this->idUserPed, PDO::PARAM_INT);
        }
        if($this->idUserReceb != null){
            $query->bindParam(':idUserReceb', $this->idUserReceb, PDO::PARAM_INT);
        }
        if($this->datapedido != null){
            $query->bindParam(':datapedido', $this->datapedido, PDO::PARAM_STR);
        }
        if($this->status != null){
            $query->bindParam(':status', $this->status, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblconect SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUserPed != null){
            $query->bindParam(':idUserPed', $this->idUserPed, PDO::PARAM_INT);
        }
        if($this->idUserReceb != null){
            $query->bindParam(':idUserReceb', $this->idUserReceb, PDO::PARAM_INT);
        }
        if($this->datapedido != null){
            $query->bindParam(':datapedido', $this->datapedido, PDO::PARAM_STR);
        }
        if($this->status != null){
            $query->bindParam(':status', $this->status, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblconect ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUserPed != null){
            $query->bindParam(':idUserPed', $this->idUserPed, PDO::PARAM_INT);
        }
        if($this->idUserReceb != null){
            $query->bindParam(':idUserReceb', $this->idUserReceb, PDO::PARAM_INT);
        }
        if($this->datapedido != null){
            $query->bindParam(':datapedido', $this->datapedido, PDO::PARAM_STR);
        }
        if($this->status != null){
            $query->bindParam(':status', $this->status, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }
}

?>