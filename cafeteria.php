
<?php 
include("header.php"); ?>


<h2>Sale Report</h2>
<form method="GET">
	<div class="form-row">
		<div class="col-md-2 mb-2"></div>
    <div class="col-md-4 mb-4">
      <label for="validationCustom02">From:</label>
      <input type="date" name="sdate"  class="form-control" id="validationCustom02"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationCustom03">To:</label>
      <input type="date"  name="edate"  class="form-control"  required>
      <div class="invalid-feedback">
       
      </div>

      
    </div>
    <div class="col-md-2 mb-2"></div>
    
    
  </div>

  	<div class="form-row">
		<div class="col-md-4 mb-4"></div>
    <div class="col-md-4 mb-4">
      <input type="Submit" name="Search" class="form-control btn btn-primary">
    </div>
    <div class="col-md-4 mb-4">
     

      
    </div>
  
    
    
  </div>
</form>

<br><br>

<div class="container">
	<h3 style="text-align: center;">Cafeteria Sale Report</h3>
	<?php if(isset($_GET['Search'])){
	echo "<h6>Start Date: $_GET[sdate]    End Date: $_GET[edate]</h6>";
} ?>
	<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">ID</th> 
      <th scope="col">User RFID</th> 
      <th scope="col"> Date</th>
      <th scope="col"> Location</th>
      <th scope="col"> Amount</th>
     

    
    </tr>
  </thead>
  <tbody>
                              
                                    <tbody>
                                        
                                            <?php 
                                            $tamt=0;
                                            if(isset($_GET['Search']))
                                         { $sd=$_GET['sdate'];
                                            $ed=$_GET['edate'];

                                            $con=con_function();


$s=0;
$sql ="SELECT * from transaction where date BETWEEN '$sd' AND '$ed' AND location='Cafeteria'";

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
  
   $val="";
 
 
    foreach ($notif as $notif)
    {   $tamt=$tamt+$notif['amount'];
    
   echo  "<form><tr class='tr-shadow'>";
   echo "<td>".$notif['tid']."</td> <td class='desc'>
                                                ".$notif['rfid']."
                                            </td><td class='desc'>
                                                ".$notif['date']."
                                            </td><td class='desc'>".$notif['location']."</td><td class='desc'>".$notif['amount']."</td>";
                                              }

                                            
                                            
                                       echo " </tr>
                                        </form>
                                        <tr class='spacer'></tr>
                                        <tr class='tr-shadow'><td></td><td></td><td></td><td><b>Total:</b></td><td>$tamt</td></tr>" ;
$i++;}else{
	echo "<p style='font-size:18px; text-align:center;'>No Transaction Found <p>";
}}else{
   echo "No data Found";
  
}  ?>

                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>

</div>


<?php include("footer.php"); ?>