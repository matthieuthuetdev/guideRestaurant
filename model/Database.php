<?php
class Database
{
    public object $BDD;
    public function initDatabase(): ?PDO
    {
        try {

            $this->BDD = new PDO("mysql:host=localhost;port=3306;dbname=guiderestaurant;charset=utf8", "root", '');
            return $this->BDD;
        } catch (PDOException $e) {

            return null;
        }
    }
}
