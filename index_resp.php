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
	  if (isset($_SESSION['idResp']))
	  {
		  echo "<p class='ali'><a href='index_resp.php?page=10' class='deco'>Déconnexion</a></p>";
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
		if(isset($_SESSION['idResp']))
		{
			include("vue/menu_resp.php");
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
				include("vue/connexion_resp.php");								
			break;
			
			case 2 :
			//appel de la fonction select*from objets
						$lesLignes = $unControleur->selectALLBesoins();
						//var_dump($lesLignes);
						include("vue/vue_lister_besoins.php");
						break;
		
		
			
			
			case 3 :
				echo "Mentions légales";
			break;
			
			case 4 :
				echo "FAQ";
			break;
			
			case 5 :
				echo "Qui sommes-nous ?";
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
		
		include ("vue/form_connexion.php");
		include("vue/connexion_resp.php");	
		
	}
	else
	{		
		if (isset($_SESSION['idResp']))
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
						
						include("vue/gestion_stock.php");
						//appel de la fonction select*from objets
						$lesLignes = $unControleur->selectStockResp($_SESSION['idResp']);
						//var_dump($lesLignes);
						echo "<br><br><strong>Voici vos stocks</strong> <br><br>";
						include("vue/vue_lister_stock.php");
						break;
		
					break;
					
					case 2:
						echo "Page Commandes";
						
						include("vue/form_reponse.php");
						$lesLignes = $unControleur->selectCommandesResp();
						include("vue/tableau_commande.php");
					break;
					
					case 3:
						echo "Page des dons";
						include("vue/form_don_resp.php");
						
						$lesLignes = $unControleur->selectALLDon();
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
<br><br><br><br><br>
<section class="py-5 text-white bg-dark  ">
    
	
            
                <h1><b>Designed by Alexis, Alexandre, Audran, Kévin, Tanguy, William</p>
                 
                               
            
        
</div>
</section>
	</div>

  </body>
</html>