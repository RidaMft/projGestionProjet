<?php
class PdoIonis
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=db_GestionProjet';   		
      	private static $user='root' ;    		
      	private static $mdp='root' ;	
        private static $monPdo;
        private static $monPdoIonis = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoIonis::$monPdo = new PDO(PdoIonis::$serveur.';'.PdoIonis::$bdd, PdoIonis::$user, PdoIonis::$mdp); 
                PdoIonis::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoIonis::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoIonis = PdoIonis::getPdoIonis();
 * @return l'unique objet de la classe PdoIonis
 */
	public  static function getPdoIonis()
	{
		if(PdoIonis::$monPdoIonis == null)
		{
			PdoIonis::$monPdoIonis=new PdoIonis();
		}
		return PdoIonis::$monPdoIonis;  
	}
        
	public function getLesTaches()
	{
		$req = "select * from tache";
                $res=  PdoIonis::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}     

	public function getLesTachesDuTableau($lesid)
	{
		$nbTaches = count($lesid);
		$lesTaches=array();
		if($nbTaches != 0)
		{
			foreach($lesid as $id)
			{
				$req = "select * from tache where id = '$id'";
				$res=  PdoIonis::$monPdo->query($req);
				$uneTache = $res->fetch();
				$lesTaches[] = $uneTache;
			}
		}
		return $lesTaches;
	}
        
	
        public function ajoutTache($id,$nom, $date_debut, $nb_jour,$commentaire)
        {
              $sql = "INSERT  INTO tache (nom_tache, date_debut, nb_jour, commentaire)
                        VALUES ('$nom', '$date_debut', '$nb_jour', '$commentaire')";

              $res = PdoIonis::$monPdo->query($sql);

              //affichage des résultats, pour savoir si l'insertion a marchée:
              if($res)
              {
                  echo'<html><body><br>';
                  echo("L'insertion a été correctement effectuée") ;
                  echo'<br></body></html>';
              }
              else
              {
                echo("L'insertion a  échoué") ;
              }
              return $res;
        }
        public function modifTache($id,$nom, $date_debut, $nb_jour,$commentaire)
        {
            $req = "UPDATE tache SET 
                    nom_tache = '$nom',
                    date_debut = '$date_debut',
                    nb_jour = '$nb_jour',
                    commentaire ='$commentaire'
                    WHERE id = '$id'" ;
            $res=PdoIonis::$monPdo->query($req);
            return $res;
            echo $res;
        }
        public function afficheTache($id)
        {
            $req = "select * from tache where id = '$id'";
            $res=  PdoIonis::$monPdo->query($req);
            $unTache = $res->fetch();
            return $unTache;          
        }
        
        public function suppTache($id)
        {
            $req = "delete from tache where id ='$id'";
            $res=  PdoIonis::$monPdo->query($req);
            return $res;            
        }
        
        public function getLesRessources()
	{
		$req = "select * from ressource";
                $res=  PdoIonis::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}  
        
        
	public function getLesRessourcesDuTableau($lesid)
	{
		$nbRessources = count($lesid);
		$lesRessources=array();
		if($nbTaches != 0)
		{
			foreach($lesid as $id)
			{
				$req = "select * from ressource where id = '$id'";
				$res=  PdoIonis::$monPdo->query($req);
				$uneRessource = $res->fetch();
				$lesRessources[] = $uneRessource;
			}
		}
		return $lesRessources;
	}
        
       
        public function ajoutRessource($id,$nom, $prenom, $poste)
        {
              $sql = "INSERT  INTO ressource (nom_ressource, prenom_ressource, poste)
                        VALUES ('$nom', '$prenom', '$poste')";

              $res = PdoIonis::$monPdo->query($sql);
              
              //affichage des résultats, pour savoir si l'insertion a marchée:
              if($res)
              {
                  echo'<html><body><br>';
                  echo("L'insertion a été correctement effectuée") ;
                  echo'<br></body></html>';
              }
              else
              {
                echo("L'insertion a  échoué") ;
              }
              return $res;
        }
        public function modifRessource($id,$nom, $prenom, $poste)
        {
            $req = "UPDATE ressource SET 
                    nom_ressource = '$nom',
                    prenom_ressource = '$prenom',
                    poste = '$poste'
                    WHERE id = '$id'" ;
            $res=PdoIonis::$monPdo->query($req);
            return $res;
            //echo $res;
        }
        public function afficheRessource($id)
        {
            $req = "select * from ressource where id = '$id'";
            $res=  PdoIonis::$monPdo->query($req);
            $uneRessource = $res->fetch();
            return $uneRessource;          
        }
        
        public function suppRessource($id)
        {
            $req = "delete from ressource where id ='$id'";
            $res=  PdoIonis::$monPdo->query($req);
            return $res;            
        }
        
        public function assignerTacheRessource($ressource,$tache)
        {
            $reqTache = "SELECT id FROM tache WHERE nom_tache LIKE '$tache' ";
            $reqRessource = "SELECT id FROM ressource WHERE nom_ressource LIKE '$ressource' ";   
            
            $resTache=  PdoIonis::$monPdo->query($reqTache);
            $resRessource=  PdoIonis::$monPdo->query($reqRessource);
            
            
            $uneTache = $resTache->fetch();
            $idTache=$uneTache['id'];
            $uneRessource = $resRessource->fetch();
            $idRessource=$uneRessource['id'];
  
            $req = "INSERT INTO rattache(id_ressource, id_tache) VALUES ('$idRessource','$idTache')";
            $res=  PdoIonis::$monPdo->query($req);
            return $res;    
        }
        
        public function getRattach()
        {
          $req = "SELECT nom_tache, nom_ressource, prenom_ressource, date_debut, nb_jour "
                  . "FROM rattache as rat, ressource as res, tache as t";
                  $res=  PdoIonis::$monPdo->query($req);
                  $lesLignes = $res->fetchAll();
                  return $lesLignes;
        }
        
        public function getRattache($id_rattache)
        {
            $req = "select * from ressource where id in (select id_ressource from rattache where id_tache 3)";
            $res=  PdoIonis::$monPdo->query($req);
                  $lesLignes = $res->fetchAll();
                  return $lesLignes;
        }
}
?>
