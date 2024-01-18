<?php
class user {
	
	public $errorMessage;
	
	public function __construct($pdo) {
		$this->conn = $pdo;
	}
	
	//public function getBooks() {
		//$allBooks = 	$this->conn->prepare('SELECT...');
	//}
	
	
	 
  private function cleanInput($data) {
	 $data = trim($data); 
	 $data = stripslashes($data); 
	 $data = htmlspecialchars($data); 
	 return $data;
	}
	
  
  public function checkUserRegisterInput() {
	  //$cleanname =  $this->cleanInput($_POST['username']);
	  //echo $cleanname;
	//}
		$error=0;
		$cleanemail = $this->cleanInput($_POST['email-field']);
			
		
		if(isset($_POST['submit_register'])) {
			$cleanname = $this->cleanInput($_POST['username']);
			//Bygg query som hämtar ut en rad ur databasen ifall användarnamnet finns
			$stmt_checkIfUserExists = $this->conn->prepare("SELECT * FROM table_users WHERE user_name = :uname OR user_email = :email"); 
			$stmt_checkIfUserExists->bindParam(":uname", $cleanname, PDO::PARAM_STR);
			$stmt_checkIfUserExists->bindParam(":email", $cleanemail, PDO::PARAM_STR);
			$stmt_checkIfUserExists->execute();
			
			//Skapa array av infon som hämtats
			
			$userNameMatch=$stmt_checkIfUserExists->fetch();
		
		
				//Kolla om arrayen innehåller värden. Om SELECT-queryn har hämtat ut något finns användarnamnet redan skapat	
		
				 if(!empty($userNameMatch)){
						 if ($userNameMatch['user_name'] == $cleanname) {
							$this->errorMessage .= " | Username is already taken";
							$error=1;
						  //echo $this->errorMessage;
							}
							
							 if ($userNameMatch['user_email'] == $cleanemail) {
							$this->errorMessage .= " | Email is already taken";
							$error=1;
						  //echo $this->errorMessage;
							}	
				 }
		}
		   
   
		if(isset($_POST['submit_edit']) && $_POST['password'] == ""){
				
			}
		
		
		else {
				if ($_POST['password'] != $_POST['password_again']){
				   $this->errorMessage .= " | Password do not match";
				   $error=1;
				   //echo "mismatch";
			   }
			   
			   if(strlen($_POST['password']) < 8){
					$this->errorMessage .= " | Password does not meet requirements";
					$error=1;
			   }	
		}
		   
		 
			if (!filter_var($_POST['email-field'], FILTER_VALIDATE_EMAIL)) {
			  $this->errorMessage = " | Invalid email format";
			  $error=1;
			}
		   
		   
	
			if ($error !=0){
				return $this->errorMessage;
		  }
			else {
				return "success";
		  }
	} 
	
		public function register() {
		$cleanName = $this->cleanInput($_POST['username']);
		$cleanEmail = $this->cleanInput($_POST['email-field']);
		$cleanFname = $this->cleanInput($_POST['firstname']);
		$cleanLname = $this->cleanInput($_POST['lastname']);
		//Encrypt password with the password_hash-function
		$encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		
		//Bygg query som insert info i databasen
		$stmt_registerUser = $this->conn->prepare("INSERT INTO table_users (user_name, user_password, user_firstname, user_lastname, user_email, role_fk, status_fk) VALUES (:uname, :upassword, :ufirstname, :ulastname, :uemail, 1, 1)"); 
		$stmt_registerUser->bindParam(':uname', $cleanName, PDO::PARAM_STR);
		$stmt_registerUser->bindParam(':upassword', $encryptedPassword, PDO::PARAM_STR);
		$stmt_registerUser->bindParam(':ufirstname', $cleanFname, PDO::PARAM_STR);
		$stmt_registerUser->bindParam(':ulastname', $cleanLname, PDO::PARAM_STR);
		$stmt_registerUser->bindParam(':uemail', $cleanEmail, PDO::PARAM_STR);
	    $check = $stmt_registerUser->execute();
		
			if ($check){
				return "User created successfully";
			}
			else{
				return "Something went wrong, try again";
			}
		}
		
		
		
		public function login() {
		$usernameEmail = $this->cleanInput($_POST['username']);
		//Bygg query som hämtar ut en rad ur databasen ifall användarnamnet finns
		$stmt_checkIfUserExists = $this->conn->prepare("SELECT * FROM table_users WHERE user_name = :name OR user_email = :email"); 
		$stmt_checkIfUserExists->bindParam(":name", $usernameEmail, PDO::PARAM_STR);
		$stmt_checkIfUserExists->bindParam(":email", $usernameEmail, PDO::PARAM_STR);
	    $stmt_checkIfUserExists->execute();
		//Skapa array av infon som hämtats
	   $userNameMatch = $stmt_checkIfUserExists->fetch();
		
			if (!$userNameMatch){
				$this->errorMessage = "No, such user or email in database!";
				return $this->errorMessage;
			}
			
			$checkPasswordMatch= password_verify($_POST['password'], $userNameMatch['user_password']);
   
			   if($checkPasswordMatch == true) {
				   $_SESSION['uname'] = $userNameMatch["user_name"];
				   $_SESSION['urole'] = $userNameMatch["role_fk"];
				   $_SESSION['uid'] = $userNameMatch["user_id"];
				   return "success";
			   } 
			   else {
				   $this->errorMessage = "INVALID password!";
				   return $this->errorMessage;
			   }
		}
			
