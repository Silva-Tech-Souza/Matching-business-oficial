<?php class CertiPicture
{
    protected $id = null;
    protected $caminho = null;
    protected $idcertificado = null;
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

    public function setIdCertificado($param)
    {
        $this->idcertificado = $param;
    }

    public function getIdCertificado()
    {
        return $this->idcertificado;
    }

    public function setCaminho($param)
    {
        $this->caminho = $param;
    }

    public function getCaminho()
    {
        return $this->caminho;
    }

    public function cadastrar()
    {
        $sql = "INSERT INTO `certipictures` (`caminho`, `idcertificado`) VALUES (:caminho, :idcertificado)";
        $query = $this->dbh->prepare($sql);

        if ($this->caminho != null) {
            $query->bindParam(':caminho', $this->caminho, PDO::PARAM_STR);
        }

        if ($this->idcertificado != null) {
            $query->bindParam(':idcertificado', $this->idcertificado, PDO::PARAM_INT);
        }

        $query->execute();
        return $this->dbh->lastInsertId();
    }

    public function consulta($paramsExtra)
    {
        $sql = "SELECT * FROM certipictures " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }

        if ($this->caminho != null) {
            $query->bindParam(':caminho', $this->caminho, PDO::PARAM_STR);
        }

        if ($this->idcertificado != null) {
            $query->bindParam(':idcertificado', $this->idcertificado, PDO::PARAM_INT);
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
        $sql = "UPDATE certipictures SET " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }

        if ($this->caminho != null) {
            $query->bindParam(':caminho', $this->caminho, PDO::PARAM_STR);
        }

        if ($this->idcertificado != null) {
            $query->bindParam(':idcertificado', $this->idcertificado, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;
    }

    public function deletar($paramsExtra)
    {
        $sql = "DELETE FROM certipictures " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->id != null) {
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        }

        if ($this->caminho != null) {
            $query->bindParam(':caminho', $this->caminho, PDO::PARAM_STR);
        }

        if ($this->idcertificado != null) {
            $query->bindParam(':idcertificado', $this->idcertificado, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query;
    }
}

?>