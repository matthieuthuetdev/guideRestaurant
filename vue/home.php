<?php
if (isset($_POST["searchResto"]) && !empty($_POST["nom"])) {
    $restoListe->searchRestoNom($_POST["nom"]);
    echo "formulaire remplit";
} else {
    $restoListe->listerResto();
    echo "formulaire vide";
}
?>
<h1>Guide restaurant :</h1>
<div id="seartch">
<form action="index.php?p=home" method="post">
    <input type="search" name="nom" placeholder="Rechercher">
    <input type="submit" name="searchResto" value="Rechercher">
</form>
</div>
<a href="./index.php?p=addrestaurant" class="btn">Ajouter</a>
<?php echo $restoListe->displayHTMLTable(); ?>