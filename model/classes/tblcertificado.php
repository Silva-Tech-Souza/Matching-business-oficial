<?php
class Certificado
{
    protected $id = null;
    protected $titulo = null;
    protected $descricao = null;
    protected $imagemcertificado = null;
    protected $iduser = null;
    protected $dbh = null;


    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function setId($param)
    {
        $this->id = $param;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setIduser($param)
    {
        $this->iduser = $param;
    }

    public function getIduser()
    {
        return $this->iduser;
    }
    public function setTitulo($param)
    {
        $this->titulo = $param;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setDescricao($param)
    {
        $this->descricao = $param;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getImagemcertificado()
    {
        return $this->imagemcertificado;
    }

    public function setImagemcertificado($param)
    {
        $this->imagemcertificado = $param;
    }

    public function cadastrar()
    {

        $sql = "INSERT INTO `certificado` ( `titulo`, `descricao`, `iduser`) VALUES ( :titulo, :descricao, :iduser)";
        $query = $this->dbh->prepare($sql);

     
        if ($this->iduser != null) {
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }
        if ($this->titulo != null) {
            $query->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
        }
        if ($this->descricao != null) {
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
       
        $query->execute();
        return $this->dbh->lastInsertId();
    }

    public function consulta($paramsExtra)
    {

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from certificado " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if ($this->iduser != null) {
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }
        if ($this->titulo != null) {
            $query->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
        }
        if ($this->descricao != null) {
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if ($this->imagemcertificado != null) {
            $query->bindParam(':imagemcertificado', $this->imagemcertificado, PDO::PARAM_STR);
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
        $sql = "UPDATE certificado SET " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if ($this->iduser != null) {
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }
        if ($this->titulo != null) {
            $query->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
        }
        if ($this->descricao != null) {
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if ($this->imagemcertificado != null) {
            $query->bindParam(':imagemcertificado', $this->imagemcertificado, PDO::PARAM_STR);
        }
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;
    }

    public function deletar($paramsExtra)
    {
        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM certificado " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }
        if ($this->iduser != null) {
            $query->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
        }
        if ($this->titulo != null) {
            $query->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
        }
        if ($this->descricao != null) {
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if ($this->imagemcertificado != null) {
            $query->bindParam(':imagemcertificado', $this->imagemcertificado, PDO::PARAM_STR);
        }
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;
    }
}
