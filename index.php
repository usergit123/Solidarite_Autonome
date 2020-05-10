<?php
	ob_start();
    session_start();
	require_once ("controleur/controleur.class.php");
	$unControleur = new Controleur ("localhost", "solidarite", "root", "");
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Bénévolat - Solidarité Autonome</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	
	
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">


	
	
    
  </head> 
  <body bgcolor=#EFF2FB>
  <div id="main">
	<?php
	  if (isset($_SESSION['idP']))
	  {
		  echo "<p class='ali'><a href='index.php?page=10' class='deco'>Déconnexion</a></p>";
	  }else{
		  echo "<p class='ali'><a href='index.php?con=1' class='deco'>Connexion</a></p>";
	  }
  ?>
		
	
    <div class="container">
      <img src="img/banniere.jpg">
      <div class="text">
        <h1>Solidarite Autonome</h1>
      </div>
    </div>
	
	
	
<table min-height=50%>
<tr>
	<td style="vertical-align:top;">
	<?php
		if(isset($_SESSION['idP']))
		{
			include("vue/menu_connexion.php");
		}else{
			include("vue/menu.php");
		}
	?>
	
</td> <td width = "100";></td>
<td style="vertical-align:top;" width="1400px";>
<br><br><br>
<center>
<?php
	
	if(isset($_GET['con']))
	{
		switch($_GET['con'])
		{
			case 1 :
				include ("vue/form_connexion.php");
				include("vue/connexion.php");								
			break;
			
			case 2 :
			//appel de la fonction select*from objets
						$lesLignes = $unControleur->selectALLBesoins();
						//var_dump($lesLignes);
						include("vue/vue_lister_besoins.php");
						break;
		
		
			
			
			case 3 :
				echo "Informations légales </br></br>
 
 
Merci de lire attentivement les présentes modalités d'utilisation du présent site avant de le parcourir. En vous connectant sur ce site, vous acceptez sans réserve les présentes modalités.
</br>
 </br>
 

Conditions d'utilisation</br>
</br>
 
L'utilisation de ce site est régie par les présentes conditions générales.</br  
En utilisant le site, vous reconnaissez avoir pris connaissance de ces conditions et les </br>
avoir acceptées. Celles-ci pourront êtres modifiées à tout moment et sans préavis par </br> la société Covid19NOX </br>
COVID 19 NOX ne saurait être tenu pour responsable en aucune manière d’une mauvaise utilisation du service.</br>
  
</br>
 

Limitation de responsabilité</br></br>
 
Les informations contenues sur ce site sont aussi précises que possibles et le site est périodiquement remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email en décrivant le problème de la manière la plus précise possible (page posant problème, action déclenchante, type d’ordinateur et de navigateur utilisé, …).
</br>
 </br>
 Tout contenu téléchargé se fait aux risques et périls de l'utilisateur et sous sa seule responsabilité. En conséquence, Natural net ne saurait être tenu responsable d'un quelconque dommage subi par l'ordinateur de l'utilisateur ou d'une quelconque perte de données consécutives au téléchargement.     
</br>
 </br>
 
Les photos sont non contractuelles.
</br>
 </br>
 
Les liens hypertextes mis en place dans le cadre du présent site internet en direction d'autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de Natural net.
</br>
 </br>
 </br>
 
Litiges

</br>
 </br>

Les présentes conditions sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l'interprétation ou de l'exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le   siège social de la société Natural net. La langue de référence, pour le règlement de contentieux éventuels, est le français.</br>
 </br>
 </br>
 
Déclaration à la CNIL</br>
 </br>
 
Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l'égard des traitements de données à caractère personnel) relative à l'informatique, aux fichiers et aux libertés, le site a fait l'objet d'une déclaration auprès de la Commission nationale de l'informatique et des libertés (www.cnil.fr). </br>
 </br>
 </br>
 
Droit d'accès</br>
 </br>
 
En application de cette loi, les internautes disposent d’un droit d’accès, de rectification, de modification et de suppression concernant les données qui les concernent personnellement.</br>
 </br>
 
Les informations personnelles collectées ne sont en aucun cas confiées à des tiers hormis pour l’éventuelle bonne exécution de la prestation commandée par l’internaute.</br>
 </br>
 
Confidentialité</br>
 </br>
 </br>
 
Vos données personnelles sont confidentielles et ne seront en aucun cas communiquées à des tiers hormis pour la bonne exécution de la prestation.</br>
 </br>
 
Propriété intellectuelle</br>
 </br>
 </br>
 
Tout le contenu du présent site, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société Natural net à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.</br>
 </br>
 
Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit de Natural net. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.</br>
 </br>
 

COVID19 NOX est identiquement propriétaire des droits des producteurs de bases de données visés au Livre III, Titre IV, du Code de la Propriété Intellectuelle   (loi n° 98-536 du 1er juillet 1998) relative aux droits d'auteur et aux bases de données.</br>
 </br>
 

Les utilisateurs et visiteurs du site internet peuvent mettre en place un hyperlien en direction de ce site, mais uniquement en direction de la page d’accueil, accessible à l’URL suivante : www.site-internet-qualite.fr, à condition que ce lien s’ouvre dans une nouvelle fenêtre. En particulier un lien vers une sous page (« lien profond ») est interdit, ainsi que l’ouverture du présent site au sein d’un cadre (« framing »), sauf l'autorisation expresse et préalable de COVID19NOX.
</br>
 </br>


";
			break;
			
			
			
			case 5 :
				echo "Editeur du site</br>
Site Internet Qualité</br>
par Covid19NOX </br>
24 Impasse des 2 cousins</br>
75017 Paris </br>
France</br></br>
Tél. : + 33 (0)6 79 62 19 10</br>
Fax : + 33 (0)7 82 47 22 11</br></br>	


Covid 19 NOX est une EURL au capital de 3500€</br>
RCS B 497 553 71 - Siret : 49755371900020 - APE : 6201Z</br>
N° déclaration CNIL : 1522193</br></br>";
			break;
			
			case 6 :
				echo "Page d'inscription";
			break;
		}
	}
	
	if (isset($_GET['page']))
			{
				if ($_GET['page']==10) 
				{ 
					header('Location: index.php'); //Header => Pour rafraîchir la page
				} 
			}
	
	if($_SESSION==null && $_GET==null)
	{
		
		//page d'accueil
		echo "</br></br><strong>Bienvenue sur le site Solidarite Autonome</strong><br><br>";
				
	}
	else
	{		
		if (isset($_SESSION['idP']))
		{
				
				//si la personne vient de se connecter
				if(isset($_GET['first']))
				{
					echo "<br/> Bienvenue ".$_SESSION["nom"]." , ".$_SESSION["prenom"]."";					
				}elseif($_GET==null)
				{
					//page d'accueil avec connexion
					echo "</br></br><strong>Bienvenue sur le site Solidarite Autonome<strong><br><br>";
					echo "PREVENTION : Restez chez vous. - MAINS : Lavez-les vous souvent. - COUDE :Toussez dedans. - VISAGE : Evitez de le toucher - DISTANCES : Gardez-les.";
					echo "<center>";	
					echo "<img src='https://www.education.gouv.fr/sites/default/files/2020-03/coronavirus---gestes-barri-re-51380.jpg' height='352' width='470'>";
					echo "</center>";
				}


				if (isset($_GET['page']))
				{
					$page=$_GET['page'];
				}else{
					$page=0;
				}
				switch ($page)
				{
					case 1 :
						echo "Page stock";
						//appel de la fonction select*from objets
						$lesLignes = $unControleur->selectALLStock();
						//var_dump($lesLignes);
						include("vue/vue_lister_stock.php");
						break;
		
					break;
					
					case 2:
						echo "Page Commandes";
						include ("vue/formulaire_sante.php");
						$lesLignes = $unControleur->selectCommandes($_SESSION['idP']);
						include("vue/tableau_commande_personne.php");
					break;
					
					case 3:
						echo "Page des dons";
						include("vue/formulaire_don.php");
						$lesLignes = $unControleur->selectDon($_SESSION['idP']);
						
						echo "<strong>Vos dons</strong>";
						
						include("vue/tableau_don.php");
					break;
					
					case 4:
					
					break;
					
					case 5:
					
					break;
					
					case 6:
					
					break;
					
					case 7:
					
					break;
					
					case 8:
					
					break;
					
					case 9:
					
					break;
					
					case 10: session_destroy();
				}
		}
	}
		
	?>
		</center>
	</td>
