<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');

if ( session_status() !== PHP_SESSION_ACTIVE )
{
  session_start();

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}else{

  if ($_SESSION["id"] < 0 || $_SESSION["id"] == "") {
    header('Location: ../view/login.php');
  }

}

if ($_POST["create"] != "") {
    $senha = $_POST["password"];
    $confmsenha = $_POST["password-confirm"];
    $email = $_POST["email"];

    $senhaCodificada = md5($senha);
    $senhaCodificada2 = md5($confmsenha);
    if ($senhaCodificada == $senhaCodificada2) {
        if(!isset($_POST["alteracao"])){
            $errosenha = "";

            //$resultschekflag = retornarDadostblUserClients($email,$dbh);//

            $tblUserClients = new UserClients($dbh);
            $tblUserClients->setemail($email);

            $resultschekflag = $tblUserClients->consulta("WHERE email = :email AND idFlagStatusCadastro != '1'");
            foreach ($resultschekflag as $rowchekflag) {


                //$resultslogin = atualizarSenha($email,$senhaCodificada,$dbh);//

                $tblUserClients = new UserClients($dbh);
                $tblUserClients->setemail($email);
                $tblUserClients->setPassword($senhaCodificada);


                $tblUserClients->atualizar("Password = :Password, idFlagStatusCadastro = '1' WHERE email = :email");



                $_SESSION['loginerro'] = "";
                $_SESSION["id"] = $rowchekflag->idClient;
                $_SESSION['emailC'] = $rowchekflag->email;
                $_SESSION['idC'] = $rowchekflag->idClient;
                $_SESSION['fName'] = $rowchekflag->FirstName;
                $_SESSION['lName'] = $rowchekflag->LastName;

                if($rowchekflag->CoreBusinessId != null){
                    header("Location: ../view/qualificacao.php");
                }else{
                    header("Location: ../view/home.php");
                }
            }
        }else if($_POST["alteracao"] == 1){

            $errosenha = "";

            //$resultschekflag = retornarDadostblUserClients($email,$dbh);//

            $tblUserClients = new UserClients($dbh);
            $tblUserClients->setemail($email);

            $resultschekflag = $tblUserClients->consulta("WHERE email = :email");

            
            foreach ($resultschekflag as $rowchekflag) {


                //$resultslogin = atualizarSenha($email,$senhaCodificada,$dbh);//

                $tblUserClients = new UserClients($dbh);
                $tblUserClients->setemail($email);
                $tblUserClients->setPassword($senhaCodificada);


                $tblUserClients->atualizar("Password = :Password WHERE email = :email");



                $_SESSION['loginerro'] = "";
                $_SESSION["id"] = $rowchekflag->idClient;
                $_SESSION['emailC'] = $rowchekflag->email;
                $_SESSION['idC'] = $rowchekflag->idClient;
                $_SESSION['fName'] = $rowchekflag->FirstName;
                $_SESSION['lName'] = $rowchekflag->LastName;

                
                header("Location: ../view/home.php");

            }
        }else if($_POST["alteracao"] == 2){

            $errosenha = "";

            //$resultschekflag = retornarDadostblUserClients($email,$dbh);//

            $tblUserClients = new UserClients($dbh);
            $tblUserClients->setemail($email);

            $resultschekflag = $tblUserClients->consulta("WHERE email = :email AND idFlagStatusCadastro = '1'");

            if($resultschekflag != null){
                foreach ($resultschekflag as $rowchekflag) {


                    //$resultslogin = atualizarSenha($email,$senhaCodificada,$dbh);//

                    $tblUserClients = new UserClients($dbh);
                    $tblUserClients->setemail($email);
                    $tblUserClients->setPassword($senhaCodificada);

                    $tblUserClients->atualizar("Password = :Password, idFlagStatusCadastro = '1' WHERE email = :email");

                    $_SESSION['loginerro'] = "";
                    $_SESSION["id"] = $rowchekflag->idClient;
                    $_SESSION['emailC'] = $rowchekflag->email;
                    $_SESSION['idC'] = $rowchekflag->idClient;
                    $_SESSION['fName'] = $rowchekflag->FirstName;
                    $_SESSION['lName'] = $rowchekflag->LastName;

                    
                    header("Location: ../view/home.php");

                }
            }else{

                $errosenha = "Nenhuma senha cadastrada no sistema, por favor, verifique seu email.";

                header("Location: ../view/createPass.php?erro=".$errosenha);

            }
        } else {
            $errosenha = "The passwords are different";

            header("Location: ../view/createPass.php?erro=".$errosenha);
        }

    $_POST["create"] = "";

    }
}else{

    header('Location: ../view/login.php');

}
?>