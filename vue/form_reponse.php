
<h2> Formulez une réponse </h2>
<form method ="post" action ="">
<table>
	<tr>
		<td>
			<label for="pseudo">N° commande : </label> 
		</td>
		<td>
			<input type ="text" name="idC" id="idC">
		</td>
	</tr>
	
	<tr>
		<td>
			<label for='texte'> N° Stock : </label> 
		</td>
		<td>
			<input type ="text" name="stock" id="stock">
		</td>
	</tr>
	
	<tr>
		<td>
			<label for='texte'> Texte de la réponse : </label> 
		</td>
		<td>
			<input type ="text" name="texte" id="texte">
		</td>
	</tr>
	
	<tr>
		<td>
			<input type ="reset" name ="Annuler" value ="Annuler">
		</td>
		<td>
			<input type ="submit" name ="Répondre" value ="Répondre"><br/>
		</td>
	</tr>
	


</table>
</form>


<?php

if(isset($_POST['Répondre']))
{
	$unControleur->setTable("reponse");
	$tab = array("idS"=>$_POST['stock'],"idC"=>$_POST['idC'],"texte"=>$_POST['texte'],);
	$unControleur->insert($tab);
}

?>



