<html>
<body>

<bR>
<bR>
<bR>

	<div class="container">

	    <div class="row">
	        <div class="col-md-4 offset-md-4">
	        <div class="card text-center card  bg-default mb-3">
	          <div class="card-header">
	            Faites un don
	        </br> <br/> <br/>
	          </div>
	          <div class="card-body">
				<form method="post" action="">
					Produit : <br>
				<table>
					<tr>
						<td>Gants de securite</td>		<td><input type="radio" name="Produit" value="1"></td>
					</tr>
					<tr>
						<td>Combinaison</td>			<td><input type="radio" name="Produit" value="2"></td>
					</tr>
					<tr>
						<td>Gel hydro-alcoolique</td>	<td><input type="radio" name="Produit" value="3"></td>
					</tr>
					<tr>
						<td>Masque de protection</td>	<td><input type="radio" name="Produit" value="4"></td>
					</tr>
				</table>
	                
	               
	               
	               
	            </br>
	            </br> <br/> <br/>
	            Quantité :
	            <input type="text" name="Nbdon" class="form-control input-sm chat-input" placeholder=0 />
						</br>
						</br> <br/> <br/>


							<div class="card-footer text-muted">
							<input type ="reset" name ="Annuler" value ="Annuler" class="btn btn-secondary">
							<input type ="submit" name ="Donner" value="Faire un don" class="btn btn-secondary">

						</div>
					</form>
	        </div>
	    </div>
	    </div>
	</div>
	
</body>
</html>

<?php

if (isset ($_POST["Donner"]))
{
	$tab = $unControleur->selectMaxDispo($_POST['Produit']);
	
	//var_dump($tab);
	
	//echo $tab[0]['stock'];
	//echo $tab[0]['produit'];
	//echo $tab[0]['nbdispo'];
	
	$nbDispo = $tab[0]['nbdispo'];
	$idS = $tab[0]['stock']; 
	$idProd = $tab[0]['produit'];
	
	//echo $idProd;
	//echo $idS;
	
	
	$unControleur->updateStock($_POST['Nbdon'], $idProd, $idS);
	
	echo "<br><br>merci pour votre générosité !<br><br>";
	
	$unControleur->setTable("donation");
	$tab = array("idP"=>$_SESSION['idP']);
	$unControleur->insert($tab);

	$IdDon = $unControleur->selectMaxidDon();
	$IdDon = $IdDon[0][0];
	//echo $IdC;
	
	$unControleur->insertDonne($_POST['Produit'], $IdDon, $_POST["Nbdon"]);
	
	$tab = $unControleur->selectMaxDispo($_POST['Produit']);
	$nbDispo = $tab[0]['nbdispo']; echo $nbDispo;
	$idS = $tab[0]['stock']; 
	$idProd = $tab[0]['produit'];
	
	$unControleur->setTable("demande");
	$lesLignes = $unControleur->selectALL();
	
	echo "
	<table>
	<tr>
	<td>idprod</td><td>idc</td><td>nb</td>
	<tr>";
	
	foreach($lesLignes as $uneLigne)
	{
		echo "
		<tr>
		<td>".$uneLigne['idProd']."</td><td>".$uneLigne['idC']."</td><td>".$uneLigne['nbDemande']."</td>
		</tr>";
	}
	echo "</table>";
	
	$cpt=0;
	
	foreach($lesLignes as $uneLigne)
	{
		if($nbDispo > $uneLigne['nbDemande'] && $uneLigne['idProd']=$_POST['Produit'])
		{
			$unControleur->update($idS, $idProd, $uneLigne['nbDemande']);
			
			echo $uneLigne['idProd'];
			echo $uneLigne['idC'];
			
			$tabDel = array("idProd"=>$uneLigne['idProd'],"idC"=>$uneLigne['idC']);
			$unControleur->delete($tabDel);
			
			$cpt++;
		}
		
	}
	
	if($cpt>0)
	{
		echo "Grace à vous ".$cpt." demandes vont pouvoir aboutir";
	}
	
	
	
	/*
	if($nbDispo > $_POST['Nbdon'])
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

}

?>