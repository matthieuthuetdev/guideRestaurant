<?php
class Liste_resto
{
    private PDO $connection;
    private array $colName;
    private array $result;
    public function __construct(PDO $_connection)
    {
        $this->connection = $_connection;
    }
    public function listerResto(): array
    {
        $pdoStatement = $this->connection->query("SELECT * FROM restaurants", PDO::FETCH_OBJ);
        $montab = $pdoStatement->fetchAll();
        $this->result = $montab;
        return $montab;
    }
    public function displayHTMLTable()
    {
        $HTMLTable = "<table> <thead><th>Nom</th><th>Adresse</th><th>prix</th><th>Commentaire</th><th>Note</th><th>Visite</th><th>Supprimer</th></thead><tbody>";
        for ($i = 0; $i < count($this->result); $i++) {
            $restaurantCourrant = $this->result[$i];
            $HTMLTable .= "<tr><td>$restaurantCourrant->nom</td><td>$restaurantCourrant->adresse</td><td>$restaurantCourrant->prix</td><td>$restaurantCourrant->commentaire</td><td>$restaurantCourrant->note</td><td>$restaurantCourrant->visite</td><td><a href='index.php?p=deleteRestaurant&id=$restaurantCourrant->id'>Supprimer</a></td></tr>";
        }
        return $HTMLTable;
    }

    public function addResto($input)
    {
        $rq = $this->connection->prepare('INSERT INTO restaurants (nom, adresse, prix, commentaire, note, visite) VALUES (:nom, :adresse, :prix,:commentaire, :note, :visite)');
        $rq->bindParam(":nom", $input["nom"], PDO::PARAM_STR);
        $rq->bindParam(":adresse", $input["adresse"], PDO::PARAM_STR);
        $rq->bindParam(":prix", $input["prix"], PDO::PARAM_INT);
        $rq->bindParam(":commentaire", $input["commentaire"], PDO::PARAM_STR);
        $rq->bindParam(":note", $input["note"], PDO::PARAM_INT);
        $rq->bindParam(":visite", $input["visite"], PDO::PARAM_STR);
        $rq->execute();
    }
    public function deleteResto($_id){
        $request = "DELETE FROM restaurants WHERE id = :id";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":id", $_id,PDO::PARAM_INT);
        $rq->execute();
    }
}
