<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            include("vues/v_entete.php") ;
            require_once("util/class.PDO.Ionis.inc.php");

            if(!isset($_REQUEST['uc']))
                 $uc = 'acceuil';
            else
                    $uc = $_REQUEST['uc'];
            //Utile lors de l'utilisation de la base de données
            $pdo = PdoIonis::getPdoIonis();	 	 

            switch($uc)
            {
                    case 'acceuil':
                    {
                        include("vues/v_bandeau.php");
                        include("vues/v_acceuil.php");
                        break;            
                    }

                    case 'voirTaches' :
                        include("vues/v_bandeau.php");
                        include("vues/v_afficheListeTaches.php");  
                        break;

                    case 'ajouterTache':
                        include("vues/v_bandeau.php") ;
                        include 'vues/v_ajoutTache.php';
                        break;

                    case 'insertionTache':
                        include("vues/v_bandeau.php") ;
                        if(!isset($_REQUEST['ajouterTache']))
                        {
                            $id=$_REQUEST['id'];
                            $nom=$_POST['nom'];
                            $date_debut=$_POST['date_debut'];
                            $nb_jour=$_POST['nb_jour'];
                            $commentaire=$_POST['commentaire'];
                            $res=$pdo->ajoutTache($id,$nom,$date_debut,$nb_jour,$commentaire);
                            include("vues/v_afficheListeTaches.php");                        
                        }
                        break;
                        
                    case 'modifierTache':
                        include("vues/v_bandeau.php") ;
                        $id=$_GET['cleP'];
                        $uneTache=$pdo->afficheTache($id); 
                        include 'vues/v_modifTache.php';
                        break;
                        
                    case 'modificationTache':
                        include("vues/v_bandeau.php") ;
                        $id=$_REQUEST['id'];
                        $date_debut=$_POST['date_debut'];
                        $nom=$_POST['nom_tache'];
                        $nb_jour=$_POST['nb_jour'];
                        $commentaire=$_POST['commentaire'];

                        $res=$pdo->modifTache($id, $nom, $date_debut, $nb_jour,$commentaire);
                        if($res)
                        {
                            echo 'Modification pris en compte'; 
                            //var_dump($res);
                            include("vues/v_voirListeTaches.php");  
                        }
                        else
                        {
                            echo 'Erreur ';
                        }
                        break;

                    case 'suppressionTache':
                        include("vues/v_bandeau.php") ;
                        $id=$_REQUEST['cleP'];
                        $res=$pdo->suppTache($id);
                        if($res)
                        {
                            echo 'Suppression effectué';
                            include("vues/v_voirListeTaches.php");  
                        }
                        else 
                        {
                            echo 'Erreur';
                        }
                        break;
                        
                    case 'voirRessources' :
                        include("vues/v_bandeau.php");
                        include("vues/v_afficheListeRessources.php");  
                        break;

                    case 'ajouterRessource':
                        include("vues/v_bandeau.php") ;
                        include 'vues/v_ajoutRessource.php';
                        break;

                    case 'insertionRessource':
                        include("vues/v_bandeau.php") ;
                        if(!isset($_REQUEST['ajouterRessource']))
                        {
                            $id=$_REQUEST['id'];
                            $nom=$_POST['nom'];
                            $prenom=$_POST['prenom'];
                            $poste=$_POST['poste'];
                            $res=$pdo->ajoutRessource($id,$nom,$prenom,$poste);
                            include("vues/v_afficheListeRessources.php");                        
                        }
                        break;
                        
                    case 'modifierRessource':
                        include("vues/v_bandeau.php") ;
                        $id=$_GET['cleP'];
                        $uneRessource=$pdo->afficheRessource($id); 
                        include 'vues/v_modifRessource.php';
                        break;

                    case 'modificationRessource':
                        include("vues/v_bandeau.php") ;
                        $id=$_REQUEST['id'];
                        $nom=$_POST['nom'];
                        $prenom=$_POST['prenom'];
                        $poste=$_POST['poste'];

                        $res=$pdo->modifRessource($id, $nom, $prenom, $poste);
                        if($res)
                        {
                            echo 'Modification pris en compte'; 
                            //var_dump($res);
                            include("vues/v_voirListeRessources.php");  
                        }
                        else
                        {
                            echo 'Erreur ';
                        }
                        break;

                    case 'suppressionRessource':
                        include("vues/v_bandeau.php") ;
                        $id=$_REQUEST['cleP'];
                        $res=$pdo->suppRessource($id);
                        if($res)
                        {
                            echo 'Suppression effectué';
                            include("vues/v_afficheListeRessources.php");  
                        }
                        else 
                        {
                            echo 'Erreur';
                        }
                        break;
                        
                    case'assigner':
                        include("vues/v_bandeau.php");
                        include 'vues/v_assigner.php';
                        break;
                    
                    case 'assignation':
                        $ressource=$_POST['ressource'];
                        $tache=$_POST['tache'];
                        $res=$pdo->assignerTacheRessource($ressource,$tache);
                        if($res)
                        {
                            include("vues/v_bandeau.php");
                            echo("<br>L'affection a été correctement effectuée");
                            include("vues/v_assigner.php");  
                        }
                        else 
                        {
                            echo "Erreur d'affection";
                        }
                        break;               
            }
            include("vues/v_pied.php");
            ?>
    </body>
</html>
