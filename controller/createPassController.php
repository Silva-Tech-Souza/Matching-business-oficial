<?php
include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');

if ($_POST["create"] != "") {
    $senha = $_POST["password"];
    $confmsenha = $_POST["password-confirm"];
    $email = $_POST["email"];

    $senhaCodificada = md5($senha);
    $senhaCodificada2 = md5($confmsenha);
    if ($senhaCodificada == $senhaCodificada2) {
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


            header("Location: ../view/qualificacao.php");
        }
    } else {
        $errosenha = "The passwords are different";
    }

    $_POST["create"] = "";
}
