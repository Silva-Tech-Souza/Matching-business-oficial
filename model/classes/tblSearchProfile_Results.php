<?php

class SearchProfile_Results{
    
    protected $id = null;
    protected $idUsuario = null;
    protected $idClienteEncontrado = null;
    protected $datahora = null;
    protected $idTipoNotif = null;
    protected $postId = null;
    protected $url = null;
    protected $dbh = null;
    protected $estadoNotif = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setid($param){$this->id = $param;}

    public function getid(){return $this->id;}

    public function setidUsuario($param){$this->idUsuario = $param;}
    
    public function getidUsuario(){return $this->idUsuario;}

    public function setidClienteEncontrado($param){$this->idClienteEncontrado = $param;}
    
    public function getidClienteEncontrado(){return $this->idClienteEncontrado;}

    public function setdatahora($param){$this->datahora = $param;}
    
    public function getdatahora(){return $this->datahora;}

    public function setidTipoNotif($param){$this->idTipoNotif = $param;}
    
    public function getidTipoNotif(){return $this->idTipoNotif;}

    public function setpostId($param){$this->postId = $param;}
    
    public function getpostId(){return $this->postId;}

    public function seturl($param){$this->url = $param;}
    
    public function geturl(){return $this->url;}

    public function setestadoNotif($param){$this->estadoNotif = $param;}
    
    public function getestadoNotif(){return $this->estadoNotif;}


    public function cadastrar(){

        $sql = "INSERT INTO tblsearchprofile_results (idUsuario,idClienteEncontrado,idTipoNotif,postId,url) VALUES (:idUsuario,:idClienteEncontrado,:idTipoNotif,:postId,:url)";
        $query = $this->dbh->prepare($sql);
        
       
        if($this->idUsuario != null){
            $query->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
        }
        if($this->idClienteEncontrado != null){
            $query->bindParam(':idClienteEncontrado', $this->idClienteEncontrado, PDO::PARAM_INT);
        }
        if($this->idTipoNotif != null){
            $query->bindParam(':idTipoNotif', $this->idTipoNotif, PDO::PARAM_INT);
        }
        if($this->postId != null){
            $query->bindParam(':postId', $this->postId, PDO::PARAM_INT);
        }
        if($this->url != null){
            $query->bindParam(':url', $this->url, PDO::PARAM_STR);
        }
        if($this->estadoNotif != null){
            $query->bindParam(':estadoNotif', $this->estadoNotif, PDO::PARAM_STR);
        }

        
        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblsearchprofile_results ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUsuario != null){
            $query->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
        }
        if($this->idClienteEncontrado != null){
            $query->bindParam(':idClienteEncontrado', $this->idClienteEncontrado, PDO::PARAM_INT);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->idTipoNotif != null){
            $query->bindParam(':idTipoNotif', $this->idTipoNotif, PDO::PARAM_INT);
        }
        if($this->postId != null){
            $query->bindParam(':postId', $this->postId, PDO::PARAM_INT);
        }
        if($this->url != null){
            $query->bindParam(':url', $this->url, PDO::PARAM_STR);
        }
        if($this->estadoNotif != null){
            $query->bindParam(':estadoNotif', $this->estadoNotif, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function quantidade($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblsearchprofile_results ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUsuario != null){
            $query->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
        }
        if($this->idClienteEncontrado != null){
            $query->bindParam(':idClienteEncontrado', $this->idClienteEncontrado, PDO::PARAM_INT);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->idTipoNotif != null){
            $query->bindParam(':idTipoNotif', $this->idTipoNotif, PDO::PARAM_INT);
        }
        if($this->postId != null){
            $query->bindParam(':postId', $this->postId, PDO::PARAM_INT);
        }
        if($this->url != null){
            $query->bindParam(':url', $this->url, PDO::PARAM_STR);
        }
        if($this->estadoNotif != null){
            $query->bindParam(':estadoNotif', $this->estadoNotif, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $query->rowCount();} else {return 0;}

    }
    public function atualizar($paramsExtra){

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblsearchprofile_results SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUsuario != null){
            $query->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
        }
        if($this->idClienteEncontrado != null){
            $query->bindParam(':idClienteEncontrado', $this->idClienteEncontrado, PDO::PARAM_INT);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->idTipoNotif != null){
            $query->bindParam(':idTipoNotif', $this->idTipoNotif, PDO::PARAM_INT);
        }
        if($this->postId != null){
            $query->bindParam(':postId', $this->postId, PDO::PARAM_INT);
        }
        if($this->url != null){
            $query->bindParam(':url', $this->url, PDO::PARAM_STR);
        }
        if($this->estadoNotif != null){
            $query->bindParam(':estadoNotif', $this->estadoNotif, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblsearchprofile_results ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idUsuario != null){
            $query->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
        }
        if($this->idClienteEncontrado != null){
            $query->bindParam(':idClienteEncontrado', $this->idClienteEncontrado, PDO::PARAM_INT);
        }
        if($this->datahora != null){
            $query->bindParam(':datahora', $this->datahora, PDO::PARAM_STR);
        }
        if($this->idTipoNotif != null){
            $query->bindParam(':idTipoNotif', $this->idTipoNotif, PDO::PARAM_INT);
        }
        if($this->postId != null){
            $query->bindParam(':postId', $this->postId, PDO::PARAM_INT);
        }
        if($this->url != null){
            $query->bindParam(':url', $this->url, PDO::PARAM_STR);
        }
        if($this->estadoNotif != null){
            $query->bindParam(':estadoNotif', $this->estadoNotif, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>