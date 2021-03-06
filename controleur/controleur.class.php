<?php
    require_once("modele/modele.class.php");
    class Controleur
    {
        private $unModele;
        public function __construct($serveur, $bdd, $user, $mdp)
        {
            //instanciation de la classe modele
            $this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
        }
        public function setTable($uneTable)
        {
            $this->unModele->setTable($uneTable);
        }
        public function getTable()
        {
            return $this->unModele->getTable();
        }

        public function selectALL ()
        {
            return $this->unModele->selectALL ();
        }
        public function insert ($tab)
        {
            //on peut controler les donnees avant insertion
            //le role du controleur 
            $this->unModele->insert ($tab);
        }
		public function insertRelation ($tab)
        {
            //on peut controler les donnees avant insertion
            //le role du controleur 
            $this->unModele->insertRelation ($tab);
        }
		
		
        public function delete ($tabId)
        {
            $this->unModele->delete ($tabId);
        }
        public function selectWhere ($champs, $where, $operateur)
        {
            return $this->unModele->selectWhere ($champs, $where, $operateur);
        }
		
		public function selectUser ($pseudo,$mdp)
		{
			return $this->unModele->selectUser($pseudo,$mdp);
		}
        public function selectALLBesoins ()
        {
            $objet = $this->unModele->selectALLBesoins ();

            return $objet;
        }
        public  function selectALLStock()
        {
            return $this->unModele->selectALLStock();
        }
		
		
		
		
        public function insertDemande ($IdProd, $Idc, $Nbdemande)
        {
            $this->unModele->insertDemande($IdProd, $Idc, $Nbdemande);
        }
		
		public function insertDonne ($IdProd, $IdDon, $Nbdon)
        {
            $this->unModele->insertDonne($IdProd, $IdDon, $Nbdon);
        }
		
		public function selectBesoins ()
		{
			return $this->unModele->selectBesoins();
		}
		
		public function selectDon ($idP)
		{
			return $this->unModele->selectDon($idP);
		}
		
		public function selectALLDon()
		{
			return $this->unModele->selectALLDon();
		}
		
		public function selectMaxIdC()
		{
			return $this->unModele->selectMaxIdC();
		}
		public function selectMaxIdDon()
		{
			return $this->unModele->selectMaxIdDon();
		}
		public function selectCommandes($idP)
		{
			return $this->unModele->selectCommandes($idP);
		}
		public function selectMaxDispo($idProd)
		{
			return $this->unModele->selectMaxDispo($idProd);
		}
		public function Update($idS, $idProd, $nb)
		{
			return $this->unModele->Update($idS, $idProd, $nb);
		}
		public function updateStock($Nbdon, $idProd, $ids)
		{
			return $this->unModele->updateStock($Nbdon, $idProd, $ids);
		}
		public function selectCommandesResp()
		{
			return $this->unModele->selectCommandesResp();
		}
		public function updateStockageUp($idS, $idProd, $nbDispo)
		{
			return $this->unModele->updateStockageUp($idS, $idProd, $nbDispo);
		}
		public function selectStockResp($idResp)
		{
			return $this->unModele->selectStockResp($idResp);
		}
		public function updateStockageDown($idS,$idProd,$nombre)
		{
			$this->unModele->updateStockageDown($idS,$idProd,$nombre);
		}
    }
?>