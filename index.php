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
	
</td>
<td style="vertical-align:top;" width="1400px";>
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
				echo "page de consultation des besoins";
			break;
			
			case 3 :
				echo "mention légale";
			break;
			
			case 4 :
				echo "FAQ";
			break;
			
			case 5 :
				echo "qui sommes nous";
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
		echo "explication";
		
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
					echo "explication";
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
					break;
					
					case 2:
						echo "Page Régions";
					break;
					
					case 3:
						echo "Page mon compte";
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
<!--
<footer>
	<p style="text-align:center; color:white;" >Designed by Kévin, Audran, Alexandre, Tanguy, Alexy, Francis, William, Gabriel</p>
</footer>
-->
	</div>
  </body>
</html>