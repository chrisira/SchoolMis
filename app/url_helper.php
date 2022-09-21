<?php
	// Simple page redirect
	function redirect($userEmail,$password,$type){
		echo $userEmail." ".$password." ".$type;
		global $db;
		$page         = "";
		$loginPage    = "auth/login.php";
		$adminPage    = "index.php";

		if ($userEmail == '' || $userEmail == null) {
			$page = $loginPage;
		}else{

			if($password == 'true'){

				switch($type){

					case "admin":

					if($db->check("SELECT * FROM `users` WHERE `users`.`email` = ?",["$userEmail"]) == true){
						$page = $adminPage;
						
					}
					break;
					default:

					$page = $loginPage;
					break;

				}
				
			}else{
	
				$page =$loginPage;
			}
		}
		header('Location: ' . URLROOT . $page);
	}