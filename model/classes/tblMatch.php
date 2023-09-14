<?php

class Match_BD{
    
      
    protected $IdMatch = null;
    protected $IdClientSource = null;
    protected $IdClientMatched = null;
    protected $MatchStatus = null;
    protected $SearchProfileNameId = null;
    protected $DateOfSearchProfileMacth = null;
    protected $idRespSPid = null;
    protected $TextOfInvite = null;
    protected $DateOfInvite = null;
    protected $idRespInviteId = null;
    protected $DateOfResponse = null;
    protected $ChatId = null;
    protected $DateVisualization = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setIdMatch($param){$this->IdMatch = $param;}

    public function getIdMatch(){return $this->IdMatch;}

    public function setIdClientSource($param){$this->IdClientSource = $param;}
    
    public function getIdClientSource(){return $this->IdClientSource;}

    public function setIdClientMatched($param){$this->IdClientMatched = $param;}
    
    public function getIdClientMatched(){return $this->IdClientMatched;}

    public function setMatchStatus($param){$this->MatchStatus = $param;}
    
    public function getMatchStatus(){return $this->MatchStatus;}

    public function setSearchProfileNameId($param){$this->SearchProfileNameId = $param;}
    
    public function getSearchProfileNameId(){return $this->SearchProfileNameId;}

    public function setDateOfSearchProfileMacth($param){$this->DateOfSearchProfileMacth = $param;}
    
    public function getDateOfSearchProfileMacth(){return $this->DateOfSearchProfileMacth;}

    public function setidRespSPid($param){$this->idRespSPid = $param;}
    
    public function getidRespSPid(){return $this->idRespSPid;}
    
    public function setTextOfInvite($param){$this->TextOfInvite = $param;}
    
    public function getTextOfInvite(){return $this->TextOfInvite;}

    public function setDateOfInvite($param){$this->DateOfInvite = $param;}
    
    public function getDateOfInvite(){return $this->DateOfInvite;}

    public function setidRespInviteId($param){$this->idRespInviteId = $param;}
    
    public function getidRespInviteId(){return $this->idRespInviteId;}
    
    public function setDateOfResponse($param){$this->DateOfResponse = $param;}
    
    public function getDateOfResponse(){return $this->DateOfResponse;}

    public function setChatId($param){$this->ChatId = $param;}
    
    public function getChatId(){return $this->ChatId;}

    public function setDateVisualization($param){$this->DateVisualization = $param;}
    
    public function getDateVisualization(){return $this->DateVisualization;}

