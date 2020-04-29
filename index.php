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
						include("vue/tableau_commande.php");
					break;
					
					case 3:
						echo "Page des dons";
						include("vue/formulaire_don.php");
						$lesLignes = $unControleur->selectDon($_SESSION['idP']);
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

<section class="py-5 text-white bg-dark  ">
    <div class="container py-5">
	<div class="row py-5">
            <div class="col-md-6">
                <h1><b>Organize all your media content easily</b></h1>
                <p>Feugiat primis ligula risus auctor a laoreet egestas augue mauris viverra tortor in iaculis pretium magna, mauris rhoncus ipsum placerat feugiat primis</p>
                 <form class="form-inline">
                      <div class="form-group mb-2">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <button type="submit" class="btn btn-success mb-2 ml-1">Confirm identity</button>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </form>
                               
            </div>
        </div>
</div>
</section>
	</div>

  </body>
</html>