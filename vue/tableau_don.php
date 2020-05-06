<html>
			<br>
				<strong>Vos dons</strong>
				<br><br>
				<head>
						<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
					<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
					<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
					</head>
					<body>
					<div class="table-responsive" id="sailorTableArea">
					<table id="sailorTable" class="table table-striped table-bordered" width="25%">

		<thead>
			<tr>
				<th>N° Don</th>
				<th>Produit</th>
				<th>Nombre</th>
				
				
			</tr>
		</thead>
		<tbody>


	<?php
	//parcourir les lignes et les afficher dans la table
	foreach ($lesLignes as $uneLigne)
	{
		echo "<tr> <td>".$uneLigne['numero']."</td>
		<td>".$uneLigne['produit']."</td>
		<td>".$uneLigne['nb']."</td>
		
		</tr>";
	}
	
	?>
					</table>
				</tbody>
				</table>
				</div>

		</body>
		</html>