<?php 
include_once 'functions/main.php';
include_once 'functions/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
	  <link href="css/style.css" rel="stylesheet">
  <title>History</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


</head>

<body>
<?php show_nav(); ?>
	<div class="container">

	<?php
	$usr = base64_decode($_COOKIE['user']);
    $query = "SELECT id from users WHERE username=:username";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":username",$usr );
    $stmt->execute();
	$result = $stmt->fetch();
	$id = $result[0];
	$query = "SELECT message,password,pic,datum FROM pictures,history  WHERE pictures.user_id=:id AND pictures.pic_id=history.pic_id ORDER BY(datum)DESC";
    $stmt = $db->prepare($query);
	$stmt->bindParam(":id",$id );
    $stmt->execute();
	$result = $stmt->fetch();
	if ($result>0){
	do{
	echo '<div class="history"><p class="para"><img src='.$result[2].'></p><p class="para">Your message was: '.$result[0].' </p><p class="para">Your password was: '.$result[1].'</p><p class="para">Date of encoding: '.date('F j, Y',strtotime($result[3])).'</p></div>';

	}while(($result = $stmt->fetch()));
	}
	?>

	</div>
		

</body>

</html>