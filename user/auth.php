<?php
session_start();
if ($_SESSION['type'] ){
	
}	
else{
	header("location: ../user/userSignin.php");
}






?>


