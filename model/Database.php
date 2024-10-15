<?php
class Database
{
    private static ?PDO $BDD = null;
    private function __construct() {}
    private static function getConfig(): array {
        $config = (require "./model/config.php");
        return $config;
    }
    public static function getInstance(){
        if(is_null(self::$BDD)){
            $config = self::getConfig();
            self::$BDD = new PDO($config["dsn"],$config["user"],$config["password"]);
            
        }
        return self::$BDD;
    }





    // public function initDatabase(): ?PDO
    // {
    //     try {

    //         $this->BDD = new PDO("mysql:host=localhost;port=3306;dbname=guiderestaurant;charset=utf8", "root", '');
    //         return $this->BDD;
    //     } catch (PDOException $e) {

    //         return null;
    //     }
    // }
}
