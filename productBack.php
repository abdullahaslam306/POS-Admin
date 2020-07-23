<?php include("connection.php");
if(isset($_POST['add']))
{ extract($_POST);
$check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
 $query="INSERT INTO product(pid, pro_name, pro_rate, pro_type, photo) VALUES ($pid,'$pname',$prate,'$ptype','$imgContent')";
 
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:manageProduct.php?msg=Successfully Added");
  }
  else{
  	header("location:manageProduct.php?er=Error ");
  }
}
}
if(isset($_POST['edit']))
{ extract($_POST);
  if($_FILES["img"]["tmp_name"]){ 
$check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
 $query="UPDATE product SET pro_name='$pname',pro_rate=$prate,pro_type='$ptype',photo='$imgContent' WHERE pid=$pid";
  }}else{
    $query="UPDATE product SET pro_name='$pname',pro_rate=$prate,pro_type='$ptype' WHERE pid=$pid";
  }
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:viewproducts.php?msg=Successfully Updated");
  }
  else{
  	header("location:viewproducts.php?er=Error in update");
  }
}

if(isset($_GET['id123']))
{ $id=$_GET['id123'];

 $query="DELETE FROM product WHERE  pid=$id";
  
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:viewproducts.php?msg=Successfully Removed");
  }
  else{
  	header("location:viewproducts.php?er=Error ");
  }
}

 ?>
