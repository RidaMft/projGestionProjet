<html>
<br>
<form name="ajouterTache" action="index.php?uc=insertionTache" method="POST">
  <table border="0" align="center" cellspacing="5" cellpadding="5">
    <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom" value=""></td>
    </tr>
    <tr align="center">
      <td>Date</td>
      <td><input type="date" name="date_debut" value=""></td>
    </tr>
    <tr align="center">
      <td>Nombre de jour</td>
      <td><input type="text" name="nb_jour" value=""></td>
    </tr>
    <tr align="center">
      <td>Commentaire</td>
      <td><input type="text" name="commentaire" value=""></td>
    </tr>    
    <tr align="center">
      <td colspan="2"><input type="submit" value="Ajouter"></td>
    </tr>
  </table>
</form>
</html>