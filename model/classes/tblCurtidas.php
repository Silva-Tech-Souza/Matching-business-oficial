<?php

class Curtidas{
    
    protected $id = null;
    protected $idpost = null;
    protected $idusuario = null;
    protected $data = null;
    protected $hora = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function setid($param){$this->id = $param;}

    public function getid(){return $this->id;}

    public function setidpost($param){$this->idpost = $param;}
    
    public function getidpost(){return $this->idpost;}

    public function setidusuario($param){$this->idusuario = $param;}
    
    public function getidusuario(){return $this->idusuario;}

    public function setdata($param){$this->data = $param;}
    
    public function getdata(){return $this->data;}

    public function sethora($param){$this->hora = $param;}
    
    public function gethora(){return $this->hora;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tbcurtidas (idpost,idusuario,data,hora) VALUES ( :idpost,:idusuario,:data,:hora)";
        $query = $this->dbh->prepare($sql);
        
       
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->idusuario != null){
            $query->bindParam(':idusuario', $this->idusuario, PDO::PARAM_INT);
        }
        if($this->data != null){
            $query->bindParam(':data', $this->data, PDO::PARAM_STR);
        }
        if($this->hora != null){
            $query->bindParam(':hora', $this->hora, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tbcurtidas ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->idusuario != null){
            $query->bindParam(':idusuario', $this->idusuario, PDO::PARAM_INT);
        }
        if($this->data != null){
            $query->bindParam(':data', $this->data, PDO::PARAM_STR);
        }
        if($this->hora != null){
            $query->bindParam(':hora', $this->hora, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tbcurtidas SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->idusuario != null){
            $query->bindParam(':idusuario', $this->idusuario, PDO::PARAM_INT);
        }
        if($this->data != null){
            $query->bindParam(':data', $this->data, PDO::PARAM_STR);
        }
        if($this->hora != null){
            $query->bindParam(':hora', $this->hora, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tbcurtidas ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->id != null){
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if($this->idpost != null){
            $query->bindParam(':idpost', $this->idpost, PDO::PARAM_INT);
        }
        if($this->idusuario != null){
            $query->bindParam(':idusuario', $this->idusuario, PDO::PARAM_INT);
        }
        if($this->data != null){
            $query->bindParam(':data', $this->data, PDO::PARAM_STR);
        }
        if($this->hora != null){
            $query->bindParam(':hora', $this->hora, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>