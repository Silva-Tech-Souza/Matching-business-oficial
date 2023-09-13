<?php

class UserClients{
    
    protected $idClient = null;
    protected $FirstName = null;
    protected $MiddleName = null;
    protected $LastName = null;
    protected $JobTitle = null;
    protected $idCountry = null;
    protected $CompanyName = null;
    protected $Password = null;
    protected $created_at = null;
    protected $CoreBusinessId = null;
    protected $SatBusinessId = null;
    protected $IdOperation = null;
    protected $email = null;
    protected $idFlagStatusCadastro = null;
    protected $idPerfilUsuario = null;
    protected $PersonalUserPicturePath = null;
    protected $LogoPicturePath = null;
    protected $WhatsAppNumber = null;
    protected $descricao = null;
    protected $taxid = null;
    protected $AnoFundacao = null;
    protected $NumEmpregados = null;
    protected $NumVendedores = null;
    protected $NivelOperacao = null;
    protected $DetalheRegiao = null;
    protected $Fob_3Y = null;
    protected $Vol_3Y = null;
    protected $Fob_2Y = null;
    protected $Vol_2Y = null;
    protected $Fob_1Y = null;
    protected $Vol_1Y = null;
    protected $dbh = null;

    function __construct()
    {
        
        include_once('conexao.php');
        $conexao = new Conexao();
        $conexao->abrirConexao();
        $this->dbh = $conexao->getConexao();

    }


    public function setidClient($param){$this->idClient = $param;}

    public function getidClient(){return $this->idClient;}

    public function setFirstName($param){$this->FirstName = $param;}
    
    public function getFirstName(){return $this->FirstName;}

    public function setMiddleName($param){$this->MiddleName = $param;}
    
    public function getMiddleName(){return $this->MiddleName;}

    public function setLastName($param){$this->LastName = $param;}
    
    public function getLastName(){return $this->LastName;}

    public function setJobTitle($param){$this->JobTitle = $param;}
    
    public function getJobTitle(){return $this->JobTitle;}

    public function setidCountry($param){$this->idCountry = $param;}
    
    public function getidCountry(){return $this->idCountry;}

    public function setCompanyName($param){$this->CompanyName = $param;}
    
    public function getCompanyName(){return $this->CompanyName;}

    public function setPassword($param){$this->Password = $param;}
    
    public function getPassword(){return $this->Password;}

    public function setcreated_at($param){$this->created_at = $param;}

    public function getcreated_at(){return $this->created_at;}

    public function setCoreBusinessId($param){$this->CoreBusinessId = $param;}
    
    public function getCoreBusinessId(){return $this->CoreBusinessId;}

    public function setSatBusinessId($param){$this->SatBusinessId = $param;}
    
    public function getSatBusinessId(){return $this->SatBusinessId;}

    public function setIdOperation($param){$this->IdOperation = $param;}
    
    public function getIdOperation(){return $this->IdOperation;}

    public function setemail($param){$this->email = $param;}
    
    public function getemail(){return $this->email;}

    public function setidFlagStatusCadastro($param){$this->idFlagStatusCadastro = $param;}
    
    public function getidFlagStatusCadastro(){return $this->idFlagStatusCadastro;}

    public function setidPerfilUsuario($param){$this->idPerfilUsuario = $param;}
    
    public function getidPerfilUsuario(){return $this->idPerfilUsuario;}

    public function setPersonalUserPicturePath($param){$this->PersonalUserPicturePath = $param;}
    
    public function getPersonalUserPicturePath(){return $this->PersonalUserPicturePath;}

    public function setLogoPicturePath($param){$this->LogoPicturePath = $param;}

    public function getLogoPicturePath(){return $this->LogoPicturePath;}

    public function setWhatsAppNumber($param){$this->WhatsAppNumber = $param;}
    
    public function getWhatsAppNumber(){return $this->WhatsAppNumber;}

    public function setdescricao($param){$this->descricao = $param;}
    
    public function getdescricao(){return $this->descricao;}

    public function settaxid($param){$this->taxid = $param;}
    
    public function gettaxid(){return $this->taxid;}

    public function setAnoFundacao($param){$this->AnoFundacao = $param;}
    
    public function getAnoFundacao(){return $this->AnoFundacao;}

