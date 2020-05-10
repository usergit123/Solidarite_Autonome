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
				
				<!--
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
					
				-->
					
					<select name="Produit">
					<option value = "1">masque</option>
					<option value = "2">gant</option>
					<option value = "3">gel</option>
					<option value = "4">combinaison</option>
					</select>
					
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
	</div>
	
</body>
</html>

<?php

if (isset ($_POST["Donner"]))
{
	
	
	
	echo "<br><br>merci pour votre générosité !<br><br>";
	
	$unControleur->setTable("donation");
	$tab = array("idP"=>$_SESSION['idP'], "description"=>"une decription", "dated"=>date('Y-m-d'));
	$unControleur->insert($tab);
	
	
	$idDon = $unControleur->selectMaxIdDon();
	$idDon = $idDon[0][0];
	
	//var_dump($idDon);
	
	
	$unControleur->setTable("don");
	$tab = array("idProd"=>$_POST['Produit'] ,"idDon"=>$idDon, "nbDonnee"=>$_POST['Nbdon']);
	$unControleur->insertRelation($tab);
	

	

	
	
	

}

?>