		public function checkLoginStatus(){
			if(isset($_SESSION['uid'])){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function checkUserRole($req) {	
		$stmt_checkRoleLevel = $this->conn->prepare("SELECT * FROM table_roles WHERE role_id = :urole"); 
		$stmt_checkRoleLevel->bindParam(":urole", $_SESSION['urole'], PDO::PARAM_STR);
		$stmt_checkRoleLevel->execute();
		$currentUserRoleInfo = $stmt_checkRoleLevel->fetch();
		
			if ($currentUserRoleInfo["role_level"] >= $req) {
				return true;
			}
		
		}
		
		
		public function redirect($url){
			header("Location: ".$url);
			exit();
		}
		
		
		public function logout(){
			session_unset();
			session_destroy();	
			return true;
		}
		
		public function editUserInfo($uid){
				
			$cleanEmail = $this->cleanInput($_POST['email-field']);
			$cleanFname = $this->cleanInput($_POST['firstname']);
			$cleanLname = $this->cleanInput($_POST['lastname']);	
			
			if(isset($_POST['password']) && $_POST['password'] != ""){
			$encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$editUserInfo = $this->conn->prepare("UPDATE table_users SET user_email = :uemail, user_firstname = :ufirstname, user_lastname = :ulastname, user_password = :upass WHERE user_id = :uid");
			$editUserInfo->bindParam(':uemail', $cleanEmail, PDO::PARAM_STR);
			$editUserInfo->bindParam(':ufirstname', $cleanFname, PDO::PARAM_STR);
			$editUserInfo->bindParam(':ulastname', $cleanLname, PDO::PARAM_STR);
			$editUserInfo->bindParam(':upass', $encryptedPassword, PDO::PARAM_STR);
			$editUserInfo->bindParam(':uid', $uid, PDO::PARAM_INT);
			}
			
			else {
			$editUserInfo = $this->conn->prepare("UPDATE table_users SET user_email = :uemail, user_firstname = :ufirstname, user_lastname = :ulastname WHERE user_id = :uid");
			$editUserInfo->bindParam(':uemail', $cleanEmail, PDO::PARAM_STR);
			$editUserInfo->bindParam(':ufirstname', $cleanFname, PDO::PARAM_STR);
			$editUserInfo->bindParam(':ulastname', $cleanLname, PDO::PARAM_STR);
			$editUserInfo->bindParam(':uid', $uid, PDO::PARAM_INT);
			}
			
			if($editUserInfo->execute()) {
			return true;
			}
		
		}
		
		public function getUserInfo($uid){
		$userInfoQuery = $this->conn->prepare("SELECT * FROM table_users WHERE user_id = :uid"); 
		$userInfoQuery->bindParam(":uid", $uid, PDO::PARAM_INT);
		$userInfoQuery->execute();
		$userInfo = $userInfoQuery->fetch();
		return $userInfo;
		}
		
		

		
		public function searchUsers(){
			$cleanSearchParam = $this->cleanInput($_POST['search_username']);
			$cleanSearchParam = "%".$cleanSearchParam."%";
			$searchUsersQuery = $this->conn->prepare("SELECT * FROM table_users WHERE user_name LIKE :searchParam");
			$searchUsersQuery->bindParam(":searchParam", $cleanSearchParam, PDO::PARAM_STR);
			$searchUsersQuery->execute();
			return $searchUsersQuery;
			
		}
		
		
		public function updateUserStatus($uid){
			$updateStatusQuery = $this->conn->prepare("UPDATE table_users SET status_fk = :status WHERE user_id = :uid");
			$updateStatusQuery->bindParam(':status', $_POST['update_status'], PDO::PARAM_INT);
			$updateStatusQuery->bindParam(':uid', $uid, PDO::PARAM_INT);
			if($updateStatusQuery->execute()) {
			return "success";
			}
			else{
				 $this->errorMessage = " | Something went wrong, try again later or contact an administrator";
				 return $this->errorMessage;
			}
		}
		
		
		public function updateUserRole($uid){
			$updateRoleQuery = $this->conn->prepare("UPDATE table_users SET role_fk = :role WHERE user_id = :uid");
			$updateRoleQuery->bindParam(':role', $_POST['update_role'], PDO::PARAM_INT);
			$updateRoleQuery->bindParam(':uid', $uid, PDO::PARAM_INT);
			if($updateRoleQuery->execute()) {
			return "success";
			}
			else{
				 $this->errorMessage = " | Something went wrong, try again later or contact an administrator";
				 return $this->errorMessage;
			}
		}
			
		
		public function deleteUser($uid){
		$deletedUserQuery = $this->conn->prepare("DELETE FROM table_users WHERE user_id = :uid");
	    $deletedUserQuery->bindParam(':uid', $uid, PDO::PARAM_INT);
	    if($deletedUserQuery->execute()) {
			return "success";
			}
			else{
				 $this->errorMessage = " | Something went wrong, try again later or contact an administrator";
				 return $this->errorMessage;
			}
		}
		
		
		
		
		
		
		
		
		
		
		
	
		
		



	}