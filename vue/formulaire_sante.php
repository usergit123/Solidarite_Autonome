

<bR>
<bR>
<bR>

	<div class="container">

	    <div class="row">
	        <div class="col-md-4 offset-md-4">
	        <div class="card text-center card  bg-default mb-3">
	          <div class="card-header">
	            Faites une commande
	        </br> <br/> <br/>
	          </div>
	          <div class="card-body">
				<form method="post" action="">
					Produit : <br>
				<table>
				<!--
					<tr>
						<td>Masque de protection</td>		<td><input type="radio" name="Produit" value="1"></td>
					</tr>
					<tr>
						<td>Gant de protection</td>			<td><input type="radio" name="Produit" value="2"></td>
					</tr>
					<tr>
						<td>Gel hydro-alcoolique</td>	<td><input type="radio" name="Produit" value="3"></td>
					</tr>
					<tr>
						<td>Combinaison de sécurité</td>	<td><input type="radio" name="Produit" value="4"></td>
					</tr>
					
					-->
					
					<select name="Produit">
					<option value = "1">masque</option>
					<option value = "2">gant</option>
					<option value = "3">gel</option>
					<option value = "4">combinaison</option>
					</select>
					
					
				</table>
	                
	            description :
	            <input type="text" name="description" class="form-control input-sm chat-input"  />
	               
	               
	            </br>
	            </br> <br/> <br/>
	            Quantité :
	            <input type="text" name="Nbdemande" class="form-control input-sm chat-input" placeholder=0 />
						</br>
						</br> <br/> <br/>


							<div class="card-footer text-muted">
							<input type ="reset" name ="Annuler" value ="Annuler" class="btn btn-secondary">
							<input type ="submit" name ="Commander" value="Commander" class="btn btn-secondary">

						</div>
					</form>
	        </div>
	    </div>
	    </div>
	</div>
	


<?php

if (isset ($_POST["Commander"]))
{
	
	/*
	$tab = $unControleur->selectMaxDispo($_POST['Produit']);
	
	//var_dump($tab);
	
	//echo $tab[0]['stock'];
	//echo $tab[0]['produit'];
	//echo $tab[0]['nbdispo'];
	
	$nbDispo = $tab[0]['nbdispo'];
	$idS = $tab[0]['stock']; 
	$idProd = $tab[0]['produit'];
	
	
	if($nbDispo > $_POST['Nbdemande'])
	{
		$unControleur->Update($idS, $idProd, $_POST['Nbdemande']);
		
		echo "<br>Votre commande a été acceptée, vous serez livré incessament sous peu !<br>";
		
	}else{
		echo "<br><br>Désolé, nos stocks ne sont pas assez approvisionnés, votre commande est en liste d'attente<br>";
		
		$unControleur->setTable("Commande");
		$tab = array("idP"=>$_SESSION['idP']);
		$unControleur->insert($tab);

		$IdC = $unControleur->selectMaxidC();
		$IdC = $IdC[0][0];
		//echo $IdC;
		
		$unControleur->insertDemande($_POST['Produit'], $IdC, $_POST["Nbdemande"]);
	}
	*/
	
	$unControleur->setTable("Commande");
		$tab = array("idP"=>$_SESSION['idP'],"description"=>$_POST['description'],"datec"=>date('Y-m-d'));
		$unControleur->insert($tab);

		$IdC = $unControleur->selectMaxidC();
		$IdC = $IdC[0][0];
		//echo $IdC;
		
		$unControleur->insertDemande($_POST['Produit'], $IdC, $_POST["Nbdemande"]);
		
		

}


?>