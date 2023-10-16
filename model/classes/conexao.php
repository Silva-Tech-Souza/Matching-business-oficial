<?php 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','silvat81_business');

/*define('DB_HOST','br628.hostgator.com.br');
define('DB_USER','silvat81_silvatc');
define('DB_PASS','Lucas@2235');
define('DB_NAME','silvat81_business');*/
class Conexao{

    protected $dbh;

    public function abrirConexao() {

        // Establish database connection.
        try{
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }catch (PDOException $e){
            exit("Error: Acesso a base de dados negada");
        }
    }

    public function getConexao(){
        return $this->dbh;
    }
    
    

}
?>