    public function setNumEmpregados($param){$this->NumEmpregados = $param;}
    
    public function getNumEmpregados(){return $this->NumEmpregados;}

    public function setNumVendedores($param){$this->NumVendedores = $param;}
    
    public function getNumVendedores(){return $this->NumVendedores;}

    public function setNivelOperacao($param){$this->NivelOperacao = $param;}
    
    public function getNivelOperacao(){return $this->NivelOperacao;}

    public function setDetalheRegiao($param){$this->DetalheRegiao = $param;}
    
    public function getDetalheRegiao(){return $this->DetalheRegiao;}

    public function setFob_3Y($param){$this->Fob_3Y = $param;}
    
    public function getFob_3Y(){return $this->Fob_3Y;}

    public function setVol_3Y($param){$this->Vol_3Y = $param;}
    
    public function getVol_3Y(){return $this->Vol_3Y;}

    public function setFob_2Y($param){$this->Fob_2Y = $param;}
    
    public function getFob_2Y(){return $this->Fob_2Y;}

    public function setVol_2Y($param){$this->Vol_2Y = $param;}
    
    public function getVol_2Y(){return $this->Vol_2Y;}

    public function setFob_1Y($param){$this->Fob_1Y = $param;}
    
    public function getFob_1Y(){return $this->Fob_1Y;}

    public function setVol_1Y($param){$this->Vol_1Y = $param;}
    
    public function getVol_1Y(){return $this->Vol_1Y;}


    public function cadastrar(){

        $sql = "INSERT INTO tblUserClients ( `FirstName`,  `LastName`, `JobTitle`, `idCountry`, `CompanyName`,  `email`, IdOperation, idFlagStatusCadastro, idPerfilUsuario, `WhatsAppNumber`, `taxid`, `AnoFundacao`, `NumEmpregados`, `NumVendedores`, `NivelOperacao`, `DetalheRegiao`, `Fob_3Y`, `Vol_3Y`, `Fob_2Y`, `Vol_2Y`, `Fob_1Y`, `Vol_1Y`) VALUES ( :FirstName,  :LastName, :JobTitle, :idCountry, :CompanyName, :email, '1', '2', '1', :WhatsAppNumber, :taxid, :AnoFundacao, :NumEmpregados, :NumVendedores, :NivelOperacao, :DetalheRegiao, :Fob_3Y, :Vol_3Y, :Fob_2Y, :Vol_2Y, :Fob_1Y, :Vol_1Y)";
        $query = $this->dbh->prepare($sql);
        
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->FirstName != null){
            $query->bindParam(':FirstName', $this->FirstName, PDO::PARAM_STR);
        }
        if($this->MiddleName != null){
            $query->bindParam(':MiddleName', $this->MiddleName, PDO::PARAM_STR);
        }
        if($this->LastName != null){
            $query->bindParam(':LastName', $this->LastName, PDO::PARAM_STR);
        }
        if($this->JobTitle != null){
            $query->bindParam(':JobTitle', $this->JobTitle, PDO::PARAM_STR);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->CompanyName != null){
            $query->bindParam(':CompanyName', $this->CompanyName, PDO::PARAM_STR);
        }
        if($this->Password != null){
            $query->bindParam(':Password', $this->Password, PDO::PARAM_STR);
        }
       
