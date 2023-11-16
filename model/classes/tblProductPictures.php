<?php

class ProductPictures{
    
    protected $idProductPicture = null;
    protected $idProduct = null;
    protected $tblProductPicturePath = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidProductPicture($param){$this->idProductPicture = $param;}

    public function getidProductPicture(){return $this->idProductPicture;}

    public function setidProduct($param){$this->idProduct = $param;}
    
    public function getidProduct(){return $this->idProduct;}

    public function settblProductPicturePath($param){$this->tblProductPicturePath = $param;}
    
    public function gettblProductPicturePath(){return $this->tblProductPicturePath;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblProductPictures (idProduct,tblProductPicturePath) VALUES (:idProduct,:tblProductPicturePath)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->tblProductPicturePath != null){
            $query->bindParam(':tblProductPicturePath', $this->tblProductPicturePath, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblProductPictures ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idProductPicture != null){
            $query->bindParam(':idProductPicture', $this->idProductPicture, PDO::PARAM_INT);
        }
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->tblProductPicturePath != null){
            $query->bindParam(':tblProductPicturePath', $this->tblProductPicturePath, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblProductPictures SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->idProductPicture != null){
            $query->bindParam(':idProductPicture', $this->idProductPicture, PDO::PARAM_INT);
        }
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->tblProductPicturePath != null){
            $query->bindParam(':tblProductPicturePath', $this->tblProductPicturePath, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblProductPictures ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idProductPicture != null){
            $query->bindParam(':idProductPicture', $this->idProductPicture, PDO::PARAM_INT);
        }
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->tblProductPicturePath != null){
            $query->bindParam(':tblProductPicturePath', $this->tblProductPicturePath, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;

    }

}

?>