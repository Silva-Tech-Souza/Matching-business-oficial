<?php

class Feeds
{

    protected $IdFeed = null;
    protected $idClient = null;
    protected $Published_at = null;
    protected $Title = null;
    protected $Text = null;
    protected $Image = null;
    protected $Video = null;
    protected $dbh = null;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }



    public function setidIdFeed($param)
    {
        $this->IdFeed = $param;
    }

    public function getidIdFeed()
    {
        return $this->IdFeed;
    }

    public function setidClient($param)
    {
        $this->idClient = $param;
    }

    public function getidClient()
    {
        return $this->idClient;
    }

    public function setPublished_at($param)
    {
        $this->Published_at = $param;
    }

    public function getPublished_at()
    {
        return $this->Published_at;
    }

    public function setTitle($param)
    {
        $this->Title = $param;
    }

    public function getTitle()
    {
        return $this->Title;
    }

    public function setText($param)
    {
        $this->Text = $param;
    }

    public function getText()
    {
        return $this->Text;
    }

    public function setImage($param)
    {
        $this->Image = $param;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setVideo($param)
    {
        $this->Video = $param;
    }

    public function getVideo()
    {
        return $this->Video;
    }


    public function cadastrar()
    {
        $sql = "INSERT INTO tblFeeds (idClient, Title, Text, Image, Video) VALUES (:idClient, :Title, :Text, :Image, :Video)";
        $query = $this->dbh->prepare($sql);

        $query->bindValue(':idClient', $this->idClient, PDO::PARAM_INT);
        $query->bindValue(':Title', $this->Title, PDO::PARAM_STR);
        $query->bindValue(':Text', $this->Text, PDO::PARAM_STR);
        $query->bindValue(':Image', $this->Image, PDO::PARAM_STR);
        $query->bindValue(':Video', $this->Video, PDO::PARAM_STR);
        $query->execute();

        return $query;
    }

    public function consulta($paramsExtra)
    {



        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblFeeds " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->IdFeed != null) {
            $query->bindParam(':IdFeed', $this->IdFeed, PDO::PARAM_INT);
        }
        if ($this->idClient != null) {
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if ($this->Published_at != null) {
            $query->bindParam(':Published_at', $this->Published_at, PDO::PARAM_STR);
        }
        if ($this->Title != null) {
            $query->bindParam(':Title', $this->Title, PDO::PARAM_STR);
        }
        if ($this->Text != null) {
            $query->bindParam(':Text', $this->Text, PDO::PARAM_STR);
        }
        if ($this->Image != null) {
            $query->bindParam(':Image', $this->Image, PDO::PARAM_STR);
        }
        if ($this->Video != null) {
            $query->bindParam(':Video', $this->Video, PDO::PARAM_STR);
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
        $sql = "UPDATE tblFeeds SET " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->IdFeed != null) {
            $query->bindParam(':IdFeed', $this->IdFeed, PDO::PARAM_INT);
        }
        if ($this->idClient != null) {
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if ($this->Published_at != null) {
            $query->bindParam(':Published_at', $this->Published_at, PDO::PARAM_STR);
        }
        if ($this->Title != null) {
            $query->bindParam(':Title', $this->Title, PDO::PARAM_STR);
        }
        if ($this->Text != null) {
            $query->bindParam(':Text', $this->Text, PDO::PARAM_STR);
        }
        if ($this->Image != null) {
            $query->bindParam(':Image', $this->Image, PDO::PARAM_STR);
        }
        if ($this->Video != null) {
            $query->bindParam(':Video', $this->Video, PDO::PARAM_STR);
        }

        $query->execute();
        return $query;
    }

    public function deletar($paramsExtra)
    {



        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblFeeds " . $paramsExtra;
        $query = $this->dbh->prepare($sql);

        if ($this->IdFeed != null) {
            $query->bindParam(':IdFeed', $this->IdFeed, PDO::PARAM_INT);
        }
        if ($this->idClient != null) {
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        

        $query->execute();
        return $query;
    }
}
