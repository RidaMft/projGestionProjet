<html>
<br>
<form name="modificationRessource" action="index.php?uc=modificationRessource" method="POST">
  <table border="0" align="center" cellspacing="10" cellpadding="10">
    <tr align="center">
      <td>ID</td>
      <td><input type="text" name="id" value="<?php echo $uneRessource['id'] ;?>" readonly="readonly"></td>
    </tr>
    <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom" value="<?php echo $uneRessource['nom_ressource'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Prenom</td>
      <td><input type="text" name="prenom" value="<?php echo $uneRessource['prenom_ressource'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Poste</td>
      <td><input type="text" name="poste" value="<?php echo $uneRessource['poste'] ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
</html>

