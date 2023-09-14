<?php

class Ads{
    protected $idAd = null;
    protected $idCustomer = null;
    protected $adLocal = null;
    protected $adOrder = null;
    protected $adPicturePath = null;
    protected $adLink = null;
    protected $adStartDate = null;
    protected $adEndDate = null;
    protected $adFlagActive = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setIdAd($param){$this->idAd = $param;}

    public function getIdAd(){return $this->idAd;}

    public function setIdCustomer($param){$this->idCustomer = $param;}
    
    public function getIdCustomer(){return $this->idCustomer;}

    public function setAdLocal($param){$this->adLocal = $param;}

    public function getAdLocal(){return $this->adLocal;}

    public function setAdOrder($param){$this->adOrder = $param;}
    
    public function getAdOrder(){return $this->adOrder;}

    public function setAdPicturePath($param){$this->adPicturePath = $param;}

    public function getAdPicturePath(){return $this->adPicturePath;}

    public function setAdLink($param){$this->adLink = $param;}
    
    public function getAdLink(){return $this->adLink;}

    public function setAdStartDate($param){$this->adStartDate = $param;}

    public function getAdStartDate(){return $this->adStartDate;}

    public function setAdEndDate($param){$this->adEndDate = $param;}
    
    public function getAdEndDate(){return $this->adEndDate;}

    public function setAdFlagActive($param){$this->adFlagActive = $param;}
    
    public function getAdFlagActive(){return $this->adFlagActive;}



    public function cadastrar(){

        

        $sql = "INSERT INTO tblAds (IdAd,IdCustomer,AdLocal,AdOrder,AdPicturePath,AdLink,AdStartDate,AdEndDate,AdFlagActive) VALUES (:idAd, :idCustomer, :adLocal, :adOrder, :adPicturePath, :adLink, :adStartDate, :adEndDate, :adFlagActive)";
        $query = $this->dbh->prepare($sql);

        if($this->idAd != null){
            $query->bindParam(':idAd', $this->idAd, PDO::PARAM_INT);
        }
        if($this->idCustomer != null){
            $query->bindParam(':idCustomer', $this->idCustomer, PDO::PARAM_INT);
        }
        if($this->adLocal != null){
            $query->bindParam(':adLocal', $this->adLocal, PDO::PARAM_STR);
        }
        if($this->adOrder != null){
            $query->bindParam(':adOrder', $this->adOrder, PDO::PARAM_INT);
        }
        if($this->adPicturePath != null){
            $query->bindParam(':adPicturePath', $this->adPicturePath, PDO::PARAM_STR);
        }
        if($this->adLink != null){
            $query->bindParam(':adLink', $this->adLink, PDO::PARAM_STR);
        }
        if($this->adStartDate != null){
            $query->bindParam(':adStartDate', $this->adStartDate, PDO::PARAM_STR);
        }
        if($this->adEndDate != null){
            $query->bindParam(':adEndDate', $this->adEndDate, PDO::PARAM_STR);
        }
        if($this->adFlagActive != null){
            $query->bindParam(':adFlagActive', $this->adFlagActive, PDO::PARAM_BOOL);
        }

        $query->execute();

        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblAds ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idAd != null){
            $query->bindParam(':idAd', $this->idAd, PDO::PARAM_INT);
        }
        if($this->idCustomer != null){
            $query->bindParam(':idCustomer', $this->idCustomer, PDO::PARAM_INT);
        }
        if($this->adLocal != null){
            $query->bindParam(':adLocal', $this->adLocal, PDO::PARAM_STR);
        }
        if($this->adOrder != null){
            $query->bindParam(':adOrder', $this->adOrder, PDO::PARAM_INT);
        }
        if($this->adPicturePath != null){
            $query->bindParam(':adPicturePath', $this->adPicturePath, PDO::PARAM_STR);
        }
        if($this->adLink != null){
            $query->bindParam(':adLink', $this->adLink, PDO::PARAM_STR);
        }
        if($this->adStartDate != null){
            $query->bindParam(':adStartDate', $this->adStartDate, PDO::PARAM_STR);
        }
        if($this->adEndDate != null){
            $query->bindParam(':adEndDate', $this->adEndDate, PDO::PARAM_STR);
        }
        if($this->adFlagActive != null){
            $query->bindParam(':adFlagActive', $this->adFlagActive, PDO::PARAM_BOOL);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblAds SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idAd != null){
            $query->bindParam(':idAd', $this->idAd, PDO::PARAM_INT);
        }
        if($this->idCustomer != null){
            $query->bindParam(':idCustomer', $this->idCustomer, PDO::PARAM_INT);
        }
        if($this->adLocal != null){
            $query->bindParam(':adLocal', $this->adLocal, PDO::PARAM_STR);
        }
        if($this->adOrder != null){
            $query->bindParam(':adOrder', $this->adOrder, PDO::PARAM_INT);
        }
        if($this->adPicturePath != null){
            $query->bindParam(':adPicturePath', $this->adPicturePath, PDO::PARAM_STR);
        }
        if($this->adLink != null){
            $query->bindParam(':adLink', $this->adLink, PDO::PARAM_STR);
        }
        if($this->adStartDate != null){
            $query->bindParam(':adStartDate', $this->adStartDate, PDO::PARAM_STR);
        }
        if($this->adEndDate != null){
            $query->bindParam(':adEndDate', $this->adEndDate, PDO::PARAM_STR);
        }
        if($this->adFlagActive != null){
            $query->bindParam(':adFlagActive', $this->adFlagActive, PDO::PARAM_BOOL);
        }

        $query->execute();

        return $query;
    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblAds ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idAd != null){
            $query->bindParam(':idAd', $this->idAd, PDO::PARAM_INT);
        }
        if($this->idCustomer != null){
            $query->bindParam(':idCustomer', $this->idCustomer, PDO::PARAM_INT);
        }
        if($this->adLocal != null){
            $query->bindParam(':adLocal', $this->adLocal, PDO::PARAM_STR);
        }
        if($this->adOrder != null){
            $query->bindParam(':adOrder', $this->adOrder, PDO::PARAM_INT);
        }
        if($this->adPicturePath != null){
            $query->bindParam(':adPicturePath', $this->adPicturePath, PDO::PARAM_STR);
        }
        if($this->adLink != null){
            $query->bindParam(':adLink', $this->adLink, PDO::PARAM_STR);
        }
        if($this->adStartDate != null){
            $query->bindParam(':adStartDate', $this->adStartDate, PDO::PARAM_STR);
        }
        if($this->adEndDate != null){
            $query->bindParam(':adEndDate', $this->adEndDate, PDO::PARAM_STR);
        }
        if($this->adFlagActive != null){
            $query->bindParam(':adFlagActive', $this->adFlagActive, PDO::PARAM_BOOL);
        }

        $query->execute();

        return $query;

    }

}

?>