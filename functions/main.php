<?php
function show_home(){
	if(isset($_GET['mode'])){
		if($_GET['mode'] == "encode"){
			show_encode();
		}else if($_GET['mode'] == "decode"){
			show_decode();
		}
		else if ($_GET['mode'] == "history"){
			show_history();
		}
	}else{
		show_encode();
	}
}
/*views*/
function show_history(){
	echo '<p>cunt</p>';
}

function show_nav(){
	if(isset($_GET['mode'])){
		if($_GET['mode'] == "encode"){
			if(isset($_COOKIE['user'])){
				echo '<ul>
					<li><a class="active" href="index.php?mode=encode">Encode</a></li>
					<li><a href="index.php?mode=decode">Decode</a></li>
					
					<li style="float:right;"><a href="logout.php">Logout</a></li>
					<li style="float:right;"><a href="his.php?mode=history">History</a></li>
				</ul>';
			}else{
				echo '<ul>
				<li><a class="active" href="index.php?mode=encode">Encode</a></li>
				<li><a href="index.php?mode=decode">Decode</a></li>
				
				<li style="float:right;"><a href="login.php">Login</a></li>
				<li style="float:right;"><a href="register.php">Register</a></li>
			</ul>';
			}
		}else if($_GET['mode'] == "decode"){
		if(isset($_COOKIE['user'])){
			echo '<ul>
					<li><a href="index.php?mode=encode">Encode</a></li>
					<li><a class="active"  href="index.php?mode=decode">Decode</a></li>
					
					<li style="float:right;"><a href="logout.php">Logout</a></li>
					<li style="float:right;"><a href="his.php?mode=history">History</a></li>
				  </ul>';
		}else{
			echo '<ul>
					<li><a href="index.php?mode=encode">Encode</a></li>
					<li><a class="active"  href="index.php?mode=decode">Decode</a></li>
					
					<li style="float:right;"><a href="login.php">Login</a></li>
					<li style="float:right;"><a href="register.php">Register</a></li>
				  </ul>';
			}
		
		}else if($_GET['mode'] == "history"){
			echo '<ul>
					<li><a href="index.php?mode=encode">Encode</a></li>
					<li><a href="index.php?mode=decode">Decode</a></li>
					
					<li style="float:right;"><a href="logout.php">Logout</a></li>
					<li style="float:right;"><a class="active" href="his.php?mode=history">History</a></li>
				  </ul>';

		}else{
			echo "<script>window.location.replace('index.php')</script>";
		}
	}else{
		if(isset($_COOKIE['user'])){
				echo '<ul>
					<li><a class="active" href="index.php?mode=encode">Encode</a></li>
					<li><a href="index.php?mode=decode">Decode</a></li>
					
					<li style="float:right;"><a href="logout.php">Logout</a></li>
					<li style="float:right;"><a href="his.php?mode=history">History</a></li>
				</ul>';
			}else{
				echo '<ul>
				<li><a class="active" href="index.php?mode=encode">Encode</a></li>
				<li><a href="index.php?mode=decode">Decode</a></li>
				
				<li style="float:right;"><a href="login.php">Login</a></li>
				<li style="float:right;"><a href="register.php">Register</a></li>
			</ul>';
			}
	}
}
function show_encode(){
	echo '<div class="container">
	<div class = "bordery">
	<p><b>Drag and drop an image or click Browse and select it</b></p>
	<input type="file" id="file" class="cancer" accept="image/*" />
	</div>
	<p><b>Set a password (optional)</b></p>
	<p>Password: <input type="text" id="pass" value="" placeholder="No Password"/></p>
	
	<p><b>Input you secret message and click "Encode" when you are finished</b></p>
	<p id= "naslovslike"></p>
	<p>
		<a download="image.png" id ="resultimg1" style="display:none" href="/path/to/image" >
		<img id ="resultimg" alt="ImageName" src="/path/to/image">
	</a>
	</p>
	<p>
	<textarea id="msg" style="width:100%;height:50px;"></textarea>
	</p>
	<div class="button" align="center"><a class="button" href="javascript: writeIMG()">Encode</a></div></div>';
}
function show_decode(){
	echo '<div class="container"><div class = "bordery">
	<p><b>Drag and drop an image or click Browse and select it</b></p>
	<input type="file" id="file" class="cancer" accept="image/*" />
	</div>
	<p><b>Input the password (if you set it)</b></p>
	<p>Password: <input type="text" id="pass" value="" placeholder="No Password"/></p>

	<p>

	<p><b>Your secret message will show here: </b></p>

	<p id = "result" class= "nekiboi"></p>

	<div class="button" align="center"><a class="button" href="javascript: readIMG()">Decode</a></div></div>';
}


?>