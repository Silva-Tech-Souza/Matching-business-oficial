<?php

class Help{
    
    protected $idHelp = null;
    protected $IdCodLocal = null;
    protected $HelpText = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidHelp($param){$this->idHelp = $param;}

    public function getidHelp(){return $this->idHelp;}

    public function setIdCodLocal($param){$this->IdCodLocal = $param;}
    
    public function getIdCodLocal(){return $this->IdCodLocal;}

    public function setHelpText($param){$this->HelpText = $param;}
    
    public function getHelpText(){return $this->HelpText;}

    

    public function cadastrar(){

        

        $sql = "INSERT INTO tblHelp (idHelp,IdCodLocal,HelpText) VALUES (:idHelp,:IdCodLocal,:HelpText)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idHelp != null){
            $query->bindParam(':idHelp', $this->idHelp, PDO::PARAM_INT);
        }
        if($this->IdCodLocal != null){
            $query->bindParam(':IdCodLocal', $this->IdCodLocal, PDO::PARAM_INT);
        }
        if($this->HelpText != null){
            $query->bindParam(':HelpText', $this->HelpText, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblHelp ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idHelp != null){
            $query->bindParam(':idHelp', $this->idHelp, PDO::PARAM_INT);
        }
        if($this->IdCodLocal != null){
            $query->bindParam(':IdCodLocal', $this->IdCodLocal, PDO::PARAM_INT);
        }
        if($this->HelpText != null){
            $query->bindParam(':HelpText', $this->HelpText, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblHelp SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idHelp != null){
            $query->bindParam(':idHelp', $this->idHelp, PDO::PARAM_INT);
        }
        if($this->IdCodLocal != null){
            $query->bindParam(':IdCodLocal', $this->IdCodLocal, PDO::PARAM_INT);
        }
        if($this->HelpText != null){
            $query->bindParam(':HelpText', $this->HelpText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblHelp ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idHelp != null){
            $query->bindParam(':idHelp', $this->idHelp, PDO::PARAM_INT);
        }
        if($this->IdCodLocal != null){
            $query->bindParam(':IdCodLocal', $this->IdCodLocal, PDO::PARAM_INT);
        }
        if($this->HelpText != null){
            $query->bindParam(':HelpText', $this->HelpText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>