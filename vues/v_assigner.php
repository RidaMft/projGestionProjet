<html>
    <body>
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=db_GestionProjet', 'root', 'root');
            $sqlRessource = $bdd->query('SELECT * FROM ressource');
            $sqlTache = $bdd->query('SELECT distinct * FROM tache');
        ?>
        <br>
        
        
        <table width='85%' border='1px' height='90' align='center'>
          <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Tâches</td>
            <td>Date de début</td>
            <td>Nombre de jour</td>
          </tr>

         <?php
         $_POST['ListeV']=$pdo->getRattach();
         foreach($_POST['ListeV'] as $val => $lesRattach)
         {
            echo"<tr>";
                echo "<td>$lesRattach[1]</td>";
                echo "<td>$lesRattach[2]</td>";
                echo "<td>$lesRattach[0]</td>";
                echo "<td>$lesRattach[3]</td>";
                echo "<td>$lesRattach[4]</td>";
            echo "</tr>";
        }
        ?>
        </table>
        
        <FORM id="Assigner" action="index.php?uc=assignation" method="post">
            Choisissez une tache : 
            <SELECT name="tache" size="1">
                <option value="">-- Choisissez -- </option> 
                <?php
                    while ($uneTache = $sqlTache->fetch())
                    {
                    //Liste déroulante 
                    //var_dump($sqlTache);
                        echo'<option value ="'.$uneTache['nom_tache'].'">'.$uneTache['nom_tache'].'</option>'; 
                    }
                ?>
            </SELECT>
            Choisissez une ressource : 
            <SELECT name="ressource" size="1">
                <option value="">-- Choisissez -- </option> 
                <?php
                    while ($uneRessource = $sqlRessource->fetch())
                    {
                    //Liste déroulante 
                    //var_dump($sqlTache);
                        echo'<option value ="'.$uneRessource['nom_ressource'].'">'.$uneRessource['nom_ressource'].'</option>'; 
                    }
                ?>
            </SELECT>
            <input type="submit" value="Ajouter">
        </FORM>
    </body>
</html>