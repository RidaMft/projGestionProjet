<html>
<br>
<form name="modificationTache" action="index.php?uc=modificationTache" method="POST">
  <table border="0" align="center" cellspacing="10" cellpadding="10">
    <tr align="center">
      <td>ID</td>
      <td><input type="text" name="id" value="<?php echo $uneTache['id'] ;?>" readonly="readonly"></td>
    </tr>
    <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom_tache" value="<?php echo $uneTache['nom_tache'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Date de début</td>
      <td><input type="date" name="date_debut" value="<?php echo $uneTache['date_debut'] ;?>"></td>
    </tr>
        <tr align="center">
      <td>Nombre de jour</td>
      <td><input type="text" name="nb_jour" value="<?php echo $uneTache['nb_jour'] ;?>"></td>
    </tr>
        <tr align="center">
      <td>Commentaire</td>
      <td><input type="text" name="commentaire" value="<?php echo $uneTache['commentaire'] ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
</html>

