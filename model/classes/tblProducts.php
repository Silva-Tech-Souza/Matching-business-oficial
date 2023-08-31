<?php

class Products{
    protected $idProduct = null;
    protected $idClient = null;
    protected $idBusinessCategory = null;
    protected $ProductName = null;
    protected $ProdcuctDescription = null;
    protected $ProdcuctEspecification = null;
    protected $flagExcluido = null;
    protected $Category = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }

    public function setidProduct($param){$this->idProduct = $param;}

    public function getidProduct(){return $this->idProduct;}

    public function setidClient($param){$this->idClient = $param;}
    
    public function getidClient(){return $this->idClient;}

    public function setidBusinessCategory($param){$this->idBusinessCategory = $param;}
    
    public function getidBusinessCategory(){return $this->idBusinessCategory;}

    public function setProductName($param){$this->ProductName = $param;}
    
    public function getProductName(){return $this->ProductName;}

    public function setProdcuctDescription($param){$this->ProdcuctDescription = $param;}

    public function getProdcuctDescription(){return $this->ProdcuctDescription;}

    public function setProdcuctEspecification($param){$this->ProdcuctEspecification = $param;}
    
    public function getProdcuctEspecification(){return $this->ProdcuctEspecification;}

    public function setflagExcluido($param){$this->flagExcluido = $param;}
    
    public function getflagExcluido(){return $this->flagExcluido;}

    public function setCategory($param){$this->Category = $param;}
    
    public function getCategory(){return $this->Category;}


    public function cadastrar(){

        

        $sql = "INSERT INTO tblProducts (idProduct,idClient,idBusinessCategory,ProductName,ProdcuctDescription,ProdcuctEspecification,flagExcluido,Category) VALUES (:idProduct,:idClient,:idBusinessCategory,:ProductName,:ProdcuctDescription,:ProdcuctEspecification,:flagExcluido,:Category)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->ProductName != null){
            $query->bindParam(':ProductName', $this->ProductName, PDO::PARAM_STR);
        }
        if($this->ProdcuctDescription != null){
            $query->bindParam(':ProdcuctDescription', $this->ProdcuctDescription, PDO::PARAM_STR);
        }
        if($this->ProdcuctEspecification != null){
            $query->bindParam(':ProdcuctEspecification', $this->ProdcuctEspecification, PDO::PARAM_STR);
        }
        if($this->flagExcluido != null){
            $query->bindParam(':flagExcluido', $this->flagExcluido, PDO::PARAM_INT);
        }
        if($this->Category != null){
            $query->bindParam(':Category', $this->Category, PDO::PARAM_INT);
        }


        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblProducts ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->ProductName != null){
            $query->bindParam(':ProductName', $this->ProductName, PDO::PARAM_STR);
        }
        if($this->ProdcuctDescription != null){
            $query->bindParam(':ProdcuctDescription', $this->ProdcuctDescription, PDO::PARAM_STR);
        }
        if($this->ProdcuctEspecification != null){
            $query->bindParam(':ProdcuctEspecification', $this->ProdcuctEspecification, PDO::PARAM_STR);
        }
        if($this->flagExcluido != null){
            $query->bindParam(':flagExcluido', $this->flagExcluido, PDO::PARAM_INT);
        }
        if($this->Category != null){
            $query->bindParam(':Category', $this->Category, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblProducts SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->ProductName != null){
            $query->bindParam(':ProductName', $this->ProductName, PDO::PARAM_STR);
        }
        if($this->ProdcuctDescription != null){
            $query->bindParam(':ProdcuctDescription', $this->ProdcuctDescription, PDO::PARAM_STR);
        }
        if($this->ProdcuctEspecification != null){
            $query->bindParam(':ProdcuctEspecification', $this->ProdcuctEspecification, PDO::PARAM_STR);
        }
        if($this->flagExcluido != null){
            $query->bindParam(':flagExcluido', $this->flagExcluido, PDO::PARAM_INT);
        }
        if($this->Category != null){
            $query->bindParam(':Category', $this->Category, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblProducts ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idProduct != null){
            $query->bindParam(':idProduct', $this->idProduct, PDO::PARAM_INT);
        }
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->idBusinessCategory != null){
            $query->bindParam(':idBusinessCategory', $this->idBusinessCategory, PDO::PARAM_INT);
        }
        if($this->ProductName != null){
            $query->bindParam(':ProductName', $this->ProductName, PDO::PARAM_STR);
        }
        if($this->ProdcuctDescription != null){
            $query->bindParam(':ProdcuctDescription', $this->ProdcuctDescription, PDO::PARAM_STR);
        }
        if($this->ProdcuctEspecification != null){
            $query->bindParam(':ProdcuctEspecification', $this->ProdcuctEspecification, PDO::PARAM_STR);
        }
        if($this->flagExcluido != null){
            $query->bindParam(':flagExcluido', $this->flagExcluido, PDO::PARAM_INT);
        }
        if($this->Category != null){
            $query->bindParam(':Category', $this->Category, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }
}

?>