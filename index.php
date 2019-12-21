<?php 
include_once 'functions/main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
  <title>Encode</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
<?php show_nav(); ?>
<?php show_home(); ?>

<div id="res"></div>
<script type="text/javascript" src="js/jquery.min.js"></script> <!--jQuery is not required by the library. We use it in DEMO page-->
<!-- CryptoStego JS files.--> 
<script type="text/javascript" src="js/sha512.js"></script>
<script type="text/javascript" src="js/utf_8.js"></script>
<script type="text/javascript" src="js/crypto.js"></script>
<script type="text/javascript" src="js/readimg.js"></script>
<script type="text/javascript" src="js/setimg.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- above scripts equivalent to <script type="text/javascript" src="cryptostego.min.js"></script>-->
<script type="text/javascript">
function writeIMG(){
    
	$("#resultimg").hide();
    $("#resultimg").attr('src','');
    $("#result").html('Processing...');
    console.log(5);
	function writefunc(){
        var selectedVal = '';
        var selected = 1;
        if (selected.length > 0) {
            selectedVal = selected;
        }
		let nice = new nicEditors.findEditor('msg');
		let msg = nice.getContent();
		
        var t = writeMsgToCanvas('canvas',msg,$("#pass").val(),selectedVal);
        if(t!=null){ 
            var myCanvas = document.getElementById("canvas");  
            var image = myCanvas.toDataURL("image/png");    
            $("#resultimg").attr('src',image);
			$("#resultimg1").attr('href',image);
			$("#resultimg1").show();
            $("#resultimg").show();
			$("#naslovslike").html('<b>Click on the encoded picture to download it</b>');
			<?php 
			if(isset($_COOKIE['user'])){
			?>
				$.ajax({
					type: 'POST',
					url: 'functions/upload_image.php',
					data: { data: image, message: nice.getContent(), password: $("#pass").val() },
					success: function(response) {
						document.getElementById("res").innerHTML = response;
						}
					});
			<?php
				$dir='Slike';
				
			}
			?>
			
        }
    }
    loadIMGtoCanvas('file','canvas',writefunc,500);
}
function readIMG(){
    $("#resultimg").hide();
    $("#result").html('Processing...');
    function readfunc(){
        var selectedVal = '';
        var selected = 1;
        if (selected.length > 0) {
            selectedVal = selected;
        }
        var t= readMsgFromCanvas('canvas',$("#pass").val(),selectedVal);
        console.log(1);
		if(t!=null){
            t=t.split('&').join('&amp;');
            t=t.split(' ').join('&nbsp;'); 
            t=t.split('<').join('&lt;');
            t=t.split('>').join('&gt;');
            t=t.replace(/(?:\r\n|\r|\n)/g, '<br>');
			console.log(2);
			let k = document.getElementById("result");
			console.log(t);
			t=t.replace(/&lt;/g, '<').replace(/&gt;/g, '>') 
			k.innerHTML="<p>"+t+"</p>"; 
			console.log(3);
        }else $("#result").html('ERROR REAVEALING MESSAGE!');
             
    }
    loadIMGtoCanvas('file','canvas',readfunc);
}
</script>


</body>

</html>