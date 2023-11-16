<?php

class LogActivity{
    protected $idLogActivity = null;
    protected $IdModule = null;
    protected $idClient = null;
    protected $idLogAction = null;
    protected $LogDate = null;
    protected $LogAuxText = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidLogActivity($param){$this->idLogActivity = $param;}

    public function getidLogActivityp(){return $this->idLogActivity;}

    public function setIdModule($param){$this->IdModule = $param;}
    
    public function getIdModule(){return $this->IdModule;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setidLogAction($param){$this->idLogAction = $param;}

    public function getidLogAction(){return $this->idLogAction;}

    public function setLogDate($param){$this->LogDate = $param;}
    
    public function getLogDate(){return $this->LogDate;}

    public function setLogAuxText($param){$this->LogAuxText = $param;}
    
    public function getLogAuxText(){return $this->LogAuxText;}

    

    public function cadastrar(){

        

        $sql = "INSERT INTO tblLogActivity (idLogActivity,IdModule,idClient,idLogAction,LogDate,LogAuxText) VALUES (:idLogActivity,:IdModule,:idClient,:idLogAction,:LogDate,:LogAuxText)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogActivity != null){
            $query->bindParam(':idLogActivity', $this->idLogActivity, PDO::PARAM_INT);
        }
        if($this->IdModule != null){
            $query->bindParam(':IdModule', $this->IdModule, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->LogDate != null){
            $query->bindParam(':LogDate', $this->LogDate, PDO::PARAM_STR);
        }
        if($this->LogAuxText != null){
            $query->bindParam(':LogAuxText', $this->LogAuxText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblLogActivity ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogActivity != null){
            $query->bindParam(':idLogActivity', $this->idLogActivity, PDO::PARAM_INT);
        }
        if($this->IdModule != null){
            $query->bindParam(':IdModule', $this->IdModule, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->LogDate != null){
            $query->bindParam(':LogDate', $this->LogDate, PDO::PARAM_STR);
        }
        if($this->LogAuxText != null){
            $query->bindParam(':LogAuxText', $this->LogAuxText, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblLogActivity SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogActivity != null){
            $query->bindParam(':idLogActivity', $this->idLogActivity, PDO::PARAM_INT);
        }
        if($this->IdModule != null){
            $query->bindParam(':IdModule', $this->IdModule, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->LogDate != null){
            $query->bindParam(':LogDate', $this->LogDate, PDO::PARAM_STR);
        }
        if($this->LogAuxText != null){
            $query->bindParam(':LogAuxText', $this->LogAuxText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblLogActivity ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idLogActivity != null){
            $query->bindParam(':idLogActivity', $this->idLogActivity, PDO::PARAM_INT);
        }
        if($this->IdModule != null){
            $query->bindParam(':IdModule', $this->IdModule, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idLogAction != null){
            $query->bindParam(':idLogAction', $this->idLogAction, PDO::PARAM_INT);
        }
        if($this->LogDate != null){
            $query->bindParam(':LogDate', $this->LogDate, PDO::PARAM_STR);
        }
        if($this->LogAuxText != null){
            $query->bindParam(':LogAuxText', $this->LogAuxText, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>