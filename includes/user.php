<?php 

/**
 * User class for creating account,login purpose
 */
class User
{
	private $con;
	function __construct()
	{
		include_once("../database/db.php");
		$db=new Database();
		$this->con=$db->connect();
	}

	//If user register or not
	private function emmailExists($email)
	{
		$pre_stmt=$this->con->prepare("SELECT id FROM user WHERE email=?");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		if($result->num_rows>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function createUserAcc($username,$email,$password,$usertype)
	{
		//To protect Application from SQL Attack here i use prepare statement

		if($this->emmailExists($email)){
			// echo "Something Wrong";
			return "EMAIL_ALREADY_EXISTS";
		}
		else {
			$date=date("Y-m-d");
			$note="";
			$pas_hash=password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
			$pre_stmt=$this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`)
				VALUES (?,?,?,?,?,?,?)");
			$pre_stmt->bind_param("sssssss",$username,$email,$pas_hash,$usertype,$date,$date,$note);
			$result=$pre_stmt->execute() or die($this->con->error);
			if($result){
				return $this->con->insert_id;
			}
			else{
				return "Something_wrong";
			}

		}
	}

	public function userLogin($email,$password)
	{
		$pre_stmt=$this->con->prepare("SELECT id,username,password,last_login FROM user WHERE email= ?");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute()or die($this->con->error);
		$result=$pre_stmt->get_result();

		if($result->num_rows<1){
			return "Not_Registered";
		}

		else{
			$row=$result->fetch_assoc();
			if(password_verify($password,$row["password"])){
				$_SESSION["userid"]=$row["id"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["last_login"]=$row["last_login"];

				//Here i update last login date and time of user when he/she logged in
				$lastlogin=date("Y-m-d H:i:s");
				$pre_stmt=$this->con->prepare("UPDATE user SET last_login=? WHERE email= ?");
				$pre_stmt->bind_param("ss",$lastlogin,$email);
				$result=$pre_stmt->execute() or die($this->con->error);

				if($result){
					// echo"Login message";
					return 1;
				}
				else{
					return 0;
				}
			}

			else{
				return "Password_not_match";
			}
		}
	}






}


// $user =new User();

// echo $user->createUserAcc("Test","rasel2@gmail.com","1234567","Admin");
// echo $user->userLogin("rasel2@gmail.com","1234567");
// echo $_SESSION["username"];
?>