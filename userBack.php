<?php include("connection.php");
if(isset($_POST['add']))
{ extract($_POST);
  if($_FILES["img"]["tmp_name"]){
$check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
 $query="INSERT INTO user(rfid, fname, lname, id_card, grade, email, allow_access, user_type,image,balance) VALUES (".$_POST['rfid'].",'".$_POST['fname']."','".$_POST['lname']."',".$_POST['idcard'].",".$_POST['grade'].",'".$_POST['email']."',$cons,'".$_POST['utype']."','$imgContent',$bal)";
  }}
  else{
    header("location:manageUser.php?er=Error! Kindly Fill All Required Feilds. ");
  }
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:manageUser.php?msg=Successfully Added");
  }
  else{
  	header("location:manageUser.php?er=Error ! Kindly Fill All Required Feilds. ");
  }
}

if(isset($_POST['update']))
{ extract($_POST);
  if($_FILES["img"]["tmp_name"]){
$check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
 $query="UPDATE user SET fname='$fname',lname='$lname',id_card=$idcard,grade=$grade,email='$email',allow_access=$cons,user_type='$utype',image='$imgContent',balance=$bal WHERE rfid=$rfid";}}
 else{
  $query="UPDATE user SET fname='$fname',lname='$lname',id_card=$idcard,grade=$grade,email='$email',allow_access=$cons,user_type='$utype',balance=$bal WHERE rfid=$rfid";
 }
  
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:manageUser.php?msg=Successfully Updated");
  }
  else{
  	header("location:manageUser.php?er=Error in update");
  }
}

if(isset($_GET['id123']))
{ 
  $id=$_GET['id123'];

 $query="DELETE FROM user WHERE  rfid=$id";
  
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:manageUser.php?msg=Successfully Removed");
  }
  else{
  	header("location:manageUser.php?er=Error ");
  }
}

 ?>