</tr>
</table>




<div id="slider">
  <input type="radio" id="show_slide1" name="slider_commands">
  <input type="radio" id="show_slide2" name="slider_commands">
  <input type="radio" id="show_slide3" name="slider_commands">
  <input type="radio" id="play_slider" name="slider_commands">

  <div id="slides">
    <figure id="slide1">
      <img src="https://www.sortiraparis.com/images/58/1665/551162-coronavirus-anne-hidalgo-promet-d-offrir-deux-millions-de-masques-en-tissu-aux-p.jpg" alt="Une première image" height="352" width="470">
      <figcaption>Masque contre le virus</figcaption>
    </figure>
    <figure id="slide2">
      <img src="https://cdn.lepetitfumeur.fr/19911-thickbox_default/gel-hydroalcoolique-1l-solugerm.jpg" alt="Une deuxième image" height="352" width="470">
      <figcaption>Gel hydroalcoolique</figcaption>
    </figure>
    <figure id="slide3">
      <img src="https://www.espacemanager.com/sites/default/files/field/image/coronavirus_gants.jpg" height="352" width="470" alt="Une troisième image">
      <figcaption>Gants de protection</figcaption>
    </figure>
  </div>
  <nav>
    <ul class="dots_commands">
      <li><label for="show_slide1">Slide 1</label></li>
      <li><label for="show_slide2">Slide 2</label></li>
      <li><label for="show_slide3">Slide 3</label></li>
    </ul>
    <label for="play_slider" aria-label="Play" id="play" title="Play">Play</label>
  </nav>
</div>




<footer>

	Designed by Alexis, Tanguy, Audran, Kévin, Alexandre, William.

</footer>




























	</div>

  </body>
</html>