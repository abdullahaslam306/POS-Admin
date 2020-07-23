<?php include("header.php"); 
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
<br>
<h2>Add Products</h2>
<form class="needs-validation" action="productBack" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      
      <?php 
        $con=con_function();

      $query="select max(pid)+1 as pd from product";
      $r=$con->query($query);
      $not =  mysqli_fetch_assoc($r);

   
       ?>
      <label for="validationCustom01">Product ID</label>
      <input type="number" name="pid" class="form-control" id="validationCustom01" value="<?php echo $not['pd']; ?>" readonly required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
     <img src="download.png" class="rounded mx-auto d-block" style="width: 300px; height: 200px;" id="output">
     </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Product Name</label>
      <input type="text" name="pname" class="form-control" id="validationCustom02" placeholder="Banan Shake" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Product Rate</label>
      <input type="number" min="0" name="prate" step="any" class="form-control" placeholder="0.00" required>
      <div class="invalid-feedback">
        Please enter valid price.
      </div>
    </div>
    
    
  </div>
  
  
<div class="form-row">
  <div class="col-md-6 mb-6">
      <label for="validationCustom04">Product Type</label>
      <select class="custom-select" id="validationCustom04" name="ptype" required>
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
      <input type="file" id="file" accept="image/*"  onchange="loadFile(event)" class="form-control" name="img"  required>
      
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    
    </div>
 
  <br>

 <button type="Submit" class="btn btn-success" name="add">Submit</button>
 <button type="button" class="btn btn-danger" name="add">Clear</button>

 

</form>

<?php include("footer.php"); ?>
<script>
var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>