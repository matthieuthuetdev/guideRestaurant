<?php
if (isset($_POST["add"])) {
  $restoListe->addResto($_POST);
}
?>

<h1>ajouter un restaurant :</h1>
<form action="index.php" method="post">
  <div>
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" />
  </div>
  <div>
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" />
  </div>
  <div>
    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix" />
  </div>
  <div>
    <label for="commentaire">Commentaire</label>
    <textarea name="commentaire" id="commentaire"></textarea>
  </div>
  <div>
    <label for="note">note</label>
    <input
      type="number"
      name="note"
      id="note" min="0" max="10" step="0.1" />
  </div>
  <div>
    <label for="visite">Visite</label>
    <input type="date" name="visite" />
  </div>
  <div>
    <input type="submit" name="add" value="Ajouter" />
  </div>
</form>