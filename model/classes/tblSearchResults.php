<?php

class SearchResults{
    
    protected $idSearchResults = null;
    protected $idSearch  = null;
    protected $idClientPesquisador = null;
    protected $idClientResultado = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function setidSearchResults($param){$this->idSearchResults = $param;}

    public function getidSearchResults(){return $this->idSearchResults;}

    public function setidSearch($param){$this->idSearch = $param;}

    public function getidSearch(){return $this->idSearch;}

    public function setidClientPesquisador($param){$this->idClientPesquisador = $param;}

    public function getidClientPesquisador(){return $this->idClientPesquisador;}

    public function setidClientResultado($param){$this->idClientResultado = $param;}

    public function getidClientResultado(){return $this->idClientResultado;}


    public function cadastrar(){

        $sql = "INSERT INTO tblSearchResults ( idSearch,  idClientPesquisador,  idClientResultado) VALUES (:idSearchResults, :idSearch, :idClientPesquisador,  :idClientResultado)";
        $query = $this->dbh->prepare($sql);

        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idClientPesquisador != null){
            $query->bindParam(':idClientPesquisador', $this->idClientPesquisador, PDO::PARAM_STR);
        }
        if($this->idClientResultado != null){
            $query->bindParam(':idClientResultado', $this->idClientResultado, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblSearchResults ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
      /*  if($this->idSearchResults != null){
            $query->bindParam(':idSearchResults', $this->idSearchResults, PDO::PARAM_INT);
        }*/
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idClientPesquisador != null){
            $query->bindParam(':idClientPesquisador', $this->idClientPesquisador, PDO::PARAM_STR);
        }
      /*  if($this->idClientResultado != null){
            $query->bindParam(':idClientResultado', $this->idClientResultado, PDO::PARAM_INT);
        }*/

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblSearchResults SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchResults != null){
            $query->bindParam(':idSearchResults', $this->idSearchResults, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idClientPesquisador != null){
            $query->bindParam(':idClientPesquisador', $this->idClientPesquisador, PDO::PARAM_STR);
        }
        if($this->idClientResultado != null){
            $query->bindParam(':idClientResultado', $this->idClientResultado, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblSearchResults ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idSearchResults != null){
            $query->bindParam(':idSearchResults', $this->idSearchResults, PDO::PARAM_INT);
        }
        if($this->idSearch != null){
            $query->bindParam(':idSearch', $this->idSearch, PDO::PARAM_INT);
        }
        if($this->idClientPesquisador != null){
            $query->bindParam(':idClientPesquisador', $this->idClientPesquisador, PDO::PARAM_STR);
        }
        if($this->idClientResultado != null){
            $query->bindParam(':idClientResultado', $this->idClientResultado, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>