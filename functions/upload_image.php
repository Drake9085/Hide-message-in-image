<?php
	include 'db_init.php';
	$message =$_POST['message'];
	$password = $_POST['password'];
	$pic = $_POST['data'];
	echo base64_decode($_COOKIE['user']);
	global $db;
	$usr = base64_decode($_COOKIE['user']);
    $query = "SELECT id from users WHERE username=:username";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":username",$usr );
    $stmt->execute();
	$result = $stmt->fetch();
	$id = $result[0];
	$query = "INSERT INTO pictures (message,password,pic,user_id)VALUES(:message,:password,:pic,:id) ";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":message", $message);
	$stmt->bindParam(":password", $password);
	$stmt->bindParam(":pic", $pic);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$query="SELECT MAX(pic_id) FROM pictures";
	$stmt = $db->prepare($query);
	$stmt->execute();	
	$result = $stmt->fetch();
    $pic_id = $result[0];
	$query = "INSERT INTO history (pic_id,datum,user_id) VALUES(:pic_id,now(),:user_id) ";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":pic_id", $pic_id);
	$stmt->bindParam(":user_id", $id);
	$stmt->execute();
	/*$query = "SELECT pic from pictures WHERE user_id=:id";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":id",$id );
    $stmt->execute();
	$result = $stmt->fetch();
	$pic = $result[0];
	echo "<img src=".$pic.'>'*/
?>	