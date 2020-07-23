<?php


function con_function(){

	$server1 = 'localhost';
	$uname1 = "root";
	$pass1 = '';
	$db = "pos";
	$con1 = new mysqli($server1,$uname1,$pass1,$db);

	if ($con1->connect_error){
		echo "<h1>Error in Connection With Database</h1>" ;
		echo "$conn->connect_error";
		echo 'L$Zs8$V@kA';
		die();
	}


	return $con1;

}


function con_close($con){
	$con->close;

}




?>
