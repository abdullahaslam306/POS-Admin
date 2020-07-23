
<?php 
include("header.php"); ?>

<div class="container"><br>
	<div class="col-md-12">
<center> <H1>Welcome <?php echo $_SESSION['name']; ?></H1></center>
</div>
<div class="col-md-12" style=" width: 100%; height: 250px; background-color: black; display: inline-block;">
	<h2 style="background-color: black;color:white; margin: 100px auto;"><center>Your Current Balance is : $<?php echo round($_SESSION['balance'],2); ?></center></h2>
 
</div>
</div>

<?php include("footer.php"); ?>