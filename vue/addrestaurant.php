<?php
if (isset($_POST["add"])) {
  $restoListe->addResto($_POST);
  header("location: index.php");
}
?>

<h1>ajouter un restaurant :</h1>
<fieldset>
<form action="" method="post">
  <div class="inputinfo">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" />
  </div>
  <div class="inputinfo">
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" />
  </div>
  <div class="inputinfo">
    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix" min="0" step="0.01" />
  </div>
  <div class="inputinfo">
    <label for="commentaire">Commentaire</label>
    <textarea name="commentaire" id="commentaire"></textarea>
  </div class="inputinfo">
  <div class="inputinfo">
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
  <div class="inputinfo">
    <input type="submit" name="add" value="Ajouter" />
  </div>
  </fieldset>
</form>