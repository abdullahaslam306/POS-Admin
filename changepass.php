
<?php 

include("header.php");if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['er']))
{
  echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[er]
</div></div>";
} ?>

<h2>Change Username / Password</h2>
<div class="container">
	<?php 
	  $con=con_function();

$s=0;
$sql ="SELECT * FROM login where userid=$_SESSION[userid] ";
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
	 ?>
    <form class="form-signin" method="post" onsubmit="return fun()" action="backpass.php">
      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
      		 <label for="validationCustom04">Email</label>
      <input type="email" name="mail" class="form-control" id="mail" value="<?php echo $notif['username']; ?>" required>
      
      	</div>
      	<div class="col-md-4"></div>
      </div>
      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
      		 <label for="validationCustom04">Password</label>
      <input type="Password" name="password" class="form-control" id="pass1" value="<?php echo $notif['password']; ?>" required>
      
      	</div>
      	<div class="col-md-4"></div>
      </div>
      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
      		 <label for="validationCustom04">Confirm Password</label>
      <input type="Password" name="cpassword" class="form-control" id="pass2" value="<?php echo $notif['password']; ?>" required>
      
      	</div>
      	<div class="col-md-4"></div>
      </div>
      <br>
      <br>

      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
     <input type="submit" name="submit" value="Edit" class="btn btn-primary col-md-4">
      </div>

      <div class="col-md-4"></div>
      <?php } }?>
    </form>
   <script type="text/javascript">
   	function fun()
   	{
   		pass1=document.getElementById('pass1').value;
   		pass2=document.getElementById('pass2').value;
   		if(pass1===pass2)
   		{
   			return true;
   		}
   		else{
   			alert("Password Dose't match");
   			return false;
   		}
   	}
   </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</div>

<?php include("footer.php"); ?>