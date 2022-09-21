<?php
	class Web{
		function __construct()
		{
			global $db;
			$this->db = $db;
		}
		// All houses the basic and general functionialities which web service will need
		public function getPhoneClientId($phone){
			// returns the client ID with a mobile phone
			$data = $this->db->GetRows("SELECT * FROM clients WHERE telephone = \"$phone\" ");
			if($data){
				$id = $data['id'];
				return $id;
			}else{
				return false;
			}
		}

		public function getNIDClientId($NID){
			// returns the 	the client ID with a mobile phone
			$data = $this->db->GetRow("SELECT * FROM clients WHERE nid = \"$NID\" ");
			if($data){
				$id = $data['id'];
				return $id;
			}else{
				return false;
			}
		}

		public function getClient($clientId){
			// returns the client data with an ID
			$data = $this->db->GetRow("SELECT * FROM clients WHERE id = \"$clientId\" ");
			if($data){
				return $data;
			}else{
				return false;
			}
		}
	}
	$Web = new WEB();
?>