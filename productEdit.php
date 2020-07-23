<?php include("header.php"); 
if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['msg']))
{
  echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[msg]
</div></div>";
}?>

<br>
<h2>Edit Product</h2>
<?php 
if(isset($_GET['id123']))
   {                                         
                        $product=$_GET['id123'];
                       
                                            $con=con_function();

$s=0;
$sql ="SELECT * FROM product where pid=$product ";
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
  
   foreach ($notif as $notif) {
     # code...
   ?>
 
 
 


     

<form class="needs-validation" action="productBack" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Product ID</label>
      <input type="number" name="pid" class="form-control" value="<?php echo $notif['pid']; ?>" id="validationCustom01" readonly placeholder="1" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
     <?php  echo '<img src="data:image/jpeg;base64,'.base64_encode($notif['photo'] ).'"  height="200" width="300" class="rounded mx-auto d-block" id="output"  />'; ?>
     </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Product Name</label>
      <input type="text" name="pname" value="<?php echo $notif['pro_name']; ?>" class="form-control" id="validationCustom02" placeholder="Banan Shake" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Product Rate</label>
      <input type="number" min="0" value="<?php echo $notif['pro_rate']; ?>" name="prate" step="any" class="form-control" placeholder="0.00" required>
      <div class="invalid-feedback">
        Please enter valid price.
      </div>
    </div>
    
    
  </div>
  
  
<div class="form-row">
  <div class="col-md-6 mb-6">
      <label for="validationCustom04">Product Type</label>
      <select class="custom-select" id="validationCustom04" value="<?php echo $notif['pro_type']; ?>" name="ptype" required>
        <option selected disabled value="">Choose...</option>
        <option value="Concession">Concession</option>
        <option value="Cafeteria">Cafeteria</option>
       
      </select>
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Choose Image</label>
      <input type="file" id="file" accept="image/*"  onchange="loadFile(event)" class="form-control" name="img"  >
      
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    
    </div>
 
  <br>
  <?php 
  } } }else{
  header("location:viewproducts.php");
} ?>

<button type="Submit" class="btn btn-primary" name="edit">Edit</button>
<button type="button" class="btn btn-danger" onclick="history.back()" >Cancel</button>
 

</form>

<?php include("footer.php"); ?>
<script>
var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>