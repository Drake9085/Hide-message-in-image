<?php
setcookie("user", "hehe", time() - 9999999);
echo "<script>window.location.replace('index.php')</script>";
?>