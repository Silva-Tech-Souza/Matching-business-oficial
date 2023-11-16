<?php

class Empresas
{

    protected $id = null;
    protected $nome = null;
    protected $taxid = null;
    protected $idClient = null;
    protected $descricao = null;
    protected $fotoperfil = null;
    protected $fotobanner = null;
    protected $redesocial = null;
    protected $site = null;
    protected $pais = null;
    protected $email = null;
    protected $numero = null;
    protected $colab1 = null;
    protected $colab2 = null;
    protected $colab3 = null;
    protected $colab4 = null;
    protected $colab5 = null;
    protected $dbh = null;


    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function setId($param)
    {
        $this->id = $param;
    }

    public function setNome($param)
    {
        $this->nome = $param;
    }

    public function setTaxid($param)
    {
        $this->taxid = $param;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTaxid()
    {
        return $this->taxid;
    }

    public function setidClient($param)
    {
        $this->idClient = $param;
    }

    public function getidClient()
    {
        return $this->idClient;
    }


    public function setdescricao($param)
    {
        $this->descricao = $param;
    }
    public function getdescricao()
    {
        return $this->descricao;
    }

    public function getfotoperfil()
    {
        return $this->fotoperfil;
    }
    public function setfotoperfil($param)
    {
        $this->fotoperfil = $param;
    }

    public function getfotobanner()
    {
        return $this->fotobanner;
    }
    public function setfotobanner($param)
    {
        $this->fotobanner = $param;
    }

    public function getredesocial()
    {
        return $this->redesocial;
    }
    public function setredesocial($param)
    {
        $this->redesocial = $param;
    }

    public function getsite()
    {
        return $this->site;
    }
    public function setsite($param)
    {
        $this->site = $param;
    }

    public function getpais()
    {
        return $this->pais;
    }
    public function setpais($param)
    {
        $this->pais = $param;
    }

    public function getemail()
    {
        return $this->email;
    }
    public function setemail($param)
    {
        $this->email = $param;
    }

    public function getnumero()
    {
        return $this->numero;
    }
    public function setnumero($param)
    {
        $this->numero = $param;
    }

    public function getcolab1()
    {
        return $this->colab1;
    }
    public function setcolab1($param)
    {
        $this->colab1 = $param;
    }

    public function getcolab2()
    {
        return $this->colab2;
    }
    public function setcolab2($param)
    {
        $this->colab2 = $param;
    }

    public function getcolab3()
    {
        return $this->colab3;
    }
    public function setcolab3($param)
    {
        $this->colab3 = $param;
    }

    public function getcolab4()
    {
        return $this->colab4;
    }
    public function setcolab4($param)
    {
        $this->colab4 = $param;
    }

    public function getcolab5()
    {
        return $this->colab5;
    }
    public function setcolab5($param)
    {
        $this->colab5 = $param;
    }
    public function cadastrar()
    {

        $sql = "INSERT INTO tblEmpresas (nome, taxid, colab1,  pais) VALUES (:nome, :taxid,:colab1, :pais)";
        $query = $this->dbh->prepare($sql);

        if ($this->nome != null) {
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if ($this->taxid != null) {
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if ($this->colab1 != null) {
            $query->bindParam(':colab1', $this->colab1, PDO::PARAM_INT);
        }
        if ($this->pais != null) {
            $query->bindParam(':pais', $this->pais, PDO::PARAM_INT);
        }

        $query->execute();

        return  $this->dbh->lastInsertId();;
    }

    public function consulta($paramsExtra)
    {


        $sql = "SELECT * from tblEmpresas " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if ($this->nome != null) {
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if ($this->taxid != null) {
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if ($this->idClient != null) {
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            return $results;
        } else {
            return null;
        }
    }

    public function atualizar($paramsExtra)
    {

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblEmpresas SET " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if ($this->nome != null) {
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if ($this->taxid != null) {
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if ($this->idClient != null) {
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_STR);
        }
        if ($this->pais != null) {
            $query->bindParam(':pais', $this->pais, PDO::PARAM_INT);
        }

        if ($this->descricao != null) {
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }

        if ($this->fotoperfil != null) {
            $query->bindParam(':fotoperfil', $this->fotoperfil, PDO::PARAM_STR);
        }

        if ($this->fotobanner != null) {
            $query->bindParam(':fotobanner', $this->fotobanner, PDO::PARAM_STR);
        }
        if ($this->redesocial != null) {
            $query->bindParam(':redesocial', $this->redesocial, PDO::PARAM_STR);
        }
        if ($this->site != null) {
            $query->bindParam(':site', $this->site, PDO::PARAM_STR);
        }
        if ($this->descricao != null) {
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }

        if ($this->colab1 != null) {
            $query->bindParam(':colab1', $this->colab1, PDO::PARAM_INT);
        }

        if ($this->colab2 != null) {
            $query->bindParam(':colab2', $this->colab2, PDO::PARAM_INT);
        }
        if ($this->colab3 != null) {
            $query->bindParam(':colab3', $this->colab3, PDO::PARAM_INT);
        }
        if ($this->colab4 != null) {
            $query->bindParam(':colab4', $this->colab4, PDO::PARAM_INT);
        }
        if ($this->colab5 != null) {
            $query->bindParam(':colab5', $this->colab5, PDO::PARAM_INT);
        }
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;
    }

    public function deletar($paramsExtra)
    {



        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblEmpresas " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if ($this->nome != null) {
            $query->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        }
        if ($this->taxid != null) {
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if ($this->idClient != null) {
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_STR);
        }
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;
    }
}