    public function cadastrar(){

        

        $sql = "INSERT INTO tblMatch (IdMatch,IdClientSource,IdClientMatched,MatchStatus,SearchProfileNameId,DateOfSearchProfileMacth,idRespSPid,TextOfInvite,DateOfInvite,idRespInviteId,DateOfResponse,ChatId,DateVisualization) VALUES (:IdMatch,:IdClientSource,:IdClientMatched,:MatchStatus,:SearchProfileNameId,:DateOfSearchProfileMacth,:idRespSPid,:TextOfInvite,:DateOfInvite,:idRespInviteId,:DateOfResponse,:ChatId,:DateVisualization)";
        $query = $this->dbh->prepare($sql);
        
        if($this->IdMatch != null){
            $query->bindParam(':IdMatch', $this->IdMatch, PDO::PARAM_INT);
        }
        if($this->IdClientSource != null){
            $query->bindParam(':IdClientSource', $this->IdClientSource, PDO::PARAM_INT);
        }
        if($this->IdClientMatched != null){
            $query->bindParam(':IdClientMatched', $this->IdClientMatched, PDO::PARAM_INT);
        }
        if($this->MatchStatus != null){
            $query->bindParam(':MatchStatus', $this->MatchStatus, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->DateOfSearchProfileMacth != null){
            $query->bindParam(':DateOfSearchProfileMacth', $this->DateOfSearchProfileMacth, PDO::PARAM_STR);
        }
        if($this->idRespSPid != null){
            $query->bindParam(':idRespSPid', $this->idRespSPid, PDO::PARAM_INT);
        }
        if($this->TextOfInvite != null){
            $query->bindParam(':TextOfInvite', $this->TextOfInvite, PDO::PARAM_STR);
        }
        if($this->DateOfInvite != null){
            $query->bindParam(':DateOfInvite', $this->DateOfInvite, PDO::PARAM_STR);
        }
        if($this->idRespInviteId != null){
            $query->bindParam(':idRespInviteId', $this->idRespInviteId, PDO::PARAM_INT);
        }
        if($this->DateOfResponse != null){
            $query->bindParam(':DateOfResponse', $this->DateOfResponse, PDO::PARAM_STR);
        }
        if($this->ChatId != null){
            $query->bindParam(':ChatId', $this->ChatId, PDO::PARAM_INT);
        }
        if($this->DateVisualization != null){
            $query->bindParam(':DateVisualization', $this->DateVisualization, PDO::PARAM_STR);
        }



        $query->execute();
        return $query;

    }

    public function consulta($paramsExtra){

        

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblMatch ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->IdMatch != null){
            $query->bindParam(':IdMatch', $this->IdMatch, PDO::PARAM_INT);
        }
        if($this->IdClientSource != null){
            $query->bindParam(':IdClientSource', $this->IdClientSource, PDO::PARAM_INT);
        }
        if($this->IdClientMatched != null){
            $query->bindParam(':IdClientMatched', $this->IdClientMatched, PDO::PARAM_INT);
        }
        if($this->MatchStatus != null){
            $query->bindParam(':MatchStatus', $this->MatchStatus, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->DateOfSearchProfileMacth != null){
            $query->bindParam(':DateOfSearchProfileMacth', $this->DateOfSearchProfileMacth, PDO::PARAM_STR);
        }
        if($this->idRespSPid != null){
            $query->bindParam(':idRespSPid', $this->idRespSPid, PDO::PARAM_INT);
        }
        if($this->TextOfInvite != null){
            $query->bindParam(':TextOfInvite', $this->TextOfInvite, PDO::PARAM_STR);
        }
        if($this->DateOfInvite != null){
            $query->bindParam(':DateOfInvite', $this->DateOfInvite, PDO::PARAM_STR);
        }
        if($this->idRespInviteId != null){
            $query->bindParam(':idRespInviteId', $this->idRespInviteId, PDO::PARAM_INT);
        }
        if($this->DateOfResponse != null){
            $query->bindParam(':DateOfResponse', $this->DateOfResponse, PDO::PARAM_STR);
        }
        if($this->ChatId != null){
            $query->bindParam(':ChatId', $this->ChatId, PDO::PARAM_INT);
        }
        if($this->DateVisualization != null){
            $query->bindParam(':DateVisualization', $this->DateVisualization, PDO::PARAM_STR);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblMatch SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);

        if($this->IdMatch != null){
            $query->bindParam(':IdMatch', $this->IdMatch, PDO::PARAM_INT);
        }
        if($this->IdClientSource != null){
            $query->bindParam(':IdClientSource', $this->IdClientSource, PDO::PARAM_INT);
        }
        if($this->IdClientMatched != null){
            $query->bindParam(':IdClientMatched', $this->IdClientMatched, PDO::PARAM_INT);
        }
        if($this->MatchStatus != null){
            $query->bindParam(':MatchStatus', $this->MatchStatus, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->DateOfSearchProfileMacth != null){
            $query->bindParam(':DateOfSearchProfileMacth', $this->DateOfSearchProfileMacth, PDO::PARAM_STR);
        }
        if($this->idRespSPid != null){
            $query->bindParam(':idRespSPid', $this->idRespSPid, PDO::PARAM_INT);
        }
        if($this->TextOfInvite != null){
            $query->bindParam(':TextOfInvite', $this->TextOfInvite, PDO::PARAM_STR);
        }
        if($this->DateOfInvite != null){
            $query->bindParam(':DateOfInvite', $this->DateOfInvite, PDO::PARAM_STR);
        }
        if($this->idRespInviteId != null){
            $query->bindParam(':idRespInviteId', $this->idRespInviteId, PDO::PARAM_INT);
        }
        if($this->DateOfResponse != null){
            $query->bindParam(':DateOfResponse', $this->DateOfResponse, PDO::PARAM_STR);
        }
        if($this->ChatId != null){
            $query->bindParam(':ChatId', $this->ChatId, PDO::PARAM_INT);
        }
        if($this->DateVisualization != null){
            $query->bindParam(':DateVisualization', $this->DateVisualization, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;
    }

    public function deletar($paramsExtra){

        

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblMatch ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->IdMatch != null){
            $query->bindParam(':IdMatch', $this->IdMatch, PDO::PARAM_INT);
        }
        if($this->IdClientSource != null){
            $query->bindParam(':IdClientSource', $this->IdClientSource, PDO::PARAM_INT);
        }
        if($this->IdClientMatched != null){
            $query->bindParam(':IdClientMatched', $this->IdClientMatched, PDO::PARAM_INT);
        }
        if($this->MatchStatus != null){
            $query->bindParam(':MatchStatus', $this->MatchStatus, PDO::PARAM_INT);
        }
        if($this->SearchProfileNameId != null){
            $query->bindParam(':SearchProfileNameId', $this->SearchProfileNameId, PDO::PARAM_INT);
        }
        if($this->DateOfSearchProfileMacth != null){
            $query->bindParam(':DateOfSearchProfileMacth', $this->DateOfSearchProfileMacth, PDO::PARAM_STR);
        }
        if($this->idRespSPid != null){
            $query->bindParam(':idRespSPid', $this->idRespSPid, PDO::PARAM_INT);
        }
        if($this->TextOfInvite != null){
            $query->bindParam(':TextOfInvite', $this->TextOfInvite, PDO::PARAM_STR);
        }
        if($this->DateOfInvite != null){
            $query->bindParam(':DateOfInvite', $this->DateOfInvite, PDO::PARAM_STR);
        }
        if($this->idRespInviteId != null){
            $query->bindParam(':idRespInviteId', $this->idRespInviteId, PDO::PARAM_INT);
        }
        if($this->DateOfResponse != null){
            $query->bindParam(':DateOfResponse', $this->DateOfResponse, PDO::PARAM_STR);
        }
        if($this->ChatId != null){
            $query->bindParam(':ChatId', $this->ChatId, PDO::PARAM_INT);
        }
        if($this->DateVisualization != null){
            $query->bindParam(':DateVisualization', $this->DateVisualization, PDO::PARAM_STR);
        }


        $query->execute();
        return $query;

    }

}

?>