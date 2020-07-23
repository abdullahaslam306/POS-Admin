<?php
include("connection.php");
include('auth.php');
if(isset($_POST['submit']))
{extract($_POST);
 $sql="UPDATE login set username='$mail',password='$password' where userid=$_SESSION[userid]";
 $con=con_function();
  $r=$con->query($sql);
  if ($r) {
  header("location:changepass.php?msg=Successfully Updated");
  }
  else{
  	header("location:viewproducts.php?er=Error in update");
  }
} 
 ?>