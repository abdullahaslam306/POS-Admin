<?php 
include("header.php");
if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['er']))
{
	echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[msg]
</div></div>";
}

?>

<div>
<br>
<div class="bg-light clearfix">
 
 <a href="manageProduct.php"> <button type="button" class="btn btn-secondary float-right">Add New</button></a>
</div>
	<br>

	<form method="GET">
	<div class="form-row">
		<div class="col-md-3 mb-3"></div>
		<div class="col-md-3 mb-3">  
		 <div class="input-group ">
             <select class="custom-select"  name="place" required>
			<option selected disabled value="">Choose...</option>
        <option value="Concession">Concession</option>
        <option value="Cafeteria">Cafeteria</option>
		</select>
    <div class="input-group-append">
      <input type="submit" name="Search"  value="Find" class="input-group-button form-control">
      
    </div>
  </div></div>
		<div class="col-md-3 mb-3"></div>

	</div>
	</form>

<br>

<?php 
if(isset($_GET['Search']))
   {                                         
                        $type=$_GET['place'];
                        echo "<h2>All Products : $type</h2>";
                                            $con=con_function();

$s=0;
$sql ="SELECT * FROM product where pro_type='$type' ";
$r=$con->query($sql);
 if($r->num_rows>0)
  {$s=$s+$r->num_rows;
 $projects = array();
 $pn=array();
  $i=0;
    while ($not =  mysqli_fetch_assoc($r))
    {
        $notif[] = $not;
        
    }
   $i=0;
    sort($notif);
  
  
 
 
    foreach ($notif as $notif)
    {   if($i==0)
    	{
    	echo "<div class='row'>";	
    	}
    	$i=$i+1;
    	echo "<div class='col-md-4' >";
    	echo "<div class='card' style='width: 18rem;'>";
 
 echo '<img src="data:image/jpeg;base64,'.base64_encode($notif['photo'] ).'"  height="200" width="300"  class="card-img-top" />';
 echo" <div class='card-body' >
    <h2 style='text-align: center;' class='card-title'>$notif[pro_name]</h5>
    <p class='card-text' style='font-size:18px; color:grey;'>Price: $ $notif[pro_rate]</p>
    <p class='card-text' style='font-size:18px; color:grey;'>Place:  $notif[pro_type]</p>
    <a href='productEdit.php?id123=$notif[pid]' class='btn btn-primary'>Edit</a>
    <a href='productBack.php?id123=$notif[pid]' class='btn btn-danger'>Delete</a>
  </div>
</div> ";
echo"</div>";
if($i==3)
{
echo "</div><br>";

$i=0;
}    
    }
}}else{
	echo "<h2>Select Type</h2>";
}


     ?>

</div>



<?php include("footer.php"); ?>
