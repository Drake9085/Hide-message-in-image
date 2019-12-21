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
  <title>Register</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


</head>

<body>
<?php show_nav(); ?>
	<div class="container">
		<div id="errors"><?php 
		if(isset($_POST['username'])){
			register($_POST['username'], $_POST['password']);
		}
		?></div>
		<div id="register">
			<div class="container">
				<div id="register-row" class="row justify-content-center align-items-center">
					<div class="col-md-6" style="margin:auto; float:none;">
						<div id="register-box" class="col-md-12">
							<form id="register-form" class="form" action="register.php" method="post">
								<h3 class="text-center text-info">Register</h3>
								<div class="form-group">
									<label for="username" class="text-info">Username:</label><br>
									<input type="text" name="username" id="username" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="password" class="text-info">Password:</label><br>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
								</div>
								<div id="register-link" class="text-right">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
function removeError(){
	document.getElementById("errors").innerHTML="";
}
</script>
</body>

</html>