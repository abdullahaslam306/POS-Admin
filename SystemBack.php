<?php 
include('connection.php');
include('auth.php');

if(isset($_POST['add']))
{ extract($_POST);
 $query="INSERT INTO login VALUE('$mail','$npass','$utype')";
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:systemUser.php?msg=Successfully Added");
  }
  else{
  	header("location:systemUser.php?er=Error ! Kindly Fill All Required Feilds. ");
  }
}

if(isset($_POST['update']))
{ extract($_POST);
  
 $query="UPDATE login SET username='$mail',password='$npass',type='$utype' where userid=$userid";
 echo $query;
  
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:systemUser.php?msg=Successfully Updated");
  }
  else{
  	header("location:systemUser.php?er=Error in update");
  }
}

if(isset($_GET['id123']))
{ 
  $id=$_GET['id123'];

 $query="DELETE FROM login WHERE  userid=$id";
  
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:systemUser.php?msg=Successfully Removed");
  }
  else{
  	header("location:systemUser.php?er=Error ");
  }
}



 ?>