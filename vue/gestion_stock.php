

<bR>
<bR>
<bR>

	<div class="container">

	    <div class="row">
	        <div class="col-md-4 offset-md-4">
	        <div class="card text-center card  bg-default mb-3">
	          <div class="card-header">
	            Augmentez vos stocks
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
					
					
					
					
				</table>
	                
	               
	               
	               
	            </br>
	            </br> <br/> <br/>
	            identifiant du stock :
	            <input type="text" name="idS" class="form-control input-sm chat-input" placeholder=0 />
				
				identifiant du produit :
	            <input type="text" name="idProd" class="form-control input-sm chat-input" placeholder=0 />
				
				Nombre :
	            <input type="text" name="nombre" class="form-control input-sm chat-input" placeholder=0 />
				
				
						</br>
						</br> <br/> <br/>


							<div class="card-footer text-muted">
							<input type ="reset" name ="Annuler" value ="Annuler" class="btn btn-secondary">
							<input type ="submit" name ="augmenter" value="augmenter" class="btn btn-secondary">

						</div>
					</form>
	        </div>
	    </div>
	    </div>
	</div>
	
	
	
	<bR>
<bR>
<bR>
	
	
	
	<div class="container">

	    <div class="row">
	        <div class="col-md-4 offset-md-4">
	        <div class="card text-center card  bg-default mb-3">
	          <div class="card-header">
	            diminuez vos stocks
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
					
					
					
					
				</table>
	                
	               
	               
	               
	            </br>
	            </br> <br/> <br/>
	            identifiant du stock :
	            <input type="text" name="idS" class="form-control input-sm chat-input" placeholder=0 />
				
				identifiant du produit :
	            <input type="text" name="idProd" class="form-control input-sm chat-input" placeholder=0 />
				
				Nombre :
	            <input type="text" name="nombre" class="form-control input-sm chat-input" placeholder=0 />
				
				
						</br>
						</br> <br/> <br/>


							<div class="card-footer text-muted">
							<input type ="reset" name ="Annuler" value ="Annuler" class="btn btn-secondary">
							<input type ="submit" name ="diminuer" value="diminuer" class="btn btn-secondary">

						</div>
					</form>
	        </div>
	    </div>
	    </div>
	</div>
	



<?php

if (isset ($_POST["augmenter"]))
{
	$unControleur->setTable("stockage");
	$tab = array("idS"=>$_POST['idS'],"idProd"=>$_POST['idProd'],"nbDispo"=>$_POST['nombre']);
	$unControleur->updateStockageUp($_POST['idS'],$_POST['idProd'],$_POST['nombre']);
}

if (isset($_POST['diminuer']))
{
	$unControleur->setTable("stockage");
	$tab = array("idS"=>$_POST['idS'],"idProd"=>$_POST['idProd'],"nbDispo"=>$_POST['nombre']);
	$unControleur->updateStockageDown($_POST['idS'],$_POST['idProd'],$_POST['nombre']);
}

?>