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
        $pdoStatement = $this->connection->query("SELECT * FROM restaurants", PDO::FETCH_ASSOC);
        $montab = $pdoStatement->fetchAll();
        $this->result = $montab;
        return $montab;
    }
    public function displayHTMLTable()
    {
        $HTMLTable = "<table> <thead><th>Nom</th><th>Adresse</th><th>prix</th><th>Commentaire</th><th>Note</th><th>Visite</th><th>Modifier</th><th>Supprimer</th></thead><tbody>";

        for ($i = 0; $i < count($this->result); $i++) {
            $restaurantCourrant = $this->result[$i];
            $nom = $restaurantCourrant["nom"];
            $adresse = $restaurantCourrant["adresse"];
            $prix = $restaurantCourrant["prix"];
            $commentaire = $restaurantCourrant["commentaire"];
            $note = $restaurantCourrant["note"];
            $visite = $restaurantCourrant["visite"];
            $id = $restaurantCourrant["id"];

            $HTMLTable .= "<tr><td>$nom</td><td>$adresse</td><td>$prix</td><td>$commentaire</td><td>$note</td><td>$visite</td><td><form action='index.php?p=updaterestaurant' method='post'> <input type='hidden' name='restoId' id='restoId' value='$id'><input type='submit' name='goUpdate' value='Modifier'></form></td><td><a href='index.php?p=deleteRestaurant&id=$id'>Supprimer</a></td></tr>";
        }
        $HTMLTable .= "</tbody></table";
        return $HTMLTable;
    }
    public function searchRestoId($_id)
    {
        $pdoStatement = $this->connection->prepare("SELECT * FROM restaurants WHERE id=:id");
        $pdoStatement->bindParam(":id", $_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $montab = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $this->result = $montab;
        return $montab;
    }
    public function searchRestoNom($_nom)
    {
        $pdoStatement = $this->connection->prepare("SELECT * FROM restaurants WHERE nom=:nom");
        $pdoStatement->bindParam(":nom", $_nom, PDO::PARAM_STR);
        $pdoStatement->execute();
        $montab = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $this->result = $montab;
        return $montab;
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
    public function deleteResto($_id)
    {
        $request = "DELETE FROM restaurants WHERE id = :id";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":id", $_id, PDO::PARAM_INT);
        $rq->execute();
    }
    public function updateResto($input)
    {
        $request = "UPDATE restaurants SET nom = :nom, adresse = :adresse, prix = :prix, commentaire = :commentaire, note = :note, visite = :visite WHERE id = :id";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":nom", $input["nom"], PDO::PARAM_STR);
        $rq->bindParam(":adresse", $input["adresse"], PDO::PARAM_STR);
        $rq->bindParam(":prix", $input["prix"], PDO::PARAM_INT);
        $rq->bindParam(":commentaire", $input["commentaire"], PDO::PARAM_STR);
        $rq->bindParam(":note", $input["note"], PDO::PARAM_INT);
        $rq->bindParam(":visite", $input["visite"], PDO::PARAM_STR);
        $rq->bindParam(":id", $input["id"], PDO::PARAM_INT);
        $rq->execute();
    }
}
