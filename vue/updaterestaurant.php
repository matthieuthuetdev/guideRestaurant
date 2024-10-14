<?php
if (isset($_POST["update"])) {
  $restoListe->updateResto($_POST);
  header("location: index.php");
}
if (isset($_POST["restoId"])) {
  $restoInfo = $restoListe->searchRestoId($_POST["restoId"]);
  $restaurantCourrant = $restoInfo[0];
  $nom = $restaurantCourrant["nom"];
  $adresse = $restaurantCourrant["adresse"];
  $prix = $restaurantCourrant["prix"];
  $commentaire = $restaurantCourrant["commentaire"];
  $note = $restaurantCourrant["note"];
  $visite = $restaurantCourrant["visite"];
  $id = $restaurantCourrant["id"];
}
?>

<h1> Modifier le restaurant :</h1>
<fieldset>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" >
    <div class="inputinfo">
      <label for="nom">Nom</label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" />
    </div>
    <div class="inputinfo">
      <label for="adresse">Adresse</label>
      <input type="text" name="adresse" id="adresse" value="<?php echo $adresse; ?>" />
    </div>
    <div class="inputinfo">
      <label for="prix">Prix</label>
      <input type="number" name="prix" id="prix" min="0" step="0.01" value="<?php echo $prix; ?>" />
    </div>
    <div class="inputinfo">
      <label for="commentaire">Commentaire</label>
      <textarea name="commentaire" id="commentaire"><?php echo $commentaire; ?></textarea>
    </div>
    <div class="inputinfo">
      <label for="note">note</label>
      <input type="number" name="note" id="note" min="0" max="10" step="0.1" value="<?php echo $note; ?>" />
    </div>
    <div>
      <label for="visite">Visite</label>
      <input type="date" name="visite" value="<?php echo $visite; ?>" />
    </div>
    <div class="inputinfo">
      <input type="submit" name="update" value="Modifier" />
    </div>
    
</fieldset>
</form>