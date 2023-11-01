<?php

include_once('../model/classes/conexao.php');
include_once('../model/classes/tblUserClients.php');
date_default_timezone_set('America/Sao_Paulo');

if(isset($_COOKIE["remember_me"])){
    if($_COOKIE["remember_me"]!=null){
        $renemberMeArray = json_decode($_COOKIE['remember_me'], true);
        $username = $renemberMeArray['email'];
        $passwordCripto = $renemberMeArray['senha'];
        $remember_me = true;

        $UserClients = new UserClients($dbh);

        $UserClients->setemail($username);
        $UserClients->setPassword($passwordCripto);

        $result = $UserClients->consulta("WHERE email = :email AND Password = :Password  LIMIT 1");

        if ($result != null) {

            if($remember_me){
                $cookie_name = "remember_me";
                $cookie_value = json_encode(array("email" => $username, "senha" => $passwordCripto));
                $cookie_expire = time() + (365 * 24 * 60 * 60); // Expira em 1 ano
                setcookie($cookie_name, $cookie_value, $cookie_expire,"/");
            }
            
            foreach ($result as $row) {
                $_SESSION['sessao'] = 1;
                $_SESSION['loginerro'] = "";
                $_SESSION["id"] = $row->idClient ;
                $_SESSION['emailC'] = $row->email;
                $_SESSION['idC'] = $row->idClient;
                $_SESSION['fName'] = $row->FirstName;
                $_SESSION['lName'] = $row->LastName; 

                include_once('../model/classes/tblEmpresas.php');
                $empresas = new Empresasview($dbh); 
                $empresas->setidClient($row->idClient);
                $empresas->setTaxid($row->taxid);

                $resultsEmpresas = $empresas->consulta('WHERE taxid = :taxid AND idClient = :idClient');

                if($resultsEmpresas != null){

                    $_SESSION['ADM'] = TRUE;

                }else{

                    $_SESSION['ADM'] = FALSE;

                }

                header("Location: ../view/home.php");
            }
        }else{
             setcookie("remember_me","",time() - 3600, "/");
            $_SESSION['loginerro']= "No profile found";
            header("Location: ../view/login.php");
            exit;
        }
    }else{

        $username = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['password']);
        $remember_me = $_POST['remember_me'];
        $username = trim($username);
        $passwordCripto = md5($password); 

        //$sql = "SELECT * from tblUserClients WHERE email = :email AND Password = :password  LIMIT 1";
        //$query = $dbh->prepare($sql);
        //$query->bindParam(':email', $username, PDO::PARAM_STR);
        //$query->bindParam(':password', $passwordCripto, PDO::PARAM_STR);
        //$query->execute();
        //$results = $query->fetchAll(PDO::FETCH_OBJ);

        $UserClients = new UserClients($dbh);

        $UserClients->setemail($username);
        $UserClients->setPassword($passwordCripto);

        $result = $UserClients->consulta("WHERE email = :email AND Password = :Password  LIMIT 1");

        if ($result != null) {

            if($remember_me){
                $cookie_name = "remember_me";
                $cookie_value = json_encode(array("email" => $username, "senha" => $passwordCripto));
                $cookie_expire = time() + (365 * 24 * 60 * 60); // Expira em 1 ano
                setcookie($cookie_name, $cookie_value, $cookie_expire,"/");
            }
            
            foreach ($result as $row) {
                $_SESSION['sessao'] = 1;
                $_SESSION['loginerro'] = "";
                $_SESSION["id"] = $row->idClient ;
                $_SESSION['emailC'] = $row->email;
                $_SESSION['idC'] = $row->idClient;
                $_SESSION['fName'] = $row->FirstName;
                $_SESSION['lName'] = $row->LastName; 
                header("Location: ../view/home.php");
            }
        }else{
             setcookie("remember_me","",time() - 3600, "/");
            $_SESSION['loginerro']= "No profile found";
            header("Location: ../view/login.php");
            exit;

        }
    }

}else{

    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['password']);
    $remember_me = $_POST['remember_me'];
    $username = trim($username);
    $passwordCripto = md5($password); 

    //$sql = "SELECT * from tblUserClients WHERE email = :email AND Password = :password  LIMIT 1";
    //$query = $dbh->prepare($sql);
    //$query->bindParam(':email', $username, PDO::PARAM_STR);
    //$query->bindParam(':password', $passwordCripto, PDO::PARAM_STR);
    //$query->execute();
    //$results = $query->fetchAll(PDO::FETCH_OBJ);

    $UserClients = new UserClients($dbh);

    $UserClients->setemail($username);
    $UserClients->setPassword($passwordCripto);

    $result = $UserClients->consulta("WHERE email = :email AND Password = :Password  LIMIT 1");

    if ($result != null) {

        if($remember_me){
            $cookie_name = "remember_me";
            $cookie_value = json_encode(array("email" => $username, "senha" => $passwordCripto));
            $cookie_expire = time() + (365 * 24 * 60 * 60); // Expira em 1 ano
            setcookie($cookie_name, $cookie_value, $cookie_expire,"/");
        }
        
        foreach ($result as $row) {
            $_SESSION['sessao'] = 1;
            $_SESSION['loginerro'] = "";
            $_SESSION["id"] = $row->idClient ;
            $_SESSION['emailC'] = $row->email;
            $_SESSION['idC'] = $row->idClient;
            $_SESSION['fName'] = $row->FirstName;
            $_SESSION['lName'] = $row->LastName; 
            header("Location: ../view/home.php");
        }
    }else{
         setcookie("remember_me","",time() - 3600, "/");
        $_SESSION['loginerro']= "No profile found";
        header("Location: ../view/login.php");
        exit;
    }

}
?>