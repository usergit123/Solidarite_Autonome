

<bR>
<bR>
<bR>

	<div class="container">

	    <div class="row">
	        <div class="col-md-4 offset-md-4">
	        <div class="card text-center card  bg-default mb-3">
	          <div class="card-header">
	            Validez la gestion d'un don
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
	            identifiant du don :
	            <input type="text" name="idDon" class="form-control input-sm chat-input" placeholder=0 />
				
				
						</br>
						</br> <br/> <br/>


							<div class="card-footer text-muted">
							<input type ="reset" name ="Annuler" value ="Annuler" class="btn btn-secondary">
							<input type ="submit" name ="Gerer" value="Le don a été géré" class="btn btn-secondary">

						</div>
					</form>
	        </div>
	    </div>
	    </div>
	</div>
	



<?php

if (isset ($_POST["Gerer"]))
{
	$unControleur->setTable("donation");
	$tab = array("idDon"=>$_POST['idDon']);
	$unControleur->delete($tab);
	
	$unControleur->setTable("don");
	$unControleur->delete($tab);
}

?>