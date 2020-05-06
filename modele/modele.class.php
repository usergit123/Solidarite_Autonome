<?php

	class Modele
	{
			private $pdo, $table;
			
			public function __construct($serveur, $bdd, $user, $mdp)
			{
				$this->pdo=null;
				try{
					$this->pdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
				}
				catch (PDOException $exp)
				{
					echo "Erreur de connexion à la base de données";
				}
			}
		public function getTable()
		{
			return $this->table="";
		}
		public function setTable ($uneTable)
		{
			$this->table=$uneTable;
		}
		
		public function selectALL ()
		{
			
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select * from ".$this->table.";";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		public function selectWhere ($champs, $where, $operateur)
		{
			$chaineChamps = array();
			$tabWhere = array();
			$donnee = array();
			
			$chaineChamps = implode (", ", $champs);
			
			foreach ($where as $cle=>$valeur)
			{
				$tabWhere[] = $cle."= :".$cle;
				$donnees[":".$cle] = $valeur;
			}
			
			$chaineWhere = implode ($operateur, $tabWhere);
			
			$requete = "select ".$chaineChamps." from ".$this->table." 
			where ".$chaineWhere.";";						
			
			//echo $requete;
			
			if ($this->pdo !=null) //appel de la fonction conn
			{
				
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ($donnees);
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
			
			
		}

		public function selectALLBesoins()
		{
			if ($this->pdo !=null)
			{
				$requete="select r.libelle Region, p.nom Nom, p.prenom Prenom, p.tel Telephone, c.idC Identifiant_Commande, prod.libelle Produit from personne p, commande c, region r, produit prod, demande d
    where c.idP=p.idp and r.idr=p.idr and prod.idprod=d.idprod and d.idc=c.idc;";
    		
				//preparation de la requete
				$select = $this->pdo->prepare ($requete);
				//execution de la requete
				$select->execute ();
				//extraction des enregistrements
				return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}

		public function insertDemande ($IdProd, $IdC, $NbDemande)
		{
			if ($this->pdo != null)
			{
				$requete="insert into Demande values (".$IdProd.", ".$IdC.", ".$NbDemande.");";
				//$requete="insert into Demande values (1,2,5);";
    		
				//preparation de la requete
				$select = $this->pdo->prepare ($requete);
				//execution de la requete
				$select->execute ();
				//extraction des enregistrements
				return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
		public function insertDonne ($IdProd, $IdDon, $Nbdon)
		{
			if ($this->pdo != null)
			{
				$requete="insert into Don values (".$IdProd.", ".$IdDon.", ".$Nbdon.");";
				//$requete="insert into Demande values (1,2,5);";
    		
				//preparation de la requete
				$select = $this->pdo->prepare ($requete);
				//execution de la requete
				$select->execute ();
				//extraction des enregistrements
				return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
		
		public function selectALLStock()
		{
			if ($this->pdo !=null)
			{
				$requete="select Re.Libelle Region, R.Nom Nom ,R.Prenom Prenom, R.Tel Telephone, S.Libelle Nom_Stock, P.Libelle Produit,St.NbDispo NbStock
			    from Produit P, Stockage St, Stock S, Region Re, Responsable R
			    Where P.IdProd = St.IdProd and St.Ids=S.IDs and R.Idresp = S.IdResp and S.IdR= Re.Idr;";
    		
				//preparation de la requete
				$select = $this->pdo->prepare ($requete);
				//execution de la requete
				$select->execute ();
				//extraction des enregistrements
				return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}

		public function insert ($tab)
		{
			if ($this->pdo !=null) //appel de la fonction connexion
			{
				$donnees = array();
				$tabValues = array();
				foreach ($tab as $cle=>$valeur)
				{
					$tabValues[] = ":".$cle;
					$donnees[":".$cle] = $valeur;
				}
				$chaineTab = implode (", ", $tabValues);
				
				$requete = "insert into ".$this->table." values (null, ".$chaineTab.");";
				
				//echo $requete;
				
				$select = $this->pdo->prepare ($requete);
				//execution de la requete
				$select->execute ($donnees);
			}
		}
		
		
		
		
		public function delete($tabId)
		{
			if($this->pdo !=null)
			{
				$chaine = "";
				$tab = array();
				$donnees = array();
				foreach($tabId as $cle=>$valeur)
				{
					$tab[] = $cle." = :".$cle;
					$donnees[":".$cle] = $valeur;
				}
				$chaine = implode (" and ", $tab);
				
				$requete = "delete from ".$this->table." where ".$chaine.";";
				
				echo $requete;
				
				$select = $this->pdo->prepare ($requete);
				//execution de la requete avec les donnees des variables PDO
				$select->execute ($donnees);
			}
		}
		
		public function selectUser ($pseudo,$mdp)
		{
			
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select * from personne where pseudo='".$pseudo."' and mdp ='".$mdp."';";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		public function selectMaxIdC()
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select max(idC) from commande;";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
		public function selectMaxIdDon()
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select max(idDon) from Donation;";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
		public function selectCommandes($idP)
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select d.idC numero, prod.libelle produit, nbDemande nombre from personne p, commande c, demande d, produit prod
				where p.idP = c.idP and c.idC = d.idC and d.idProd = prod.idprod and p.idP = ".$idP.";";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		public function selectMaxDispo($idProd)
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select s.ids stock, prod.idprod produit, nbdispo from stock s, stockage st, produit prod
							where s.ids=st.ids and st.idprod=prod.idprod and nbdispo=(select max(nbdispo) from stockage where idprod = ".$idProd.");";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		public function Update($idS, $idProd, $nb)
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "update stockage set nbdispo = nbdispo - ".$nb." where ids = ".$idS." and idprod = ".$idProd.";";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
		public function updateStock($Nbdon, $idprod, $ids)
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "update stockage set nbdispo = nbdispo + ".$Nbdon." where idprod = ".$idprod." and ids = ".$ids.";";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
		public function selectDon($idP)
		{
			if ($this->pdo !=null) //appel de la fonction conn
			{
				$requete = "select p.idp, donation.iddon numero, nbdonne nb, prod.libelle produit from donation, don, produit prod, personne p
							where donation.iddon=don.iddon and don.idprod=prod.idprod and donation.idp=p.idp and p.idp= ".$idP.";";
				//preparation de la requete
					$select = $this->pdo->prepare ($requete);
					//execution de la requete
					$select->execute ();
					//extraction des enregistrements
					return $select->fetchALL();
			}
			else
			{
				return null;
			}
		}
		
	}		
?>