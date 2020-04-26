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
	            Prenez soin de vous, n'hésitez pas à commander, c'est gratuit à cause du Covid-19
	        </br> <br/> <br/>
	          </div>
	          <div class="card-body">
							<form method="post" action="">
								Produit : Gants de securite
	               <input type="radio" name="Produit" value="Gants de securite"> 
	               Combinaison<input type="radio" name="Produit" value="Combinaison de securite">
	               Gel hydro-alcoolique<input type="radio" name="Produit" value="Gel hydro-alcoolique">
	               Masque de protection<input type="radio" name="Produit" value="Masque de protection">
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
	
</body>
</html>

<?php

if (isset ($_POST["Commander"]))
{
	$unControleur->setTable("Commande");
	$tab = array("produit"=>$_POST['Produit']);
    $unControleur->insert($tab);

    $champs = array("IdC"); //la selection
            $where = array("IdC"=>"(select max(IdC) from Commande)"); //where la clause
            $operateur = "";

    $IdC = $unControleur->selectWhere($champs, $where, $operateur);         
     

    $champs = array("IdProd"); //la selection
            $where = array("IdProd"=>"(select IdProd from Produit where Libelle =".$_POST["Produit"].")"); //where la clause
            $operateur = "";


    $IdProd = $unControleur->selectWhere($champs, $where, $operateur);                    //pour faire un where

    $unControleur->insertDemande($IdProd, $IdC, $_POST["Nbdemande"]);


}