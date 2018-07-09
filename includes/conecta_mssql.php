<?php
  require_once('includes/load.php');
?>
<?php
class conecta_mssql
{
   public static $conecta_mssql;
  
   public function __construct(){}
  
   public static function getConnection() {
  
       $pdoConfig  = DB_MSSQL_DRIVER . ":". "Server=" . DB_MSSQL_HOST . ";";
       $pdoConfig .= "Database=".DB_MSSQL_BIDASA.";";
       
       try {
           if(!isset($conecta_mssql)){
               $conecta_mssql =  new PDO($pdoConfig, DB_MSSQL_USER, DB_MSSQL_PASSWORD);
               $conecta_mssql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }
           return $conecta_mssql;
       } catch (PDOException $e) {
           $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
           $mensagem .= "\nErro: " . $e->getMessage();
           throw new Exception($mensagem);
       }
   }

}

?>
