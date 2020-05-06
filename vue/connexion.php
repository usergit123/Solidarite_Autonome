<?php

if (isset($_POST['SeConnecter']))
		{
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			
			$unControleur->setTable("personne");
			$champs = array("pseudo", "mdp", "nom", "prenom", "idP" ); //la selection
			//var_dump($champs);
			$where = array("pseudo"=>"".$pseudo."","mdp"=>"".$mdp.""); //where la clause
			$operateur = " and "; 					//pour faire un where
			
			$resultat = $unControleur->selectWhere($champs,$where,$operateur);
			
			
			//$resultat = $unControleur->selectUser($pseudo,$mdp);
			
			
			
			//var_dump($resultat);
			if($resultat==null)
			{
				echo"<br/> veuillez vérifier vos identifiants ";
			}else{
				//var_dump($resultat);
				foreach ($resultat as $uneLigne)
					{
						echo "<br/> Bienvenue ".$uneLigne["nom"]." , ".$uneLigne["prenom"]."";			
						$_SESSION['nom']=$uneLigne['nom'];
						$_SESSION['prenom']=$uneLigne['prenom'];
						$_SESSION['idP']=$uneLigne['idP']; 
					}
					
					
					header('Location: index.php?first=1');
<<<<<<< HEAD
					
=======
					//ob_end_flush();
>>>>>>> 6b01c1ddb1f05fc04b2c3b2dcf9ab188554ce7de
			}
		}
?>