        if($this->CoreBusinessId != null){
            $query->bindParam(':CoreBusinessId', $this->CoreBusinessId, PDO::PARAM_INT);
        }
        if($this->SatBusinessId != null){
            $query->bindParam(':SatBusinessId', $this->SatBusinessId, PDO::PARAM_INT);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }
        if($this->email != null){
            $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        }
        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->PersonalUserPicturePath != null){
            $query->bindParam(':PersonalUserPicturePath', $this->PersonalUserPicturePath, PDO::PARAM_STR);
        }
        if($this->LogoPicturePath != null){
            $query->bindParam(':LogoPicturePath', $this->LogoPicturePath, PDO::PARAM_STR);
        }
        if($this->WhatsAppNumber != null){
            $query->bindParam(':WhatsAppNumber', $this->WhatsAppNumber, PDO::PARAM_STR);
        }
        if($this->descricao != null){
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }


        $query->execute();
        return $this->dbh->lastInsertId();

    }

    public function consulta($paramsExtra){

        //$sql = "SELECT * from tblUserClients WHERE idClient = :idClient ";
        $sql = "SELECT * from tblUserClients ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->FirstName != null){
            $query->bindParam(':FirstName', $this->FirstName, PDO::PARAM_STR);
        }
        if($this->MiddleName != null){
            $query->bindParam(':MiddleName', $this->MiddleName, PDO::PARAM_STR);
        }
        if($this->LastName != null){
            $query->bindParam(':LastName', $this->LastName, PDO::PARAM_STR);
        }
        if($this->JobTitle != null){
            $query->bindParam(':JobTitle', $this->JobTitle, PDO::PARAM_STR);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->CompanyName != null){
            $query->bindParam(':CompanyName', $this->CompanyName, PDO::PARAM_STR);
        }
        if($this->Password != null){
            $query->bindParam(':Password', $this->Password, PDO::PARAM_STR);
        }
        if($this->created_at != null){
            $query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        }
        if($this->CoreBusinessId != null){
            $query->bindParam(':CoreBusinessId', $this->CoreBusinessId, PDO::PARAM_INT);
        }
        if($this->SatBusinessId != null){
            $query->bindParam(':SatBusinessId', $this->SatBusinessId, PDO::PARAM_INT);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }
        if($this->email != null){
            $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        }
        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->PersonalUserPicturePath != null){
            $query->bindParam(':PersonalUserPicturePath', $this->PersonalUserPicturePath, PDO::PARAM_STR);
        }
        if($this->LogoPicturePath != null){
            $query->bindParam(':LogoPicturePath', $this->LogoPicturePath, PDO::PARAM_STR);
        }
        if($this->WhatsAppNumber != null){
            $query->bindParam(':WhatsAppNumber', $this->WhatsAppNumber, PDO::PARAM_STR);
        }
        if($this->descricao != null){
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {return $results;} else {return null;}

    }

    public function atualizar($paramsExtra){

        //UPDATE tblAction SET IdAction = ':idAction', Description = ':description' WHERE CustomerID = 1;
        $sql = "UPDATE tblUserClients SET ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->FirstName != null){
            $query->bindParam(':FirstName', $this->FirstName, PDO::PARAM_STR);
        }
        if($this->MiddleName != null){
            $query->bindParam(':MiddleName', $this->MiddleName, PDO::PARAM_STR);
        }
        if($this->LastName != null){
            $query->bindParam(':LastName', $this->LastName, PDO::PARAM_STR);
        }
        if($this->JobTitle != null){
            $query->bindParam(':JobTitle', $this->JobTitle, PDO::PARAM_STR);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->CompanyName != null){
            $query->bindParam(':CompanyName', $this->CompanyName, PDO::PARAM_STR);
        }
        if($this->Password != null){
            $query->bindParam(':Password', $this->Password, PDO::PARAM_STR);
        }
        if($this->created_at != null){
            $query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        }
        if($this->CoreBusinessId != null){
            $query->bindParam(':CoreBusinessId', $this->CoreBusinessId, PDO::PARAM_INT);
        }
        if($this->SatBusinessId != null){
            $query->bindParam(':SatBusinessId', $this->SatBusinessId, PDO::PARAM_INT);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }
        if($this->email != null){
            $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        }
        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->PersonalUserPicturePath != null){
            $query->bindParam(':PersonalUserPicturePath', $this->PersonalUserPicturePath, PDO::PARAM_STR);
        }
        if($this->LogoPicturePath != null){
            $query->bindParam(':LogoPicturePath', $this->LogoPicturePath, PDO::PARAM_STR);
        }
        if($this->WhatsAppNumber != null){
            $query->bindParam(':WhatsAppNumber', $this->WhatsAppNumber, PDO::PARAM_STR);
        }
        if($this->descricao != null){
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

    public function deletar($paramsExtra){

        //DELETE FROM tblAction WHERE IdAction=':idAction';
        $sql = "DELETE FROM tblUserClients ".$paramsExtra;
        $query = $this->dbh->prepare($sql);
        
        if($this->idClient != null){
            $query->bindParam(':idClient', $this->idClient, PDO::PARAM_INT);
        }
        if($this->FirstName != null){
            $query->bindParam(':FirstName', $this->FirstName, PDO::PARAM_STR);
        }
        if($this->MiddleName != null){
            $query->bindParam(':MiddleName', $this->MiddleName, PDO::PARAM_STR);
        }
        if($this->LastName != null){
            $query->bindParam(':LastName', $this->LastName, PDO::PARAM_STR);
        }
        if($this->JobTitle != null){
            $query->bindParam(':JobTitle', $this->JobTitle, PDO::PARAM_STR);
        }
        if($this->idCountry != null){
            $query->bindParam(':idCountry', $this->idCountry, PDO::PARAM_INT);
        }
        if($this->CompanyName != null){
            $query->bindParam(':CompanyName', $this->CompanyName, PDO::PARAM_STR);
        }
        if($this->Password != null){
            $query->bindParam(':Password', $this->Password, PDO::PARAM_STR);
        }
        if($this->created_at != null){
            $query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        }
        if($this->CoreBusinessId != null){
            $query->bindParam(':CoreBusinessId', $this->CoreBusinessId, PDO::PARAM_INT);
        }
        if($this->SatBusinessId != null){
            $query->bindParam(':SatBusinessId', $this->SatBusinessId, PDO::PARAM_INT);
        }
        if($this->IdOperation != null){
            $query->bindParam(':IdOperation', $this->IdOperation, PDO::PARAM_INT);
        }
        if($this->email != null){
            $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        }
        if($this->idFlagStatusCadastro != null){
            $query->bindParam(':idFlagStatusCadastro', $this->idFlagStatusCadastro, PDO::PARAM_INT);
        }
        if($this->idPerfilUsuario != null){
            $query->bindParam(':idPerfilUsuario', $this->idPerfilUsuario, PDO::PARAM_INT);
        }
        if($this->PersonalUserPicturePath != null){
            $query->bindParam(':PersonalUserPicturePath', $this->PersonalUserPicturePath, PDO::PARAM_STR);
        }
        if($this->LogoPicturePath != null){
            $query->bindParam(':LogoPicturePath', $this->LogoPicturePath, PDO::PARAM_STR);
        }
        if($this->WhatsAppNumber != null){
            $query->bindParam(':WhatsAppNumber', $this->WhatsAppNumber, PDO::PARAM_STR);
        }
        if($this->descricao != null){
            $query->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        }
        if($this->taxid != null){
            $query->bindParam(':taxid', $this->taxid, PDO::PARAM_STR);
        }
        if($this->AnoFundacao != null){
            $query->bindParam(':AnoFundacao', $this->AnoFundacao, PDO::PARAM_STR);
        }
        if($this->NumEmpregados != null){
            $query->bindParam(':NumEmpregados', $this->NumEmpregados, PDO::PARAM_STR);
        }
        if($this->NumVendedores != null){
            $query->bindParam(':NumVendedores', $this->NumVendedores, PDO::PARAM_STR);
        }
        if($this->NivelOperacao != null){
            $query->bindParam(':NivelOperacao', $this->NivelOperacao, PDO::PARAM_STR);
        }
        if($this->DetalheRegiao != null){
            $query->bindParam(':DetalheRegiao', $this->DetalheRegiao, PDO::PARAM_STR);
        }
        if($this->Fob_3Y != null){
            $query->bindParam(':Fob_3Y', $this->Fob_3Y, PDO::PARAM_INT);
        }
        if($this->Vol_3Y != null){
            $query->bindParam(':Vol_3Y', $this->Vol_3Y, PDO::PARAM_INT);
        }
        if($this->Fob_2Y != null){
            $query->bindParam(':Fob_2Y', $this->Fob_2Y, PDO::PARAM_INT);
        }
        if($this->Vol_2Y != null){
            $query->bindParam(':Vol_2Y', $this->Vol_2Y, PDO::PARAM_INT);
        }
        if($this->Fob_1Y != null){
            $query->bindParam(':Fob_1Y', $this->Fob_1Y, PDO::PARAM_INT);
        }
        if($this->Vol_1Y != null){
            $query->bindParam(':Vol_1Y', $this->Vol_1Y, PDO::PARAM_INT);
        }

        $query->execute();
        return $query;

    }

}

?>