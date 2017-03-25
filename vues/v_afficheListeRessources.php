<html>
     
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<br>
<br>
<li><a href=index.php?uc=ajouterRessource>Ajouter une ressource</a></li>
<br>
<table width='85%' border='1px' height='90' align='center'>
  <tr>
    <td>Numero</td>
    <td>Nom</td>
    <td>Prénom</td>
    <td>Poste</td>
    <td>Modifier</td>
    <td>Supprimer</td>
  </tr>

 <?php
 $_POST['ListeV']=$pdo->getLesRessources();
 foreach($_POST['ListeV'] as $val => $uneRessource)
 {
    echo"<tr>";
        echo "<td>$uneRessource[0]</td>";
        echo "<td>$uneRessource[1]</td>";
        echo "<td>$uneRessource[2]</td>";
        echo "<td>$uneRessource[3]</td>";
        echo "<td> <a href=index.php?uc=modifierRessource&cleP=$uneRessource[0]>Modifier</a></td>";
        echo "<td> <a href=index.php?uc=suppressionRessource&cleP=$uneRessource[0]>Supprimer</a></td>";
    echo "</tr>";  
}
?>
 


</table> 

</body>

</html>

