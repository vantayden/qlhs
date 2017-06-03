<?php
include('db.php');
session_start();

class user{
	public function __construct(){
		$this->db = new db();
	}
	
	private function existing($user){
		$user = $this->db->query("SELECT * FROM `user` WHERE `username` = '{$user}'");
		return ($user->num_rows === 1) ? true : false;
	}
	
	public function login($user, $pass){
		$result = array('error' => false, 'message' => '');
		
		if(!$this->existing($user)){
			$result['error'] = true;
			$result['message'] = config::user_does_not_exist;
		} else {
			$user = $this->db->query("SELECT * FROM `user` WHERE `username` = '{$user}'")->fetch_array();
			if(md5($pass) !== $user['password']){
				$result['error'] = true;
				$result['message'] = config::password_does_not_match;
			} else {
				$_SESSION['user'] = $user['id'];
			}
		}
		return $result;
	}
	
	public function logged(){
		return isset($_SESSION['user']);
	}	
	private function isAdmin(){
		$user = $this->db->query("SELECT * FROM `user` WHERE `id` = '{$_SESSION['user']}'")->fetch_array();
		return ($user['permission'] === config::permission_admin);
	}
	
	public function add($user, $pass, $isAdmin = false){
		if($isAdmin)
			$this->db->query("INSERT INTO `user` (`username`, `password`, `permission`) VALUES ('{$user}', '".md5($pass)."', '".config::permission_admin."')");
		else
			$this->db->query("INSERT INTO `user` (`username`, `password`) VALUES ('{$user}', '".md5($pass)."')");
	}
}

$user = new user();
?>