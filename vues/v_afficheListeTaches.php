<html>
     
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<br>
<br>
<li><a href=index.php?uc=ajouterTache>Ajouter une tache</a></li>
<br>
<table width='85%' border='1px' height='90' align='center'>
  <tr>
    <td>Numero</td>
    <td>Nom</td>
    <td>Date début</td>
    <td>Nombre de jour</td>
    <td>Commentaire</td>
    <td>Modifier</td>
    <td>Supprimer</td>
  </tr>

 <?php
 $_POST['ListeV']=$pdo->getLesTaches();
 foreach($_POST['ListeV'] as $val => $uneTache)
 {
    echo"<tr>";
        echo "<td>$uneTache[0]</td>";
        echo "<td>$uneTache[1]</td>";
        echo "<td>$uneTache[2]</td>";
        echo "<td>$uneTache[3]</td>";
        echo "<td>$uneTache[4]</td>";
        echo "<td> <a href=index.php?uc=modifierTache&cleP=$uneTache[0]>Modifier</a></td>";
        echo "<td> <a href=index.php?uc=suppressionTache&cleP=$uneTache[0]>Supprimer</a></td>";
    echo "</tr>";  
}
?>
 


</table> 

</body>

</html>

