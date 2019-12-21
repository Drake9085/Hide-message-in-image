<?php
include 'db_init.php';
function register($username, $password){
	global $db;
	if(!username_exists($username)){
		$query = "INSERT INTO users(username, password, id_role) values(:username, :password, 1)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		echo "<script>window.location.replace('login.php?registered=true');</script>";
	}else{
		echo '<div class="alert alert-danger alert-dismissible show" role="alert">
			  <strong>Alert:</strong> Username already exists!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="removeError();">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
	}
}
function login($username, $password){
	global $db;
	if(login_successful($username, $password)){
		setcookie("user", base64_encode($username), time() + 3600*24*7);
		echo "<script>window.location.replace('index.php')</script>";
	}else{
		echo '<div class="alert alert-danger alert-dismissible show" role="alert">
			  <strong>Alert:</strong> Wrong username or password.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="removeError();">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
	}
}
function login_successful($username, $password){
	global $db;
	$query = "SELECT EXISTS(SELECT * from users WHERE username=:username and password=:password) AS checkExists";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":username", $username);
	$stmt->bindParam(":password", $password);
    $stmt->execute();
    $result = $stmt->fetch();
    if($result['checkExists'] == 1) return true;
    return false;	
}
function show_reg_success(){
	echo '<div class="alert alert-success alert-dismissible show" role="alert">
			  <strong>Registration successful:</strong> You can now login below!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="removeError();">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
}
function username_exists($username){
	global $db;
	$query = "SELECT EXISTS(SELECT * from users WHERE username=:username) AS checkExists";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch();
    if($result['checkExists'] == 1) return true;
    return false;	
}
?>